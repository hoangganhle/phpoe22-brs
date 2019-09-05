@extends('user.layouts.master')
@section('title', trans('client.register'))
@section('content')
<div class="container top">
    <h3 class="text-center mb-4 border_bottom">{{ trans('client.register') }}</h3>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 offset-3 p-4 shadow">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="name">{{ trans('client.name') }}:</label>
                    <input id="name" type="text" class="form-control  is-invalid " name="name" value="" required autocomplete="name" autofocus>
                    <span class="invalid-feedback" role="alert">
                   </span>
                </div>
                <div class="form-group">
                    <label for="pwd">{{ trans('client.email') }}:</label>
                    <input id="email" type="email" class="form-control  is-invalid " name="email" value="" required autocomplete="email">
                    <span class="invalid-feedback" role="alert">
                    </span>
                </div>
                <div class="form-group">
                    <label for="pwd">{{ trans('client.password') }}:</label>
                    <input id="password" type="password" class="form-control is-invalid " name="password" required autocomplete="new-password">
                    <span class="invalid-feedback" role="alert">
                    <strong></strong>
                    </span>
                </div>
                <div class="form-group">
                    <label for="pwd">{{ trans('client.confirm_password') }}:</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                <button type="submit" class="btn btn-sm btn-primary">{{ trans('client.register') }}</button>
          </form>
        </div>
    </div>
</div>
@endsection

