<?php

namespace App\Http\Controllers;

use App\Models\DepartementModel;
use App\Models\DokterMudaModel;
use App\Models\NilaiDetailModel;
use App\Models\PengajarModel;
use App\Models\PenilaianDetailKoassModel;
use App\Models\PenilaianModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $queryPenilaian = DB::table('table_penilaian_header')
        ->join('table_penilaian_detail','table_penilaian_detail.id_nilai','=','table_penilaian_header.id_nilai')
        ->join('table_peserta_didik','table_peserta_didik.id_peserta','=','table_penilaian_detail.id_peserta')
        ->join('table_ksm_unitkerja','table_ksm_unitkerja.id_ksm','=','table_penilaian_header.id_ksm')
        ->select('table_penilaian_header.tgl_ujian','table_penilaian_header.periode','table_peserta_didik.nrp_peserta_didik',
        'table_peserta_didik.nama_peserta_didik','table_peserta_didik.universitas','table_penilaian_header.id_nilai')
        ->get();


        $nilai_didik = PenilaianModel::orderBy('id_nilai','asc')->get();
        // $nilai_didik_detail = PenilaianDetailKoassModel::orderBy('id_nilai_detail','asc')->get();

        return view('nilai.index',compact(['queryPenilaian']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()                                                                                                                      
    {
        //
        $mahskoass = DokterMudaModel::all();

        $depart = DepartementModel::orderBy('id_ksm','asc')->get();
        return view('nilai.form',compact(['depart','mahskoass']));
    }

    public function fetchDosen($id)
    {
        $fetcDsn = DB::table("table_pengajar_dosen")->where("id_ksm",$id)
                      ->pluck("nama_dosen_pengajar","id_dosen");
        return json_encode($fetcDsn);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'id_ksm' => 'required',
            'id_dosen' => 'required',
            'periode' => 'required',
        ],
        [
            'id_ksm.required' => 'Nama Departement / KSM Wajib di Isi',
            'id_dosen.required' => 'Nama Dosen wajib di isi',
            'periode.required' => 'Periode Wajib di isi',
        ]);

        DB::beginTransaction();
        try{
            $nilaiHeader = new PenilaianModel();
            $nilaiHeader->id_ksm = $request->id_ksm;
            $nilaiHeader->id_dosen = $request->id_dosen;
            $nilaiHeader->tgl_ujian = $request->tgl_ujian;
            $nilaiHeader->periode = $request->periode;
            $nilaiHeader->created_by = auth()->user()->name;

            $nilaiHeader->save();
            
            $noNumber =  DB::table('table_penilaian_header')->orderBy('id_nilai','DESC')->select('id_nilai')->first();
            $noNumber = $noNumber->id_nilai;

            foreach($request->id_peserta as $key=>$items)
            {
                $detail['id_peserta']   = $items;
                $detail['id_nilai']     = $noNumber;
                $detail['nilai_bst']    = $request->nilai_bst[$key];
                $detail['nilai_cbd']    = $request->nilai_cbd[$key];
                $detail['nilai_css']    = $request->nilai_css[$key];
                $detail['nilai_jr']     = $request->nilai_jr[$key];
                $detail['nilai_mincex']    = $request->nilai_mincex[$key];

                PenilaianDetailKoassModel::create($detail);
            }
            
            DB::commit();
            return redirect()->route('nilai_pdk.index')->with('message','Data Berhasil Disimpan');
            
        }
        catch(\Exception $e){
            DB::rollBack();
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
        //
    }
}
