<?php

namespace App\Http\Livewire;

use App\Models\Comentario;
use App\Models\Propuesta;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class FormPropuestasAprobadas extends Component
{

    use WithPagination;
    public $perPage = '5';
    public $comentar;

    public $propuestaId;

    public $likes = [];

    public $contenidoComentario;
    public $message = '';


    public function render()
    {

        $user = Auth::user();
        $propuestas = Propuesta::with('user') // Cargar la relación con el usuario creador
            ->where('estado', 'publicada')
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.form-propuestas-aprobadas', [
            'propuestas' => $propuestas,
        ]);
    }

    public function comentar()
    {

            $this->comentar=true;

    }


    public function darLike($id)
    {
        $propuesta = Propuesta::find($id);

        if ($propuesta) {
            $user = Auth::user();

            if ($propuesta->likes()->where('user_id', $user->id)->exists()) {
                // Eliminar like
                $propuesta->likes()->where('user_id', $user->id)->delete();
                $this->likes = array_diff($this->likes, [$id]);
            } else {
                // Agregar like
                $propuesta->likes()->create([
                    'user_id' => $user->id,
                ]);
                $this->likes[] = $id;
            }

            // Actualizar la cantidad total de likes en la propuesta
            $propuesta->likes = $propuesta->likes()->count();
            $propuesta->save();
        }
    }


    public function saveComment($propuestaId)
    {
        $this->validate([
            'contenidoComentario' => 'required',
        ]);

        $comentario = new Comentario();
        $comentario->contenido = $this->contenidoComentario;
        $comentario->propuesta_id = $propuestaId;
        $comentario->user_id = Auth::user()->id;
        $comentario->save();

        Propuesta::where('id', $propuestaId)->increment('comments');

        $this->emit('comentarioAgregado');
        $this->resetInputs();
    }

    public function eliminarComentario($id)
    {

        $comentario = Comentario::find($id);

        if ($comentario) {
            $comentario->delete();

            // Decrementar el contador de comentarios en la propuesta
            Propuesta::where('id', $comentario->propuesta_id)->decrement('comments');

            $this->emit('comentarioEliminado');
            $this->message = '¡El comentario se eliminó correctamente!';
        }
    }

    public function canDeleteComment($userId)
    {
        return Auth::user()->id === $userId;
    }

    public function resetInputs()
    {
        $this->contenidoComentario = '';
    }


}
