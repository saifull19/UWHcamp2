<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\Profile\UpdateProfileRequest;
use App\Http\Requests\Dashboard\Profile\UpdateDetailUserRequest;

// menyimpan file storage
use Illuminate\Facades\Storage;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

// untuk helper
use File;
use Auth;

// import models
use App\Models\User;
use App\Models\DetailUser;
use App\Models\ExperienceUser;

class ProfilController extends Controller
{

    // jadi function contruk untuk menjalankan contruk terlebih dahulu sebelum menjalankan function" yang lain
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $experience_user = ExperienceUser::where('detail_user_id', $user->detail_user->id)->orderBy('id', 'asc')->get();

        return view('pages.admin.profile.index', compact('user', 'experience_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort('404');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return abort('404');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $experience_user = ExperienceUser::where('detail_user_id', $user->detail_user->id)->orderBy('id', 'asc')->get();

        return view('pages.admin.profile.profile', compact('user', 'experience_user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request_profile, UpdateDetailUserRequest $request_detail_user)
    {
        $data_profile = $request_profile->all();
        $data_detail_user = $request_detail_user->all();

        // get photo user
        $get_photo = DetailUser::where('users_id', Auth::user()->id)->first();

        // delete old file from stirage
        if(isset($data_detail_user['photo'])){
            $data= 'storage/'.$get_photo['photo'];
            if(File::exists($data)){
                File::delete($data);
            }else{
                File::delete('storage/app/public/'.$get_photo['photo']);
            }
        }

        // storre file to storage
        if(isset($data_detail_user['photo'])){
            $data_detail_user['photo'] = $request_detail_user->file('photo')->store('assets/photo', 'public');
        }

        // proses save to user
        $user = User::find(Auth::user()->id);
        $user->update($data_profile);

        // proses save to detail_user
        $detail_user = DetailUser::find($user->detail_user->id);
        $detail_user->update($data_detail_user);

        // proses save to experience
        $experience_user_id = ExperienceUser::where('detail_user_id', $detail_user['id'])->first();
        if(isset($experience_user_id)){

            foreach ($data_profile['experience'] as $key => $value) {
                $experience_user = ExperienceUser::find($key);
                $experience_user->detail_user_id = $detail_user['id'];
                $experience_user->experience = $value;
                $experience_user->save();
            }
        }else {
            // jika id tidak ada maka akan mengadakan penambahan dan mengeksekusi di dlam else, jika id ada makan akan mengeksekusi yang di dalam if
            foreach ($data_profile['experience'] as $key => $value) {
                if (isset($value)) {
                    $experience_user = new ExperienceUser;
                    $experience_user->detail_user_id = $detail_user['id'];
                    $experience_user->experience = $value;
                    $experience_user->save();
                }
            }

        }

        // fungsi atau cara untuk menggunakan sweetalert #toast
        toast()->success('Updated Has been success');
        return redirect()->route('admin.profil.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort('404');
    }

    // custom function
    public function delete()
    {
        // get data user
        $get_user_photo = DetailUser::where('users_id', Auth::user()->id)->first();
        $path_photo = $get_user_photo['photo'];

        // second update value to null
        $data = DetailUser::find($get_user_photo['id']);
        $data->photo = NULL;
        $data->save();

        // delete file photo
        $data = 'storage/'.$path_photo;
        if (File::exists($data)) {
            File::delete($data);
        } else {
            File::delete('storage/app/public/'.$path_photo);

        }
        
        // fungsi atau cara untuk menggunakan sweetalert
        toast()->success('Delete has been success');
        // back = untuk mengembalikan ke path atau menu profile
        return back();
    }

    public function editt()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $experience_user = ExperienceUser::where('detail_user_id', $user->detail_user->id)->orderBy('id', 'asc')->get();

        return view('pages.admin.profile.profile', compact('user', 'experience_user'));
    }
}
