<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\user;
use App\Job;
use App\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Nexmo\Laravel\Facades\Nexmo;
class JobController extends Controller
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
    public function index()
    {
      
        $jobs = job::with('user')->latest()->paginate(5);
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
      
        return view ('job.create');
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
                'titre'       =>'required|min:4|max:20',
                'description' =>'required|min:50',
                'salaire'     =>'required|min:4|max:10',
                'end_date'    => 'required'
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
                toastr()->success('Data has been saved successfully!');

              //notify()->success('Data has been saved successfully!');
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
        'titre'       =>'required|min:4|max:40',
        'description' =>'required|min:50',
        'salaire'     =>'required|min:4|max:10',
        'end_date'    => 'required'
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
               toastr()->warning('Data has been updated successfully!');

            //$job->update($request->all());
            return redirect()->route('job.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);
        if($job){
            $job->delete();
        }

        toastr()->error('Data has been deleted successfully!');

        return redirect()->route('job.index')->with('status','Job deleted successfully');
    }
    public function subscribe($id){
        auth()->user()->jobs()->attach($id);
        toastr()->success('Data has been updated successfully!');
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
    public function send($id)
    {
      
      $request=User::find($id);
     Mail::to( $request->email)->send(new SendMail($request));
     return redirect()->Back();
    }
    public function sendmessage() {

      Nexmo::message()->send([
        'to'   => '14845551244',
        'from' => '16105552344',
        'text' => 'Using the facade to send a message.'
    ]);
      echo "Message send avce succes";
    }

}
