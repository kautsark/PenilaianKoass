@extends('layouts.home')

@section('content')
<div class="page-inner">
    <h4 class="page-title"> List Nilai Peserta Didik </h4>
    <div class="page-category"> Penilaian Peserta Didik</div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <h4 class="card-title">List Penilaian</h4>
                        <button onclick="AddNilai()" class="btn btn-primary btn-round ml-auto">
                        <i class="fa fa-plus"></i>
                        Add Nilai Peserta Didik
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatable" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Ujian</th>
                                <th>Periode </th>
                                <th>NRP Peserta Didik</th>
                                <th>Nama Peserta Didik</th>
                                <th>Universitas</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ( $queryPenilaian as $nilaiDdk )
                            <tr>
                            <td> {{ $no++ }}</td>
                            <td> {{ date('d M Y',strtotime($nilaiDdk->tgl_ujian)) }}</td>
                            <td> {{ $nilaiDdk->periode }}</td>
                            <td> {{ $nilaiDdk->nrp_peserta_didik }} </td>
                            <td> {{ $nilaiDdk->nama_peserta_didik }} </td>
                            <td> {{ $nilaiDdk->universitas }} </td>
                            <td>
                                <div class="form-button-action">
                                    <button type="button" class="btn btn-link btn-primary btn-md" 
                                    data-toggle="modal" data-target="#staticBackdrop {{$nilaiDdk->id_nilai }}"
                                    data-id="{{ $nilaiDdk->id_nilai }}" title="View Details">
                                    <i class="fa fa-eye"></i>
                                    </button>
                                    <a href="#" title="Edit Nilai" class="btn btn-link btn-primary btn-lg">
                                    <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="button" data-toggle="tooltip" title="Remove Nilai" class="btn btn-link btn-danger">
                                    <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>
                            </tr>
                            @endforeach
                            </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
       $(document).ready(function(){
        $('#basic-datatable').DataTable({

        });
      })
      function AddNilai(){
        window.location = "{{ route('nilai_pdk.create') }}";
      }
    </script>

    @if(Session::has('message'))
    <script>
        swal("Sukses","{{ Session::get('message') }}",'success',{
        button:true,
        icon:"success",
        button:"OK",
        timer:3000,
        });
    </script>
    @endif
@endpush