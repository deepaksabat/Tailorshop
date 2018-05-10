<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();

        return view('admin.interface.slider', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'bold' => 'nullable',
                'small' => 'nullable'
            ]);

         if($request->hasFile('image'))
        {
            $slider['image'] = uniqid().'.'.$request->image->getClientOriginalExtension();
            $request->image->move('assets/images/slider',$slider['image']);
        }
        $slider['bold'] = $request-> bold;
        $slider['small'] = $request-> small;

        Slider::create($slider);

        return back()->with('success', 'New Slide Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slide = Slider::find($id);

        $this->validate($request,
            [
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'bold' => 'nullable',
                'small' => 'nullable'
            ]);

       if($request->hasFile('image'))
        {
            $slide['image'] = uniqid().'.'.$request->image->getClientOriginalExtension();
            $request->image->move('assets/images/slider',$slide['image']);
        }


        $slide['bold'] = $request-> bold;
        $slide['small'] = $request-> small;
        $slide->save();

        return back()->with('success', 'Slide Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();

        return back()->with('success', 'Slider Deleted Successfully!');
    }
}
