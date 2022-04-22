<?php

namespace App\Http\Controllers;

use Mail;
use SessionSessionSessionSession;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use App\Models\Job;
use App\Models\User;
use App\Models\Uimage;
use App\Models\UserSubscriber;

use App\Helpers\SMSPanel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('Home/home');
    }

    public function about()
    {
        return view('Home/about');
    }

    public function faq()
    {
        return view('Home/faq');
    }

    public function contact()
    {
        return view('Home/contact');
    }

    public function signup()
    {
        if (Auth::check()) {
            return redirect()->back();
        }

        return view('auth/signup');
    }

    public function signup_company()
    {
        if (Auth::check()) {
            return redirect()->back();
        }

        $states = \DB::table('states')
            ->where('country_id', 101)
            ->get();

        return view('auth/employer/signup-company', compact('states'));
    }

    public function signup_consultant()
    {
        if (Auth::check()) {
            return redirect()->back();
        }

        $states = \DB::table('states')
            ->where('country_id', 101)
            ->get();

        return view('auth/employer/signup-consultant', compact('states'));
    }

    public function signup_person()
    {
        if (Auth::check()) {
            return redirect()->back();
        }

        $states = \DB::table('states')
            ->where('country_id', 101)
            ->get();
        return view('auth/employer/signup-person', compact('states'));
    }

    public function signup_jobs()
    {
        if (Auth::check()) {
            return redirect()->back();
        }

        return view('auth/jobs/signup-jobs');
    }

    public function company(Request $request)
    {
        $validator = [
            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users',
            'mobile_number' => 'required|numeric|digits:10|unique:users',
            'state' => 'required',
            'city' => 'required',
            'password' => 'required|same:confirm_password',
            'confirm_password' => 'required|same:password',
        ];

        if ($request->user_type == 0) {
            $validator['company_name'] = 'required';
            $validator['web-site'] = 'required';
        }

        $request->validate($validator);

        $request->request->add(['password' => Hash::make($request->password)]);
        User::create($request->all());

        /* Send Email */
        $data['mail_to'] = $request->email;
        $data['user_detail'] = $request->all();
        $data['mail_subject'] = "kaamindia - Email Verification";
        Mail::send('emails.email_verification_individual', $data, function ($message) use ($data) {
            $message->to($data['mail_to'])->subject($data['mail_subject']);
            $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        });
        return redirect('employer-login')->withSuccess('You have successfully register.');
    }

    public function consultant_registration(Request $request)
    {
        $validator = [
            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users',
            'mobile_number' => 'required|numeric|digits:10|unique:users',
            'state' => 'required',
            'city' => 'required',
            'password' => 'required|same:confirm_password',
            'confirm_password' => 'required|same:password',
        ];

        if ($request->user_type == 4) {
            $validator['company_name'] = 'required';
            $validator['web-site'] = 'required';
        }

        $request->validate($validator);

        $request->request->add(['password' => Hash::make($request->password)]);
        User::create($request->all());

        /* Send Email */
        $data['mail_to'] = $request->email;
        $data['user_detail'] = $request->all();
        $data['mail_subject'] = "kaamindia - Email Verification";
        Mail::send('emails.email_verification_individual', $data, function ($message) use ($data) {
            $message->to($data['mail_to'])->subject($data['mail_subject']);
            $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        });
        return redirect('employer-login')->withSuccess('You have successfully register.');
    }

    public function job(Request $request)
    {
		
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile_number' => 'required|numeric|digits:10|unique:users',
            'email' => 'required|email:rfc,dns|unique:users',
            'adharcard_number' => 'required|numeric|digits:12',
            'proofid_number' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'job_profile' => 'required',
            'skills' => 'required',
            'job_city' => 'required',
            'education' => 'required',
            'job_working' => 'required',
            'currently_working' => 'required',
            'job_time' => 'required',
            'salary' => $request->job_working == "Fresher" ? '' : 'required',
            'language' => 'required',
        ]);		

        $request->request->add(['user_type' => 2]);
        $request->request->add(['skills' => implode(",", $request->skills)]);
        $request->request->add(['password' => Hash::make('987456123')]);
		
        $id = User::create($request->all())->id;

        $image_name = "";
        $resume_name = "";

        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $data['u_id'] = $id;
            $path = public_path('/assets/photo/pic');
            $image_name = time() . '.' . $image->extension();
            $image->move($path, $image_name);
        }

        if ($request->hasfile('upload_resume')) {
            $upload_resume = $request->file('upload_resume');
            $val['u_id'] = $id;
            $path = public_path('/assets/photo/resume');
            $resume_name = time() . '.' . $upload_resume->extension();
            $upload_resume->move($path, $resume_name);
        }

        if ($image_name != "" || $resume_name != "") {
            $data['image'] = $image_name;
            $data['resume'] = $resume_name;
            Uimage::create($data);
        }

        return redirect('job-login')->withSuccess('You have successfully register.');
    }

    public function login_as_employer_or_jobseeker()
    {
        if (Auth::check()) {
            return redirect()->back();
        }
        return view("auth/login-as-employer-or-jobseeker");
    }

    public function employer_login()
    {
        if ((Auth::check() && (isset(auth()->user()->user_type) && auth()->user()->user_type == '0')) || (isset(auth()->user()->user_type) && auth()->user()->user_type == '1')) {
            return redirect()->back();
        }
        return view("auth/employer/employer-login");
    }

    public function job_login()
    {
        if (Auth::check() && (isset(auth()->user()->user_type) && auth()->user()->user_type == '2')) {
            return redirect()->back();
        }
        return view("auth/jobs/job-login");
    }

    public function empcheck(Request $request)
    {
        if (
            Auth::attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => 0]) ||
            Auth::attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => 1]) ||
            Auth::attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => 4])
        ) {
            return redirect("/employer-dashboard")->withSuccess('You have Successfully loggedin');
        }
        return redirect("/employer-login")->with('error', 'E-Mail Id and Password Invalid');
    }

    public function jobcheck(Request $request)
    {
        $request->validate([
            'mobile_number' => 'required',
        ]);

        $user = User::whereMobileNumber($request->mobile_number)
            ->whereUserType(2)
            ->first();

        if (!empty($user)) {
            $sms_token = $this->get_sms_token(4);
            $response = SMSPanel::sentOTP($user->mobile_number, $sms_token);
            if ($response = json_decode($response, true)) {
                if ($response["status"] == "success") {
                    $data['verify_otp'] = $sms_token;
                    User::whereId($user->id)->update($data);
                    Session::flash('flash_message', 'OTP send Successfully!!');
                    return view("auth/jobs/verify_job_otp", compact('user'));
                } else {
                    return back()->with('error', 'Something went wrong sms function. Please try again.');
                }
            } else {
                return back()->with('error', 'Something went wrong sms function. Please try again.');
            }
        }
        return back()->with('error', 'Wrong mobile number.');
    }

    public function verify_job_otp(Request $request)
    {
        $verify_otp = implode("", $request->verify_otp);
        $user = User::whereMobileNumber($request->mobile_number)
            ->whereVerifyOtp($verify_otp)
            ->first();

        if (!empty($user)) {
            // $credentials = ["email" => $user->email, "password" => "987456123"];
            // Auth::attempt($credentials);
            Auth::loginUsingId($user->id);

            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }

    public function forget_password()
    {
        return view("auth/employer/forget_password");
    }

    public function submit_forget_password(Request $request)
    {
        $user = User::whereEmail($request->email)->first();

        if (empty($user)) {
            return redirect('/forget_password')->with("error", "Email address not found.");
        } else {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $password = substr(str_shuffle($chars), 0, 8);
            $user_arr = [
                "password" => Hash::make($password),
            ];
            User::whereId($user->id)->update($user_arr);

            $details = [
                'email' => $user->email,
                'password' => $password,
            ];

            \Mail::to($user->email)->send(new \App\Mail\ForgetPassword($details));

            return redirect('/employer-login')->with("success", "Check your email address.");
        }
    }

    public function check_email_exists_in_users(Request $request)
    {
        $id = '';
        if (Auth()->user()) {
            $id = Auth()->user()->id;
        }

        if ($id != "") {
            $rules = [
                'email' => 'required|email|unique:users,email,' . $id . ',id',
            ];
        } else {
            $rules = [
                'email' => 'required|email|unique:users,email',
            ];
        }

        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $res = [
                'message' => $validator->errors()->all()[0],
                'status' => 0,
            ];

            return $res;
        }

        $res = [
            'message' => 'success',
            'status' => 1,
        ];

        return $res;
    }

    public function check_mobile_number_exists_in_users(Request $request)
    {
        $id = '';
        if (Auth()->user()) {
            $id = Auth()->user()->id;
        }

        if ($id != "") {
            $rules = [
                'mobile_number' => 'required|numeric|digits_between:10,10|unique:users,mobile_number,' . $id . ',id',
            ];
        } else {
            $rules = [
                'mobile_number' => 'required|numeric|digits_between:10,10|unique:users,mobile_number',
            ];
        }

        $msg = [
            'mobile_number.digits_between' => 'The mobile number must be 10 digits.',
        ];
        $validator = \Validator::make($request->all(), $rules, $msg);
        if ($validator->fails()) {
            $res = [
                'message' => $validator->errors()->all()[0],
                'status' => 0,
            ];

            return $res;
        }

        $res = [
            'message' => 'success',
            'status' => 1,
        ];

        return $res;
    }

    public function get_city_by_state_id(Request $request)
    {
        $cities = \DB::table('cities')
            ->where('state_id', $request->state_id)
            ->get();

        return response()->json($cities);
    }

    public function user_subscriber(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'email' => 'required|email:rfc,dns',
            ]);

            UserSubscriber::create(["email" => $request->email]);

            /* Send Email */
            $data['user_subscriber'] = $request->email;
            $data['mail_to'] = $request->email;
            $data['mail_subject'] = "Kaamindia - User Subscriber";
            Mail::send('emails.user_subscriber', $data, function ($message) use ($data) {
                $message->to($data['mail_to'])->subject($data['mail_subject']);
                $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            });
            Session::flash('flash_message', 'User Subscribe Successfully!!');
            return Redirect('/');
        }
    }

    public function email_verification(Request $request, $email)
    {
        $current_user = User::where("email", base64_decode($email))->first();
        $current_user->email_verified_at = time();
        $current_user->update();

        return view("auth/email_verification");
    }

    public function jobs_frontend(Request $request)
    {
        $request_data = $request->all();
        $user = auth()->user();
        $user_id = '';
        if ($user) {
            $user_id = $user->id;
        }
        $data['all_locations'] = Job::where('job_status', '=', '1')->get();

        // Job Sidebar Filter Action
        if (isset($request_data['action']) && $request_data['action'] == 'filter_jobs' && isset($request_data['pass_filter'])) {
            $main_query = "SELECT * FROM jobs WHERE job_status=1";
            parse_str($request_data['pass_filter'], $parsed);
            $full_query = [];

            if (!empty($parsed)) {
                foreach ($parsed as $key => $single) {
                    if ($key == 'job_location') {
                        $inner_qry = '';

                        foreach ($single as $n => $item) {
                            $state_city = explode(',', $item);
                            if ($n < count($single) - 1) {
                                $inner_qry .= " city='" . trim($state_city[0]) . "' and state='" . trim($state_city[1]) . "' or ";
                            } else {
                                $inner_qry .= " city='" . trim($state_city[0]) . "' and state='" . trim($state_city[1]) . "'";
                            }
                        }
                        $full_query[] = !empty($inner_qry) ? "(" . $inner_qry . ")" : "";
                    } elseif ($key == 'job_type') {
                        $inner_qry = '';
                        foreach ($single as $n => $item) {
                            if ($n < count($single) - 1) {
                                $inner_qry .= " job_type='" . $item . "' or ";
                            } else {
                                $inner_qry .= " job_type='" . $item . "'";
                            }
                        }
                        $full_query[] = !empty($inner_qry) ? "(" . $inner_qry . ")" : "";
                    } elseif ($key == 'category_input') {
                        $inner_qry = '';
                        foreach ($single as $n => $item) {
                            if ($n < count($single) - 1) {
                                $inner_qry .= " job_role='" . $item . "' or ";
                            } else {
                                $inner_qry .= " job_role='" . $item . "'";
                            }
                        }
                        $full_query[] = !empty($inner_qry) ? "(" . $inner_qry . ")" : "";
                    } elseif ($key == 'salary_input') {
                        $min_sal = ["20000" => "10000", "30000" => "20000", "40000" => "30000"];
                        $inner_qry = '';
                        foreach ($single as $n => $item) {
                            if ($n < count($single) - 1) {
                                $inner_qry .= " (min_salary >='" . $min_sal[$item] . "' and min_salary <'" . $item . "') or (max_salary >='" . $min_sal[$item] . "' and max_salary <'" . $item . "') or ";
                            } else {
                                $inner_qry .= " (min_salary >='" . $min_sal[$item] . "' and min_salary <'" . $item . "') or (max_salary >='" . $min_sal[$item] . "' and max_salary <'" . $item . "') ";
                            }
                        }
                        $full_query[] = !empty($inner_qry) ? "(" . $inner_qry . ")" : "";
                    } elseif ($key == 'job_experience') {
                        $min_age = ["12" => "6", "24" => "12", "36" => "24", "60" => "36", "66" => "60"];
                        $inner_qry = '';
                        foreach ($single as $n => $item) {
                            if ($n < count($single) - 1) {
                                $inner_qry .= " ((min_experience <='" . $min_age[$item] . "' and  max_experience >='" . $item . "') or (max_experience >= '" . $min_age[$item] . "' and max_experience <='" . $item . "'))  or ";
                            } else {
                                $inner_qry .= " ((min_experience <='" . $min_age[$item] . "' and  max_experience >='" . $item . "') or (max_experience >= '" . $min_age[$item] . "' and max_experience <='" . $item . "')) ";
                            }
                        }

                        $full_query[] = !empty($inner_qry) ? "(" . $inner_qry . ")" : "";
                    }
                }
                $full_query[] = "(job_status=1)";
                if (!empty($full_query)) {
                    $where = implode(" and ", $full_query);
                    $main_query = "SELECT * FROM jobs WHERE " . $where;
                }
            }

            $page = 0;
            if (isset($request_data['page']) && !empty($request_data['page'])) {
                $page = $request_data['page'] - 1;
            }

            /*** Add Job Closing data condition ***/
            $current_date = date("Y-m-d");
            $main_query .= " and job_close_date>='$current_date'";

            $start_limit = $page * 8;
            $data['filter_job'] = DB::select($main_query . " order by id DESC limit $start_limit, 8");
            $data['filter_job_count'] = ceil(count(DB::select($main_query)) / 8);
            $filter_url = str_replace("=", "%3D", $request_data['pass_filter']);
            $data['filter_url'] = str_replace('&', '%26', $filter_url);
            $data['parse_in_url'] = $parsed;
            $data['all_locations'] = DB::select($main_query . " order by id DESC");
        }

        // Saved Job Action
        if (isset($request_data['action']) && $request_data['action'] == 'saved_user_job') {
            $job_id = $request_data['job_id'];
            $status = $request_data['is_save_job'];

            $alredy_saved_jobs = UserJob::where('user_id', '=', $user_id)
                ->where('job_id', '=', $job_id)
                ->where('action', '=', 'save_job')
                ->count();
            $ins = [
                "user_id" => $user_id,
                "job_id" => $job_id,
                "created_time" => date("Y-m-d h:i:s"),
                "action" => "save_job",
            ];
            if ($status == 1) {
                if (empty($alredy_saved_jobs)) {
                    DB::table("user_jobs")->insert($ins);
                }
            } else {
                if (!empty($alredy_saved_jobs)) {
                    UserJob::where('user_id', '=', $user_id)
                        ->where('job_id', '=', $job_id)
                        ->where('action', '=', 'save_job')
                        ->delete();
                }
            }
        }

        $pass_saved_jobs = [];
        $get_saved_jobs = [];
        $get_applied_jobs = [];

        if ($user) {
            $get_saved_jobs = UserJob::where('user_id', '=', $user_id)
                ->where('action', '=', 'save_job')
                ->get();
        }

        if (isset($request_data['action']) && $request_data['action'] == 'applied_user_job') {
            $job_id = $request_data['job_id'];

            $auth_user = auth()->user();
            $job_detail = Job::find($job_id);

            $already_applied_jobs = UserJob::where('user_id', '=', $user_id)
                ->where('action', '=', 'applied_job')
                ->where('job_id', '=', $job_id)
                ->count();
            if (empty($already_applied_jobs)) {
                DB::table("user_jobs")->insert([
                    "user_id" => $user_id,
                    "job_id" => $job_id,
                    "created_time" => date("Y-m-d h:i:s"),
                    "action" => "applied_job",
                ]);

                /*** Send Email Start ***/
                $email_data['auth_user'] = $auth_user;
                $email_data['job_detail'] = $job_detail;
                $email_data['mail_to'] = $auth_user->email;
                $email_data['mail_subject'] = "kaamindia- Application for- {$job_detail->job_title}";
                Mail::send('emails.jobseeker_applyforjob_notification', $email_data, function ($message) use ($email_data) {
                    $message->to($email_data['mail_to'])->subject($email_data['mail_subject']);
                    $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
                });
                /*** Send Email End ***/
            }
        }

        $pass_applied_jobs = [];
        if ($user) {
            $get_applied_jobs = UserJob::where('user_id', '=', $user_id)
                ->where('action', '=', 'applied_job')
                ->get();
        }

        foreach ($get_saved_jobs as $single) {
            array_push($pass_saved_jobs, $single->job_id);
        }

        foreach ($get_applied_jobs as $single) {
            array_push($pass_applied_jobs, $single->job_id);
        }

        $data['saved_by_current_user'] = $pass_saved_jobs;
        $data['Job'] = Job::where('job_status', '=', '1')
            ->where('job_close_date', ">=", date("Y-m-d"))
            ->orderBy('id', 'DESC')
            ->paginate(8);
        $data['applied_by_current_user'] = $pass_saved_jobs;

        $data['user_id'] = $user_id;
        $data['request_data'] = $request_data;

        $data['full_count'] = Job::where('job_type', '=', 'Permanent')->count();
        $data['part_count'] = Job::where('job_type', '=', 'Contractual')->count();
        return view('Home/jobs_frontend', $data);
    }

    public function jobs_frontend_detail($job_slug)
    {
        $user = auth()->user();
        $user_id = '';
        $pass_saved_jobs = [];

        $data['applied_job'] = "";
        if ($user) {
            $user_id = $user->id;
        }

        $get_job = Job::where('job_slug', '=', $job_slug)->first();

        if (!empty($user_id) && !empty($get_job) && isset($get_job->id)) {
            $data['applied_job'] = UserJob::join('jobs', 'jobs.id', '=', 'user_jobs.job_id')
                ->where('user_id', '=', $user_id)
                ->where('job_id', '=', $get_job->id)
                ->where('action', '=', 'applied_job')
                ->count();

            $get_saved_jobs = UserJob::where('user_id', '=', $user_id)
                ->where('job_id', '=', $get_job->id)
                ->where('action', '=', 'save_job')
                ->get();

            foreach ($get_saved_jobs as $single) {
                array_push($pass_saved_jobs, $single->job_id);
            }
            $data['saved_by_current_user'] = $pass_saved_jobs;
        }

        $data['tbl_job'] = Job::where(\DB::raw("LOWER(job_slug)"), $job_slug)->first();

        if (empty($data['tbl_job'])) {
            return view(404);
        }
        $data['user_id'] = $user_id;

        return view('Home/jobs_frontend_detail', $data);
    }

    public function jobs_frontend_search(Request $request)
    {
        $user = auth()->user();
        $user_id = '';
        if ($user) {
            $user_id = $user->id;
        }

        $data = $request->input();
        $request_data = $request->all();
        $where = [];
        $pass_saved_jobs = [];
        $get_saved_jobs = [];
        $parsed = [];

        if (isset($request_data['action']) && $request_data['action'] == 'saved_user_job') {
            $job_id = $request_data['job_id'];
            $status = $request_data['is_save_job'];

            $alredy_saved_jobs = UserJob::where('user_id', '=', $user_id)
                ->where('job_id', '=', $job_id)
                ->where('action', '=', 'save_job')
                ->count();
            $ins = [
                "user_id" => $user_id,
                "job_id" => $job_id,
                "created_time" => date("Y-m-d h:i:s"),
                "action" => "save_job",
            ];
            if ($status == 1) {
                if (empty($alredy_saved_jobs)) {
                    DB::table("user_jobs")->insert($ins);
                }
            } else {
                if (!empty($alredy_saved_jobs)) {
                    UserJob::where('user_id', '=', $user_id)
                        ->where('job_id', '=', $job_id)
                        ->where('action', '=', 'save_job')
                        ->delete();
                }
            }
        }
        if ($user) {
            $get_saved_jobs = UserJob::where('user_id', '=', $user_id)
                ->where('action', '=', 'save_job')
                ->get();
        }
        foreach ($get_saved_jobs as $single) {
            array_push($pass_saved_jobs, $single->job_id);
        }
        $data['saved_by_current_user'] = $pass_saved_jobs;

        $data['all_locations'] = Job::where('job_status', '=', 1)->get();
        if (!empty($data['search_job'])) {
            $where[] = "job_title LIKE '%" . $data['search_job'] . "%' ";
        }
        if (!empty($data['search_location'])) {
            $where[] = "city LIKE '%" . $data['search_location'] . "%' or state LIKE '%" . $data['search_location'] . "%'  ";
        }
        if (!empty($data['search_role'])) {
            $where[] = "job_role LIKE '%" . $data['search_role'] . "' ";
        }
        if (isset($request_data['pass_filter'])) {
            parse_str($request_data['pass_filter'], $parsed);
        }
        if (!empty($parsed)) {
            foreach ($parsed as $key => $single) {
                if ($key == 'job_location') {
                    $inner_qry = '';

                    foreach ($single as $n => $item) {
                        $state_city = explode(',', $item);
                        if ($n < count($single) - 1) {
                            $inner_qry .= " city='" . trim($state_city[0]) . "' and state='" . trim($state_city[1]) . "' or ";
                        } else {
                            $inner_qry .= " city='" . trim($state_city[0]) . "' and state='" . trim($state_city[1]) . "'";
                        }
                    }
                    $where[] = !empty($inner_qry) ? "(" . $inner_qry . ")" : "";
                } elseif ($key == 'job_type') {
                    $inner_qry = '';
                    foreach ($single as $n => $item) {
                        if ($n < count($single) - 1) {
                            $inner_qry .= " job_type='" . $item . "' or ";
                        } else {
                            $inner_qry .= " job_type='" . $item . "'";
                        }
                    }
                    $where[] = !empty($inner_qry) ? "(" . $inner_qry . ")" : "";
                } elseif ($key == 'category_input') {
                    $inner_qry = '';
                    foreach ($single as $n => $item) {
                        if ($n < count($single) - 1) {
                            $inner_qry .= " job_role='" . $item . "' or ";
                        } else {
                            $inner_qry .= " job_role='" . $item . "'";
                        }
                    }
                    $where[] = !empty($inner_qry) ? "(" . $inner_qry . ")" : "";
                } elseif ($key == 'salary_input') {
                    $min_sal = ["20000" => "10000", "30000" => "20000", "40000" => "30000"];
                    $inner_qry = '';
                    foreach ($single as $n => $item) {
                        if ($n < count($single) - 1) {
                            $inner_qry .= " (min_salary >='" . $min_sal[$item] . "' and min_salary <'" . $item . "') or (max_salary >='" . $min_sal[$item] . "' and max_salary <'" . $item . "') or ";
                        } else {
                            $inner_qry .= " (min_salary >='" . $min_sal[$item] . "' and min_salary <'" . $item . "') or (max_salary >='" . $min_sal[$item] . "' and max_salary <'" . $item . "') ";
                        }
                    }
                    $where[] = !empty($inner_qry) ? "(" . $inner_qry . ")" : "";
                } elseif ($key == 'job_experience') {
                    $min_age = ["12" => "6", "24" => "12", "36" => "24", "60" => "36", "66" => "60"];
                    $inner_qry = '';
                    foreach ($single as $n => $item) {
                        if ($n < count($single) - 1) {
                            $inner_qry .= " ((min_experience <='" . $min_age[$item] . "' and  max_experience >='" . $item . "') or (max_experience >= '" . $min_age[$item] . "' and max_experience <='" . $item . "'))  or ";
                        } else {
                            $inner_qry .= " ((min_experience <='" . $min_age[$item] . "' and  max_experience >='" . $item . "') or (max_experience >= '" . $min_age[$item] . "' and max_experience <='" . $item . "')) ";
                        }
                    }

                    $where[] = !empty($inner_qry) ? "(" . $inner_qry . ")" : "";
                }
            }
        }
        $where[] = "(job_status=1)";
        if (!empty($where)) {
            $where_q = implode(" and ", $where);
            $main_query = "SELECT * FROM jobs WHERE " . $where_q;
        } else {
            $main_query = "SELECT * FROM jobs where job_status=1";
        }

        $page = 0;
        if (isset($request_data['page']) && !empty($request_data['page'])) {
            $page = $request_data['page'] - 1;
        }
        $start_limit = $page * 8;
        $data['search_job'] = DB::select($main_query . " order by id DESC limit $start_limit, 8");
        $data['search_job_count'] = ceil(count(DB::select($main_query)) / 8);
        $data['request_data'] = $request_data;
        $data['all_locations'] = DB::select($main_query);
        $data['user_id'] = $user_id;

        return view('Home/jobs_frontend_search', $data);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('/');
    }
}