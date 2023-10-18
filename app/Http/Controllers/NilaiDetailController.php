<?php

namespace App\Http\Controllers;

use App\Models\DokterMudaModel;
use App\Models\NilaiDetailModel;
use Illuminate\Http\Request;

class NilaiDetailController extends Controller
{
    //
    
    public function store(Request $request)
    {
        $psertaDidik = DokterMudaModel::where('id_peserta',$request->id_peserta)->first();
        if(! $psertaDidik){
            abort(404);
        }

        $NilaiDetail = new NilaiDetailModel();
        $NilaiDetail->id_nilai = $request->id_nilai;
        $NilaiDetail->id_peserta = $psertaDidik->id_peserta;
        $NilaiDetail->nrp_peserta = $psertaDidik->nrp_peserta_didik;
        $NilaiDetail->nama_peserta = $psertaDidik->nama_peserta_didik;
        $NilaiDetail->created_by = auth()->user()->name;
        $NilaiDetail->save();

        return response()->json('Data Berhasil di simpan',200); 
    }

    public function data($id){
        $detail = NilaiDetailModel::where('id_nilai_detail',$id);
    }
}
