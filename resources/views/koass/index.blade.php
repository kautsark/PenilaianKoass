@extends('layouts.home')

@section('content')
<div class="page-inner">
    <h4 class="page-title"> List Koas (Dokter Muda) </h4>
    <div class="page-category"> Manajemen Koas (Dokter Muda) </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <h4 class="card-title">List Koas (Dokter Muda)</h4>
                        <button onclick="AddDokterMuda()" class="btn btn-primary btn-round ml-auto">
                        <i class="fa fa-plus"></i>
                        Add Koas (Dokter Muda)
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatable" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>NRP KoAs</th>
                            <th>Nama Peserta Didik</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Golongan Darah</th>
                            <th>No Telp Dokter Muda</th>
                            <th>Universitas</th>
                            <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ( $pesertaDidik as $dokMud )
                            <tr>
                            <td> {{ $no++ }}</td>
                            <td> {{ $dokMud->nrp_peserta_didik }}</td>
                            <td> {{ $dokMud->nama_peserta_didik }}</td>
                            <td> {{ $dokMud->jenis_kelamin }}</td>
                            <td> {{ date('d M Y',strtotime($dokMud->tgl_lahir)) }}</td>
                            <td> {{ $dokMud->gol_darah }}</td>
                            <td> {{ $dokMud->no_hp_tlp }}</td>
                            <td> {{ $dokMud->universitas }}</td>
                            <td>
                                <div class="form-button-action">
                                    <button type="button" class="btn btn-link btn-primary btn-md" 
                                    data-toggle="modal" data-target="#staticBackdrop {{$dokMud->id_peserta }}"
                                        data-id="{{ $dokMud->id_peserta }}" title="View Details">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <a href="{{ route('peserta_didik.edit',$dokMud->id_peserta,'/edit') }}" title="Edit Peserta Didik" class="btn btn-link btn-primary btn-lg">
                                    <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="button" data-toggle="tooltip" title="Remove Peserta Didik" class="btn btn-link btn-danger">
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
@foreach ($pesertaDidik as $koass )
<div class="modal fade" id="staticBackdrop {{ $koass->id_peserta }}" 
    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Detail Dokter Muda</h2>
      </div>
      <div class="modal-body">
       <table class="table">
         <tr>
            <td> No NRP </td>
            <td> {{ $koass->nrp_peserta_didik }} </td>
         </tr>
         <tr>
            <td> Nama Dokter Muda </td>
            <td> {{ $koass->nama_peserta_didik }} </td>
         </tr>
         <tr>
            <td> Jenis Kelamin </td>
            <td> {{ $koass->jenis_kelamin }} </td>
         </tr>
         <tr>
            <td> Tempat Lahir </td>
            <td> {{ $koass->tempat_lhr }} </td>
         </tr>
         <tr>
            <td> Tanggal Lahir </td>
            <td> {{ date('d M Y',strtotime($koass->tgl_lahir)) }} </td>
         </tr>
         <tr>
            <td> Alamat KTP </td>
            <td> {{ $koass->alamat_ktp }} </td>
         </tr>
         <tr>
            <td> Alamat Tinggal </td>
            <td> {{ $koass->alamat_tinggal }} </td>
         </tr>
         <tr>
            <td> Nomor HP </td>
            <td> {{ $koass->no_hp_tlp }} </td>
         </tr>
         <tr>
            <td> Email Dokter Muda </td>
            <td> {{ $koass->email_peserta }} </td>
         </tr>
         <tr>
            <td> Golongan Darah </td>
            <td> {{ $koass->gol_darah }} </td>
         </tr>
         <tr>
            <td> Status Perkawinan </td>
            <td> {{ $koass->status_perkawinan }} </td>
         </tr>
         <tr>
            <td> Universitas </td>
            <td> {{ $koass->universitas }} </td>
         </tr>
       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary clsModal" data-dismiss="modal" data-target="#staticBackdrop {{  $koass->id_peserta }}">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach


@endsection


@push('scripts')
    <script>
       $(document).ready(function(){
        $('#basic-datatable').DataTable({

        });
      })
      function AddDokterMuda(){
        window.location = "{{ route('peserta_didik.create') }}";
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