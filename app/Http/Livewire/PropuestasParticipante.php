<?php

namespace App\Http\Livewire;

use App\Models\Propuesta;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class PropuestasParticipante extends Component
{
    use WithPagination;
    public $perPage = '1';
    public $perPageEnviadas = '1';
    public $showFormNuevaPropuesta;

    public $showFormPropuestasEnviadas;
    public $showFormPropuestasAprobadas = true;

    public $nombreSeccion = "Mis Propuestas Aprobadas";

    protected $listeners = ['openFormPropuestasEnviadas'];

    public function render()
    {






        $this->asignarNombreSeccion();

        return view('livewire.propuestas-participante', [

            'users' => User::paginate(),
        ]);
    }

    // cmt: Abre el formulario para agregar un nuevo admin
    public function openFormNuevaPropuesta()
    {
        $this->showFormNuevaPropuesta = true;
        $this->showFormPropuestasAprobadas = false;
        $this->showFormPropuestasEnviadas = false;
    }

    // cmt: Cierra el formulario para agregar un nuevo admin
    public function closeForm()
    {
        $this->showFormNuevaPropuesta = false;
    }

    public function openFormPropuestasEnviadas()
    {
        $this->showFormPropuestasEnviadas = true;
        $this->showFormNuevaPropuesta = false;
        $this->showFormPropuestasAprobadas = false;
    }

    public function closeFormPropuestasEnviadas()
    {
        $this->showFormPropuestasEnviadas = false;

    }


    public function openFormPropuestasAprobadas()
    {
        $this->showFormPropuestasAprobadas = true;
        $this->showFormNuevaPropuesta = false;
        $this->showFormPropuestasEnviadas = false;
    }

    public function closeFormPropuestasAprobadas()
    {
        $this->showFormPropuestasAprobadas = false;
    }

    public function asignarNombreSeccion()
    {
        if ($this->showFormNuevaPropuesta == true  ) {
            $this->nombreSeccion = "Nueva Propuesta";
        } elseif ($this->showFormPropuestasEnviadas == true ) {
            $this->nombreSeccion = "Tus propuestas enviadas";
        }
        elseif ($this->showFormPropuestasAprobadas == true) {
            $this->nombreSeccion = "Mis Propuestas Aprobadas";
        }
    }


}
