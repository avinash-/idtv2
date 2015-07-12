<?php

class ManagerController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct(User $user, Manager $manager)
    {
        $this->user = $user;
        $this->manager = $manager;
    }


	public function index()
	{
		$managers = Manager::join('users','managers.id', '=', 'users.manager_id')->select('managers.id as id', 'managers.manager as manager', 'users.username as username', 'users.email as email')->get();
 
        return View::make('manager.index', ['managers' => $managers]);
	}

	public function create()
	{
		return View::make('manager.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$rules = array( 'id' =>'required|unique:managers', 'manager' =>'required','username' => 'required|unique:users', 'email' => 'email|required');
		
		$messages = array(
			'id.required' => 'Please enter manger ID',
			'id.unique' => 'This manager ID has already been taken ! Please try an other one ',
		    'manager.required' => 'Please enter manger name',
		    'email.required' => 'We need to know your email address !',
		    'email.email' => 'Please enter a valid email address !',
		    'username.required' => 'Please enter a Username',
		    'username.unique' => 'The username has already been taken. Please enter an other one !',

		);
		$validation = Validator::make($input, $rules, $messages);

		if ($validation->passes())
		{
	        $this->manager->id = Input::get('id');
	        $this->manager->manager  = Input::get('manager');
	        $this->manager->save();

	        $this->user->first_name = Input::get('manager');
	        $this->user->username   = Input::get('username');
	        $this->user->email      = Input::get('email');
	        $this->user->role      = 'manager';
	        $this->user->manager_id      = Input::get('id');
	        $this->user->password   = Hash::make(Input::get('password'));
			
			$this->manager->users()->save($this->user);
 
 
        	return Redirect::to('/managers');
        }
        else
        {
        	return Redirect::to('/managers/create')->withErrors($validation);
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
		//$managers = Manager::find($id);
		$managers = Manager::join('users','managers.id', '=', 'users.manager_id')->select('managers.id as id', 'managers.manager as manager', 'users.username as username', 'users.email as email')->find($id);
 
        return View::make('manager.edit', [ 'managers' => $managers ]);
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

		$rules = array( 'id' =>'required|unique:managers,id,'.$id, 'manager' =>'required', 'email' => 'email|required');
		
		$messages = array(
			'id.required' => 'Please enter manger ID',
			'id.unique' => 'This manager ID has already been taken ! Please try an other one ',
		    'manager.required' => 'Please enter manger name',
		    'email.required' => 'We need to know your email address !',
		    'email.email' => 'Please enter a valid email address !',
		    'username.required' => 'Please enter a Username',
		    'username.unique' => 'The username has already been taken. Please enter an other one !',

		);
		$validation = Validator::make($input, $rules, $messages);

		if ($validation->passes())
		{
	        $this->manager = Manager::find($id);

	        $this->manager->id = Input::get('id');
	        $this->manager->manager  = Input::get('manager');
	        $this->manager->save();
	        
	        $this->user->first_name = Input::get('manager');
	        $this->user->username   = Input::get('username');
	        $this->user->email      = Input::get('email');
	        $this->user->role      = 'manager';
	        $this->user->manager_id      = Input::get('id');
	        $this->user->password   = Hash::make(Input::get('password'));
			
			//$this->manager->users()->save($this->user);
 			DB::table('users')
            ->where('username', $this->user->username)
            ->update(array('email' => $this->user->email,'first_name' => $this->user->first_name));

	        return Redirect::to('/managers');
	    }

	    else
        {
        	//print_r($id);
        	//exit;
        	return Redirect::to('/managers/'.$id.'/edit')->withErrors($validation);
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
		Manager::destroy($id);
		DB::table('users')->where('manager_id', $id)->delete();
        return Redirect::to('/managers');	
	}




	public function getDetails($id)
	{
		$details = Manager::join('accounts as a','a.manager_id','=','managers.id')
						  ->join('tools as t','t.acc_id','=','a.id')
						  ->select(DB::raw('SUM(t.access)/(count(*))*100 as percentage'),'a.id as AccId','t.tool_name as ToolName','a.account_name as AccountName','managers.manager as ManagerName')
						  ->where('managers.id','=',$id)->groupBy('t.acc_id')->get();
	 
		return View::make('manager.tables._details',compact('details'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function accDetails($id)
	{
		// SELECT t.ID as tid, t.emp_name as ename, t.emp_id as eid,t.access as access, a.Account_name as aname,m.Manager as manager FROM Tools t JOIN Accounts a ON(a.ID = t.Acc_id ) JOIN Managers m ON(m.ID = a.Manager_id) where t.Acc_id = ".$acc_id." group by(t.emp_id) 
		$acc_details = Manager::join('accounts as a','a.manager_id','=','managers.id')
						  	  ->join('tools as t','t.acc_id','=','a.id')
						  	  ->select(DB::raw('SUM(t.access)/(count(*))*100 as percentage'),'t.emp_name as ename','t.access as access','a.id as AccId','t.tool_name as ToolName','a.account_name as AccountName','t.emp_id as eid','managers.manager as ManagerName')
						  	  ->where('a.id','=',$id)->groupBy('t.emp_id')->get();

		return View::make('manager.tables._acc_details',compact('acc_details'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function toolDetails($id)
	{
		$tool_details = DB::table('tools')
				          ->select('tool_name as tname','emp_name as ename','emp_id as eid','access as access')	
				          ->where('emp_id','=',$id)
				          ->get();
		$avg = DB::table('tools')
		         ->select(DB::raw('AVG(access)*100 as avg'))	
		         ->where('emp_id','=',$id)
		         ->get();

		return View::make('manager.tables._tool_details',compact('tool_details','avg'));
	}




}
