<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use Validator;

class ActivityController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $projects = $request->user()->activities()->paginate(50);

        return $this->sendResponse($projects, 'Activities retrieved successfully.');        
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
            'project_id' => 'required',
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $activity = Activity::create($input);

        return $this->sendResponse($activity, 'Activity created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activity = Activity::find($id);

        if (is_null($activity)) {
            return $this->sendError('Activity not found.');
        }

        return $this->sendResponse($activity, 'Activity retrieved successfully.');
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
        $activity = Activity::find($id);
        
        if (is_null($activity)) {
            return $this->sendError('Activity not found.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $activity->update($input);

        return $this->sendResponse($activity, 'Activity updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();

        return $this->sendResponse($activity, 'Project deleted successfully.');
    }
}
