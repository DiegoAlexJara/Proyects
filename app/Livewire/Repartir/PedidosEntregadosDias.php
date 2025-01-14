<?php

namespace App\Livewire\Repartir;

use App\Models\pagos;
use Illuminate\Support\Carbon;
use Livewire\Component;

class PedidosEntregadosDias extends Component
{

    public $fecha;

    public $Pedido = false, $ViewPropina = false, $ViewPagado = false, $ViewStatus = false;
    public $direccion;
    public $totPropinas = 0;
    public $totPrecio = 0;
    public $total;
    public $precio, $propina, $pagado;
    public $idPedido;

    public function mount(){
        $this->fecha = Carbon::now()->format('Y-m-d');

    }
    public function render()
    {
        $fecha = Carbon::createFromFormat('Y-m-d', $this->fecha)->startOfDay();

        // Obtener los registros que coinciden con la fecha
        $pedidos = pagos::whereDate('created_at', $fecha)->get();
        $this->totPropinas = Pagos::whereDate('created_at',  $fecha)->sum('propina');
        $this->totPrecio = Pagos::whereDate('created_at',  $fecha)->sum('precio');
        $this->total = Pagos::whereDate('created_at',  $fecha)->sum('pagado');
        return view('livewire.repartir.pedidos-entregados-dias', compact('pedidos'));
    }
}
