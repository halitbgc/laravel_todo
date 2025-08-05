<?php

namespace App\Http\Controllers;

use App\Enums\TodoStatusEnum;
use App\Enums\TodoPriorityEnum;
use App\Http\Requests\StoreTodoRequests;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Category;
use App\Models\Todo;
use Illuminate\View\View;
use Illuminate\Http\Request;
class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $todos = Todo::where('user_id', auth()->user()->id)->paginate(20);
        return view('/pages.todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::all();
        $statuses = TodoStatusEnum::cases();
        $priorities = TodoPriorityEnum::cases();
        return view('/pages.todos.create', compact('categories', 'statuses', 'priorities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequests $request)
    {
        $validated_data = $request->validated();
        $validated_data['user_id'] = auth()->user()->id;
        Todo::create($validated_data);
        return redirect()->back()->with('success', 'Todo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        if($todo->user_id != auth()->user()->id) 
        {
            return redirect()->back()->with('error','');
        }
        return view('/pages.todos.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        if($todo->user_id != auth()->user()->id) 
        {
            return redirect()->back()->with('error','');
        }
        $categories = Category::all();
        $statuses = TodoStatusEnum::cases();
        $priorities = TodoPriorityEnum::cases();
        return view('/pages.todos.edit', compact('todo', 'categories', 'statuses', 'priorities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        if($todo->user_id != auth()->user()->id) 
        {
            return redirect()->back()->with('error','');
        }
        $validated_data = $request->validated();
        $todo->update($validated_data);
        return redirect()->back()->with('success', 'Todo updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        if($todo->user_id != auth()->user()->id) 
        {
            return redirect()->back()->with('error','');
        }
        $todo->delete();
        return redirect()->route('todos.index')->with('success', 'Todo deleted successfully.');
    }

    public function check(Request $request, Todo $todo) 
    {
        if($todo->user_id != auth()->user()->id) 
        {
            return redirect()->back()->with('error','');
        }
        
        $check = $request->input('check');
        if ($check)
        {
            $todo->update(['completed_at' => now(), 'status' => TodoStatusEnum::COMPLETED->value]);
        }
        else
        {
            $todo->update(['completed_at' => null, 'status' => TodoStatusEnum::PENDING->value]);
        }

        return redirect()->back()->with('success', 'Todo status updated successfully.');
    }
}
