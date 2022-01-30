<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use File;
use Auth;

use App\Models\Webinar;
use App\Models\WebinarStatus;
use App\Models\ThumbnailWebinar;

class WebinarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webinar = Webinar::where('users_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('pages.admin.webinar.index', compact('webinar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.webinar.create');
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
            'title' => 'required|string|max:255',
            'instructors' => 'required|string|max:255',
            'slug' => 'required|unique:webinar',
            'description' => 'required',
            'photo' => 'image|file|max:3024',
            'kuota' => 'required|integer|max:100',
            'tanggal' => 'required|max:100',
            'waktu' => 'required|max:100',
            'note' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'information' => 'required|string|max:255',
        ]);
        // pengkondisian image untuk mengisi foto random ketika user tidak meng uplod fto
        if($request->file('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('assets/webinar', 'public');
        }

        $validatedData['users_id'] = auth()->user()->id;
        Webinar::create($validatedData);

        // toast untuk sweetalert
        toast()->success('Save has been success');
        return redirect()->route('admin.webinar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.admin.webinar.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Webinar $webinar)
    {
        $webinarStatus = WebinarStatus::all();
        return view('pages.admin.webinar.edit', compact('webinar', 'webinarStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Webinar $webinar)
    {
        $rules = [
            'status_id' => 'required',
            'title' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'description' => 'required'
        ];

        $validatedData = $request->validate($rules);

        // Add to thumbnail service
        if ($request->hasfile('thumbnail')) {
            foreach ($request->file('thumbnail') as $file) {
                $path = $file->store('assets/webinar/thumbnail', 'public');

                $thumbnail_webinar = new ThumbnailWebinar;
                $thumbnail_webinar->webinar_id = $webinar['id'];
                $thumbnail_webinar->thumbnail = $path;
                $thumbnail_webinar->save();
            }
        }

        
        $validatedData['users_id'] = auth()->user()->id;
        Webinar::where('id', $webinar->id)->update($validatedData);

        toast()->success('Update has been succes');
        return redirect()->route('admin.webinar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Webinar $webinar)
    {
        Webinar::destroy($webinar->id);

        toast()->success('Deleted has been success');
        return redirect()->route('admin.webinar.index');
    }
}
