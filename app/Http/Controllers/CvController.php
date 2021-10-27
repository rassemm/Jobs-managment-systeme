<?php

namespace App\Http\Controllers;
use App\Cv;
use App\user;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use PDF;
class CvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $cvs = Cv::with('user')->where("user_id","=",$user->id)->latest()->paginate(5);
        return view('cv.index',compact('cvs','user'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return view ('cv.create');
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
                'nom'            => 'required|min:8|max:10',
                'prenom'         => 'required|min:8|max:10',
                'date_b'         =>  'required',
                'email'          =>  'required|email',
                'phone'          => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
                'adresse'        => 'required|min:8|max:60',
                'diplome'        => 'required|min:8|max:60',
                'description'    => 'required|min:60|max:250',
                'experience'     => 'required|min:8|max:60',
                'desc'           => 'required|min:60|max:250'
                         ]);
         $user = auth()->user();
         $cv = new Cv();
         $cv->nom= $request->input('nom');
         $cv->prenom= $request->input('prenom');
         $cv->date_b= $request->input('date_b');
         $cv->email= $request->input('email');
         $cv->phone= $request->input('phone');
         $cv->adresse= $request->input('adresse');
         $cv->diplome= $request->input('diplome');
         $cv->experience= $request->input('experience');
         $cv->description   = $request->input('description');
         $cv->logo = $request->logo;
                  if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('/storage');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            $cv->logo= $name;
        }
        $cv->desc = $request->input('desc');
        $cv->user_id = $user->id;
        $cv->save();
        $cv->user_id=$user->id;
        toastr()->success('Data has been saved successfully!');
         return redirect()->route('cv.index');
    }
    public function show($id)
    {
        $cv = Cv::find($id);
        return view('cv.show',compact('cv'));

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cv = Cv::find($id);
        return view('cv.edit',compact('cv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate ([
            'nom'            => 'required|min:8|max:10',
            'prenom'         => 'required|min:8|max:10',
            'date_b'         =>  'required',
            'email'          =>  'required|email',
            'phone'          => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            'adresse'        => 'required|min:8|max:60',
            'diplome'        => 'required|min:8|max:60',
            'description'    => 'required|min:60|max:250',
            'experience'     => 'required|min:8|max:60',
            'desc'           => 'required|min:60|max:250'
                     ]);
         $user = auth()->user();
         $cv = Cv::find($id);
         $cv->nom= $request->input('nom');
         $cv->prenom= $request->input('prenom');
         $cv->date_b= $request->input('date_b');
         $cv->email= $request->input('email');
         $cv->phone= $request->input('phone');
         $cv->adresse= $request->input('adresse');
         $cv->diplome= $request->input('diplome');
         $cv->experience= $request->input('experience');
         $cv->description   = $request->input('description');
         $cv->logo = $request->logo;
         if ($request->hasFile('logo')) {
                $image = $request->file('logo');
                $name = $image->getClientOriginalName();
                $destinationPath = public_path('/storage');
                $imagePath = $destinationPath. "/".  $name;
                $image->move($destinationPath, $name);
                $cv->logo= $name;
                     }
        $cv->desc = $request->input('desc');
        $cv->user_id = $user->id;
        
        $cv->save();
        $cv->user_id=$user->id;
        toastr()->warning('Data has been updated successfully!');

         return redirect()->route('cv.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cv= Cv::find($id);
        if($cv){
            $cv->delete();
        }
        toastr()->error('Data has been deleted successfully!');
        return redirect()->route('cv.index');
    }
    public function downloadPDF() {
     $cvs = Cv::get();
    $pdf = PDF::loadView('pdf', compact('cvs'))->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
     // return $cvs;
        return $pdf->download('cv.pdf');
   }

}
