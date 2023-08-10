<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\StatefulGuard;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class ParticipanteRegisterController extends Controller 
{
    protected $guard;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
     * @return void
     */
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    /**
     * Show the registration view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\RegisterViewResponse
     */


    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'cellphone' => 'required|string|max:255',
            'identification_number' => 'required|string|max:255',
            //'cellphone' => 'required|string',
        ]);

        $user = auth()->user();

        // Concatenar el nombre y el apellido en el campo 'name'
        $user->name = $validatedData['name'] . ' ' . $validatedData['lastname'];

        // Actualizar el resto de los campos con los datos proporcionados en el formulario
        $user->cellphone = $validatedData['cellphone'];
        $user->identification_number = $validatedData['identification_number'];

        $roleEspectador = Role::where('name', 'espectador')->first();

        // Si el usuario tiene el rol, procedemos a quitarlo
        if ($user->hasRole($roleEspectador)) {

            $user->removeRole($roleEspectador);
            // También puedes usar la función removeRoleByName si tienes el nombre del rol
            // $user->removeRoleByName('rol_a_quitar');

            // Guardamos los cambios en la base de datos
            $user->save();


            $role = Role::firstOrCreate(['name' => 'participante']);

            $user->role_id = $role->id;
            $user->role_name = 'Participante';
            $user->assignRole($role);
            $user->save();

            $this->guard->login($user);


        }


        return redirect('/propuestas-participante');


        // Después de guardar, puedes cerrar la vista flotante
    }
}
