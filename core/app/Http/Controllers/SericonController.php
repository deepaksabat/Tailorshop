<?php

namespace App\Http\Controllers;

use App\Sericon;
use Illuminate\Http\Request;

class SericonController extends Controller
{


    
    public function store(Request $request)
    {
        return view('demo');
        $this->validate($request,
            [
                'icon' => 'required',
                'name' => 'required',
                'service_detail' => 'required'
            ]);

        $icon['icon']             = $request->icon;
        $icon['name']             = $request->name;
        $icon['service_detail']   = $request->service_detail;
        Sericon::create($icon);

        return back()->with('success', 'New Service Created Successfully!');
    }


    public function update(Request $request, $id)
    {
        return view('demo');
       $icon = Sericon::find($id);

        $this->validate($request,
            [
               'icon' => 'required',
               'name' => 'required',
               'service_detail' => 'required'
            ]);

        $icon['icon'] = $request-> icon;
        $icon['name'] = $request-> name;
        $icon['service_detail']  = $request->service_detail;


        $icon->save();

        return back()->with('success', 'Service Updated Successfully!');
    }

    public function destroy(Sericon $sericon)
    {
        return view('demo');
       $sericon->delete();

        return back()->with('success', 'Service Deleted Successfully!');
    }
}
