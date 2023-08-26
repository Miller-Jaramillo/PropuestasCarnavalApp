<?php

namespace App\Http\Livewire;

use App\Models\Propuesta;
use Livewire\Component;
use Livewire\WithPagination;

class FormPropuestasRechazadas extends Component
{

    use WithPagination;

    public $perPage = '1';

    public $message;


    public function render()
    {
        $propuestas = Propuesta::with('user') // Cargar la relación con el usuario creador
        ->where('estado', 'rechazada')
        ->orderBy('updated_at', 'desc')
        ->paginate($this->perPage);

        return view('livewire.form-propuestas-rechazadas',[
            'propuestas' => $propuestas,
        ]);
    }

    public function eliminarPropuesta($id)
    {
        $propuesta = Propuesta::find($id);

        if ($propuesta) {
            $propuesta->delete();
            $this->message = "¡La propuesta ha sido eliminada!";
        }

        // Actualizar la lista de propuestas
        $this->render();
    }
}
