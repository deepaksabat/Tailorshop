<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceFront;
use App\Sericon;

class ServiceFrontController extends Controller
{
    public function show()
    {
    	$service = ServiceFront::find(1);
        if($service == null)
        {
            $default=[
                'heading' => 'Services',
                'details' => 'Details Services',
                'img' => 'services-bg.jpg',
            ];

            ServiceFront::create($default);
        }
        $icons = Sericon::all();	
    	return view('admin.interface.service', compact('service', 'icons'));
    }

    public function update(Request $request, $id)
    {
    	$service = ServiceFront::find($id);

        $this->validate($request, [
            'heading' => 'required',
            'details' => 'required',
            'icon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $service['heading'] = $request-> heading;
        $service['details'] = $request-> details;
        if($request->hasFile('img'))
        {
            $service['img'] = 'services-bg.jpg';
            $request->img->move('assets/images/',$service['img']);
        }

        $service->save();

        return back()->withSuccess('service Details Updated successfully.');
    }
}
