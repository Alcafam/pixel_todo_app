@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">   
            <div class="row">
                <div class="col">
                    <h1>YOUR TASKS</h1>
                </div>
                <div class="col text-end">
                    <a href="javascript:void(0)" class="btn btn-success" id="add_task">Add Task</a>
                </div>             
            </div>
            <div id="todo_partial">
                @include('partials/todo_list_partial')
            </div>            
        </div>
    </div>
</div>
@include('partials/modal_partial')

@endsection
