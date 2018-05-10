<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use App\Team;
use Image;
use Illuminate\Support\Facades\Input;


class MemberController extends Controller
{

    public function show()
    {
        
        
        $team = Member::latest()->first();

        if($team == null)
        {
            $default=[
                'name' => 'Md Nazmul Islam',
                'designation' => 'Executive',
                'profile_image'=>'01.jpg'
            ];

            Member::create($default);
        }

        return view('admin.interface.membercreate');
    }

    public function store(Request $request)

    {

        return view('demo');
        $this->validate($request,
            [
                'name' => 'required',
                'designation' => 'required',
                'profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

        if($request->hasFile('profile_image')){

            $member['name']         = $request->name;
            $member['designation']  = $request->designation;
            $imageName =uniqid().'.'.request()->profile_image->getClientOriginalExtension();
            request()->profile_image->move('assets/images/profile', $imageName);
            Image::make(sprintf('assets/images/profile/%s', $imageName))->resize(100, 100)->save();
            $member['profile_image'] = $imageName;
        }


        Member::create($member);

        return back()->with('success', 'New Menu Created Successfully!');
    }

    public function memberUpdate($id)

    {
        $member = Member::find($id);
        return view('admin.interface.memberupdate',compact('member'));

    }

    public function saveUpdate(Request $request)

  {
      return view('demo');
      if($request->hasFile('profile_image')){
          $this->validate($request,
              [
                  'name' => 'required',
                  'designation' => 'required',
                  'profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
              ]);
      }else{
          $this->validate($request,
              [
                  'name' => 'required',
                  'designation' => 'required',
              ]);
      }

      $member = Member::find($request->member_id);

      if($request->hasFile('profile_image')){
          $member['name']         = $request->name;
          $member['designation']  = $request->designation;
          $member = Member::find($request->member_id);
          $imageName =$member->profile_image.'.'.'jpg';
          request()->profile_image->move('assets/images/profile', $imageName);
          Image::make(sprintf('assets/images/profile/%s', $imageName))->resize(100, 100)->save();
          $member['profile_image'] = $imageName;
          $member->save();
      }else{
          $member['name']         = $request->name;
          $member['designation']  = $request->designation;
          $member->save();
      }

        return back()->with('success', 'Member Updated Successfully!');
    }

    public function destroy(Member $member)
    {
        return view('demo');
        $member->delete();

        return back()->with('success', 'Member Deletela Successfully!');
    }
}
