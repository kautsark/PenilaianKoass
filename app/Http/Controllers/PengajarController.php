<?php

namespace App\Http\Controllers;

use App\Models\DepartementModel;
use App\Models\PengajarModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dosenPresep = PengajarModel::join('table_ksm_unitkerja','table_ksm_unitkerja.id_ksm','=','table_pengajar_dosen.id_ksm')
        ->select('table_pengajar_dosen.*','table_ksm_unitkerja.nama_dept_ksm')
        ->where('table_pengajar_dosen.gcrecord',0)
        ->orderby('id_dosen','asc')
        ->get();
        return view('pengajar.index')->with('dosenPresep',$dosenPresep);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ksm = DepartementModel::all()->pluck('nama_dept_ksm','id_ksm');
        return view('pengajar.form',compact(['ksm']));
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
            'nrp_dosen' =>'required',
            'nama_dosen_pengajar' =>'required',
            'tanggal_lahir' =>'required|date',
            'id_ksm' =>'required',
            'no_telp_hp' =>'required|numeric|min:13',
            'alamat_dosen' =>'required',
            'jenis_kelamin' =>'required',
            'tanggal_masuk_rs' =>'required|date',
        ],
        [
            'nrp_dosen.required' =>'NRP Dosen Wajib Di isi',
            'nama_dosen_pengajar.required' =>'Nama Dosen Wajib Di isi',
            'id_ksm.required' =>'KSM Dosen Wajib Di isi',
            'no_telp_hp.required' =>'No Telepon Dosen Wajib Di isi',
            'no_telp_hp.numeric' =>'No Telepon Dosen Berupa Angka',
            'no_telp_hp.min' =>'No Telepon Dosen max 13 Digit',
            'alamat_dosen.required' =>'Alamat Dosen Wajib Di isi',

        ]);

        try
        {
            $dosen = new PengajarModel();
            $dosen->nrp_dosen = $request->nrp_dosen;
            $dosen->nama_dosen_pengajar=$request->nama_dosen_pengajar;
            $dosen->jenis_kelamin=$request->jenis_kelamin;
            $dosen->tanggal_lahir = $request->tanggal_lahir;
            $dosen->id_ksm = $request->id_ksm;
            $dosen->no_telp_hp = $request->no_telp_hp;
            $dosen->tanggal_masuk_rs = $request->tanggal_masuk_rs;
            $dosen->alamat_dosen = $request->alamat_dosen;
            $dosen->created_by = auth()->user()->name;

            $dosen->save();

            return redirect()->route('pengajar.index')->with('message','Data Berhasil Disimpan');


        }
         catch(\Exception $e){
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
        $pengajar = PengajarModel::find($id);
        $ksm = DepartementModel::all();
        return view('pengajar.form_edit',compact(['pengajar','ksm']));
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
            'nrp_dosen' =>'required',
            'nama_dosen_pengajar' =>'required',
            'tanggal_lahir' =>'required|date',
            'id_ksm' =>'required',
            'no_telp_hp' =>'required|numeric|min:13',
            'alamat_dosen' =>'required',
            'jenis_kelamin' =>'required',
            'tanggal_masuk_rs' =>'required|date',
        ],
        [
            'nrp_dosen.required' =>'NRP Dosen Wajib Di isi',
            'nama_dosen_pengajar.required' =>'Nama Dosen Wajib Di isi',
            'id_ksm.required' =>'KSM Dosen Wajib Di isi',
            'no_telp_hp.required' =>'No Telepon Dosen Wajib Di isi',
            'no_telp_hp.numeric' =>'No Telepon Dosen Berupa Angka',
            'no_telp_hp.min' =>'No Telepon Dosen min 13 Digit',
            'alamat_dosen.required' =>'Alamat Dosen Wajib Di isi',

        ]);

        try
        {
            $dosen = PengajarModel::find($id);
            $dosen->nrp_dosen = $request->nrp_dosen;
            $dosen->nama_dosen_pengajar=$request->nama_dosen_pengajar;
            $dosen->jenis_kelamin=$request->jenis_kelamin;
            $dosen->tanggal_lahir = $request->tanggal_lahir;
            $dosen->id_ksm = $request->id_ksm;
            $dosen->no_telp_hp = $request->no_telp_hp;
            $dosen->tanggal_masuk_rs = $request->tanggal_masuk_rs;
            $dosen->alamat_dosen = $request->alamat_dosen;
            $dosen->updated_by = auth()->user()->name;
            $dosen->updated_at = Carbon::now();

            $dosen->update();

            return redirect()->route('pengajar.index')->with('message','Data Berhasil Disimpan');


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
