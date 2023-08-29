<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Propuesta;
use App\Models\Subcategoria;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\URL;
use Livewire\WithFileUploads;

class FormPropuestaNueva extends Component
{
    use WithFileUploads;

    public $categorias;
    public $nombre_propuesta;
    public $nombre_agrupacion;
    public $categoriaId;
    public $subcategorias;
    public $subcategoriaId;
    public $descripcion;
    public $user;
    public $file;
    public $preview;

    public $nombreUsuario;
    public $fotoPerfilUsuario;

    public $message="";


    public function updatedFile()
    {
        $this->validate([
            'file' => 'image|max:2048', // Adjust image validation rules as needed
        ]);

        $this->preview = $this->file->temporaryUrl();
    }

    public function save()
    {
        // Save the file to the database or storage as needed
        // For demonstration purposes, let's just display a success message
        session()->flash('message', 'File saved successfully!');
        $this->reset();
    }

    public function mount()
    {
        $this->categorias = Categoria::all();
        $this->subcategorias = collect(); // Inicializar con una colección vacía
        $this->user = User::all();
    }

    public function obtenerSubcategorias()
    {
        if ($this->categoriaId) {
            $this->subcategorias = Subcategoria::where('categoria_id', $this->categoriaId)->get();
        } else {
            $this->subcategorias = collect(); // Vaciar la colección si no hay categoría seleccionada
        }
    }

    public function render()
    {
        return view('livewire.form-propuesta-nueva');
    }


    public function submitForm()
{
    $user = auth()->user();
    $nombreUsuario = $user->name;
    $identificacionUsuario = $user->identification_number;

    // Verificar si hay algún campo vacío
    if (
        empty($this->nombre_propuesta) ||
        empty($this->nombre_agrupacion) ||
        empty($this->categoriaId) ||
        empty($this->subcategoriaId) ||
        empty($this->descripcion) ||
        empty($this->file)
    ) {
        $this->message = "¡Debes completar todos los campos!";
    } else {
        // Validación de campos
        $this->validate([
            'nombre_propuesta' => 'required',
            'nombre_agrupacion' => 'required',
            'categoriaId' => 'required',
            'subcategoriaId' => 'required',
            'descripcion' => 'required',
            'file' => 'required|image|max:2048',
        ]);



        $propuesta = new Propuesta();

        $propuesta->nombre_propuesta = $this->nombre_propuesta;
        $propuesta->nombre = $nombreUsuario;
        $propuesta->apellido = "SIN APELLIDO";
        $propuesta->identificacion = $identificacionUsuario;

        $propuesta->nombre_agrupacion = $this->nombre_agrupacion;
        $propuesta->descripcion = $this->descripcion;

        // // Guardar la imagen en storage y asignar la ruta a la propuesta
      // Guardar la imagen en storage y asignar la ruta a la propuesta
      $path = $this->file->store('propuesta-photos', 'public');
      $propuesta->foto_o_video = $path;


        $propuesta->categoria_id = $this->categoriaId;
        $propuesta->subcategoria_id = $this->subcategoriaId;

        $propuesta->user_id = auth()->id();

        $propuesta->estado = 'enviada'; // Cambiar el estado a 'enviada'

        // Guardar la propuesta en la base de datos
        $propuesta->save();
       

        $this->message = "¡La propuesta {$propuesta->nombre_prouesta} ha sido enviada!";

        // Redirigir a la página de propuestas
        $this->emitTo('propuestas-participante', 'openFormPropuestasEnviadas');
    }


}

private function resetInputs()
{
    $this->nombre_propuesta = "";
    $this->nombre_agrupacion = "";
    $this->categoriaId = "";
    $this->subcategoriaId = "";
    $this->descripcion = "";
    $this->file = null;
}






    public function closeForm()
    {
        return redirect('propuestas-participante');
    }
}
