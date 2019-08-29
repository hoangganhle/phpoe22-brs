@extends('user.layouts.master')
@section('title', trans('client.login'))
@section('content')
<div class="container top">
    <h3 class="text-center mb-4 border_bottom">{{ trans('client.login') }}</h3>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 offset-3 p-4 shadow">
            <form method="POST" action="">
                @csrf
                <div class="form-group">
                    <label for="email">{{ trans('client.email') }}</label>
                    <input id="email" type="email" class="form-control  is-invalid"  name="email" value="" required  autocomplete="email" autofocus>
                    <span class="invalid-feedback" role="alert">
                    </span>
                </div>
                <div class="form-group">
                    <label for="pwd">{{ trans('client.password') }}:</label>
                    <input id="password" type="password" class="form-control is-invalid " name="password" required autocomplete="current-password">
                    <span class="invalid-feedback" role="alert">
                    </span>
                </div>
                <div class="form-group form-check">
                    <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" > {{ trans('client.remember_me') }}
                    <label class="form-check-label" for="remember">
                    </label>
                    </label>
                </div>
                <button type="submit" class="btn btn-primary mt-3">{{ trans('client.login') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection

