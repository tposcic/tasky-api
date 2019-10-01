<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use Validator;
use Illuminate\Support\Carbon;

class LogController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input = $request->input();

        $input['selected'];
        $logs = $request->user()->logs();

        if($input['selected'] == 'all'){
            $logs = $logs->paginate(50);
        } else {
            $logs = $logs->where('project_id', $input['selected'])->paginate(50);
        }

        return $this->sendResponse($logs, 'Logs retrieved successfully.');    
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
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'project_id' => 'required',
            'activity_id' => 'required',
            'started_at' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        // $input['started_at'] = Carbon::now();

        $log = Log::create($input);

        return $this->sendResponse($log, 'Log created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $log = Log::find($id);

        if (is_null($log)) {
            return $this->sendError('Log not found.');
        }

        return $this->sendResponse($log, 'Log retrieved successfully.');
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
        $log = Log::find($id);
        
        if (is_null($log)) {
            return $this->sendError('Log not found.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'finished_at' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        } 

        $log->update($input);

        return $this->sendResponse($log, 'Log updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Log $log)
    {
        $log->delete();

        return $this->sendResponse($log, 'Log deleted successfully.');
    }
}
