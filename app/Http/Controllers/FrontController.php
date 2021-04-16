<?php

namespace App\Http\Controllers;
use App\Job;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use DB;

class FrontController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::with('user')->where ([
            ['titre','!=', Null],
            [function ($query)use ($request){
                if (($term =$request ->term)) {
                    $query ->orwhere('titre','LIKE','%' .$term . '%')->get();
                }
            }]
        ])
        ->orderBy("id","desc")
        ->paginate(2);
        notify()->success('Data has been saved successfully!');
            //$jobs = Job::with('user')->latest()->paginate(5);
            $jobs= Job::with('user')->where ([
                ['titre','!=', Null],
                [function ($query)use ($request){
                    if (($term =$request ->term)) {
                        $query ->orwhere('titre','LIKE','%' .$term . '%')->get();
                    }
                }]
            ])
            ->orderBy("id","desc")
            ->paginate(2);
            notify()->success('Data has been saved successfully!');
            
        $users = User::all();
        return view('dachboard.dach',compact('posts','jobs','users'))->with('i', (request()->input('page', 1) - 1) * 5);
        ;
    }
   

    
   
}
