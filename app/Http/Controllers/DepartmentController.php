<?php

namespace Company\Http\Controllers;

use Company\Department;
use Company\Divition;
use Company\Http\Requests\DepartmentRequest;
use Illuminate\Http\Request;

use Company\Http\Requests;
use Company\Http\Controllers\Controller;
use Illuminate\Routing\Route;

class DepartmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->beforeFilter('@find',['only' => ['edit', 'update', 'destroy']]);
    }

    public function find(Route $route)
    {
        $this->department = Department::find($route->getParameter('department'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $departments = Department::orderBy('created_at','desc')->paginate(5);
        $divitions = Divition::lists('name','id');
       // dd($divitions);
        return view('department.index')->with(['departments' => $departments, 'divitions' => $divitions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(DepartmentRequest $request)
    {
       Department::create($request->all());
       session()->flash('message', 'The department was inserted succesfully!!');
       return redirect()->route('admin.department.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $department = $this->department;
        $divitions = Divition::lists('name','id');
        return view('department.edit')->with(['department' => $department, 'divitions' => $divitions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(DepartmentRequest $request, $id)
    {
        $this->department->fill($request->all());
        $this->department->save();
        return redirect()->route('admin.department.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->department->delete();
        session()->flash('message', 'Department eliminated successfuly!!');
        return redirect()->route('admin.department.index');
    }
}
