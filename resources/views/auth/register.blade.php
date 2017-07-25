@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <!--////////////////-->

                        <div class="form-group{{ $errors->has('carrier') ? ' has-error' : '' }}">
                            <label for="carrier" class="col-md-4 control-label">Carrier</label>

                            <div class="col-md-6">
                                <input id="carrier" type="text" class="form-control" name="carrier" value="{{ old('carrier') }}" required autofocus>

                                @if ($errors->has('carrier'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('carrier') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('current-job') ? ' has-error' : '' }}">
                            <label for="current-job" class="col-md-4 control-label">Current-job</label>

                            <div class="col-md-6">
                                <input id="current-job" type="text" class="form-control" name="current-job" value="{{ old('current-job') }}" required autofocus>

                                @if ($errors->has('current-job'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-job') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('previous-job') ? ' has-error' : '' }}">
                            <label for="previous-job" class="col-md-4 control-label">Previous-job</label>

                            <div class="col-md-6">
                                <input id="previous-job" type="text" class="form-control" name="previous-job" value="{{ old('previous-job') }}" required autofocus>

                                @if ($errors->has('previous-job'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('previous-job') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!--//////////////////-->
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
