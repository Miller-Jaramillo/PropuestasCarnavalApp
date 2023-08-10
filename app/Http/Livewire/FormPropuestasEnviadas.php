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

    public $perPage = '1';



    public function render()
    {
        $user = Auth::user();

        $propuestas = Propuesta::with('user') // Cargar la relación con el usuario creador

            ->where('user_id', $user->id)

            ->where('estado', 'enviada')
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.form-propuestas-enviadas', [
            'propuestas' => $propuestas,
        ]);
    }




}
