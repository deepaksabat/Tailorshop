<?php

namespace App\Http\Controllers;

use App\Sericon;
use Illuminate\Http\Request;

class SericonController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        $this->validate($request,
            [
                'icon' => 'required',
                'name' => 'required',
                'service_detail' => 'required'
            ]);

        $icon['icon']             = $request->icon;
        $icon['name']             = $request->name;
        $icon['service_detail']   = $request->service_detail;
        //return $icon;
        Sericon::create($icon);

        return back()->with('success', 'New Service Created Successfully!');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sericon  $sericon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sericon  $sericon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sericon $sericon)
    {
       $sericon->delete();

        return back()->with('success', 'Service Deleted Successfully!');
    }
}
