<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\UsersCredentials;
use App\Models\Propuesta;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class UsersTable extends Component
{
    // -> Variables
    use WithPagination;
    public $comentar;
    public $search = '';
    public $perPage = '5';
    public $selectedRole = 'todos';
    public $selectedOption = '';
    public $name;
    public $lastname;
    public $cellphone;
    public $email;
    public $identification_number;
    public $password;
    public $showForm;
    public $showFormParticipate;
    public $confirmingUserDeletion = false;
    public $showUserInfo = false;
    public $userInfo;
    public $message = '';
    public $selectedStyle = '';
    public $participate;
    public $showPropuestas;
    public $userToShowPropuestas;
    public $openEstadisticas;
    public  $totalUsers;
    public $adminCount;
    public $espectadorCount;
    public $participanteCount;

    // cmt: Se seleciona el usuario para filtrar la busqueda por rol
    public function updatedSelectedOption($value)
    {
        $this->selectedOption = $value;
    }

    // --> RENDER DEL COMPONENTE
    public function render()
    {
        $users = User::query();

        // cmt: Filtro de search -> busca por nombre y por email al user
        if ($this->search) {
            $users->where(function ($query) {
                $query->where('name', 'LIKE', "%{$this->search}%")->orWhere('email', 'LIKE', "%{$this->search}%");
            });
        }

        $userRoleId = Auth::user()->role_id;

        if ($userRoleId === 1) {
            // Si el usuario tiene role_id 1 (administrador), muestra todos los usuarios
        } elseif ($userRoleId === 2) {
            // Si el usuario tiene role_id 2 (espectador), excluye los usuarios con role_id 1 (administrador)
            $users->where('role_id', '!=', 1);
        } elseif ($userRoleId === 3) {
            // Si el usuario tiene role_id 3 (participante), excluye los usuarios con role_id 1 (administrador)
            $users->where('role_id', '!=', 1);
        }

        if ($this->selectedRole === 'administradores') {
            $users->where('role_id', 1);
        } elseif ($this->selectedRole === 'espectadores') {
            $users->where('role_id', 2);
        } elseif ($this->selectedRole === 'participantes') {
            $users->where('role_id', 3);
        }

        $users->orderByRaw('id <> ?', [Auth::id()]); // cmt: Ubica de primero en la lista al user:Auth
        $users = $users
            ->orderBy('updated_at', 'desc') // Ordenar por fecha de creación, de más reciente a más antigua
            ->paginate($this->perPage); // Paginación

        return view('livewire.users-table', [
            'users' => $users,
            'showPropuestas' => $this->showPropuestas,
            'userToShowPropuestas' => $this->userToShowPropuestas,
        ]);
    }
    // cmt: Btn limiar el search
    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = 5;
    }
    // cmt: Abre el formulario para agregar un nuevo admin
    public function openForm()
    {
        $this->showForm = true;
    }

    // cmt: Cierra el formulario para agregar un nuevo admin
    public function closeForm()
    {
        $this->showForm = false;
        $this->showFormParticipate = false;
        $this->reset();
    }

    // cmt: Guarda los datos formulario -> agrega un nuevo usuario
    public function submitForm()
    {
        // -> Lógica para procesar el formulario y guardar el administrador en la base de datos
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            //'password' => 'required|string|min:8',
            //'cellphone' => 'required|string',
        ]);

        $plainPassword = Str::random(10); // Generar contraseña en texto plano
        $encryptedPassword = Hash::make($plainPassword); // Encriptar la contraseña

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $encryptedPassword,
            //'cellphone' => $validatedData['cellphone'],
        ]);

        $credentialsMail = new UsersCredentials($user, $plainPassword); // Pasar la contraseña generada
        Mail::to($user->email)->send($credentialsMail);
        $role = Role::firstOrCreate(['name' => 'admin']);
        $user->role_id = $role->id;
        $user->role_name = 'Administrador';
        $user->created_by = Auth::user()->id;
        $user->assignRole($role);

        // Envío del correo electrónico con las credenciales
        $this->reset();
        $this->closeForm();
        $user->save();

        $this->message = "¡El usuario {$user->name} ha sido registrado!";

        // -> Después de guardar, puedes cerrar la vista flotante
    }

    // cmt: Abre el formulario para crear un Participante
    public function openFormParticipate()
    {
        $this->showFormParticipate = true;
    }

    // cmt: Se confirma la desicion de eliminar el usuario
    public function confirmUserDeletion($userId)
    {
        $this->confirmingUserDeletion = $userId;
        $user = User::find($userId);
        $this->name = $user->name;
    }
    // cmt: Se cancela la desicion de eliminar el usuario
    public function cancelUserDeletion()
    {
        $this->confirmingUserDeletion = null;
    }

    // cmt: Elimina el usuario
    public function deleteUser($userId)
    {
        $user = User::findOrFail($userId);
        $currentUser = Auth::user();
        if ($currentUser->id === $user->created_by) {
            // -> El usuario actual es el creador del usuario a eliminar
            $user->comentarios()->delete();
            $user->likes()->delete();
            $user->delete();
            // -> Actualizar la lista de usuarios después de eliminar al usuario
            $this->render();
            $this->message = $user->name . ' se ha eliminado correctamente.';
        } elseif ($currentUser->role_name === 'Super Admin') {
            // -> El usuario actual se registró a través de la ruta principal y puede eliminar a cualquier usuario
            $user->comentarios()->delete();
            $user->likes()->delete();
            $user->delete();
            // -> Actualizar la lista de usuarios después de eliminar al usuario
            $this->render();
            $this->message = $user->name . ' se ha eliminado correctamente.';
        } else {
            if ($user->role_name == 'Espectador' || $user->role_name == 'Participante') {
                $this->message = nl2br(" ¡No estas autorizado a eliminar un {$user->role_name}!\nSolicita los permisos con el Super Admin");
            } else {
                $this->message = nl2br(" ¡No tiene autorizado eliminar a {$user->name}!\nSolo puedes eliminar a los Administradore que tú has creado");
            }
        }

        $this->confirmingUserDeletion = null;
    }

    public function showUser($userId)
    {
        $user = User::findOrFail($userId);
        $this->userInfo = $user;

        $this->showUserInfo = true;
    }


    public function closeUserInfo()
    {
        $this->showUserInfo = false;
        $this->userInfo = null;
        $this->openEstadisticas = false;
    }

    public function redirectToPropuestas()
    {
        // Redirige a la vista "Propuestas" con el parámetro para mostrar el formulario

        return redirect()->route('propuesta-nueva');
    }

    public function verPropuestas($userId)
    {
        // Redirigir a la ruta show-propuestas con el user_id
        return Redirect::route('show-propuestas', ['user_id' => $userId]);
    }

    public function enviarPropuesta()
    {

        return Redirect::route('registrar-propuesta');

    }

    public function estadisticas()
    {

        $totalUsers = User::count();
        $adminCount = User::where('role_id', 1)->count();
        $espectadorCount = User::where('role_id', 2)->count();
        $participanteCount = User::where('role_id', 3)->count();

        // Puedes utilizar estas variables para mostrar las estadísticas o realizar otras operaciones

        // Por ejemplo, puedes asignar estas variables a propiedades de tu componente para mostrarlas en la vista
        $this->totalUsers = $totalUsers;
        $this->adminCount = $adminCount;
        $this->espectadorCount = $espectadorCount;
        $this->participanteCount = $participanteCount;

        $this->openEstadisticas = true;

    }
}
