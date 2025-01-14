<?php

namespace App\Livewire\Repartir;

use App\Models\pagos;
use Illuminate\Support\Carbon;
use Livewire\Component;

class PedidosEntregados extends Component
{
    public $Pedido = false, $ViewPropina = false, $ViewPagado = false, $ViewStatus = false;
    public $direccion;
    public $totPropinas = 0;
    public $totPrecio = 0;
    public $total;
    public $precio, $propina, $pagado;
    public $idPedido;

    public function render()
    {
        $pagos = Pagos::whereDate('created_at', Carbon::today())->get();
        $this->totPropinas = Pagos::whereDate('created_at', Carbon::today())->sum('propina');
        $this->totPrecio = Pagos::whereDate('created_at', Carbon::today())->sum('precio');
        $this->total = Pagos::whereDate('created_at', Carbon::today())->sum('pagado');

        return view('livewire.repartir.pedidos-entregados', compact('pagos'));
    }

    public function PediodNuevo()
    {
        $this->Pedido = !$this->Pedido;
        $this->direccion = '';
        $this->precio = '';
    }

    public function PropinasView()
    {
        $this->ViewPropina = !$this->ViewPropina;
        $this->propina = '';
    }

    public function PagadoView()
    {
        $this->ViewPagado = !$this->ViewPagado;
        $this->pagado = '';
    }

    public function save()
    {
        pagos::create([
            'domicilio' => $this->direccion,
            'precio' => $this->precio,
        ]);
        $this->PediodNuevo();
    }

    public function editarPropina($id)
    {

        $this->PropinasView();
        $this->idPedido = $id;
        $pedido = pagos::where('id', $this->idPedido)->first();
        if (!empty($pedido)) {
            $this->propina = $pedido->propina;
        }
    }

    public function editarPropinaId()
    {

        $pedido = pagos::where('id', $this->idPedido)->first();

        $pedido->update([
            $pedido->propina = $this->propina,
        ]);

        $this->PropinasView();
    }

    public function editarPago($id)
    {

        $this->idPedido = $id;
        $pedido = pagos::where('id', $this->idPedido)->first();
        
            $this->pagado = $pedido->pagado;
        
        if ($pedido->pagado != $pedido->precio) {
            $this->PagadoView();
        }
    }

    public function editarPagadoId()
    {

        $pedido = pagos::where('id', $this->idPedido)->first();

        $newstatus = 'completado';

        if ($this->pagado == $pedido->precio) {
            $newstatus = 'completado';
        } else {
            $newstatus = 'pendiente';
        }
        if($this->pagado > $pedido->precio)
        {
            $this->pagado = $pedido->precio;
        }
        $pedido->update([
            $pedido->pagado = $this->pagado,
            $pedido->status = $newstatus,
        ]);

        $this->PagadoView();
    }

    public function pedidos(){
        return redirect()->route('repartir_Fechas');
    }
}
