<?php

namespace Company\Http\Controllers\Auth;

use Company\User;
use Validator;
use Company\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Tanto los atributos $redirectPath y $loginPath como las 2 funciones debajo, se pueden utilizar para que las redirecciones
     * funcionen correctamente. Solo hay que especificar uno de los 2. En el caso de las funciones, estas fueron copiadas de
     * los trait de la clase AuthenticatesAndRegistersUsers, los trair funcionan como la herencia se puede sobre escribir sus
     * metodos.
     */

//    protected $loginPath = '/login';
//    protected $redirectPath = 'home';

    //Ruta donde el usuario debe loguearse
    public function loginPath()
    {
        return route('login');
    }

    //Ruta a donde redirecciona una vez logueado en el sistema
    public function redirectPath()
    {
        return route('admin');
    }












    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);
    }


}
