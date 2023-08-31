<?php

namespace App\Http\Livewire\Administrador;

use App\Models\Categoria;
use App\Models\Propuesta;
use Livewire\Component;
use Livewire\WithPagination;

class PropuestasRechazadas extends Component
{

    use WithPagination;

    public $perPage = '5';
    public $message;
    public $propuestaInfo;
    public $showPropuestaInfo;
    public $search;
    public $categoriaId;
    public $categorias;
    public $confirmEliminarPropuesta;
    public $nombrePropuesta;



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

        $propuestas = $searchPropuestas// Cargar la relación con el usuario creador
        ->where('estado', 'rechazada')
        ->orderBy('updated_at', 'desc')
        ->paginate($this->perPage);

        $categorias = Categoria::all();

        return view('livewire.administrador.propuestas-rechazadas',[
            'propuestas' => $propuestas,
            'categorias' => $categorias,
        ]);
    }





     // cmt: Se confirma la desicion de eliminar el usuario
     public function confirmEliminarPropuesta($userId)
     {
         $this->confirmEliminarPropuesta = $userId;
         $propuesta = Propuesta::find($userId);
         $this->nombrePropuesta = $propuesta->nombrePropuesta;
     }
     // cmt: Se cancela la desicion de eliminar el usuario
     public function cancelEliminarPropuesta()
     {
         $this->confirmEliminarPropuesta = null;
     }



    public function eliminarPropuesta($id)
    {
        $propuesta = Propuesta::find($id);

        if ($propuesta) {
            $propuesta->delete();
            $this->message = "¡La propuesta ha sido eliminada!";
            $this->showPropuestaInfo = false;
            $this->confirmEliminarPropuesta = null;

        }

        $this->emitTo('administrador.propuestas-admin', 'openPropuestasRechazadas');
        // Actualizar la lista de propuestas

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
