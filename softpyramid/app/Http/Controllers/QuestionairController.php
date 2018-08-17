<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Questionair;
use Auth;
class QuestionairController extends Controller
{
       /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the Questionair Listing.
     *
     */
    public function index()
    {
	
	    $questionairModel = new \App\Questionair();
		$data = $questionairModel->with('usersInfo')->get();

        return view('questionair/index',  ["data"=>$data]);
    }
	
	
	/**
     * Show Questionair Form
     */
    public function create()
    {
        return view('questionair/create');
    }
	
	
	   /**
     * Store a newly created questionair in database.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function save(Request $request)
    {
		if (Auth::check())
			{
			$user_id = \Auth::user()->id;
			}

		$request_data = $request->all();
		
        $QuestionairModel = new Questionair([
          'name' => $request->get('name'),
          'total_questions' => $request->get('total_questions'),
		  'duration' => $request->get('duration').$request->get('duration_type'),
		  'resumable' => $request->get('is_resume'),
		  'ispublish' => $request->get('is_publish'),
		  'user_id' => $user_id
		  
        ]);

        $QuestionairModel->save();
        return redirect('/questionair');
    }
	/**
     * Loads a Edit Form with data
     *
     * @param  questionair id
     */
	
	public function edit($id)
	{
		$QuestionairModel = Questionair::find($id);
		
		 return view('questionair/create',['data'=>$QuestionairModel] );

	}
	/**
     * Soft Delete Funtionaity 
     *
     * @param  questionair id
     */
	
	public function destroy($id)
	{
		$QuestionairModel = Questionair::findOrFail($id);
	
		$QuestionairModel->delete();
	
		return redirect('/questionair');
	}
	
	/**
     * Update Records
     *
     * @param  questionair id
     */
	public function update(Request $request, $id)
    {
		if (Auth::check())
			{
			$user_id = \Auth::user()->id;
			}

		$request_data = $request->all();
        
		 $data = [
          'name' => $request->get('name'),
          'total_questions' => $request->get('total_questions'),
		  'duration' => $request->get('duration').$request->get('duration_type'),
		  'resumable' => $request->get('is_resume'),
		  'ispublish' => $request->get('is_publish')
		  
        ];

        Questionair::where("id", $id)->update($data);
		
        return redirect('/questionair');
    }
}
