<?php

namespace App\Http\Livewire\Administrador;

use App\Models\Categoria;
use App\Models\Propuesta;
use Livewire\Component;
use Livewire\WithPagination;

class PropuestasAprobadas extends Component
{

    use WithPagination;

    public $perPage = '5';
    public $propuestaId;
    public $propuestasCount;

    public $message = '';
    public $showPropuestaInfo;
    public $propuestaInfo;
    public $search = '';
    public $categoriaId;
    public $categorias;

    public $likes = [];

    public $visibleComments = 2;




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
        ->where('estado', 'publicada')
        ->orderBy('updated_at', 'desc')
        ->paginate($this->perPage);

        return view('livewire.administrador.propuestas-aprobadas',[
            'propuestas' => $propuestas,
            'categorias' => $categorias,
        ]);
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
