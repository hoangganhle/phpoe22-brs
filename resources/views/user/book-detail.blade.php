@extends('user.layouts.master')
@section('title', trans('detail'))
@section('content')
<div class="container above detail_book">
    <div class="row ml-5">
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">
            <img src="{{ $book->image }}" alt="">
            <h5 class="mt-3">{{ trans('client.votes') }} {{ '(' . $book->rates->count() . ')' }}</h5>
            @if (Auth::check())
                @if (empty($userRateBook))
                    <form class="vote" action="{{ route('book-detail-vote', ['id' => $book->id]) }}" method="POST">
                        @csrf
                        <p>
                            <input type="checkbox" name="star[]" value="1" class="star">
                            <input type="checkbox" name="star[]" value="1" class="star">
                            <input type="checkbox" name="star[]" value="1" class="star">
                            <input type="checkbox" name="star[]" value="1" class="star">
                            <input type="checkbox" name="star[]" value="1" class="star">
                        </p>
                        <button type="submit" class="btn btn-sm btn-primary mt-3">{{ trans('client.send') }}</button>
                        @if ($errors->has('star'))
                            <div class="alert alert-danger mt-2">
                               {{ $errors->first('star') }}
                            </div>
                        @endif
                    </form>
                @else
                    <i>{{ trans('client.you_are_voted') }} {{ $userRateBook->stars }} {{ trans('client.star_for_book') }}</i>
                @endif
            @else
                <p><i>{{ trans('client.login_to_rate') }}</i></p>
            @endif
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-8 right ml-5">
            <h3>{{ $book->title }}</h3>
            <p>
                {{ trans('author') }}:
                <span class="text-secondary">
                    @foreach ($book->authors as $author)
                        {{ $author->author_name }},
                    @endforeach
                </span>
            </p>
            <p>{{ trans('client.category') }}: <span class="text-secondary">{{ $book->category->category_name }}</span></p>
            <p>{{ trans('client.publisher') }}: <span class="text-secondary">{{ $book->publisher->publisher_name }}</span></p>
            <p>{{ trans('date') }}: <span class="text-secondary">{{ $book->created_at }}</span></p>
            <a href="{{ route('book-read', ['id' => $book->id]) }}" class="btn btn-sm btn-success mt-3">{{ trans('read_book') }}</a>
            <div class="description mt-3">
                {{ $book->book_description }}
            </div>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

        </div>
    </div>
</div>

<div class="container under ml-5">
    <h4 class="ml-5 mb-5 mt-5">{{ trans('review') }}</h4>
    <div class="row ml-5">
        @if (Auth::check())
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            @if (!empty(Auth::user()->avatar))
                                <img src="{{ Auth::user()->avatar }}" alt="">
                            @else
                                <img src="{{ config('constant.avatar_empty') }}" alt="">
                            @endif
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-10">
                            <form action="{{ route('book-detail-review', ['id' => $book->id]) }}" method="POST" id="reviewForm">
                                @csrf
                                <textarea name="review" id="review"></textarea>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right mt-2">
                                <a href="javascript:void(0)" class="btn btn-primary send_review" idBook="{{ $book->id }}">{{ trans('client.send') }}</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <p><i class="text-danger">{{ trans('client.login_to_review') }}</i></p>
        @endif
        <div class="container-fluid" id="all_reviews">
            @foreach($reviews as $review)
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 mt-3 ">
                    <div class="container-fluid comment">
                        <div class="row mt-2">
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-1">
                                @if (!empty($review->user->avatar))
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
                                @if (Auth::check())
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
        </div>
    </div>
</div>
</div>
@endsection
