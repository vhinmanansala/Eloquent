@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Add User</h4></div>

                    <div class="panel-body">
                        {!! Form::open(['url' => 'users']) !!}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {!! Form::label('name', 'Name:') !!}
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
    
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
    
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                {!! Form::label('email', 'Email:') !!}
                                {!! Form::text('email', null, ['class' => 'form-control']) !!}

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
    
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                {!! Form::label('password', 'Password:') !!}
                                {!! Form::input('password' ,'password', null, ['class' => 'form-control']) !!}

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
    
                            <div class="form-group">
                                {!! Form::label('userRole', 'Role:') !!}
                                {!! Form::select('userRole', $roles, null,['class' => 'form-control']) !!}
                            </div>
                            
                            <div class="form-group">
                                {!! Form::submit('Add User', null, ['class' => 'btn btn-primary form-control']) !!}
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
