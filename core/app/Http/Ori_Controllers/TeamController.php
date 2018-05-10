<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use App\Team;

class TeamController extends Controller
{
    public function show()
    {
        //return "ok";
        $team = Team::latest()->first();
        if($team == null)
        {
            $default=[
                'heading' => 'THE TEAM',
                'details' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam',
            ];

            Team::create($default);
        }

        $members = Member::All();
        return view('admin.interface.team', compact('team','members'));
    }

    public function update(Request $request, $id)
    {
        $about = Team::find($id);

        $this->validate($request, [
            'heading' => 'required',
            'details' => 'required'
        ]);

        $about['heading'] = $request-> heading;
        $about['details'] = $request-> details;

        $about->save();

        return back()->withSuccess('About Details Updated successfully.');
    }
}
