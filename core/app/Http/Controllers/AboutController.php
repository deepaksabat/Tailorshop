<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;

class AboutController extends Controller
{
    public function show()
    {
    	$about = About::latest()->first();
        if($about == null)
        {
            $default=[
                'heading' => 'About Us',
                'details' => 'Details about us',
            ];
            About::create($default);
        }	
    	return view('admin.interface.about', compact('about'));
    }

    public function update(Request $request, $id)
    {
    	 return view('demo');
        $about = About::find($id);

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
