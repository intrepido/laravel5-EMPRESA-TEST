@extends('layouts.admin')

@section('content-admin')
    <div class="container-fluid" style="padding-top: 30px;">
        <div class="row">
            <div class="col-xs-6 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Divition datas</div>
                    <div class="panel-body">
                        {!!Form::open(['route'=>'admin.divition.store', 'method'=>'POST'])!!}
                        <div class="form-group">
                            {!! Form::label('name', 'Name:') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder'=>'Insert the name']) !!}
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
                    <div class="panel-heading">Divitions list</div>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Departments</th>
                                <th>Created at</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($divitions as $divition)
                                <tr>
                                    <td>{{$divition->name}}</td>
                                    <td>
                                        <ul>
                                            @foreach($divition->departments as $department)
                                                <li>
                                                   {{$department->section}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{{$divition->created_at}}</td>
                                    <td>
                                        <div class="btn-toolbar" role="toolbar">
                                             <a href="{{route('admin.divition.edit',['id' => $divition->id])}}" class="btn btn-primary">Editar</a>
                                             <div class="btn-group">
                                                {!!Form::open(['route'=> ['admin.divition.destroy', $divition->id], 'method'=>'DELETE'])!!}
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
                {!! $divitions->render() !!}
            </div>
        </div>
    </div>
@endsection
