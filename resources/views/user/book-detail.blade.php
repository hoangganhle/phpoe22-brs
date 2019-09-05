@extends('user.layouts.master')
@section('title', trans('detail'))
@section('content')
<div class="container above">
    <div class="row ml-5">
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">
            <img src="" alt="">
            <h5 class="mt-3">{{ trans('votes') }}</h5>
            <p>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
            </p>
            <p class="btn btn-sm btn-primary">{{ trans('client.send') }}</p>

        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-8 right ml-5">
            <h3></h3>
            <p>{{ trans('author') }}: <span class="text-secondary"></span></p>
            <p>{{ trans('client.category') }}: <span class="text-secondary"></span></p>
            <p>{{ trans('client.publisher') }}: <span class="text-secondary"></span></p>
            <p>{{ trans('date') }}: <span class="text-secondary"></span></p>
            <a href="#" class="btn btn-sm btn-success mt-3">{{ trans('read_book') }}</a>
            <div class="description mt-3">
            </div>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

        </div>
    </div>
</div>

<div class="container under ml-5">
    <h4 class="ml-5 mb-5 mt-5">{{ trans('review') }}</h4>
    <div class="row ml-5">
        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <img src="" alt="">
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-10">
                        <form action="">
                             <textarea name=""></textarea>
                        </form>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right mt-2">
                        <button type="submit" class="btn btn-primary">{{ trans('client.send') }}</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 mt-3 ">
            <div class="container-fluid comment">
                <div class="row mt-2">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-1">
                        <img src="" alt="">
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-11">
                        <p class="gmail_comment"><b></b></p>
                        <div class="comment_content mt-1">
                        </div>
                        <p><span class="fa fa-thumbs-up"></span ><span class="fa fa-thumbs-down ml-3"></span><span class="ml-3 reply_btn" id="1">{{ trans('client.reply') }}</span></p>
                        <div class="container-fluid reply" id="reply1">
                            <div class="row">
                                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                                    <img src="" alt="">
                                </div>
                                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-11">
                                    <textarea name=""></textarea>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right mt-2">
                                    <a href="#" class="btn btn-sm btn-primary">{{ trans('client.send') }}</a>
                                    <a href="#" class="btn btn-sm btn-secondary">{{ trans('client.cancel') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
