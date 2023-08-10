<?php

namespace App\Http\Livewire\Administrador;

use Livewire\Component;
use App\Models\Categoria;
use App\Models\Subcategoria;

class CategoriasComponent extends Component
{
    public $showView;

    public $categorias;
    public $subcategorias = [];
    public $nombre;
    public $categoriaId;
    public $subcategoriaId;
    public $editarCategoria = false;
    public $editarSubcategoria;
    public $nuevoNombre;
    public $message = '';
    public $confirmCategoriaDeletion = false;
    public $confirmSubcategoriarDeletion = false;
    public $showAgregarCategoria;
    public $showAgregarSubcategoria;
    public $mensajeSelect = 'Selecciona una subcategoría';

    protected $listeners = [
        'categoriaAgregada' => 'actualizarCategorias',
        'categoriaEliminada' => 'actualizarCategorias',
        'categoriaEditada' => 'actualizarCategorias',
        'resetMessage' => 'resetMessage',
        'subcategoriaAgregada' => 'obtenerSubcategorias',
        'subcategoriaEditada' => 'obtenerSubcategorias',
        'subcategoriaEliminada' => 'obtenerSubcategorias',
    ];

    public function showView()
    {
        $this->showView = false;
    }

    public function mount()
    {
        $this->categorias = Categoria::all();
        $this->subcategorias = Subcategoria::all();
    }

    public function render()
    {
        return view('livewire.administrador.categorias-component');
    }

    public function ShowAgregarCategoria()
    {
        $this->showAgregarCategoria = true;
        $this->showAgregarSubcategoria = false;
        $this->editarCategoria = false;
        $this->resetInputs();
        $this->resetInputsSubcategorias();
    }

    public function cancelAgregarCategoria()
    {
        $this->showAgregarCategoria = false;
    }

    public function agregarCategoria()
    {
        $this->validate([
            'nombre' => 'required|unique:categorias',
        ]);

        $categoria = new Categoria();
        $categoria->nombre = $this->nombre;
        $categoria->save();

        $this->emit('categoriaAgregada');
        $this->message = "¡La categoria {$this->nombre} se creó correctamente!";
        $this->resetInputs();

        $this->showAgregarCategoria = false;
    }

    // cmt: Se confirma la desicion de eliminar el usuario
    public function confirmCategoriaDeletion($id)
    {
        $this->confirmCategoriaDeletion = $id;
        $categoria = Categoria::find($id);
        $this->nombre = $categoria->nombre;
    }
    // cmt: Se cancela la desicion de eliminar el usuario
    public function cancelCategoriaDeletion()
    {
        $this->confirmCategoriaDeletion = null;
    }

    public function eliminarCategoria($id)
    {
        Categoria::destroy($id);
        $this->categoriaId = null;
        $this->emit('categoriaEliminada');
        $this->message = '¡La categoria se elimino correctamente!';
        $this->confirmCategoriaDeletion = null;
    }

    public function actualizarCategorias()
    {
        $this->categorias = Categoria::all();
    }

    public function editarCategoria($id)
    {
        $categoria = Categoria::find($id);
        $this->categoriaId = $categoria->id;
        //$this->nombre = $categoria->nombre;
        $this->editarCategoria = true;
        $this->editarSubcategoria = false;
        $this->showAgregarCategoria = false;
        $this->showAgregarSubcategoria = false;
    }

    public function actualizarCategoria()
    {
        $this->validate([
            'nombre' => 'required|unique:categorias,nombre,' . $this->categoriaId,
        ]);

        $categoria = Categoria::find($this->categoriaId);
        $categoria->nombre = $this->nombre;
        $categoria->save();

        $this->editarCategoria = false;
        $this->resetInputs();

        $this->emit('categoriaEditada');
        $this->message = "¡La categoria se actualizo a {$categoria->nombre}!";
    }

    public function cancelarEditarCategoria()
    {
        // Aquí puedes agregar cualquier lógica adicional que necesites

        $this->editarCategoria = false;
    }

    private function resetInputs()
    {
        $this->nombre = '';
        $this->categoriaId = '';
    }

    // !! --------------------------------------------------SUBCATEGORIAS -----------------------

    // Método para obtener las subcategorías relacionadas con la categoría seleccionada
    public function obtenerSubcategorias()
    {
        if ($this->categoriaId) {
            $this->subcategorias = Subcategoria::where('categoria_id', $this->categoriaId)->get();
        } else {
            $this->subcategorias = []; // Si no se ha seleccionado una categoría, vaciar el array de subcategorías
        }
        $this->editarSubcategoria = false;
        $this->resetInputsSubcategorias();
    }

    public function showAgregarSubcategoria()
    {
        $this->showAgregarSubcategoria = true;
        $this->showAgregarCategoria = false;
        $this->editarCategoria = false;
        $this->editarSubcategoria = false;
    }

    public function cancelAgregarSubcategoria()
    {
        $this->showAgregarSubcategoria = false;
    }

    public function agregarSubcategoria()
    {
        $this->validate([
            'nombre' => 'required|unique:subcategorias,nombre,null,null,categoria_id,' . $this->categoriaId,
        ]);

        $subcategoria = new Subcategoria();
        $subcategoria->nombre = $this->nombre;
        $subcategoria->categoria_id = $this->categoriaId;
        $subcategoria->save();

        $this->message = "¡La subcategoría '{$this->nombre}' se creó correctamente!";
        $this->resetInputsSubcategorias();
        $this->emit('subcategoriaAgregada', $this->categoriaId);
        $this->showAgregarSubcategoria = false;
    }

    public function editarSubcategoria($id)
    {
        $subcategoria = Subcategoria::find($id);
        $this->subcategoriaId = $subcategoria->id;
        //$this->nombre = $categoria->nombre;
        $this->editarSubcategoria = true;
        $this->editarCategoria = false;
        $this->showAgregarCategoria = false;
        $this->showAgregarSubcategoria = false;
    }

    public function actualizarSubcategoria()
    {
        $this->validate([
            'nombre' => 'required|unique:subcategorias,nombre,' . $this->subcategoriaId,
        ]);

        $subcategoria = Subcategoria::find($this->subcategoriaId);
        $subcategoria->nombre = $this->nombre;
        $subcategoria->save();

        $this->editarSubcategoria = false;
        $this->resetInputsSubcategorias();

        $this->emit('subcategoriaEditada');
        $this->message = "¡La subcategoria se actualizo a {$subcategoria->nombre}!";
    }

    public function cancelarEditarSubcategoria()
    {
        // Aquí puedes agregar cualquier lógica adicional que necesites

        $this->editarSubcategoria = false;
        $this->resetInputsSubcategorias();
    }

    // cmt: Se confirma la desicion de eliminar el usuario
    public function confirmSubcategoriarDeletion($id)
    {
        $this->confirmSubcategoriarDeletion = $id;
        $subcategoria = Subcategoria::find($id);
        $this->nombre = $subcategoria->nombre;
    }
    // cmt: Se cancela la desicion de eliminar el usuario
    public function cancelSubcategoriarDeletion()
    {
        $this->confirmSubcategoriarDeletion = null;
    }

    public function eliminarSubcategoria($id)
    {
        Subcategoria::destroy($id);
        $this->subcategoriaId = null;
        $this->emit('subcategoriaEliminada');
        $this->message = '¡La subcategoria se elimino correctamente!';
        $this->confirmSubcategoriarDeletion = null;
    }

    private function resetInputsSubcategorias()
    {
        $this->nombre = '';
        $this->subcategoriaId = null;
    }
}
