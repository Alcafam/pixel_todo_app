<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::orderBy('status')
            ->orderBy('updated_at', 'desc')
            ->get();
        return view('index', compact('todos'));
    }

    public function get_todo_by_id(Request $request)
    {
        return response()->json([
            'title' => Todo::where('id', $request->id)->value('title')
        ]);
    }

#region CRUD
    public function create_edit_todo(Request $request)
    {
        $data = [
            'title' => $request->title, 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now() 
        ];

        $condition = $request->has('id') ? ['id' => $request->id] : ['id'=>null];

        $result = Todo::updateOrInsert(
            $condition,
            $data
        );

        return $this->check_result($result);
    }

    public function update_todo(Request $request, Todo $todo)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $result = $todo->update($request->only([
            'status'
        ]));

        return $this->check_result($result);
    }

    public function destroy_todo(Todo $todo)
    {
        $result = $todo->delete();
        return $this->check_result($result);
    }

#region Redundant actions
    private function check_result($result)
    {
        if ($result) {
            $todos = Todo::orderBy('status')
                ->orderBy('updated_at', 'desc')
                ->get();
            return response()->json([
                'message' => 'success',
                'html' => view('partials.todo_list_partial', compact('todos'))->render()
            ]);
        }else{
            return response()->json([
                'message' => 'An error occurred while processing the request'
            ], 500);
        }
    }
}
