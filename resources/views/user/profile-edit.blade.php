@extends('user.layouts.master')
@section('title',trans('client.change_profile') )
@section('content')
<div class="container top">
    <h3 class="text-center mb-4 border_bottom">{{ trans('client.your_profile') }}</h3>
    <div class="row">
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 offset-2 shadow">
        <form action="" method="POST">
        @csrf
            <table class="table ">
                <tbody>
                    <tr>
                        <td>{{ trans('client.email') }}:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>{{ trans('client.name') }}:</td>
                        <td>
                          <input type="text" class="" name="name" value="">
                          <span class="text text-danger"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>{{ trans('client.avatar') }}:</td>
                        <td><img src="" alt="" ><input type="file"></td>
                    </tr>
                    <tr>
                        <td>{{ trans('client.password') }}</td>
                        <td>
                          <input type="password" class="" name="pass" placeholder="{{ trans('client.new_pass') }}">
                          <span class="text text-danger"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>{{ trans('client.confirm_password') }}</td>
                        <td>
                          <input type="password" class="" name="confirm_pass" placeholder="{{ trans('client.confirm_pass') }}">
                          <span class="text text-danger"></span>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" class="btn btn-primary" value="{{ trans('client.update') }}" name="btn_capnhat"></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </form>
      </div>
    </div>
</div>
@endsection

