<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        //     'rol' => ['required', 'numeric', 'between:1,2'],
        //     'apellido' => ['required', 'string', 'max:255'],
        //     'telefono' => ['required', 'numeric', 'digits_between:7,10'],
        //     'tipo_doc' => ['required', 'string', 'in:cc,ce,pa,rc'],
        //     'documento' => ['required', 'unique:'.User::class],
        //     'genero' => ['required', 'string', 'in:masculino,femenino'],
        //     'nacimiento' => ['required', 'date'],
        // ]);

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'rol' => $request->rol,
        //     'apellido' => $request->apellido,
        //     'telefono' => $request->telefono,
        //     'tipo_doc' => $request->tipo_doc,
        //     'documento' => $request->documento,
        //     'genero' => $request->genero,
        //     'nacimiento' => $request->nacimiento
        // ]);


        /////////////////////////////

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'segundoNombre' => ['required'],
            'apellido' => ['required', 'string', 'max:255'],
            'segundoApellido' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'rol' => ['required', 'numeric', 'between:1,2'],
            'tipo_doc' => ['required'],
            'documento' => ['required', 'unique:' . User::class],
            'genero' => ['required', 'string', 'in:masculino,femenino'],
            'nacimiento' => ['required', 'date'],
            // modificado
           
            'edad' => ['required'],
            'orientacionSexual' => ['required'],
            'pais' => ['required'],
            'departamento' => ['required'],
            'municipio' => ['required'],
            // 'lugarNacimiento' => ['required'],
            'regimenAfiliacion' => ['required'],
            'eps' => ['required'],
            'etnia' => ['required'],
            'desplazado' => ['required'],
            'discapacidad' => ['required', 'in:si,no'],
           'descripcionDiscapacidad' => ['required_if:discapacidad,si', 'nullable', 'string', 'max:255'],
            'victimaConflicto' => ['required'],
            'estudiante' => ['required', 'in:si,no'],
            // 'required_if:estudiante,si' condicional para el campo , lleno ó vacio 
            'descripcionEstudiante' => ['required_if:estudiante,si', 'nullable', 'string', 'max:255'],
            'paisResidencia' => ['required'],
            'departamentoResidencia' => ['required'],
            'municipioResidencia' => ['required'],
            'barrio' => ['required'],
            'comuna' => ['required'],
            'area' => ['required'],
            'direccion' => ['required'],
            'celular' => ['required'],
            'telefono' => ['required', 'numeric', 'digits_between:7,10'],
            'autoriza' => ['required']
        ]);
      


        $user = User::create([
            'name' => $request->name,
            'segundoNombre' => $request->segundoNombre,
            'apellido' => $request->apellido,
            'segundoApellido' => $request->segundoApellido,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => $request->rol,
            'tipo_doc' => $request->tipo_doc,
            'documento' => $request->documento,
            'genero' => $request->genero,
            'nacimiento' => $request->nacimiento,
            // modificacion
            'edad' => $request->edad,
            'orientacionSexual' => $request->orientacionSexual,
            'pais' => $request->pais,
            'departamento' => $request->departamento,
            'municipio' => $request->municipio,
            // 'lugarNacimiento' => $request->lugarNacimiento,
            'regimenAfiliacion' => $request->regimenAfiliacion,
            'eps' => $request->eps,
            'etnia' => $request->etnia,
            'desplazado' => $request->desplazado,
            'discapacidad' => $request->discapacidad,
            // condional para el campo lleno o vacio 
            'descripcionDiscapacidad' => $request->discapacidad === 'si' ? $request->descripcionDiscapacidad : 'no aplica',
            'victimaConflicto' => $request->victimaConflicto,
            'estudiante' => $request->estudiante,
            'descripcionEstudiante' => $request->estudiante === 'si' ? $request->descripcionEstudiante : 'no aplica',
            'paisResidencia' => $request->paisResidencia,
            'departamentoResidencia' => $request->departamentoResidencia,
            'municipioResidencia' => $request->municipioResidencia,
            'barrio' => $request->barrio,
            'comuna' => $request->comuna,
            'area' => $request->area,
            'direccion' => $request->direccion,
            'celular' => $request->celular,
            'telefono' => $request->telefono,
            'autoriza' => $request->autoriza
        ]);



        // event(new Registered($user));

        Auth::login($user);

        if($request->user()->rol == 3) {

            return redirect(RouteServiceProvider::HOME);

        } elseif($request->user()->rol == 1) {

            return redirect(RouteServiceProvider::PERSONA);

        } elseif($request->user()->rol == 2) {

            return redirect(RouteServiceProvider::MASCOTA);
        }
        
        return redirect(RouteServiceProvider::HOME);
    }
}
