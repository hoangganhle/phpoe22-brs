<td class="sorting_1">{{ $newbook->id }}</td>
<td class="sorting_1">{{ $newbook->book_name }}</a></td>
<td class="sorting_1">{{ $newbook->request_content }}</td>
<td class="sorting_1">{{ $newbook->user->name }}</td>
<td class="sorting_1"><b>
    @if ($newbook->status == \App\Enums\Status::Resolve)
        {{ trans('admin.resolve') }}
    @elseif ($newbook->status == \App\Enums\Status::Processing)
        {{ trans('admin.processing') }}
    @endif
</b>
</td>
<td><a href="#" class="edit-modal btn btn-warning btn-sm" data-id="{{ $newbook->id }}" data-book_name="{{ $newbook->book_name }}" data-request_content="{{ $newbook->request_content }}" data-user_id="{{ $newbook->user_id }}" data-status="{{ $newbook->status }}">
        <i class=" fa fa-edit"></i>
    </a>
</td>
