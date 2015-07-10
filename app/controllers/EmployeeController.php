<?php

class EmployeeController extends \BaseController {

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

		$employees = Employee::join('accounts','accounts.id','=', 'tools.acc_id')->join('managers','managers.id', '=', 'accounts.manager_id')->select('tools.emp_id as id', 'tools.emp_name as emp_name', 'tools.access as access','tools.tool_name as tool_name')->where('accounts.manager_id', '=', $manager_id)->get();
 
        return View::make('manager.employees.index', ['employees' => $employees]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$manager_id = Session::get('manager_id');

		$tools = Accounts::join('managers','managers.id', '=', 'accounts.manager_id')->select('accounts.account_name as name', 'accounts.id as id' )->where('accounts.manager_id', '=', $manager_id)->lists('name','id');

		$access = array(0 =>'No Access', 1 =>'Access');

		return View::make('manager.employees.create',compact('tools','access'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$rules = array( 'tool_name' =>'required','acc_name' =>'required','emp_id' =>'required','emp_name' =>'required','access' =>'required');
		
		$messages = array(
			'tool_name.required' => 'Tool Name is required !',
			'emp_id.required' => 'Employee ID is required !',
			'emp_name.required' => 'Employee Name is required !',
			'access.required' => 'Please select an accesibility !',


		);
		$validation = Validator::make($input, $rules, $messages);

		if ($validation->passes())
		{
			$toolname = Accounts::select('account_name')->where('id','=', Input::get('acc_name'))->get();
			foreach ($toolname as $key => $tool) {
				$accName = $tool->account_name;
			}

			//print_r($account_name);
			//exit;
			$employees = new Employee;
	 
	        $employees->emp_id = Input::get('emp_id');
	        $employees->emp_name  =  Input::get('emp_name');
	        $employees->acc_id  =  Input::get('acc_name');
	        $employees->tool_name = Input::get('tool_name');
	        $employees->access = Input::get('access');
	       
	        $employees->save();
 
        	return Redirect::to('/employees');
        }
        else
        {
        	return Redirect::to('/employees/create')->withErrors($validation);
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
		$employees = Employee::where('emp_id', '=', $id)->select('tools.emp_id as id', 'tools.emp_name as emp_name', 'tools.access as access','tools.tool_name as tool_name')->get();
		// echo "<pre>";
		// print_r($employees);
		// exit;

		$manager_id = Session::get('manager_id');

		// print_r($manager_id);
		// exit;

		$tools = Accounts::join('managers','managers.id', '=', 'accounts.manager_id')->select('accounts.account_name as name', 'accounts.id as id' )->where('accounts.manager_id', '=', $manager_id)->lists('name','id');

		$access = array(0 =>'No Access', 1 =>'Access');
 
        return View::make('manager.employees.edit', [ 'employees' => $employees,'tools' => $tools, 'access' => $access]);
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

		$rules = array( 'tool_name' =>'required','acc_name' =>'required','emp_id' =>'required','emp_name' =>'required','access' =>'required');
		
		$messages = array(
			'tool_name.required' => 'Tool  Name is required !',
			'emp_id.required' => 'Employee ID is required !',
			'emp_name.required' => 'Employee Name is required !',
			'access.required' => 'Please select an accesibility !',


		);
		$validation = Validator::make($input, $rules, $messages);

		if ($validation->passes())
		{
			$toolname = Accounts::select('account_name')->where('id','=', Input::get('acc_name'))->get();
			foreach ($toolname as $key => $tool) {
				$accName = $tool->account_name;
			}

			$employees = Employee::where('emp_id', '=', $id)->select('tools.emp_id as id', 'tools.emp_name as emp_name','tools.acc_id as acc_id', 'tools.access as access','tools.tool_name as tool_name')->get();
	 		$employees->emp_id = Input::get('emp_id');
	        $employees->emp_name  =  Input::get('emp_name');
	        $employees->acc_id  =  Input::get('acc_name');
	        $employees->tool_name = Input::get('tool_name');
	        $employees->access = Input::get('access');
	  		
	        //$employees->save();
 			DB::table('tools')
            ->where('emp_id', $id)
            ->update(array('emp_name' => $employees->emp_name,'acc_id' => $employees->acc_id,'tool_name' => $employees->tool_name,'access' => $employees->access));
	 
	        return Redirect::to('/employees');
	    }

	    else
        {
        	return Redirect::to('/employees/'.$id.'/edit')->withErrors($validation);
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
		//Employee::destroy($id);
		DB::table('tools')->where('emp_id', '=', $id)->delete();
		
		return Redirect::to('/employees');	
	}
}
