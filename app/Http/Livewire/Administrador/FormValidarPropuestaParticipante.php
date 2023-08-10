<?php

namespace App\Http\Livewire\Administrador;

use App\Mail\NotificacionPropuestaAprobada;
use App\Models\Propuesta;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

use Livewire\WithPagination;

class FormValidarPropuestaParticipante extends Component
{
    use WithPagination;

    public $perPage = '1';
    public $observacion;
    public $message = '';
    public $propuestaId;

    public function render()
    {
        $propuestas = Propuesta::with('user') // Cargar la relación con el usuario creador
            ->where('estado', 'revision')
            ->orderBy('updated_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.administrador.form-validar-propuesta-participante', [
            'propuestas' => $propuestas,
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
        }
    }
}
