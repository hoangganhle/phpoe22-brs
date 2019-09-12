<ul class="rating d-flex">
    @php
        $avgRate = avgRate($book->rates);
    @endphp
    @if($avgRate != 0)
        @for($i = 1; $i <= $avgRate; $i++)
            <li class="on"><i class="fa fa-star-o"></i></li>
        @endfor
        @for($i = 1; $i <= 5-$avgRate; $i++)
            <li><i class="fa fa-star-o"></i></li>
        @endfor
    @else
        <li>{{ trans('client.no_rate') }}</li>
    @endif
</ul>
