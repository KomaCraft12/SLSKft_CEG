<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Costumer;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return Task::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'costumer_id' => 'required|exists:costumers,id',
            'description' => 'required|string',
            'type' => 'required|in:fault,investment,other',
            'status' => 'required|in:inprogress,done,failed',
            'gps_coordinates' => 'nullable|string|max:255',
            'workers' => 'required|array',
            'workers.*' => 'exists:workers,id',
        ]);
        $task = Task::create($validated);
        $task->workers()->sync($request->workers);
        return $task;
    }

    public function show($id)
    {
        return Task::with('costumer', 'workers')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $validated = $request->validate([
            'description' => 'required|string',
            'type' => 'required|in:fault,investment,other',
            'status' => 'required|in:inprogress,done,failed',
            'gps_coordinates' => 'nullable|string|max:255',
        ]);
        if ($request->has('costumer_id') && $request->costumer_id != $task->costumer_id) {
            return response()->json(['error' => 'Cannot change costumer for an existing task.'], 400);
        }
        $task->update($validated);
        if ($request->has('workers')) {
            $task->workers()->sync($request->workers);
        }
        return $task;
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        if ($task->workers()->count() > 0) {
            return response()->json(['error' => 'Cannot delete task with assigned workers.'], 400);
        }
        $task->delete();
        return response()->noContent();
    }
}