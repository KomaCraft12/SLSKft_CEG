<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // CRUD 

    public function index()
    {
        return response()->json(Task::all());
    }

    public function store(Request $request)
    {
        $task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->costumer_id = $request->costumer_id;
        $task->workers()->sync($request->workers);
        $task->save();
        return response()->json($task);
    }

    public function show($id)
    {
        return response()->json(Task::find($id));
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->name = $request->name;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->workers()->sync($request->workers);
        $task->save();
        return response()->json($task);
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return response()->json(null, 204);
    }

}
