<?php

namespace App\Http\Controllers;

use App\Models\DepartementModel;
use App\Models\DokterMudaModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PesertaDidikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pesertaDidik = DokterMudaModel::orderby('id_peserta','asc')->get();
        return view('koass.index',compact('pesertaDidik'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('koass.form');
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
            'nrp_peserta_didik' => 'required|min:5|numeric',
            'nama_peserta_didik' => 'required',
            'tempat_lhr' => 'required',
            'alamat_ktp' => 'required',
            'alamat_tinggal' => 'required',
            'no_hp_tlp' => 'required',
            'email_peserta' => 'required|email:dns',
            'universitas' => 'required',
        ],[
            'nrp_peserta_didik.required' => 'Nrp Peserta Wajib Di Isi',
            'nama_peserta_didik.required' => 'Nama peserta wajib di isi',
            'tempat_lhr.required' => 'Tempat Lahir peserta wajib di isi',
            'alamat_ktp.required' => 'Alamat KTP peserta wajib di isi',
            'alamat_tinggal.required' => 'Alamat Tinggal peserta wajib di isi',
            'no_hp_tlp.required' => 'No HP / Telp peserta wajib di isi',
            'email_peserta.required' => 'Email peserta wajib di isi',
            'universitas.required' => 'Universitas peserta wajib di isi',
        ]);

        try
        {
            $dokmud = new DokterMudaModel();
            $dokmud->nrp_peserta_didik = $request->nrp_peserta_didik;
            $dokmud->nama_peserta_didik=$request->nama_peserta_didik;
            $dokmud->tempat_lhr = $request->tempat_lhr;
            $dokmud->tgl_lahir = $request->tgl_lahir;
            $dokmud->jenis_kelamin = $request->jenis_kelamin;
            $dokmud->alamat_ktp = $request->alamat_ktp;
            $dokmud->alamat_tinggal = $request->alamat_tinggal;
            $dokmud->no_hp_tlp = $request->no_hp_tlp;
            $dokmud->email_peserta = $request->email_peserta;
            $dokmud->gol_darah = $request->gol_darah;
            $dokmud->status_perkawinan = $request->status_perkawinan;
            $dokmud->universitas = $request->universitas;
            $dokmud->created_by = auth()->user()->name;

            $dokmud->save();

            return redirect()->route('peserta_didik.index')->with('message','Data Berhasil Disimpan');


        }
         catch(\Exception $e){
            return 'Message :'. $e->getMessage();
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
        $pesertaDidik = DokterMudaModel::find($id);
        return view('koass.form_edit',compact('pesertaDidik'));
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
            'nrp_peserta_didik' => 'required|min:5|numeric',
            'nama_peserta_didik' => 'required',
            'tempat_lhr' => 'required',
            'alamat_ktp' => 'required',
            'alamat_tinggal' => 'required',
            'no_hp_tlp' => 'required|numeric',
            'email_peserta' => 'required|email:dns',
            'universitas' => 'required',
        ],[
            'nrp_peserta_didik.required' => 'Nrp Peserta Wajib Di Isi',
            'nama_peserta_didik.required' => 'Nama peserta wajib di isi',
            'tempat_lhr.required' => 'Tempat Lahir peserta wajib di isi',
            'alamat_ktp.required' => 'Alamat KTP peserta wajib di isi',
            'alamat_tinggal.required' => 'Alamat Tinggal peserta wajib di isi',
            'no_hp_tlp.required' => 'No HP / Telp peserta wajib di isi',
            'email_peserta.required' => 'Email peserta wajib di isi',
            'universitas.required' => 'Universitas peserta wajib di isi',
        ]);

        try
        {
            $dokmud = DokterMudaModel::find($id);
            $dokmud->nrp_peserta_didik = $request->nrp_peserta_didik;
            $dokmud->nama_peserta_didik=$request->nama_peserta_didik;
            $dokmud->tempat_lhr = $request->tempat_lhr;
            $dokmud->tgl_lahir = $request->tgl_lahir;
            $dokmud->jenis_kelamin = $request->jenis_kelamin;
            $dokmud->alamat_ktp = $request->alamat_ktp;
            $dokmud->alamat_tinggal = $request->alamat_tinggal;
            $dokmud->no_hp_tlp = $request->no_hp_tlp;
            $dokmud->email_peserta = $request->email_peserta;
            $dokmud->universitas = $request->universitas;
            $dokmud->status_perkawinan = $request->status_perkawinan;
            $dokmud->gol_darah = $request->gol_darah;
            $dokmud->updated_by = auth()->user()->name;
            $dokmud->updated_at = Carbon::now();

            $dokmud->update();

            return redirect()->route('peserta_didik.index')->with('message','Data Berhasil Di Update');


        }
         catch(\Exception $e){
            return 'Message :'. $e->getMessage();
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
