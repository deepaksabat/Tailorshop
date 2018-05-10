<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AboutPrice;

class AboutPriceController extends Controller
{
    public function show()
    {
        //return "ok";
        $about_price = AboutPrice::latest()->first();
        if($about_price == null)
        {
            $default=[
                'heading' => 'Price Table',
                'details' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam',
            ];
            AboutPrice::create($default);
        }
        return view('admin.interface.about-price', compact('about_price'));
    }

    public function update(Request $request, $id)
    {
        $about = AboutPrice::find($id);

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
