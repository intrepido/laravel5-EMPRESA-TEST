<?php

namespace Company\Http\Controllers;

use Company\Employee;
use Company\Http\Requests\UserEmployeeStoreRequest;
use Company\Http\Requests\UserEmployeeUpdateRequest;
use Company\User;
use Illuminate\Http\Request;

use Company\Http\Requests;
use Company\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $users = User::orderBy('created_at', 'desc')->paginate(5);

        if ($request->ajax()) {
           // dd($request->all());
            return response()->json(view('users.table-pagination', compact('users'))->render());
        }

        return view('users.index', compact('users'));
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
     * @param  Request $request
     * @return Response
     */
    public function store(UserEmployeeStoreRequest $request)
    {
        if ($request->ajax()) {
            $user = User::create($request->all());
            if ($request->direction && $request->expertise_area){
                $user->employee()->create(['direction'=> $request->direction, 'expertise_area' => $request->expertise_area]);
            }

            return response()->json(['message' => 'User inserted successfully!!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit(Request $request, $id)
    {
        if ($request->ajax()) {
            $user = User::find($id);
            return response()->json(['user' => $user, 'employee' => $user->employee]);
       }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(UserEmployeeUpdateRequest $request, $id)
    {
        if ($request->ajax()) {
            $user = User::find($id);
            $user->fill($request->all());
            $user->save();
            if ($request->direction && $request->expertise_area){//Si recibo datos del empleado
                if($user->employee){ //Si tiene empleado actualizalo
                    $user->employee->fill(['direction'=> $request->direction, 'expertise_area' => $request->expertise_area]);
                    $user->employee->save();
                }
                else{//Si no tiene insertalo
                    $user->employee()->create(['direction'=> $request->direction, 'expertise_area' => $request->expertise_area]);
                }
            }
            else{//Si no recibo datos del empleado eliminalo
                $user->employee()->delete();
            }

            return response()->json(['message' => 'User updated successfully!!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete($id);
        return response()->json(['message'=>'The user was deleted successfully!!!']);
    }


    /**
     * Graph Users vs Empleyees
     */
    public function getUsersEmployeesTotal(Request $request)
    {
        //dd($request->all());
        if ($request->ajax()) {
            $users = User::all()->count();
            $employees = Employee::all()->count();
            return response()->json(['users' => $users, 'employees' => $employees]);
        }

    }

}
