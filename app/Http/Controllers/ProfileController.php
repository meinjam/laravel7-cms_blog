<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('admin.users.profile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = [
            'name' => 'required|min:4|max:255',
            'email' => 'required|email',
            'avatar' => 'image|max:2000',
            'facebook' => 'url',
            'linkedin' => 'url',
            'instagram' => 'url',
            'about' => 'min:5',
        ];

        $this->validate($request, $rules);

        $user = Auth::user();

        $avatar = $request->file('avatar');
        if ($avatar) {
            $avatarName = 'avatar-' . time() . Str::random(20);
            $extension = strtolower($avatar->getClientOriginalExtension());
            $avatarFullName = $avatarName. '.' .$extension;
            $uploadPath = 'img/avatar/';
            $avatarURL = $uploadPath . $avatarFullName;
            $success = $avatar->move($uploadPath, $avatarFullName);
            $user->profile['avatar'] = $avatarURL;
            $user->profile->save();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile['facebook'] = $request->facebook;
        $user->profile['linkedin'] = $request->linkedin;
        $user->profile['instagram'] = $request->instagram;
        $user->save();
        $user->profile->save();

        $password =$request->password;
        if ($password) {
            $user->password = bcrypt($password);
            $user->save();
        }
        return redirect()->route('my.profile')->with('success','Profile updated successfully.');
        // return response()->json($user);
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
