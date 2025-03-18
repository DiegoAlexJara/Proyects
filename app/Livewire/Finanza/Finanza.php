<?php

namespace App\Livewire\Finanza;

use App\Models\Finanzas\Balance;
use App\Models\Finanzas\Transaccion;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Finanza extends Component
{
    public $amountTot = 100;
    public $amountMonthOut = 0;
    public $amountMonthIn = 0;
    public $showSquare = false;
    public $type = '', $categorie = '', $method_payment = '', $CreateTransferencia;
    public $amount;
    public $description, $mensajeExito;
    public $mes;

    public function mount()
    {
        $user = Auth::id();

        $balance = Balance::where('user_id', $user)->first();
        if (empty($balance)) {
            $this->amountTot = 0;
        } else {
            $this->amountTot = $balance->amount;
        }
        $this->CreateTransferencia = now()->toDateString(); // Formato: yyyy-mm-dd
        $this->mes = request()->input('mes', Carbon::now()->month);
        $this->cargarGastos();
    }

    public function cargarGastos()
    {
        $user = Auth::id();
        $transacciones = Transaccion::selectRaw("
        SUM(CASE WHEN amount < 0 THEN amount ELSE 0 END) as gastos,
        SUM(CASE WHEN amount > 0 THEN amount ELSE 0 END) as ingresos
    ")
            ->whereMonth('created_at', $this->mes)
            ->where('user_id', $user)
            ->first();

        $this->amountMonthOut = abs($transacciones->gastos ?? 0);
        $this->amountMonthIn = $transacciones->ingresos ?? 0;
    }

    public function render()
    {
        $user = Auth::id();
        $transactions = Transaccion::orderBy('created_at', 'desc')->where('user_id', $user)->take(5)->get();
        return view('livewire.finanza.finanza', compact('transactions'));
    }
    function transaction()
    {
        $this->showSquare = !$this->showSquare;
    }

    public function updatedAmount($value)
    {
        if ($value < 0) {
            $this->amount = 1;
        }
    }

    public function save()
    {
        $this->validate([
            'type' => 'required',
            'categorie' => 'required',
            'method_payment' => 'required',
            'amount' => 'required',
            'description' => 'nullable|string|max:500',
        ], [
            'tipe.required' => 'El campo tipo es obligatorio.',
            'categorie.required' => 'El campo categoria es obligatorio.',
            'method_payment.required' => 'El campo metodo de pago es obligatorio.',
            'amount.required' => 'El campo cantidad es obligatorio.',
            'description.max' => 'El campo descripcion solo tiene un maximo de 500 caracteres.',
        ]);
        $user = Auth::id();
        $transfer = new Transaccion();
        $transfer->type = $this->type;
        $transfer->categorie = $this->categorie;
        $transfer->method_payment = $this->method_payment;
        $transfer->description = $this->description;
        if ($this->type == 'Ingreso') {
            $transfer->amount = $this->amount;
        } else {
            $transfer->amount -= $this->amount;
        }
        $transfer->user_id = $user;
        $transfer->save();
        $user_amounts = Balance::where('user_id', $user)->first();
        if (empty($user_amounts)) {
            $balance = new Balance();
            if ($this->type == 'Ingreso') {
                $balance->amount = $this->amount;
            } else {
                $balance->amount -= $this->amount;
            }
            $balance->user_id = $user;
            $balance->save();
            $this->transaction();
            session()->flash('mensajeExito', '¡Transacción guardada con éxito! Y Creada El Balance');
            // Redirigir para que el mensaje flash se muestre
            return redirect()->route('finanza_Inicio'); // Usa la ruta adecuada
        }
        $balance = Balance::where('user_id', $user)->first();
        if ($this->type == 'Ingreso') {
            $balance->amount += $this->amount;
        } else {
            $balance->amount -= $this->amount;
        }
        $balance->updated_at = now();
        $balance->save();
        $this->transaction();
        session()->flash('mensajeExito', '¡Transacción guardada con éxito!');
        // Redirigir para que el mensaje flash se muestre
        return redirect()->route('finanza_Inicio'); // Usa la ruta adecuada

    }

    public function Reports()
    {
        return redirect()->route('finanza_Report');
    }
}
