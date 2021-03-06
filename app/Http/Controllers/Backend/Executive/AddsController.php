<?php

namespace App\Http\Controllers\Backend\Executive;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Newspaper;
use App\City;
use App\Category;
use App\JobType;
use App\Qualification;
use App\Add;
use App\ApplyJob;

class AddsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adds = Add::where('created_by' , 'executive')->with('getCity' , 'getNewsPaper' , 'getCategory' , 'getJobType' , 'getQualification')->get();
        return view('backend.executive.index' , compact('adds'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $newspaper = Newspaper::all();
        $qualification = Qualification::all();
        $city = City::all();
        $category = Category::all();
        $jobType = JobType::all();
        return view('backend.executive.create' , compact('newspaper' , 'qualification' , 'city' , 'category' , 'jobType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
        'newspaper_piece' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048',
        'rel_logo' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
        // for multiple file uploads
        // 'photo.*' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
        ]);
        $file      = $validation['newspaper_piece']; // get the validated file
        $extension = $file->getClientOriginalExtension();
        $filename  = 'newspaper-piece-' . time() . '.' . $extension;
        $path      = $file->storeAs('photos', $filename);
        $file      = $validation['rel_logo']; // get the validated file
        $extension = $file->getClientOriginalExtension();
        $filename  = time() . '.' . $extension;
        $path1      = $file->storeAs('photos', $filename);
        $adds = new Add;
        $adds->title = $request->adds_title;
        $adds->company_name = $request->company_name;
        $adds->total_pos = $request->total_pos;
        $adds->company_abbrevation = $request->company_abbrevation;
        $adds->skills = $request->skills;
        $adds->age_limit = $request->age_limit;
        $adds->job_loc = $request->job_loc;
        $adds->gender = $request->gendar;
        $adds->working_hours = $request->work_hours;
        $adds->salary = $request->salary;
        $adds->experience = $request->experience;
        $adds->contact_number = $request->contact_num;
        $adds->address = $request->job_address;
        $adds->job_email = $request->contact_email;
        $adds->newspaper_id = $request->newspaper_id;
        $adds->qualification_id = $request->qualification_id;
        $adds->city_id = $request->city_id;
        $adds->category_id = $request->category_id;
        $adds->job_type_id = $request->job_type_id;
        $adds->type = $request->add_types;
        $adds->minimum_requirements = $request->min_req;
        $adds->apply_by = $request->apply_by;
        $adds->last_date = $request->last_date;
        $adds->description = $request->description;
        $adds->newspaper_piece = $path;
        $adds->rel_logo = $path1;
        $adds->created_by = "executive";
        $adds->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $add = Add::find($id);
        $newspaper = Newspaper::all();
        $qualification = Qualification::all();
        $city = City::all();
        $category = Category::all();
        $jobType = JobType::all();
        // dd($add);
        return view('backend.executive.edit' , compact('newspaper' , 'qualification' , 'city' , 'category' , 'jobType' , 'add'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
        'newspaper_piece' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048',
        'rel_logo' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
        // for multiple file uploads
        // 'photo.*' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
        ]);
        $file      = $validation['newspaper_piece']; // get the validated file
        $extension = $file->getClientOriginalExtension();
        $filename  = 'newspaper-piece-' . time() . '.' . $extension;
        $path      = $file->storeAs('photos', $filename);
        $file      = $validation['rel_logo']; // get the validated file
        $extension = $file->getClientOriginalExtension();
        $filename  = time() . '.' . $extension;
        $path1      = $file->storeAs('photos', $filename);
        $adds = Add::find($id);
        $adds->title = $request->adds_title;
        $adds->company_name = $request->company_name;
        $adds->total_pos = $request->total_pos;
        $adds->company_abbrevation = $request->company_abbrevation;
        $adds->skills = $request->skills;
        $adds->age_limit = $request->age_limit;
        $adds->job_loc = $request->job_loc;
        $adds->gender = $request->gendar;
        $adds->working_hours = $request->work_hours;
        $adds->salary = $request->salary;
        $adds->experience = $request->experience;
        $adds->contact_number = $request->contact_num;
        $adds->address = $request->job_address;
        $adds->job_email = $request->contact_email;
        $adds->newspaper_id = $request->newspaper_id;
        $adds->qualification_id = $request->qualification_id;
        $adds->city_id = $request->city_id;
        $adds->category_id = $request->category_id;
        $adds->job_type_id = $request->job_type_id;
        $adds->type = $request->add_types;
        $adds->newspaper_id = $request->newspaper_id;
        $adds->qualification_id = $request->qualification_id;
        $adds->city_id = $request->city_id;
        $adds->category_id = $request->category_id;
        $adds->job_type_id = $request->job_type_id;
        $adds->type = $request->add_types;
        $adds->minimum_requirements = $request->min_req;
        $adds->apply_by = $request->apply_by;
        $adds->last_date = $request->last_date;
        $adds->description = $request->description;
        $adds->newspaper_piece = $path;
        $adds->rel_logo = $path1;
        $adds->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Add::destroy($id);
        return redirect()->back();
    }

    public function appliedAds(){
        $adds = ApplyJob::with('getAdds.getNewsPaper' , 'getUser')->get();
        return view('backend.executive.addsApplied' , compact('adds'));
    }

    public function AdsStatus($id){
        $apply_job = ApplyJob::find($id);
        if($apply_job->status == "pending"){
        $apply_job->status = "approved";
        }
        else{
         $apply_job->status = "pending";   
        }
        $apply_job->save();
        return redirect()->back();
    }
}

