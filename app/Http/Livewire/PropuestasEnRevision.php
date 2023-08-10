<?php

namespace App\Http\Livewire;

use App\Models\Propuesta;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class PropuestasEnRevision extends Component
{

    use WithPagination;

    public $perPage = '1';

    public function render()
    {

        $user = Auth::user();

        $propuestas = Propuesta::with('user') // Cargar la relación con el usuario creador

            ->where('user_id', $user->id)
            ->where('estado', 'revision')
            ->paginate($this->perPage);

        return view('livewire.propuestas-en-revision', [
            'propuestas' => $propuestas,
        ]);
    }
}
