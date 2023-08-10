<?php

namespace App\Http\Livewire;

use App\Models\Propuesta;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowPropuestas extends Component
{
    public $user_id;
    public $comentar;

    public $likes = [];


    public function mount($user_id)
    {
        $this->user_id = $user_id;
    }

    public function render()
    {
        $propuestas = Propuesta::where('user_id', $this->user_id)
            ->where('estado', 'publicada')
            ->get();

        return view('livewire.show-propuestas', [
            'propuestas' => $propuestas,
        ]);
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
