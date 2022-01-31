<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\DetailUser;
use App\Models\UserRole;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $mentor = User::where('user_role_id', 2)->get();
        // $status = WebinarStatus::where('id', $webinar['status_id'])->first();
        return view('pages.admin.mentor.index', compact('mentor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $user_role = UserRole::all();
        return view('pages.admin.mentor.create');
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
            'name' => 'required|max:255',
            // 'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'user_role_id' => 'required',
            'password' => 'required|min:3|max:255',
            'email_verified_at' => date('Y-n-d H:i:s', time()),
            
        ]);
        // password hash enskripsi
        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['email_verified_at'] = date('Y-n-d H:i:s', time());
        // dd('register berhasil');
        $user = User::create($validatedData);
        
                // add to detail users
                        $detail_user = new DetailUSer;
                        $detail_user->users_id = $user->id;
                        $detail_user->photo = NULL;
                        $detail_user->role = 'Mentor';
                        $detail_user->contact_number = NULL;
                        $detail_user->address = NULL;
                        $detail_user->biography = NULL;
                        $detail_user->save();
        
        // toast untuk sweetalert
        toast()->success('Create Mentor has been success');
        return redirect()->route('admin.mentor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $mentor)
    {
        return view('pages.admin.mentor.detail', compact('mentor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $mentor)
    {
        return view('pages.admin.mentor.edit', compact('mentor'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $mentor,DetailUser  $detail_user)
    {
        
            User::destroy($mentor->id);
            

        toast()->success('Deleted has been success');
        return redirect()->route('admin.mentor.index');
    }
}
