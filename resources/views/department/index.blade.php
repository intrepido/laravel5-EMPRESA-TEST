@extends('layouts.admin')

@section('content-admin')
    <div class="container-fluid" style="padding-top: 30px;">
        <div class="row">
            <div class="col-xs-6 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Department datas</div>
                    <div class="panel-body">
                        {!!Form::open(['route'=>'admin.department.store', 'method'=>'POST'])!!}
                        <div class="form-group">
                            {!! Form::label('section', 'Section name:') !!}
                            {!! Form::text('section', null, ['class' => 'form-control', 'placeholder'=>'Insert the name']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('divitions', 'Divitions:') !!}
                            {!! Form::select('divition_id', $divitions, null, ['class'=>'form-control', 'id' => 'divitions','placeholder' => '-- Select the divition --'])!!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        </div>
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-8">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">Department list</div>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Section</th>
                                <th>Created at</th>
                                <th>Divition</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($departments as $department)
                                <tr>
                                    <td>{{$department->section}}</td>
                                    <td>{{$department->created_at}}</td>
                                    <td>{{$department->divition->name}}</td>
                                    <td>
                                        <div class="btn-toolbar" role="toolbar">
                                            <a href="{{route('admin.department.edit',['id' => $department->id])}}" class="btn btn-primary">Editar</a>
                                            <div class="btn-group">
                                                {!!Form::open(['route'=> ['admin.department.destroy', $department->id], 'method'=>'DELETE'])!!}
                                                {!!Form::submit('Delete',['class'=>'btn btn-danger'])!!}
                                                {!!Form::close()!!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {!! $departments->render() !!}
            </div>
        </div>
    </div>
@endsection
