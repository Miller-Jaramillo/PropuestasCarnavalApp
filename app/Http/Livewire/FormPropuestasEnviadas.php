<?php

namespace App\Http\Livewire;

use App\Models\Propuesta;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

use Livewire\Component;

class FormPropuestasEnviadas extends Component
{
    use WithPagination;

    public $perPage = '20';

    public $message = '';
    public $propuestaInfo;
    public $showPropuestaInfo;
    public $search;
    public $categoriaId;

    public function render()
    {
        $user = Auth::user();

        $propuestas = Propuesta::with('user') // Cargar la relación con el usuario creador

            ->where('user_id', $user->id)

            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.form-propuestas-enviadas', [
            'propuestas' => $propuestas,
        ]);
    }

    public function eliminarPropuesta($id)
    {
        $propuesta = Propuesta::find($id);

        if ($propuesta) {
            $propuesta->delete();
            $this->message = '¡La propuesta ha sido eliminada!';
            $this->closeShowPropuesta();
        }
    }

    public function showPropuesta($propuestaId)
    {
        $propuesta = Propuesta::findOrFail($propuestaId);
        $this->propuestaInfo = $propuesta;

        $this->showPropuestaInfo = true;
    }

    public function closeShowPropuesta()
    {
        $this->showPropuestaInfo = false;
        $this->propuestaInfo = null;
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = 5;
        $this->categoriaId = '';
    }
}
