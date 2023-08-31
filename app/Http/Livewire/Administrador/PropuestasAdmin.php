<?php

namespace App\Http\Livewire\Administrador;

use App\Models\Categoria;
use App\Models\Subcategoria;
use Livewire\Component;

use App\Models\User;

use Livewire\WithPagination;

class PropuestasAdmin extends Component
{

    use WithPagination;
    public $perPage = '1';
    public $showPanelCategorias;
    public $search ;


    public $categorias;
    public $nombre;
    public $categoriaId;
    public $subcategorias;
    public $subcategoriaId;

    public $openFormPropuestasRevicion;
    public $openPropuestasRecibidas  = true;
    public $openPropuestasAprobadas;
    public $openPropuestasRechazadas;



    public function mount()
    {
        $this->categorias = Categoria::all();
        $this->subcategorias = Subcategoria::all();
    }

    public function render()
    {
        if (auth()->user()->hasRole('admin')) {
            return view('livewire.administrador.propuestas-admin', [
            'users' => User::paginate(),
        ]);
    }
    }


     // cmt: Abre el formulario para agregar un nuevo admin
     public function showPanelCategorias()
     {
         $this->showPanelCategorias = true;
         $this-> openPropuestasRecibidas= false;
         $this-> openFormPropuestasRevicion = false;
         $this-> openPropuestasAprobadas= false;
         $this-> openPropuestasRechazadas= false;
     }

     // cmt: Cierra el formulario para agregar un nuevo admin
     public function closePanelCategorias()
     {
         $this->showPanelCategorias = false;
         $this-> openFormPropuestasRevicion = true;
     }


     public function openPropuestasRecibidas()
     {
        $this-> openPropuestasRecibidas= true;
        $this-> openFormPropuestasRevicion = false;
        $this-> openPropuestasAprobadas= false;
        $this->showPanelCategorias = false;
        $this-> openPropuestasRechazadas= false;
     }

     protected $listeners = ['openFormPropuestasRevicion', 'openPropuestasAprobadas', 'openPropuestasRechazadas'];
     public function openFormPropuestasRevicion()
     {
        $this-> openFormPropuestasRevicion = true;
        $this-> openPropuestasRecibidas= false;
        $this-> openPropuestasAprobadas= false;
        $this->showPanelCategorias = false;
        $this-> openPropuestasRechazadas= false;
     }

     public function openPropuestasAprobadas()
     {
        $this-> openPropuestasAprobadas= true;
        $this-> openPropuestasRecibidas= false;
        $this-> openFormPropuestasRevicion = false;
        $this->showPanelCategorias = false;
        $this-> openPropuestasRechazadas= false;
     }


     public function openPropuestasRechazadas()
     {
        $this-> openPropuestasRechazadas= true;
        $this-> openPropuestasAprobadas= false;
        $this-> openPropuestasRecibidas= false;
        $this-> openFormPropuestasRevicion = false;
        $this->showPanelCategorias = false;
     }

}
