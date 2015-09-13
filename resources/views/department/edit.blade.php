@extends('layouts.admin')

@section('content-admin')
    <div class="container-fluid" style="padding-top: 30px;">
        @include('partials.success-message')
        <div class="row">
            <div class="col-xs-6 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Department datas</div>
                    <div class="panel-body">
                        {!! Form::model($department, ['route' => ['admin.department.update', $department->id], 'method' => 'PUT']) !!}
                            <div class="form-group">
                                {!! Form::label('section', 'Section name:') !!}
                                {!! Form::text('section', null, ['class' => 'form-control', 'placeholder'=>'Insert the name']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('divitions', 'Divitions:') !!}
                                {!! Form::select('divition_id', $divitions, $department->divition->id, ['class'=>'form-control', 'id' => 'divitions','placeholder' => '-- Select the divition --'])!!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
