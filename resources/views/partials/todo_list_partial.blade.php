@foreach ($todos as $todo)
    <ul class="list-group list-group-horizontal rounded-0 bg-transparent border-bottom">
        <li class="list-group-item d-flex align-items-center ps-0 pe-3 py-1 rounded-0 border-0 bg-transparent">
            <div class="form-check">
                <input class="form-check-input me-0 update_status" type="checkbox" value="{{ $todo->status }}" data-id="{{$todo->id}}" id="todo_{{$todo->id}}"
                aria-label="..." {{ ($todo->status == 1)? 'checked':''}} />
            </div>
        </li>

        <li class="list-group-item px-3 py-1 d-flex align-items-center flex-grow-1 border-0 bg-transparent">
            <p class="lead fw-normal mb-0">{{ $todo->title }}</p>
        </li>

        <li class="list-group-item ps-3 pe-0 py-1 rounded-0 border-0 bg-transparent">
            <div class="d-flex flex-row justify-content-end mb-1">
                <a href="javascript:void(0)" class="text-info me-3 edit_todo" title="Edit todo" data-id="{{ $todo->id }}">Edit</a>
                <a href="javascript:void(0)" class="text-danger delete_todo" title="Delete todo" data-id="{{ $todo->id }}">Delete</a>
            </div>
            <div class="text-end text-muted">
                <a href="javascript:void(0)" class="text-muted" title="Created date">
                <p class="small mb-0">{{ $todo->updated_at }}</p>
                </a>
            </div>
        </li>
    </ul>
@endforeach