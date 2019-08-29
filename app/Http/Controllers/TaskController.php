<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Validator;

class TaskController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tasks = $request->user()->tasks()->paginate(10);

        return $this->sendResponse($tasks->toArray(), 'Tasks retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'task_id' => 'nullable',
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required|string',
            'urgency' => 'in:Very Low,Low,Medium,High,Very High,Critical',
            'due_at' => 'nullable',
            'finished_at' => 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $task = Task::create($input);

        return $this->sendResponse($task->toArray(), 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::with('tasks')->find($id);

        if (is_null($task)) {
            return $this->sendError('Task not found.');
        }

        return $this->sendResponse($task->toArray(), 'Task retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        
        if (is_null($task)) {
            return $this->sendError('Task not found.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'task_id' => 'nullable',
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required|string',
            'urgency' => 'in:Very Low,Low,Medium,High,Very High,Critical',
            'due_at' => 'nullable',
            'finished_at' => 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $task->update($input);

        return $this->sendResponse($task->toArray(), 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return $this->sendResponse($task->toArray(), 'Task deleted successfully.');
    }
}
