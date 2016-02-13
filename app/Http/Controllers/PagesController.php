<?php namespace App\Http\Controllers;

class PagesController extends Controller{

	public function about()
	{
		$fname = "Simanta";
		$lname = "Ray";

		$people = ['Mithun','Uday','Satyen'];
		/*return view('pages.about')->with([
			  'first' => 'Simanta',
			  'last'  => 'Ray'
			]);*/
		return view('pages.about',compact('fname','lname','people'));
	}
	public function contact()
	{
		return view('pages.contact');
	}
}