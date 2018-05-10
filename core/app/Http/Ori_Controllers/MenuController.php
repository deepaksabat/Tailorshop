<?php

namespace App\Http\Controllers;
use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();

        return view('admin.interface.menu', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.interface.createmenu');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'order' => 'required|unique:menus',
                'content' => 'required'
            ]);

        $page['name'] = $request-> name;
        $page['order'] = $request-> order;
        $page['content'] = $request-> content;


        Menu::create($page);

        return back()->with('success', 'New Menu Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Menu::find($id);

        return view('admin.interface.editmenu', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $page = Menu::find($id);

        $this->validate($request,
            [
                'name' => 'required',
                'order' => 'required|unique:menus,order,'. $page->id,
                'content' => 'required'
            ]);

        $page['name'] = $request->name;
        $page['order'] = $request->order;
        $page['content'] = $request->content;


        $page->save();

        return back()->with('success', 'Menu Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return back()->with('success', 'Deleted Successfully!');
    }
}
