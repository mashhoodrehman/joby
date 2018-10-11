<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Auth;
use App\Models\Auth\User;
use Illuminate\Http\Request;
use App\Newspaper;
use App\City;
use App\Category;
use App\JobType;
use App\Qualification;
use App\Add;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $newspapers = Newspaper::all();
        $cities = City::paginate(5, ['*'], 'cities');
        $category = Category::paginate(5, ['*'], 'categories');
        $qualification = Qualification::paginate(5, ['*'], 'qualification');
        $jobType = JobType::paginate(5, ['*'], 'jobtypes');
        $jobs = Add::with('getCity')->where('type' , 'jobs')->paginate(5, ['*'], 'jobs');
        $admissions = Add::with('getCity')->where('type' , 'admissions')->paginate(5, ['*'], 'admissions');
        $tenders = Add::with('getCity')->where('type' , 'tenders')->paginate(5, ['*'], 'tenders');
        return view('frontend.index' , compact('newspapers' , 'cities' , 'category' , 'qualification' , 'jobType' , 'jobs' , 'tenders' , 'admissions'));
    }

    public function updateUser(Request $request){
    	$user = new User;
    	$user->mobile_no = $request->mobile_no;
    	$user->email = $request->email;
    	$user->password = $request->password;
    	$user->save();
    	    if ($user) {
                /*
                 * Add the default site role to the new user
                 */
                $user->assignRole(config('access.users.default_role'));
            }
            return redirect()->back();
    }

    public function calendarView(){
        return view('frontend.calendar-list');
    }

    public function viewSlug($slug , $type , $date , Request $request){
        if($type = "jobs"){
            $type = "jobs";
        }
        else if($type = "adm"){
            $type = "admissions";
        }
        else{
            $type = "tenders";
        }
        $newspaper = Add::whereHas('getNewsPaper' , function($q) use ($slug){
           $q->where('slug' , $slug); 
        })->whereDate('created_at' , $date)->orWhereDate('last_date' , $date)->orWhereDate('apply_by' , $date)->where('type' , $type)->with('getCity')->get();
        $paper = Newspaper::where('slug' , $slug)->first();
        $newspapers = Newspaper::all();
        return view('frontend.date-adds' , compact('paper' , 'newspaper' , 'newspapers'));
    }
    public function jobType($id){
        $newspaper = Add::where('job_type_id' , $id)->get();
        $newspapers = Newspaper::all();
        return view('frontend.jobtype-adds' , compact('newspaper' , 'newspapers'));
    }
    public function cityAdds($id){
        $newspaper = Add::where('city_id' , $id)->get();
        $newspapers = Newspaper::all();
        return view('frontend.city-adds' , compact('newspaper' , 'newspapers'));
    }
    public function QualificationAdds($id){
        $newspaper = Add::where('qualification_id' , $id)->get();
        $newspapers = Newspaper::all();
        return view('frontend.qualification-adds' , compact('newspaper' , 'newspapers'));
    }
    public function CategoryAdds($id){
        $newspaper = Add::where('category_id' , $id)->get();
        $newspapers = Newspaper::all();
        return view('frontend.category-adds' , compact('newspaper' , 'newspapers'));
    }

}
