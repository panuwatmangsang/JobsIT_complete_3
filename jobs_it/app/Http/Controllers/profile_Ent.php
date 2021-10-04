<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ent_Profile;
use App\Models\MyJobs;

use Illuminate\Support\Facades\File;

class profile_Ent extends Controller
{
    public function ent_profile()
    {
        $count = MyJobs::query()->count();
        $noti_count = MyJobs::query()->where('a_id', 'LIKE', '2')->count();
        $noti_count_box = MyJobs::join('histories', 'histories.history_id', "=", "my_jobs.history_id")
            ->where('a_id', 'LIKE', '2')
            ->get();

        return view('/ent/ent_profile', compact('count', 'noti_count', 'noti_count_box'));
    }
    // ============================================================================================
    // ============================================================================================

    // add data into database and kibana
    public function add_profile_company(Request $request)
    {

        // insert data into database and kibana

        $request->validate([
            'name_prefix' => 'profile_name_company',
            'profile_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'profile_company_contact' => 'required',
            'profile_company_phone' => 'required',
            'profile_email' => 'required',
            'profile_company_address' => 'required',
            'profile_lat' => 'required',
            'profile_lng' => 'required',
        ]);

        $input = $request->all();

        if ($profile_logo = $request->file('profile_logo')) {
            $destinationPath = 'uploads/profile_logo/';
            $profileImage = date('YmdHis') . "." . $profile_logo->getClientOriginalExtension();
            $profile_logo->move($destinationPath, $profileImage);
            $input['profile_logo'] = "$profileImage";
        }

        Ent_Profile::create($input);

        // $ent_profile = new Ent_Profile;
        // $ent_profile->profile_name_company = $request->profile_name_company;
        // if ($request->hasfile("profile_logo")) {
        //     $file = $request->file("profile_logo");
        //     $extention = $file->getClientOriginalName();
        //     $filename = time() . '.' . $extention;
        //     $file->move(\public_path("uploads/profile_logo/"), $filename);
        //     $ent_profile->profile_logo = $filename;
        // }
        // $ent_profile->profile_company_contact = $request->profile_company_contact;
        // $ent_profile->profile_company_phone = $request->profile_company_phone;
        // $ent_profile->profile_email = $request->profile_email;
        // $ent_profile->profile_company_address = $request->profile_company_address;
        // $ent_profile->profile_lat = $request->profile_lat;
        // $ent_profile->profile_lng = $request->profile_lng;
        // $ent_profile->save();

        return redirect()->route('ent_list_post')->with('success_company_profile', 'สร้างข้อมูลบริษัทเรียบร้อย.');
        // return redirect()->back();

        // ============================================================================================
        // ============================================================================================ 

        // update data fron database and kibana
        // $jobs = JobsSearch::find(1);
        // $jobs->jobs_name_company = "Mangsang";

        // $jobs->save();
        // dd('อัพเดทข้อมูลเรียบร้อย');

        // ============================================================================================
        // ============================================================================================ 

        // delete from database 
        // $jobs = JobsSearch::find(1);

        // $jobs->delete();
        // dd('อัพเดทข้อมูลเรียบร้อย');
    }

    // ============================================================================================
    // ============================================================================================ 


    public function ent_show_profile($profile)
    {
        $profiles = Ent_Profile::find($profile);

        $count = MyJobs::query()->count();
        $noti_count = MyJobs::query()->where('a_id', 'LIKE', '2')->count();
        $noti_count_box = MyJobs::join('histories', 'histories.history_id', "=", "my_jobs.history_id")
            ->where('a_id', 'LIKE', '2')
            ->get();

        return view('ent.ent_show_profile', compact('profiles', 'count', 'noti_count', 'noti_count_box'));
    }

    // ============================================================================================
    // ============================================================================================ 

    public function ent_edit_profile($profile_company_id)
    {
        $profile_edit = Ent_Profile::find($profile_company_id);
        
        $count = MyJobs::query()->count();
        $noti_count = MyJobs::query()->where('a_id', 'LIKE', '2')->count();
        $noti_count_box = MyJobs::join('histories', 'histories.history_id', "=", "my_jobs.history_id")
            ->where('a_id', 'LIKE', '2')
            ->get();

        return view('ent.ent_edit_profile', compact('profile_edit', 'count', 'noti_count', 'noti_count_box'));
    }

    // ============================================================================================
    // ============================================================================================ 

    public function ent_update_profile($profile_company_id, Request $request)
    {
        $profile_edit = Ent_Profile::find($profile_company_id);

        $request->validate([
            'name_prefix' => 'profile_name_company',
            'profile_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'profile_company_contact' => 'required',
            'profile_company_phone' => 'required',
            'profile_email' => 'required',
            'profile_company_address' => 'required',
            'profile_lat' => 'required',
            'profile_lng' => 'required',
        ]);

        $input = $request->all();

        if ($profile_logo = $request->file('profile_logo')) {
            $destinationPath = 'uploads/profile_logo/';
            $profileImage = date('YmdHis') . "." . $profile_logo->getClientOriginalExtension();
            $profile_logo->move($destinationPath, $profileImage);
            $input['profile_logo'] = "$profileImage";
        }

        $profile_edit->update($input);

        // $profile_edit->profile_name_company = $request->profile_name_company;
        // if ($request->hasfile("profile_logo")) {
        //     $destination = 'uploads/profile_logo/' . $profile_edit->logo;
        //     if (File::exists($destination)) {
        //         File::delete($destination);
        //     }
        //     $file = $request->file("profile_logo");
        //     $extention = $file->getClientOriginalName();
        //     $filename = time() . '.' . $extention;
        //     $file->move(\public_path("uploads/profile_logo/"), $filename);
        //     $profile_edit->logo = $filename;
        // }
        // $profile_edit->profile_company_contact = $request->profile_company_contact;
        // $profile_edit->profile_company_phone = $request->profile_company_phone;
        // $profile_edit->profile_email = $request->profile_email;
        // $profile_edit->profile_company_address = $request->profile_company_address;
        // $profile_edit->profile_lat = $request->profile_lat;
        // $profile_edit->profile_lng = $request->profile_lng;

        // $profile_edit->update();

        return redirect()->route('ent_list_post')->with('success_company_profile', 'แก้ไขข้อมูลบริษัทเรียบร้อย.');
    }

    // ============================================================================================
    // ============================================================================================ 

    public function ent_delete_profile($profile_company_id)
    {
        $profiles = Ent_Profile::find($profile_company_id);
        $destination = 'uploads/profile_logo/' . $profiles->profile;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $profiles->delete();
        return redirect()->route('ent_list_post')->with('success_company_profile', 'ลบข้อมูลบริษัทเรียบร้อย');
    }
}
