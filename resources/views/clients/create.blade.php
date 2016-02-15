@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Add Client</h4></div>

                    <div class="panel-body">
                        {!! Form::open(['url' => 'clients']) !!}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Name:') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div> 
                        
                        <div class="form-group">
                            {!! Form::submit('Add Client', null, ['class' => 'btn btn-primary form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
