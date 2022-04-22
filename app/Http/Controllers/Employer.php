<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Models\Plan;
use App\Models\UserJob;
use App\Models\Uimage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Employer extends Controller
{
	
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function employereditpost($job_slug)
    {
        $data['tbl_job'] = Job::where(\DB::raw("LOWER(job_slug)"),$job_slug)->first();
        return view('Employer/employer-edit-post',$data);
    }
	
    public function employer_post_job()
    {
        return view('Employer/employer-post-job');
    }
	
    public function frompost(Request $request)
    {
        $user           =   auth()->user();
        $user_id        =   '';
        if($user) $user_id = $user->id;

        $request->validate([
            'job_title'=>'required',
            'job_role'=>'required',
            'job_type'=>'required|in:Permanent,Contractual',
            'job_contractual_type'=>($request->job_type == "Contractual") ? 'required' : "",
            'min_salary'=>'required|numeric',
            'max_salary'=>'required|numeric',
			'salary_type'=>'required|in:Annually,Monthly',
            'company_opening'=>'required',
            'company_working_days'=>'required',
            'start_time'=>'required',
            // 'end_time'=>'required|gt:'.$request->start_time,
            'end_time'=>'required',
            'education'=>'required',
            'experience'=>'required',
            'gender'=> 'required|in:Male,Female,Both,Transgender',
            'skills'=>'required',
            'qualification'=>'required',
            'min_age'=>'required|numeric',
            'max_age'=>'required|numeric',
            'language'=>'required',
            'benefits'=>'required',
            'contact_type'=>'required',
            'business'=>'required',
            'business_name'=>'required',
            'state'=>'required',
            'city'=>'required',
            'company_address'=>'required',
            'name'=>'required',
            'number'=>'required|numeric|digits:10',
            'email'=>'required|email:rfc,dns',
			'job_close_date'=>'required',
        ]);

        $data=$request->input();
        $new_slug = !empty($data['job_title']) ? get_slug($data['job_title']) : '';
		
        Job::create(array(
            "job_title"=>$data['job_title'],
            "job_role"=>$data['job_role'],
            "job_slug"=>$new_slug,
            "work_home"=>$data['wfha'],
            "job_type"=>$data['job_type'],
            "job_contractual_type"=> isset($data['job_contractual_type']) ? $data['job_contractual_type'] : NUll,
            "job_day"=>$data['hdm'],
            "job_duration"=>$data['job_duration'],
            "min_salary"=>$data['min_salary'],
            "max_salary"=>$data['max_salary'],
            "salary_type"=>$data['salary_type'],			
            "company_opening"=>$data['company_opening'],
            "company_job_days"=>$data['company_working_days'],
            "job_time_start"=>$data['start_time'],
            "job_time_end"=>$data['end_time'],
            "company_education"=>$data['education'],
            "experience_custom"=>$data['experience'],
            "min_experience"=>$data['min_experience'],
            "max_experience"=>$data['max_experience'],
            "gender"=>$data['gender'],
            "skills"=>serialize($data['skills']),
            "qualification"=>$data['qualification'],
            "min_age"=>$data['min_age'],
            "max_age"=>$data['max_age'],
            "language"=>serialize($data['language']),
            "benefits"=>$data['benefits'],
            "job_desc"=>$data['job_desc'],
            "candidates_contact"=>$data['contact_type'],
            "business_type"=>$data['business'],
            "company_name"=>$data['business_name'],
            "state"=>$data['state'],
            "city"=>$data['city'],
            "company_address"=>$data['company_address'],
            "con_name"=>$data['name'],
            "con_number"=>$data['number'],
            "con_email"=>$data['email'],
            "job_close_date"=>$data['job_close_date'],
            "job_status"=>0,
            "employer_id"=>$user_id
        ));
        return redirect('inactive-jobs');
    }
	
    public function employer_job_listing($job_slug)
    {
        $user       = auth()->user();
        $user_id    = '';
        if($user) $user_id = $user->id;

        $data['tbl_job'] = Job::where(\DB::raw("LOWER(job_slug)"),$job_slug)->first();

        if(empty($data['tbl_job'])) return view(404);

        
        $data['user_id']    =   $user_id;

        return view('Employer/employer-job-listing',$data);
    }
	
    public function inactive_jobs()
    {

        $user           =   auth()->user();
        $user_id        =   '';
        if($user) $user_id = $user->id;

        $data['company']  =  User::where('id','=',$user_id)->get();
        $data['inactive_job']= Job::orderBy('id','DESC')->where('employer_id',"=",$user_id)->where('job_status','=','0')->paginate(8);
        $data['job_status'] = Job::where('job_status','=','0')->get();
        return view('Employer/inactive-jobs',$data);

    }
    public function employer_dashboard()
    {
        $user           =   auth()->user();
        $user_id        =   '';
        $all_job_ids    = array();

        if($user) $user_id = $user->id;

        $data['account']        = $user;
        $data['the_job']        = Job::orderBy('id','DESC')->paginate(5);
        $data['count']          = Job::where('employer_id',"=",$user_id)->count();
        $data['active_count']   = Job::where('job_status','=',1)->where('employer_id',"=",$user_id)->count();

        $data['inactive_count'] = Job::where('job_status','=',0)->where('employer_id',"=",$user_id)->count();
        $data['activity']       = Job::orderBy('id','DESC')->where('employer_id',"=",$user_id)->first();
        $current_users_job      = Job::where('employer_id',"=",$user_id)->get();

        if(!empty($current_users_job)){

            foreach($current_users_job as $single_job){
                array_push($all_job_ids,$single_job->id);
            }
        }
    
        $data['save_job']       = UserJob::join('users','users.id','=','user_jobs.user_id')->join('jobs','jobs.id','=','user_jobs.job_id')->where('action','=','save_job')->whereIn('job_id',$all_job_ids)->orderBy('user_jobs.id', 'desc')->first();
        $data['applied_job']    = UserJob::join('users','users.id','=','user_jobs.user_id')->join('jobs','jobs.id','=','user_jobs.job_id')->where('action','=','applied_job')->whereIn('job_id',$all_job_ids)->orderBy('user_jobs.id', 'desc')->first();
            $main_arr = array();

            if(!empty($data['activity'])){
                $t = $data['activity']->creation_date;
                array_push($main_arr, array( "html" => '
                                        
                                        <div class="act-img">
                                            <img src="public/assets/images/dashboard/activity/act1.png" alt="">
                                        </div>
                                        <div class="act-text">
                                            
                                            <h6>Your Latest Job Post <a href="'.url('/employer-job-listing').'/'.$data['activity']->job_slug.'">'.$data['activity']->job_title.'</a></h6>
                                            <p>'.time_elapsed_string($data['activity']->creation_date).'</p>
                                            
                                        </div>',
                                        "time" => $t
                        ));
            }
            
            if(!empty($data['save_job'])){
                        array_push($main_arr, array(
                                    "html" => '
                                            <div class="act-img">
                                                <img src="public/assets/images/dashboard/activity/act3.png" alt="">
                                            </div>
                                            <div class="act-text">
                                                <h6>Your Latest Job <a href="'.url('/employer-job-listing').'/'.$data['save_job']->job_slug.'">'.$data['save_job'] ->job_title.'</a> is Save By User '.$data['save_job']->name.'.</h6>
                                                <p>'.time_elapsed_string($data['save_job'] ->created_time).'</p>
                                            </div>',
                                        "time" => $data['save_job']->created_time   
                        ));
            }
            
            if(!empty($data['applied_job'])){
                    array_push($main_arr, array(
                        "html" => '
                                <div class="act-img">
                                    <img src="public/assets/images/dashboard/activity/act1.png" alt="">
                                </div>
                                <div class="act-text">
                                    <h6>Your Resent Job <a href="'.url('/employer-job-listing').'/'.$data['applied_job']->job_slug.'">'.$data['applied_job']->job_title.'</a> Applied By User '.$data['applied_job']->name.'.</h6>
                                    <p>'.time_elapsed_string($data['applied_job']->created_time).'</p>
                                </div>',
                        "time" => $data['applied_job']->created_time       
                        ));
            }
            

            array_multisort(array_map('strtotime',array_column($main_arr,'time')), SORT_DESC, $main_arr);
            $data['main_arr'] = $main_arr;
        return view('Employer/employer-dashboard',$data);
    }
    public function employereditprofile()
    {
        $states = \DB::table('states')->where('country_id', 101)->get();
        $cities = \DB::table('cities')->where('id', auth()->user()->city)->get();
        return view('Employer/employereditprofile', compact('states', 'cities'));
    }
    public function employerviewprofile()
    {
        return view('Employer/employerviewprofile');
    }

    public function employerupdateprofile(Request $request){

        $data = array(
            "name" => $request->name,
            "company_name" => $request->company_name,
            "about_company" => $request->about_company,
            "mobile_number" => $request->mobile_number,
            "email" => $request->email,
            "state" => $request->state_id,
            "city" => $request->city_id,
            "website_url" => $request->website_url,
        );
        User::whereId(auth()->user()->id)->update($data);

        if($request->hasfile('image'))
        {
            $image=$request->file('image');
            $uimages_data['u_id'] = auth()->user()->id;
            $path = public_path('/assets/photo/pic');
            $image_name = time().'.'.$image->extension();
            $image->move($path,$image_name);

            $uimages_data['image'] = $image_name;

            $uimages = Uimage::whereUId(auth()->user()->id)->first();

            if(!empty($uimages) && $uimages->image != ""){
                if(file_exists(public_path('assets/photo/pic/'.$uimages->image))){
                    unlink(public_path('assets/photo/pic/'.$uimages->image));
                }
                Uimage::whereUId(auth()->user()->id)->update($uimages_data);
            } else {
                Uimage::create($uimages_data);
            }

        }

        return redirect('employerviewprofile')->withSuccess('Your profile successfully updated.');
    }

    public function activate_inactive_job($job_slug){
		$job_detail = Job::where("job_slug", $job_slug)->first();
	
		$job_detail->update(['job_status' => 1]);
		Session::flash('flash_message', "'{$job_detail->job_title}' status change inactive to active");
		return redirect('inactive-jobs')->withSuccess('Your profile successfully updated.');
	}
	
    public function active_jobs(){
        
        $user           =   auth()->user();
        $user_id        =   '';
        if($user) $user_id = $user->id;

        $data['company']  =  User::where('id','=',$user_id)->get();
		
        $data['active_job'] = $active_job = Job::where('employer_id',"=",$user_id)
							->where('job_status','=','1')
							->orderBy('id','DESC')
							->paginate(8);

		$apply_candidates = array();
		if($active_job){
			$active_job = $active_job->toArray();	
			$job_ids = array_column($active_job["data"], "id");
			$user_jobs = UserJob::whereIn('job_id', $job_ids)->get();
			if($user_jobs){
				foreach($user_jobs as $user_job){
					$apply_candidates[$user_job->job_id][] = $user_job;
				}
			}
		}
		$data["apply_candidates"] = $apply_candidates;
		
        $data['job_status'] = Job::where('job_status','=','1')->get();
		
        return view('Employer/active-jobs',$data);
    }
	
    public function candidate_job($job_slug){
		
		$data["job_slug"] = $job_slug;
		$job_detail = Job::where("job_slug", $job_slug)->first();
		$data["candidate_details"] = User::join('user_jobs', 'user_jobs.user_id', '=', 'users.id')
									->leftJoin('uimages', 'uimages.u_id', '=', 'users.id')
									->where("user_jobs.job_id", $job_detail->id)
									->orderBy('user_jobs.id','DESC')
									->paginate(8);
		
        return view('Employer/candidate-job',$data);
    }

    public function candidate_detail($job_slug, $user_id){
		
		$data["job_slug"] = $job_slug;
		$data["candidate_detail"] = User::find($user_id);
		$data["umage"] = Uimage::where("u_id", $user_id)->first();;
		
        return view('Employer/candidate-detail', $data);
    }

    public function update_job_post(Request $request,$id)
    {
        $user           =   auth()->user();
        $user_id        =   '';
        if($user) $user_id = $user->id;
        
        $request->validate([
            'job_title'=>'required',
            'job_role'=>'required',
            'job_type'=>'required|in:Permanent,Contractual',
			'job_contractual_type'=>($request->job_type == "Contractual") ? 'required' : "",
            'min_salary'=>'required|numeric',
            'max_salary'=>'required|numeric',
			'salary_type'=>'required|in:Annually,Monthly',
            'company_opening'=>'required',
            'company_working_days'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
            'education'=>'required',
            'experience'=>'required',
            'gender'=> 'required|in:Male,Female,Both,Transgender',
            'skills'=>'required',
            'qualification'=>'required',
            'min_age'=>'required|numeric',
            'max_age'=>'required|numeric',
            'language'=>'required',
            'benefits'=>'required',
            'contact_type'=>'required',
            'business'=>'required',
            'business_name'=>'required',
            'state'=>'required',
            'city'=>'required',
            'company_address'=>'required',
            'name'=>'required',
            'number'=>'required|numeric|digits:10',
            'email'=>'required|email:rfc,dns',
			'job_close_date'=>'required',
            'job_status'=>'required',

        ]);
        $data=$request->input();
		if($request->job_type == "Permanent"){
			unset($data['job_contractual_type']);
		}

        $update=array(
            "job_title"=>$data['job_title'],
            "job_role"=>$data['job_role'],
            "work_home"=>$data['wfha'],
            "job_type"=>$data['job_type'],
            "job_contractual_type"=> isset($data['job_contractual_type']) ? $data['job_contractual_type'] : Null,
            "job_day"=>$data['hdm'],
            "job_duration"=>$data['job_duration'],
            "min_salary"=>$data['min_salary'],
            "max_salary"=>$data['max_salary'],
            "salary_type"=>$data['salary_type'],
            "company_opening"=>$data['company_opening'],
            "company_job_days"=>$data['company_working_days'],
            "job_time_start"=>$data['start_time'],
            "job_time_end"=>$data['end_time'],
            "company_education"=>$data['education'],
            "experience_custom"=>$data['experience'],
            "min_experience"=>$data['min_experience'],
            "max_experience"=>$data['max_experience'],
            "gender"=>$data['gender'],
            "skills"=>serialize($data['skills']),
            "qualification"=>$data['qualification'],
            "min_age"=>$data['min_age'],
            "max_age"=>$data['max_age'],
            "language"=>serialize($data['language']),
            "benefits"=>$data['benefits'],
            "job_desc"=>$data['job_desc'],
            "candidates_contact"=>$data['contact_type'],
            "business_type"=>$data['business'],
            "company_name"=>$data['business_name'],
            "state"=>$data['state'],
            "city"=>$data['city'],
            "company_address"=>$data['company_address'],
            "con_name"=>$data['name'],
            "con_number"=>$data['number'],
            "con_email"=>$data['email'],
            "job_contact_information_type"=>$data['job_contact_information_type'],
            "job_close_date"=>$data['job_close_date'],
            "job_status"=>$data['job_status'],
            "employer_id"=>$user_id
        );
        Job::where('id',$id)->update($update); 
        return redirect('/inactive-jobs')->with('message','Job Update Successfully');
    }
	
    public function employer_delete_post($id)
    {
        $data= Job::find($id);
        $data->delete();
        //return back()->with('message','Job Delete Successfully');
    }
    public function employer_repost_job($id)
    {
        $user           =   auth()->user();
        $user_id        =   '';
        if($user) $user_id = $user->id;

        $repost = Job::where('id',$id)->first();
        $new_slug = !empty($repost->job_title) ? get_slug($repost->job_title) : '';

        $ins=array(
            "job_title"=>$repost->job_title,
            "job_role"=>$repost->job_role,
            "job_slug"=>$new_slug,
            "work_home"=>$repost->work_home,
            "job_type"=>$repost->job_type,
            "job_contractual_type"=>$repost->job_contractual_type,
            "job_day"=>$repost->job_day,
            "job_duration"=>$repost->job_duration,
            "min_salary"=>$repost->min_salary,
            "max_salary"=>$repost->max_salary,
            "salary_type"=>$repost->salary_type,
            "company_opening"=>$repost->company_opening,
            "company_job_days"=>$repost->company_job_days,
            "job_time_start"=>$repost->job_time_start,
            "job_time_end"=>$repost->job_time_end,
            "company_education"=>$repost->company_education,
            "experience_custom"=>$repost->experience_custom,
            "min_experience"=>$repost->min_experience,
            "max_experience"=>$repost->max_experience,
            "gender"=>$repost->gender,
            "skills"=>$repost->skills,
            "qualification"=>$repost->qualification,
            "min_age"=>$repost->min_age,
            "max_age"=>$repost->max_age,
            "language"=>$repost->language,
            "benefits"=>$repost->benefits,
            "job_desc"=>$repost->job_desc,
            "candidates_contact"=>$repost->candidates_contact,
            "business_type"=>$repost->business_type,
            "company_name"=>$repost->company_name,
            "state"=>$repost->state,
            "city"=>$repost->city,
            "company_address"=>$repost->company_address,
            "con_name"=>$repost->con_name,
            "con_number"=>$repost->con_number,
            "con_email"=>$repost->con_email,
            "job_status"=>$repost->job_status,
            "employer_id"=>$repost->employer_id
        );
        Job::create($ins);
       return redirect('/inactive-jobs')->with('message','Job Repost Successfully');
    }

	public function employer_copy_post(Request $request,$job_slug){		
		$data['user_id'] = auth()->user()->id;	
		$data['tbl_job'] = Job::where(\DB::raw("LOWER(job_slug)"),$job_slug)->first();
		echo"<pre>";print_r($data);echo"</pre>";
		// return view('Employer/employer-copy-listing',$data);
	}

    public function subscription_plan(){
        $data['plans'] = Plan::whereStatus(1)->get();
        return view('Employer/subscription_plan',$data);
    }

    public function save_subscription_plan(Request $request, $id){

        $end_date = date('Y-m-d', strtotime("+3 months", strtotime(date("Y-m-d"))));

        $plan_book = array(
            "plan_id" => $id,
            "user_id" => auth()->user()->id,
            "start_date" => date("Y-m-d"),
            "end_date" => $end_date,
            "payment" => ($request->price == 0 ? 1 : 0)
        );

        \DB::table("plan_book")->insert($plan_book);

        return redirect('/subscription_plan')->with('success','Subscription plan buy successfully.');
    }
}
