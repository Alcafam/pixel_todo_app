<div class="modal" tabindex="-1" id="todo_modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="todo_form">
                @csrf
                <textarea name="title" id="todo_title" placeholder="task..." class="form-control"></textarea>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" name="submit" id="submit_btn" form="todo_form" class="btn btn-primary">
        </div>
      </div>
    </div>
</div>