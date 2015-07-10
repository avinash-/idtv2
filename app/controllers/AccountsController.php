<?php

class AccountsController extends \BaseController {

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
		$manager_id = Session::get('manager_id');

		$accounts = Accounts::where('manager_id', '=', $manager_id)->get();
 
        return View::make('manager.accounts.index', ['accounts' => $accounts]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('manager.accounts.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$rules = array( 'account_name' =>'required','account_name' =>'required|unique:accounts');
		
		$messages = array(
			'account_name.required' => 'Please enter the account name !',
			'account_name.unique' => 'Account Name already taken !',

		);
		$validation = Validator::make($input, $rules, $messages);

		if ($validation->passes())
		{

			$accounts = new Accounts;
	 
	        $accounts->account_name = Input::get('account_name');
	        $accounts->manager_id  =  Session::get('manager_id');
	       
	        $accounts->save();
 
        	return Redirect::to('/accounts');
        }
        else
        {
        	return Redirect::to('/accounts/create')->withErrors($validation);
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
		$accounts = Accounts::find($id);
 
        return View::make('manager.accounts.edit', [ 'accounts' => $accounts ]);
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

		$rules = array( 'account_name' =>'required');
		
		$messages = array(
			'account_name.required' => 'Please enter the account name !',

		);
		$validation = Validator::make($input, $rules, $messages);

		if ($validation->passes())
		{

			$accounts = Accounts::find($id);
	 
	        $accounts->account_name = Input::get('account_name');
	        //$accounts->manager_id  =  Session::get('manager_id');
	       
	        $accounts->save();
	 
	        return Redirect::to('/accounts/');
	    }

	    else
        {
        	return Redirect::to('/accounts/'.$id.'/edit')->withErrors($validation);
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
		Accounts::destroy($id);
 		
        return Redirect::to('/accounts');	
	}


}
