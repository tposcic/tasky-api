<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workspace;
use App\Models\User;
use Validator;

class WorkspaceController extends BaseController
{
    /**
     * Display a listing of the resource.
     * Returns only the workspaces of the authenticated user
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::find($request->user()->id);
        $workspaces = $user->workspaces()->with('categories')->get();

        return $this->sendResponse($workspaces->toArray(), 'Workspaces retrieved successfully.');
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
            'title' => 'required',
            'description' => 'required',
            'type' => 'required|in:personal,private,public',
            'icon' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $workspace = Workspace::create($input);

        $category = $workspace->categories()->create([
            'workspace_id' => $workspace->id,
            'title' => $workspace->title . " tasks",
            'description' => 'Default tasks category',
            'icon' => 'help',
        ]);

        $workspace->users()->attach($request->user()->id, array('role' => 'admin'));

        $workspace = $workspace->toArray();
        $workspace['categories'] = array();
        array_push($workspace['categories'], $category);

        return $this->sendResponse($workspace, 'Workspace created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $workspace = Workspace::find($id);

        if (is_null($workspace)) {
            return $this->sendError('Workspace not found.');
        }

        return $this->sendResponse($workspace->toArray(), 'Workspace retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workspace $workspace)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required',
            'icon' => 'required',
            'type' => 'in:personal,private,public',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $workspace->update($validator);

        return $this->sendResponse($workspace->toArray(), 'Workspace updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Workspace $workspace)
    {
        $workspace_role = $request->user()->workspaces()->whereWorkspaceId($workspace->id)->first()->pivot->role;

        if($workspace_role !== 'admin'){
            return $this->sendError('Insufficient permission for deleting workspace.');
        }

        $workspace->delete();

        return $this->sendResponse($workspace->toArray(), 'Workspace deleted successfully.');
    }

    /**
     * Get workspace users
     *
     * @param int  $id
     * @return \Illuminate\Http\Response
     */
    public function getUsers($id)
    {
        $workspace = Workspace::find($id);

        if (is_null($workspace)) {
            return $this->sendError('Workspace not found.');
        }

        $users = $workspace->users;

        return $this->sendResponse($users->toArray(), 'Workspace users retrieved successfully.');
    }

    /**
     * Add user to workspace
     *
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function addUser($id, Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'user_id' => 'required',
            'role' => 'required|in:user,moderator,admin',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $workspace = Workspace::find($id);

        if (is_null($workspace)) {
            return $this->sendError('Workspace not found.');
        }

        $user_id = $input['user_id'];
        $user = User::find($user_id);

        if (is_null($user)) {
            return $this->sendError('User not found.');
        }

        $workspace->users()->attach($user_id, array('role' => $input['role']));

        return $this->sendResponse($workspace->toArray(), 'User added to workspace ' . $workspace->title . '.');
    }
}
