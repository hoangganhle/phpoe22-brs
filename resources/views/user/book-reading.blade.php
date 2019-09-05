@extends('user.layouts.master')
@section('title', trans('client.reading_book'))
@section('content')
<div class="container book_reading top">
    <h3 class="text-center mb-4 border_bottom">{{ trans('client.reading_book') }}</h3>
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 mt-5 detail">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <img src="" alt="">
                        <p>{{ trans('client.views') }}</p>
                        <p>
                            <span class=><a class="compare text-dark" href="#" title="{{ trans('client.read_now') }}"><i class="bi bi-book " ></i></a></span>
                            <span class="ml-3"><a title="{{ trans('client.detail') }}" class="compare" href="#productmodal"><i class="bi bi-search text-dark"></i></a></span>
                            <span class="ml-3"><a class="compare" href="#"><i class="bi bi-heart-beat text-dark" title="{{ trans('client.favorite') }}"></i></a></span>
                        </p>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 right">
                        <h5></h5>
                        <p></p>
                        <p>
                            <span class="on"><i class="fa fa-star-o text-warning"></i></span>
                            <span class="on"><i class="fa fa-star-o text-warning"></i></span>
                            <span class="on"><i class="fa fa-star-o text-warning"></i></span>
                            <span class="on"><i class="fa fa-star-o text-warning"></i></span>
                            <span class="on"><i class="fa fa-star-o"></i></span>
                        </p>
                        <p> {{ trans('votes') }}<span class="compare ml-2" href="#"><i class="bi bi-heart-beat text-danger" title="{{ trans('client.favorite') }}"></i></a></span></p>
                        <p></p>
                  </div>
              </div>
           </div>
        </div>
    </div>
</div>
@endsection
