@foreach($reviews as $review)
    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 mt-3 ">
        <div class="container-fluid comment">
            <div class="row mt-2">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-1">
                   @if(!empty($review->user->avatar))
                        <img src="{{ $review->user->avatar }}" alt="">
                   @else
                        <img src="{{ config('constant.avatar_empty') }}" alt="">
                   @endif
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-11">
                    <p class="gmail_comment">
                        <b>{{ $review->user->email }}</b>
                        <span class="ml-3 text-secondary">{{ $review->created_at }}</span>
                    </p>
                    <div class="comment_content mt-1">
                        {{ $review->review_content }}
                    </div>
                    @if(Auth::check())
                        <p>
                            <span class="fa fa-thumbs-up"></span >
                            <span class="fa fa-thumbs-down ml-3"></span>
                            <span class="ml-3 reply_btn" id="{{ $review->id }}">{{ trans('client.reply') }}</span>
                        </p>
                        <div class="container-fluid reply" id="reply{{ $review->id }}">
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
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach
