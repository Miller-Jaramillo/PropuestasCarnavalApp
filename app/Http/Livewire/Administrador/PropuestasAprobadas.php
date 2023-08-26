<?php

namespace App\Http\Livewire\Administrador;

use App\Models\Propuesta;
use Livewire\Component;
use Livewire\WithPagination;

class PropuestasAprobadas extends Component
{

    use WithPagination;

    public $perPage = '1';
    public $propuestaId;
    public $propuestasCount;





    public function render()
    {

        $propuestasCount = Propuesta::where('estado', 'publicada')->count();
        $this->propuestasCount = $propuestasCount;


        $propuestas = Propuesta::with('user') // Cargar la relación con el usuario creador
        ->where('estado', 'publicada')
        ->orderBy('updated_at', 'desc')
        ->paginate($this->perPage);

        return view('livewire.administrador.propuestas-aprobadas',[
            'propuestas' => $propuestas,
        ]);
    }



}
