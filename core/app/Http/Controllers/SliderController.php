<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;

class SliderController extends Controller
{
    
    public function index()
    {
        $sliders = Slider::all();

        return view('admin.interface.slider', compact('sliders'));
    }

    public function store(Request $request)
    {
         return view('demo');
        $this->validate($request,
            [
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'bold' => 'nullable',
                'small' => 'nullable'
            ]);

         if($request->hasFile('image'))
        {
            $slider['image'] = uniqid().'.'.'jpg';
            $request->image->move('assets/images/slider',$slider['image']);
        }
        $slider['bold'] = $request-> bold;
        $slider['small'] = $request-> small;

        Slider::create($slider);

        return back()->with('success', 'New Slide Created Successfully!');
    }

    public function update(Request $request, $id)
    {
         return view('demo');
        $slide = Slider::find($id);

        $this->validate($request,
            [
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'bold' => 'nullable',
                'small' => 'nullable'
            ]);

       if($request->hasFile('image'))
        {
            $slide['image'] = uniqid().'.'.'jpg';
            $request->image->move('assets/images/slider',$slide['image']);
        }


        $slide['bold'] = $request-> bold;
        $slide['small'] = $request-> small;
        $slide->save();

        return back()->with('success', 'Slide Updated Successfully!');
    }

    public function destroy(Slider $slider)
    {
         return view('demo');
        $slider->delete();

        return back()->with('success', 'Slider Deleted Successfully!');
    }
}
