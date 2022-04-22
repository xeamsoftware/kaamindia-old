<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Admin extends Controller
{

    public function admin_login(){
        if (Auth::check() && auth()->user()->user_type == 3) {
            return redirect()->back();
        }
        return view("auth/admin/admin_login");
    }

    public function check_admin(Request $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => 3])) {
            return redirect("/admin")->withSuccess('You have Successfully loggedin');
        }
        
        return redirect("/admin_login")->with('error', 'Invalid E-Mail Id and Password');

    }
    public function inactive()
    {
        $data['inactive']= Job::orderBy('id','DESC')->where('job_status','=','0')->get();
        return view('Admin/inactive',$data);
    }
    public function active()
    {
        $data['active']= Job::orderBy('id','DESC')->where('job_status','=','1')->get();
        return view('Admin/active',$data);
    }
    public function detail($id)
    {
        $data['tbl_job']    =   Job::where('id',$id)->first();
        return view('Admin/detail',$data);
    }
    public function inactivestatus($id)
    {
        Job::where('id',$id)->update(array('job_status'=>1));
        return back();
    }

    public function users(Request $request){
        $users = User::when($request->has('user_type'), function ($query) use ($request) {
                    $query->where('user_type', $request->user_type);
                })->orderBy('id','DESC')->where('user_type','!=',3)->get();

        return view('Admin/users', compact('users'));
    }

    public function plans(Request $request){
        $plans = Plan::get();

        return view('Admin/plans', compact('plans'));
    }

    public function add_plan(Request $request){
        return view('Admin/add_plan');
    }

    public function save_plan(Request $request){

        Plan::create($request->all());
        return redirect('/plans')->with("success","Plan created successfully.");
    }

    public function edit_plan(Request $request){
        $plan  = Plan::find($request->id);
        return view('Admin/edit_plan', compact('plan'));
    }

    public function update_plan(Request $request, $id){
        
        $plan = array(
            "title" => $request->title,
            "price" => $request->price,
            "description" => $request->description,
            "duration" => $request->duration,
            "status" => $request->status,
        );
        Plan::whereId($id)->update($plan);
        return redirect('/plans')->with("success","Plan updated successfully.");
    }

    public function delete_plan($id){
        $plan = Plan::find($id);
        $plan->delete();
        return redirect('/plans')->with("success","Plan deleted successfully.");
    }
}
