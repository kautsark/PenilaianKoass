<?php

namespace App\Http\Controllers;

use App\Models\RoleUsers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class RoleUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $role_user = RoleUsers::all()->sortBy('id_role');
        $role_user = RoleUsers::orderBy('id_role','asc')->get();
        return view('role_user.index',compact('role_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('role_user.form');
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
            'role_name'=>'required',
        ],
    [
            'role_name.required' =>'Role Name Masih Kosong',
        ]);
        try
        {
        $role_users = new RoleUsers();
        $role_users->role_name = $request->role_name;
        $role_users->created_by = auth()->user()->name;
        $role_users->save();

        return redirect()->route('role_user.index')->with('message','Data Berhasil Disimpan');
        }
        catch(\Exception $e){
            // return redirect()->back()->with('message','Data Gagal Di Simpan');
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
        $roleID =  Crypt::decrypt($id);
        $role =  RoleUsers::find($roleID);

        return view ('role_user.form_edit',compact('role'));
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
            'role_name'=>'required',
        ],
    [
            'role_name.required' =>'Role Name Masih Kosong',
        ]);
        try
        {
        $roleID  =  Crypt::decrypt($id);
        $role_user =  RoleUsers::find($roleID);
        $role_user->role_name = $request->role_name;
        $role_user->updated_by = auth()->user()->name;
        $role_user->updated_at = Carbon::now();
        $role_user->update();

        return redirect()->route('role_user.index')->with('message','Data Berhasil Di Update');
        }
        catch(\Exception $e){
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
}
