<?php

namespace Company\Http\Controllers;

use Company\Divition;
use Illuminate\Http\Request;

use Company\Http\Requests;
use Company\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => 'admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       //return Divition::all();

        return view('home');
    }

    public function admin()
    {
        return view('layouts.admin');
    }

}
