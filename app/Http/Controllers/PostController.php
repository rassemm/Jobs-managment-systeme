<?php

namespace App\Http\Controllers;
use App\Post;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use DB;
class PostController extends Controller
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
        $posts = Post::with('user')->latest()->paginate(5);
        return view('Post.index',compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $request->validate ([
                'titre'       =>'required|min:2|max:40',
                'description' =>'required|min:10|max:250',
                'niveau'      =>'required|min:4|max:20',
                'start_date' => 'required',
                'end_date'   => 'required'
            ]);
            $user = auth()->user();
                $post = new Post();
                $post->titre     = $request->input('titre');
                $post->description   = $request->input('description');
                $post->niveau = $request->input('niveau');
                $post->start_date = $request->input('start_date');
                $post->end_date = $request->input('end_date');
                $post->user_id = $user->id;
                $post->save();
                $post->user_id = $user->id;
            toastr()->success('Data has been saved successfully!');

            return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Post $post)
    {

        return view ('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $users = User::whereHas('posts', function($q) use($post){
          $q->whereIn('post_id', [$post->id]);
        })->get()->map(function ($item, $key) use($id){
          $item->status = DB::select('select * from post_user where post_id = :id and user_id= :uid', ['id' => $id,'uid' => $item->id])[0]->status;
          return $item;
        });
        return view ('post.edit',compact('post','users'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
      
      $request->validate ([
        'titre'       =>'required|min:2|max:40',
        'description' =>'required|min:10|max:250',
        'niveau'      =>'required|min:4|max:20',
        'start_date' => 'required',
        'end_date'   => 'required'
    ]);
            $user = auth()->user();
                $post = new Post();
                $post->titre     = $request->input('titre');
                $post->description   = $request->input('description');
                $post->niveau = $request->input('niveau');
                $post->start_date = $request->input('start_date');
                $post->end_date = $request->input('end_date');
                $post->user_id = $user->id;
                $post->save();
                $post->user_id = $user->id;
                toastr()->warning('Data has been updated successfully!');

            return redirect()->route('post.index')->with('status','Job Update successfully');;
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if($post){
            $post->delete();
        }
        toastr()->error('Data has been deleted successfully!');

        return redirect()->route('post.index')->with('status','Post deleted successfully');;
    }
    public function subscribepost($id){
        auth()->user()->posts()->attach($id);
        drakify('success');
        //notify()->success('Data has been subscribe successfully!');
        return redirect()->back();
      }
      public function remove($id,$uid){
        User::find($uid)->posts()->detach($id);
        
        return redirect()->route('dachboard.dash');
      }
      public function approve($uid,$id){
       
        DB::update('update post_user set status = "approved" where post_id = :id and user_id= :uid', ['id' => $id,'uid' => $uid]);
      //  notify()->succes('User has approve successfully!');

        return redirect()->back();      }
      public function unapprove($uid,$id){
        DB::update('update post_user set status = "unapproved" where post_id = :id and user_id= :uid', ['id' => $id,'uid' => $uid]);
        return redirect()->back();
      }
      public function myPosts(){
        $posts= Post::whereHas('user', function($q){
          $q->whereIn('user_id', [auth()->user()->id]);
        })->get()->map(function ($item, $key){
          $item->status = DB::select('select * from post_user where post_id = :id and user_id= :uid', ['id' => $item->id,'uid' => auth()->user()->id])[0]->status;
          return $item;
        });
        return view('post.list', ['posts' => $posts]);
    }
    public function sendpost(Request $request,$id)
    {
      $request=User::find($id);
      Mail::to($request->email)->send(new SendMail($request));

     return redirect()->Back()->with('status','mail send Succecvoly');
    }
}
