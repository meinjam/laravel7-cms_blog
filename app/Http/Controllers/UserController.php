<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Profile;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index()
    {
        $users = User::with('profile')->get();
        // return response()->json($users);
        return view('admin.users.index', compact('users'));

        // $users = DB::table('users')
        //     ->join('profiles', 'users.id', 'profiles.user_id')
        //     ->select('users.*', 'profiles.avatar')
        //     ->get();
        // return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:4|max:25',
            'email' => 'required|email',
        ];

        $this->validate($request, $rules);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt('password');
        $user->save();

        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->avatar = 'img/avatar/user.jpg';
        $profile->save();
        // $profile = Profile::create([
        //     'user_id' => $user->id,
        //     'avatar' => 'img/avatar/user.jpg',
        // ]);

        return redirect()->route('all.users')->with('success','User added successfully.');
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
    public function destroy($id)
    {
        $user = User::find($id);
        $user->profile->delete();
        $user->delete();
        return redirect()->route('all.users')->with('success','User deleted successfully.');
    }

    public function admin($id)
    {
        $user = User::findOrFail($id);
        $user->admin = 1;
        $user->save();
        return redirect()->route('all.users')->with('success','User permissions changed successfully.');
    }

    public function notadmin($id)
    {
        $user = User::findOrFail($id);
        $user->admin = 0;
        $user->save();
        return redirect()->route('all.users')->with('success','User permissions changed successfully.');
    }
}
