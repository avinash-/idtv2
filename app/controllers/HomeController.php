<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	// public function showWelcome()
	// {
	// 	return View::make('hello');
	// }


	public function getIndex()
    {
        return View::make('home.index');
    }

    public function postIndex()
    {
        $username = Input::get('username');
        $password = Input::get('password');
 
        if (Auth::attempt(['username' => $username, 'password' => $password]))
        {
             $user = Auth::user();

              Session::put('name', $user->username);
              Session::put('role', $user->role);
              Session::put('manager_id', $user->manager_id);
                if($user->role == 'admin')
                 return Redirect::to('/welcome/admin');
                else

                  return Redirect::to('/manager/'.$user->manager_id.'');
        }
 
        return Redirect::back()
            ->withInput()
            ->withErrors('That Username/Password does not exist.');
    }

    public function dashboard()
    {
        $manager = Manager::all();
        $avg = array();
        foreach ($manager as $key => $man) {
             $avg[$key] = DB::select('SELECT AVG(percentage) as avg FROM (SELECT (SUM(t.access)/(count(*))*100) as percentage, a.id as aid,t.tool_name, a.manager_id as mid,a.account_name as aname,m.manager as Manager FROM accounts a JOIN managers m ON(m.id = a.manager_id) JOIN tools t ON(t.acc_id = a.id)  where m.id = '.$manager[$key]->id.' group by (t.acc_id)) as mavg');
        }       
        
        $colors = array('0' => 'primary', '1' =>'red', '2' => 'green', '3' => 'yellow');
        
        return View::make('admin._main',compact('manager','colors','avg'));
    }

    public function manager($id)
    {
        $manager = Manager::where('id','=',$id)->get();
        $avg = array();
        foreach ($manager as $key => $man) {
             $avg[$key] = DB::select('SELECT AVG(percentage) as avg FROM (SELECT (SUM(t.access)/(count(*))*100) as percentage, a.id as aid,t.tool_name, a.manager_id as mid,a.account_name as aname,m.manager as Manager FROM accounts a JOIN managers m ON(m.id = a.manager_id) JOIN tools t ON(t.acc_id = a.id)  where m.id = '.$manager[$key]->id.' group by (t.acc_id)) as mavg');
        }   
        return View::make('manager.main',compact('manager','avg'));
    }


    public function delete($id)
    {
        $manager = Manager::where('id','=',$id)->get();
        print_r($id);
        exit;
        //Manager::destroy($id);
        return View::make('manager.main',compact('manager','avg'));
    }

    public function getLogin()
    {
        return Redirect::to('/');
    }
 
    public function getLogout()
    {
        Auth::logout();
 
        return Redirect::to('/');
    }
}
