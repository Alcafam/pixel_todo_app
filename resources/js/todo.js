$(document).ready(function() {
    //triggers
    $(document).on('click', '#add_task', function(){
        $('.modal-title').text('New Task');
        $('#todo_form').attr('action', "/create_edit_todo");
        $('#todo_form').attr('method', "POST");
        $('#submit_btn').val('Create');
        $('#todo_modal').modal('show')
    })
    
    $(document).on('click', '.edit_todo', function(){
        let task_id = $(this).attr('data-id')

        $.get('/get_todo', {id:task_id}, function(res){
            $('#todo_form').append(
                '<input type="hidden" name="id" id="task_id" value="'+task_id+'">'
            );
            $('#todo_title').val(res.title);
            $('#submit_btn').val('Update');
            $('#todo_form').attr('action', "/create_edit_todo");
            $('#todo_form').attr('method', "POST");
            $('.modal-title').text('Edit Task');
            $('#todo_modal').modal('show');
            
        })     
    })
    
    $(document).on('change', '.update_status', function(){
        let task_id = $(this).attr('data-id')
        let status;
        if ($(this).prop('checked')) {
            status = 1;
        } else {
            status = 0;
        }
        let data = {
            // id : task_id,
            status: status
        }

        do_ajax(data, '/update_todo/'+task_id, 'PUT');
    })

    $(document).on('click', '.delete_todo', function(){
        let task_id = $(this).attr('data-id')
        let data = {_token: '{{ csrf_token() }}'}
        do_ajax([], '/delete_todo/'+task_id, 'DELETE'); 
    })


    // handlers
    $(document).on('hidden.bs.modal', '#todo_modal', function(){
        $('#task_id').remove()
        $('#todo_form')[0].reset();
    })

    $(document).on('submit', '#todo_form', function(){
        let data = $('#todo_form').serialize();
        let url = $('#todo_form').attr('action');
        let method = $('#todo_form').attr('method');
        
        do_ajax(data, url, method);
        return false;
    })

    function do_ajax(data, url, method){
        $.ajax({
            url: url,
            type: method,         
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            },
            success: function(res) {
                if(res.message === "success"){
                    console.log(res.message)
                    $('#todo_partial').html(res.html)
                    $('#todo_modal').modal('hide')
                }else{
                    console.log(res)
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr)
                console.log(xhr.responseJSON.message)
            }
        });
    }
});
