<?php

class ReportController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('reports.index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getData()
	{
		$report = DB::table('reports')->select('id','reports.manager_name as mname','reports.thisweek_percentage as new', 'reports.lastweek_percentage as old')->groupBy('manager_id')->orderBy('created_at','DESC')->get()->toJSON();

		//return $report;
		//return View::make('reports.index', [ 'mname' => $mname, 'new' => $new, 'old' => $old ]);
		//$range = CarbonCarbon::now()->subDays(30);

		$stats = DB::table('orders')
		  ->where('created_at', '>=', $range)
		  ->groupBy('date')
		  ->orderBy('date', 'ASC')
		  ->get([
		    DB::raw('Date(created_at) as date'),
		    DB::raw('COUNT(*) as value')
		  ])
		  ->toJSON();
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
