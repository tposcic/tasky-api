<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class UserController extends BaseController
{
    public function __construct()
    {
        $this->middleware('role', ['except' => ['authenticatedUser','update', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $input = $request->all();

        if($request->user()->id != $id && $request->user()->role != 'admin'){
            return $this->sendError('Not allowed');
        }

        $user = User::find($id);

        if (is_null($user)) {
            return $this->sendError('User not found.');
        }

        $validator = Validator::make($input, [
            'name' => 'required',
            'surname' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $user->update($input);

        return $this->sendResponse($user->toArray(), 'Task created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (is_null($user)) {
            return $this->sendError('User not found.');
        }

        $user->delete();

        return $this->sendResponse($user->toArray(), 'User deleted successfully.');    
    }

    public function authenticatedUser(Request $request){
        $user = $request->user();

        return $this->sendResponse($user->toArray(), 'User retrieved successfully.');
    }
}
