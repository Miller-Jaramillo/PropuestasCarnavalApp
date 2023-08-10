<?php

namespace App\Http\Livewire\Administrador;

use App\Models\Propuesta;
use Livewire\Component;
use Livewire\WithPagination;

class PropuestasRecibidas extends Component
{

    use WithPagination;

    public $perPage = '1';
    public $dejarObservacion;
    public $message = '';
    public $propuestaId;

    public function render()
    {

        $propuestas = Propuesta::with('user') // Cargar la relación con el usuario creador
        ->where('estado', 'enviada')
        ->orderBy('updated_at', 'desc')
        ->paginate($this->perPage);

        return view('livewire.administrador.propuestas-recibidas',[
            'propuestas' => $propuestas,
        ]);
    }




    public function revisarPropuesta($id)
    {
        $propuesta = Propuesta::find($id);

        if ($propuesta) {
            $propuesta->estado = 'revision';
            $propuesta->save();
            $this->message = "¡La propuesta {$propuesta->nombre_prouesta} paso a revision!";
        }

        $this->emitTo('administrador.propuestas-admin', 'openFormPropuestasRevicion');
    }

}
