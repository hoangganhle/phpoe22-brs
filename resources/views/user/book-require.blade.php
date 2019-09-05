@extends('user.layouts.master')
@section('title', trans('client.your_require'))
@section('content')
<div class="container top">
    <h3 class="text-center mb-4 border_bottom">{{ trans('client.send_require_to_admin') }}</h3>
    <div class="row">
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 offset-2 shadow">
            <form action="" method="POST">
                @csrf
                <table class="table ">
                    <tbody>
                        <tr>
                            <td>{{ trans('client.book_name') }}:</td>
                            <td> <input type="text" class="form-control" name="name" value=""></td>
                        </tr>
                        <tr>
                            <td>{{ trans('client.author_name') }}:</td>
                            <td>
                                <input type="text" class="form-control" name="name" value="">
                                <span class="text text-danger"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>{{ trans('client.massage') }}:</td>
                            <td><textarea class="form-control" id="text_area"></textarea></td>
                        </tr>
                        <tr>
                            <td><input type="submit" class="btn btn-sm btn-primary" value="{{ trans('client.send_to_admin') }}" name="btn_capnhat"></td>
                            <td></td>
                        </tr>
                     </tbody>
                 </table>
            </form>
        </div>
    </div>
</div>
@endsection
