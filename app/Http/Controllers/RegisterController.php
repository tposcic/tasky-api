<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Workgroup;
use Validator;
use App\Models\Workspace;
use App\Models\Preference;

class RegisterController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'c_password' => 'required|string|same:password',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $preferences = Preference::create();

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['preference_id'] = $preferences->id;

        $user = User::create($input);

        $workspace = Workspace::create([
            'title' => $user->name . "'s Workspace",
            'description' => $user->name . "'s personal workspace",
            'icon' => 'help',
            'type' => 'personal'
        ]);

        $workspace->categories()->create([
            'workspace_id' => $workspace->id,
            'title' => $user->name . "'s tasks",
            'description' => 'Default tasks category',
            'icon' => 'help',
        ]);
        
        $user->workspaces()->attach($workspace->id, array('role' => 'admin'));

        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;

        return $this->sendResponse($success, 'User register successfully.');
    }
}