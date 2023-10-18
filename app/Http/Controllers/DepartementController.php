<?php

namespace App\Http\Controllers;

use App\Models\DepartementModel;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $department = DepartementModel::orderBy('id_ksm','asc')->get();
        return view('ksm.index',compact('department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('ksm.form');
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
        $this->validate($request, [
            'nama_dept_ksm' => 'required',
        ],
        [
            'nama_dept_ksm.required' => "Nama Department Masih Kosong"
        ]);

        $depart = new DepartementModel();
        $depart->nama_dept_ksm = $request->nama_dept_ksm;
        $depart->created_by = auth()->user()->name;
        $depart->save();

        return redirect()->route('ksm.index')->with('message','Data Berhasil Disimpan');
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
        $ksm = DepartementModel::find($id);
        return view('ksm.form_edit',compact('ksm'));
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
        $this->validate($request, [
            'nama_dept_ksm' => 'required',
        ],
        [
            'nama_dept_ksm.required' => "Nama Department Masih Kosong"
        ]);

        $depart = DepartementModel::find($id);
        $depart->nama_dept_ksm = $request->nama_dept_ksm;
        $depart->created_by = auth()->user()->name;
        $depart->update();

        return redirect()->route('ksm.index')->with('message','Data Berhasil Di Update');
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
