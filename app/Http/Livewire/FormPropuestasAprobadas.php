<?php

namespace App\Http\Livewire;

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



    public function render()
    {

        $user = Auth::user();
        $propuestas = Propuesta::with('user') // Cargar la relación con el usuario creador
            ->where('estado', 'publicada')
            ->where('user_id', $user->id)
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
}
