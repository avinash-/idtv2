<?php

class UserController extends \BaseController {

	public function __construct()
    {
        $this->beforeFilter('auth');
    }

       
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();
 
        return View::make('user.index', ['users' => $users]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('user.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$rules = array( 'first_name' =>'required', 'username' =>'required', 'email' => 'required|email','username' =>'required|unique:users', 'password' =>'required');
		
		$messages = array(
			'first_name.required' => 'We need to know your First name !',
		    'email.required' => 'We need to know your email address !',
		    'email.email' => 'Please enter a valid email address !',
		    'username.required' => 'Please enter a Username',
		    'username.unique' => 'The username has already been taken. Please enter an other one !',
		    'password.required' => 'password is required',

		);
		$validation = Validator::make($input, $rules, $messages);

		if ($validation->passes())
		{

			$user = new User;
	 
	        $user->first_name = Input::get('first_name');
	        $user->last_name  = Input::get('last_name');
	        $user->username   = Input::get('username');
	        $user->email      = Input::get('email');
	        $user->role      = Input::get('role');
	        $user->password   = Hash::make(Input::get('password'));
	 
	        $user->save();
 
        	return Redirect::to('/user');
        }
        else
        {
        	return Redirect::to('/user/create')->withErrors($validation);
        }


	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
 
        return View::make('user.edit', [ 'user' => $user ]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();

		$rules = array( 'first_name' =>'required', 'username' =>'required', 'email' => 'required|email','username' =>'required|unique:users,username,'.$id, 'password' =>'required');
		
		$messages = array(
			'first_name.required' => 'We need to know your First name !',
		    'email.required' => 'We need to know your email address !',
		    'email.email' => 'Please enter a valid email address !',
		    'username.required' => 'Please enter a Username',
		    'username.unique' => 'The username has already been taken. Please enter an other one !',
		    'password.required' => 'password is required',

		);
		$validation = Validator::make($input, $rules, $messages);

		if ($validation->passes())
		{
			$user = User::find($id);
	 
	        $user->first_name = Input::get('first_name');
	        $user->last_name  = Input::get('last_name');
	        $user->username   = Input::get('username');
	        $user->email      = Input::get('email');
	        $user->role      = Input::get('role');
	        $user->password   = Hash::make(Input::get('password'));
	 
	        $user->save();
	 
	        return Redirect::to('/user/'.$id.'/edit');
	    }

	    else
        {
        	return Redirect::to('/user/'.$id.'/edit')->withErrors($validation);
        }


	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);
 
        return Redirect::to('/user');	
	}


}
