<?php

namespace App\Http\Controllers;

use App\Models\RoleUsers;
use App\Models\User;
use Exception;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','ASC')->get();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roleUser = RoleUsers::all();
        return view('users.form',compact('roleUser'));
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
        $this->validate($request,[
            'name' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|email:dns',
            'id_role' =>'required',
            'conf_password' => 'required|min:8|same:password',

        ],[
            'name.required' => 'Nama User Wajib Di Isi',
            'email.required' => 'Email Wajib Di Isi',
            'password.required' => 'Password Wajib Di Isi',
            'id_role.required' => 'Role User Wajib Di Isi',
            'password.min' => 'Minimal 8 karakter',
            'conf_password.min' => 'Minimal 8 karakter',
            'password.confirmed' => 'Password tidak sama dengan Confirm Password',
            'conf_password.required' =>'Confirm Password Wajib Di Isi',
            'conf_password.same' =>'Confirm Password Tidak sama dengan Password',
        ]);
        try{
            
            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'id_role'=> $request['id_role'],
                'role_name' =>$request['role_name'],
                'password' => Hash::make($request['password']),

            ]);
            
            return redirect()->route('users.index')->with('message','Data Berhasil Di Simpan');
        }
        catch(Exception $e){
            // return redirect()->back()->withErrors($e->getMessage());
            return 'Message: ' .$e->getMessage();
        }
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
        $roleUser = RoleUsers::all();
        $users = User::find($id);
        return view('users.form_edit',compact(['users','roleUser']));
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
        $this->validate($request,[
            'name' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|email:dns',
            'id_role' =>'required',
            'conf_password' => 'required|min:8|same:password',

        ],[
            'name.required' => 'Nama User Wajib Di Isi',
            'email.required' => 'Email Wajib Di Isi',
            'password.required' => 'Password Wajib Di Isi',
            'id_role.required' => 'Role User Wajib Di Isi',
            'password.min' => 'Minimal 8 karakter',
            'conf_password.min' => 'Minimal 8 karakter',
            'password.confirmed' => 'Password tidak sama dengan Confirm Password',
            'conf_password.required' =>'Confirm Password Wajib Di Isi',
            'conf_password.same' =>'Confirm Password Tidak sama dengan Password',
        ]);
        try{
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->id_role = $request->id_role;
            $user->role_name = $request->role_name;
            $user->password = Hash::make($request->password);
            $user->update();
            
            return redirect()->route('users.index')->with('message','Data Berhasil Di Simpan');
        }
        catch(Exception $e){
            return 'Message: ' .$e->getMessage();
        }
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

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
