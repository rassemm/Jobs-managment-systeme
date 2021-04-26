<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\user;
use App\Job;
use App\Categories;
use Illuminate\Http\Request;

class JobController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware(['permission:create job|edit job|delete job']);

  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $jobs = job::with('user')->latest()->paginate(5);
       // toastr()->success('Data has been saved successfully!');
        return view('job.index',compact('jobs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Categories::all();
        return view ('job.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   
            $request->validate ([
                'titre'=>'required',
                'description'=>'required',
                'salaire'=>'required',
                'end_date'=> 'required'
                ]);
                $user = auth()->user();
                $job = new Job();
                $job->titre= $request->input('titre');
                $job->description   = $request->input('description');
                $job->salaire = $request->input('salaire');
                $job->end_date = $request->input('end_date');
                $job->user_id = $user->id;
                
                $job->save();
                $job->user_id = $user->id;
              
              notify()->success('Data has been saved successfully!');
                return redirect()->route('job.index');
                            
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
      //  $job = Job::with('user')->find($id);
        // $users = User::whereHas('events', function($q) use($event){
        //   $q->whereIn('event_id', [$event->id]);
        // })->get()->map(function ($item, $key) use($id){
        //   $item->status = DB::select('select * from event_user where event_id = :id and user_id= :uid', ['id' => $id,'uid' => $item->id])[0]->status;
        //   return $item;
        // });
        
        return view('job.show',compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::find($id);
        $users = User::whereHas('jobs', function($q) use($job){
          $q->whereIn('job_id', [$job->id]);
        })->get()->map(function ($item, $key) use($id){
          $item->status = DB::select('select * from job_user where job_id = :id and user_id= :uid', ['id' => $id,'uid' => $item->id])[0]->status;
          return $item;
        });
        return view('job.edit',compact('job','users'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate ([
            'titre'=>'required',
           'description'=>'required',
          'salaire'=>'required',
                 'end_date'=> 'required'
            ]);
            $user = auth()->user();
               $job =Job::find($id);
               $job->titre     = $request->input('titre');
               $job->description   = $request->input('description');
               $job->salaire = $request->input('salaire');
               $job->end_date = $request->input('end_date');
               $job->user_id = $user->id;
               $job->save();
                $job->user_id = $user->id;
                notify()->info('Data has been Update successfully!');

            //$job->update($request->all());
            return redirect()->route('job.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job = Job::find($id);
        if($job){
            $job->delete();
        }
        notify()->danger('Data has been saved successfully!');

        return redirect()->route('job.index');
    }
    public function subscribe($id){
        auth()->user()->jobs()->attach($id);
        drakify('success');
        notify()->success('Data has been subscribe successfully!');
        return redirect()->back();
      }
      public function remove($id,$uid){
        User::find($uid)->jobs()->detach($id);
        drakify('success');
        return redirect()->route('dachboard.dash');
      }
      public function approve($uid,$id){
       
        DB::update('update job_user set status = "approved" where job_id = :id and user_id= :uid', ['id' => $id,'uid' => $uid]);
        //notify()->succes('User has approve successfully!');

        return redirect()->back();      }
      public function unapprove($uid,$id){
        DB::update('update job_user set status = "unapproved" where job_id = :id and user_id= :uid', ['id' => $id,'uid' => $uid]);
        return redirect()->back();
      }
      public function myJobs(){
        $jobs= Job::whereHas('user', function($q){
          $q->whereIn('user_id', [auth()->user()->id]);
        })->get()->map(function ($item, $key){
          $item->status = DB::select('select * from job_user where job_id = :id and user_id= :uid', ['id' => $item->id,'uid' => auth()->user()->id])[0]->status;
          return $item;
        });
        return view('job.list', ['jobs' => $jobs]);
    }
}
