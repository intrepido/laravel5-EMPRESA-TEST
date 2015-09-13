<?php

namespace Company\Http\Controllers;

use Company\Divition;
use Company\Http\Requests\DivitionRequest;
use Illuminate\Http\Request;

use Company\Http\Requests;
use Company\Http\Controllers\Controller;
use Illuminate\Routing\Route;


class DivitionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->beforeFilter('@find', ['only' => ['edit', 'update','destroy']]);
    }

    public function find(Route $route)
    {
        $this->divition = Divition::find($route->getParameter('divition'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $divitions = Divition::orderBy('created_at', 'desc')->paginate(5);
        //return $divitions;
        return view('divition.index', compact('divitions'));
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
    public function store(DivitionRequest $request)
    {
        Divition::create($request->all());
        session()->flash('message', 'The divition was inserted succesfully!!');
        return redirect('/admin/divition');
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
        $divition = $this->divition;
        return view('divition.edit', compact('divition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(DivitionRequest $request, $id)
    {
        $this->divition->fill($request->all());
        $this->divition->save();
        session()->flash('message','Divition edited successfully!!');
        return redirect()->route('admin.divition.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->divition->delete();
        session()->flash('message', 'Divition eliminated successfuly!!');
        return redirect()->route('admin.divition.index');
    }



    public function getTotalDepartmentByDivitions(Request $request)
    {
        //dd($request->all());
        if ($request->ajax()) {
            $divDepArray = Array();
            $divitions = Divition::all();
            foreach ($divitions as $divition) {
                $divDepArray = array_add($divDepArray, $divition->name, $divition->departments->toArray());
            }

            return response()->json(['divDepArray' => $divDepArray]);
        }

    }
}
