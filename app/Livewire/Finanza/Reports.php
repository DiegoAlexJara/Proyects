<?php

namespace App\Livewire\Finanza;

use App\Models\Finanzas\Transaccion;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Reports extends Component
{
    use WithPagination;
    public $time;
    public $showSquare;
    public $reportes;

    public function render()
    {
        $user = Auth::id();
        $transactions = Transaccion::orderBy('created_at', 'desc')->where('user_id', $user)->paginate(20);
        return view('livewire.finanza.reports', compact('transactions'));
    }
    function return()
    {
        return redirect()->route('finanza_Inicio');
    }
    function transaction()
    {
        $this->showSquare = !$this->showSquare;
    }
    function report($id)
    {
        $this->transaction();
        $this->reportes = Transaccion::find($id);
    }
}
