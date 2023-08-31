<?php

namespace App\Http\Livewire\Administrador;

use App\Mail\NotificacionPropuestaAprobada;
use App\Models\Categoria;
use App\Models\Propuesta;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

use Livewire\WithPagination;

class FormValidarPropuestaParticipante extends Component
{
    use WithPagination;

    public $perPage = '5';
    public $observacion;
    public $message = '';
    public $propuestaId;
    public $categoriaId;
    public $propuestaInfo;
    public $showPropuestaInfo;
    public $search;
    public $categorias;

    public function updatedCategoriaId()
    {
        $this->resetPage(); // Reiniciar la paginación al cambiar la categoría
    }
    public function mount()
    {
        $this->categorias = Categoria::all();

    }

    public function render()
    {
        $searchPropuestas = Propuesta::query();

        // cmt: Filtro de search -> busca por nombre, nombre_propuesta y nombre_agrupacion
        if ($this->search) {
            $searchPropuestas->where(function ($query) {
                $query
                    ->where('nombre', 'LIKE', "%{$this->search}%")
                    ->orWhere('nombre_propuesta', 'LIKE', "%{$this->search}%")
                    ->orWhere('nombre_agrupacion', 'LIKE', "%{$this->search}%");
            });
        }

        // Filtro por categoría
        if ($this->categoriaId) {
            $searchPropuestas->whereHas('categoria', function ($query) {
                $query->where('id', $this->categoriaId);
            });
        }

        $categorias = Categoria::all();


        $propuestas = $searchPropuestas // Cargar la relación con el usuario creador
            ->where('estado', 'revision')
            ->orderBy('updated_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.administrador.form-validar-propuesta-participante', [
            'propuestas' => $propuestas,
            'categorias' => $categorias,
        ]);
    }

    public function aprobarPropuesta($id)
    {
        $propuesta = Propuesta::find($id);

        if ($propuesta) {

            $propuesta->estado = 'publicada';
            $propuesta->observaciones = $this->observacion;
            $propuesta->save();
            $this->message = "¡La propuesta {$propuesta->nombre_prouesta} ha sido aprobada!";

            $nombre_propuesta = $propuesta->nombre_propuesta;
            $observacion = $this->observacion;
            $user = $propuesta->user;
            $notificacion = new NotificacionPropuestaAprobada($user, $nombre_propuesta, $observacion); // Pasar la contraseña generada
            Mail::to($user->email)->send($notificacion);
            $this-> resetInput();
        }

        $this->emitTo('administrador.propuestas-admin', 'openPropuestasAprobadas');
    }

    public function rechazarPropuesta($id)
    {
        $propuesta = Propuesta::find($id);

        if (empty($this->observacion)) {
            $this->message = '¡Debes dejar una observación para rechazar la propuesta!';
        } elseif ($propuesta) {
            $propuesta->observaciones = $this->observacion;
            $propuesta->estado = 'rechazada';
            $propuesta->save();
            $this->message = "¡La propuesta {$propuesta->nombre_prouesta} ha sido rechazada!";
            $this->showPropuestaInfo = false;
        }
    }

    public function resetInput()
    {
        $this-> observacion = "";
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
        $this->categoriaId = "";
    }

}
