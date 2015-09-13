@extends('layouts.admin')
@section('content-admin')
    @include('partials.modals.delete-user')

    <div class="container-fluid" style="padding-top: 30px;">
        <div class="row">
            <div class="col-xs-6 col-md-4">

                {{--Panel--}}
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('auth.register_tile') }} <div id="edit-state" class="pull-right" style="display: none;"><i style="background-color: #d9edf7; color: #31708f;">Editing</i> <span class="badge">id: <span></span></span></div></div>
                    <div class="panel-body">
                        @include('partials.errors')
                        {{--Form--}}
                        {!! Form::open(array(null,'id'=>'form-user-employee')) !!}
                        <div class="form-group">
                            {!! Form::label('name', trans('validation.attributes.name').':') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder'=>'Name', 'required'=>'']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', trans('validation.attributes.email').':') !!}
                            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder'=>'Email', 'required'=>'']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', trans('validation.attributes.password').':') !!}
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder'=>'Password', 'required'=>'']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password_confirmation', trans('validation.attributes.password_confirmation').':') !!}
                            {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder'=>'Confirm password']) !!}
                        </div>

                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <div class="form-group">
                                        <div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Employee
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel"
                                     aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div>
                                            {!! Form::label('direction', 'Direction:') !!}
                                            {!! Form::text('direction', null, ['class' => 'form-control', 'placeholder'=>'Direction']) !!}
                                        </div>
                                        <p></p>
                                        <div>
                                            {!! Form::label('expertise_area', 'Expertise Area:') !!}
                                            {!! Form::select('expertise_area', config('list-expertise-area.expertise-area'), null, ['class'=>'form-control', 'id' => 'expertise_area','placeholder' => '-- Select the expertise area --'])!!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="btn-toolbar pull-right" role="toolbar">
                            <button id="save-user" type="submit" class="btn btn-primary">Save</button>
                            <a id="cancel" class="btn btn-default" style="display: none;" href="#">Cancel</a>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-8">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">Users list</div>
                    {{--Table--}}
                    <div id="tabla-user"></div>
                </div>

            </div>
        </div>
    </div>


    </div>
@endsection
