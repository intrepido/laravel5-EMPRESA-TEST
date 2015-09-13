@extends('layouts.admin')

@section('content-admin')
    <div class="container-fluid" style="padding-top: 30px;">
        @include('partials.success-message')
        <div class="row">
            <div class="col-xs-6 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Divition datas</div>
                    <div class="panel-body">
                        {!! Form::model($divition, ['route' => ['admin.divition.update', $divition->id], 'method' => 'PUT']) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Name:') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder'=>'']) !!}
                        </div>
                        {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
