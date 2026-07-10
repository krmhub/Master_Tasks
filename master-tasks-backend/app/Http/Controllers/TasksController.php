<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display all tasks for the authenticated user.
     */
    public function index()
    {
        $tasks = Task::where('user_id', auth()->id())
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'data' => $tasks,
        ]);
    }

    /**
     * Store a newly created task.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'importance' => 'required|in:low,medium,high',
        ]);

        $task = Task::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'due_date' => $validated['due_date'] ?? null,
            'importance' => $validated['importance'],
            'user_id' => auth()->id(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Task created successfully.',
            'data' => $task,
        ], 201);
    }

    /**
     * Display a specific task.
     */
    public function show(Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized.',
            ], 403);
        }

        return response()->json([
            'success' => true,
            'data' => $task,
        ]);
    }

    /**
     * Search tasks.
     */
    public function search(Request $request)
    {
        $query = Task::where('user_id', auth()->id());

        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->filled('importance')) {
            $query->where('importance', $request->importance);
        }

        if ($request->filled('is_completed')) {
            $query->where('is_completed', $request->is_completed);
        }

        return response()->json([
            'success' => true,
            'data' => $query->latest()->get(),
        ]);
    }

    /**
     * Update a task.
     */
    public function update(Request $request, Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized.',
            ], 403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'importance' => 'required|in:low,medium,high',
            'is_completed' => 'boolean',
        ]);

        $task->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Task updated successfully.',
            'data' => $task,
        ]);
    }

    /**
     * Delete a task.
     */
    public function destroy(Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized.',
            ], 403);
        }

        $task->delete();

        return response()->json([
            'success' => true,
            'message' => 'Task deleted successfully.',
        ]);
    }
}