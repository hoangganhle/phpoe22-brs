@extends('user.layouts.master')
@section('title', trans('client.history_activity'))
@section('content')
<div class="container top">
    <h3 class="text-center mb-4">{{ trans('client.history_activities') }}</h3>
    <div class="row">
        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 offset-1">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">
                    <p class="bi bi-alarm-clock"><span class="ml-2"></span></p>
                </a>
            </div>
         </div>
    </div>
</div>
@endsection
