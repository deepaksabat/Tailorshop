<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logo;
use Image;

class LogoController extends Controller
{
    public function show()
    {
    	$logo = Logo::latest()->first();	

        if($logo == null)
        {
            $default=[
                'logo' => 'logo.png',
                'icon' => 'icon.png'
            ];
            Logo::create($default);
        }   

    	return view('admin.interface.logo', compact('logo'));
    }

    public function updateLogo(Request $request)
    {
        //return $request;
    	$logo = Logo::latest()->first();

        $this->validate($request, [
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'icon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',         
        ]);

        if($request->hasFile('logo'))
        {
            $logo['logo'] = 'logo.png';
            request()->logo->move('assets/images/logo', $logo['logo']);
            Image::make(sprintf('assets/images/logo/%s', $logo['logo']))->save();
            //$request->logo->move('assets/images/logo',$logo['logo']);
        }
        if($request->hasFile('icon'))
        {
            $logo['icon'] = 'icon.png';
            request()->icon->move('assets/images/logo', $logo['icon']);
            Image::make(sprintf('assets/images/logo/%s', $logo['icon']))->save();
        }

        $logo->save();

        return back()->with('success','Logo and Icon Updated successfully.');
    }
}
