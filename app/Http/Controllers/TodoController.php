<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use App\Http\Resources\TodoResource;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();

        return response()->json([
            'message' => 'Todos retrieved successfully',
            'data' => TodoResource::collection($todos)
        ], 200);
    }

    public function show($id)
    {
        $todo = Todo::find($id);

        if (!$todo) {
            return response()->json([
                'message' => 'Todo not found'
            ], 404);
        }

        return response()->json([
            'message' => 'Todo retrieved successfully',
            'data' => new TodoResource($todo)
        ], 200);
    }

    public function update(TodoRequest $request, $id)
    {
        $todo = Todo::find($id);

        if (!$todo) {
            return response()->json([
                'message' => 'Todo not found'
            ], 404);
        }

        $todo->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return response()->json([
            'message' => 'Todo updated successfully',
            'data' => $todo
        ], 200);
    }

    public function destroy($id)
    {
        $todo = Todo::find($id);

        if (!$todo) {
            return response()->json([
                'message' => 'Todo not found'
            ], 404);
        }

        $todo->delete();

        return response()->json([
            'message' => 'Todo deleted successfully'
        ], 200);
    }

    public function store(TodoRequest $request)
    {
        $todos = Todo::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return response()->json([
            'message' => 'Todo created successfully',
            'data' => $todos
        ], 201);
    }
}
    