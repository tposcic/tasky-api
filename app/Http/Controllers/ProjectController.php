<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Validator;

class ProjectController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $projects = $request->user()->projects()->paginate(10);

        return $this->sendResponse($projects, 'Projects retrieved successfully.');
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
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input['user_id'] = $request->user()->id;

        $project = Project::create($input);

        return $this->sendResponse($project, 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::with('activities')->find($id);

        if (is_null($project)) {
            return $this->sendError('Project not found.');
        }

        return $this->sendResponse($project, 'Project retrieved successfully.');
    }

    /**
     * Display logs for the project
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logs(Project $project){
        if (is_null($project)) {
            return $this->sendError('Project not found.');
        }

        $logs = $project->logs()->paginate(50);

        return $this->sendResponse($logs, 'Logs retrieved successfully.');        
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
        $project = Project::find($id);
        
        if (is_null($project)) {
            return $this->sendError('Project not found.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $project->update($input);

        return $this->sendResponse($project, 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return $this->sendResponse($project, 'Project deleted successfully.');
    }
}
