@extends('layouts.main')
@section('content')
<div class="container">
    <div class="card mt-5 mx-auto w-50">
        <div class="card-header">Register</div>
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="text-center">

                    <div class="btn-group mb-3 btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                            {!! Form::radio('role', 'customer', old('role', true) ) !!}
                            Iam a Customer
                        </label>
                        <label class="btn btn-secondary">
                            {!! Form::radio('role', 'service-provider', old('role', false)) !!}
                            Iam a Service Provider
                        </label>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class=" control-label">Name</label>

                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required
                        autofocus> @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span> @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class=" control-label">Email</label>

                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                        required> @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span> @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class=" control-label">Password</label>

                    <input id="password" type="password" class="form-control" name="password" required>
                    <div>
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span> @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class=" control-label">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection