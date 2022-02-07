<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Service;
use App\Models\Materi;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Materi $materi)
    {
        return view('pages.dashboard.materi.create', compact('materi'));
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
            'service_id' => 'required|integer|max:100',
            'title' => 'required|string|max:255',
            'level_title' => 'required|string|max:255',
            'master_title' => 'required|integer|max:100',
            'url' => 'required|max:100'
        ]);

        // add to advantage service
        foreach ($validatedData['service_id'.'title'.'level_title'.'master_title'.'master_title'.'url'] as $key => $value) {
            $materi = new Materi;
            $materi->service_id = $value;
            $materi->title = $value;
            $materi->level_title = $value;
            $materi->master_title = $value;
            $materi->url = $value;
            $materi->save();
        }

        Materi::create($validatedData);

        // toast untuk sweetalert
        toast()->success('Created Data has been success');
        return redirect()->route('member.service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $service = Service::where('id', $id)->first();
        
        $materi = Materi::where('service_id', $id)->get();

        return view('pages.dashboard.materi.detail', compact('materi', 'service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Materi $materi)
    {
        return view('pages.dashboard.materi.edit', compact('materi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'level_title' => 'required|string|max:255',
            'master_title' => 'required|integer|max:100',
            'url' => 'required|max:100',
        ];

        $validatedData = $request->validate($rules);

        
        Materi::where('id', $id)->update($validatedData);
        toast()->success('Update has been succes');
        return redirect()->route('member.service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Materi::destroy($id);

        toast()->success('Deleted has been success');
        return redirect()->route('member.service.index');
    }
}
