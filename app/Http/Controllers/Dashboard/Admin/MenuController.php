<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::all();
        return view('pages.admin.menu.index', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validatedData = $request->validate([
            'nama_menu' => 'required|string|max:255',
            'level_menu' => 'required|string|max:255',
            'master_menu' => 'required|integer|max:100',
            'no_urut' => 'required|integer|max:100',
            'url' => 'required|max:100',
            'icon' => 'required|max:100',
        ]);

        Menu::create($validatedData);

        // toast untuk sweetalert
        toast()->success('Created Data has been success');
        return redirect()->route('admin.menu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        
        return view('pages.admin.menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Menu $menu)
    {
        $rules = [
            'nama_menu' => 'required|string|max:255',
            'level_menu' => 'required|string|max:255',
            'master_menu' => 'required|integer|max:100',
            'no_urut' => 'required|integer|max:100',
            'url' => 'required|max:100',
            'icon' => 'required|max:100',
        ];

        $validatedData = $request->validate($rules);

        
        Menu::where('id', $menu->id)->update($validatedData);
        
       

        toast()->success('Update has been succes');
        return redirect()->route('admin.menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
