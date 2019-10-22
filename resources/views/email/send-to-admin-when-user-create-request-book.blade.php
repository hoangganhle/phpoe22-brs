<h3>{{ trans('hello') }}</b></h3>
<p>
    {{ trans('You received a new request add new book') }}
    <b><i>{{ $requireBook->book_name }}</i></b>
    {{ trans('from') }}
    <b>{{ $sender->name }}</b>'
</p>
<a href="{{ route('editbook.index') }}">{{ trans('View Detail') }}</a>
