@extends('user.layouts.master')
@section('title',trans('client.home'))
@section('content')
<!-- Start BEst Seller Area -->
<section class="wn__product__area brown--color pt--80  pb--30 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__title text-center">
                    <h2 class="title__be--2">{{ trans('client.new') }} <span class="color--theme">{{ trans('client.updated_books') }}</span></h2>
                </div>
            </div>
        </div>
        <!-- Start Single Tab Content -->
        <div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--20">
            <!-- Start Single Product -->
            <div class="product product__style--3">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="product__thumb">
                        <a class="first__img" href="single-product.html"><img src="" width="200px" height="300px"></a>
                        <a class="second__img animation1" href="single-product.html"><img src=""></a>
                        <div class="hot__box">
                            <span class="hot-label">{{ trans('client.new') }}</span>
                        </div>
                    </div>
                    <div class="product__content content--center">
                        <h4><a href="single-product.html"></a></h4>
                        <ul class="prize d-flex">
                            <li>{{ trans('client.author') }}:</li>
                            <li class="text-secondary"></li>
                            <li>{{ trans('client.views') }} :  </li>
                        </ul>
                        <div class="action">
                            <div class="actions_inner">
                                <ul class="add_to_links">
                                    <li><a class="compare" href="#" title="{{ trans('client.read_now') }}"><i class="bi bi-book" ></i></a></li>
                                    <li><a title="{{ trans('client.detail') }}" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a></li>
                                    <li><a class="compare" href="#"><i class="bi bi-heart-beat" title="{{ trans('client.favorite') }}"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product__hover--content">
                            <ul class="rating d-flex">
                                <li class="on"><i class="fa fa-star-o"></i></li>
                                <li class="on"><i class="fa fa-star-o"></i></li>
                                <li class="on"><i class="fa fa-star-o"></i></li>
                                <li class="on"><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Start Single Product -->
        </div>
    </div>
<!-- End Single Tab Content -->
</section>


<section class="wn__product__area brown--color pt--80  pb--30 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__title text-center">
                    <h2 class="title__be--2">{{ trans('client.the_highest') }}<span class="color--theme"> {{ trans('client.vote_books') }}</span></h2>
                </div>
            </div>
        </div>
        <!-- Start Single Tab Content -->
        <div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--20">
           <!-- Start Single Product -->
            <div class="product product__style--3">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="product__thumb">
                        <a class="first__img" href="single-product.html"><img src=""></a>
                        <a class="second__img animation1" href="single-product.html"><img src=""></a>
                        <div class="hot__box">
                            <span class="hot-label">{{ trans('client.new') }}</span>
                        </div>
                    </div>
                    <div class="product__content content--center">
                        <h4><a href="single-product.html"></a></h4>
                        <ul class="prize d-flex">
                            <li>{{ trans('client.author') }}:</li>
                            <li class="text-secondary"></li>
                            <li>{{ trans('client.views') }} :  </li>
                        </ul>
                        <div class="action">
                            <div class="actions_inner">
                                <ul class="add_to_links">
                                    <li><a class="compare" href="#" title="{{ trans('client.read_now') }}"><i class="bi bi-book" ></i></a></li>
                                    <li><a title="{{ trans('client.detail') }}" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a></li>
                                    <li><a class="compare" href="#"><i class="bi bi-heart-beat" title="{{ trans('client.favorite') }}"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product__hover--content">
                            <ul class="rating d-flex">
                                <li class="on"><i class="fa fa-star-o"></i></li>
                                <li class="on"><i class="fa fa-star-o"></i></li>
                                <li class="on"><i class="fa fa-star-o"></i></li>
                                <li class="on"><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Start Single Product -->
        </div>
    </div>
<!-- End Single Tab Content -->
</section>
@endsection
