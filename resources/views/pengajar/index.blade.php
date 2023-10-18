@extends('layouts.home')

@section('content')
<div class="page-inner">
    <h4 class="page-title"> List Pengajar </h4>
    <div class="page-category"> Manajemen Pengajar / Dosen </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <h4 class="card-title">List Pengajar</h4>
                        <button onclick="AddPengajar()" class="btn btn-primary btn-round ml-auto">
                        <i class="fa fa-plus"></i>
                        Add Pengajar
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatable" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>NRP </th>
                            <th>Nama Dosen</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Unit Kerja/KSM</th>
                            <th>No Telepon/HP</th>
                            <th>Tanggal Masuk RS</th>
                            <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ( $dosenPresep as $dsnPresep )
                            <tr>
                            <td> {{ $no++ }}</td>
                            <td> {{ $dsnPresep->nrp_dosen }} </td>
                            <td> {{ $dsnPresep->nama_dosen_pengajar }} </td>
                            <td> {{ $dsnPresep->jenis_kelamin }} </td>
                            <td> {{ date('d M Y',strtotime($dsnPresep->tanggal_lahir)) }} </td>
                            <td> {{ $dsnPresep->nama_dept_ksm }} </td>
                            <td> {{ $dsnPresep->no_telp_hp }} </td>
                            <td> {{ date('d M Y',strtotime($dsnPresep->tanggal_masuk_rs)) }} </td>
                            
                            <td>
                                <div class="form-button-action">
                                    <button type="button" class="btn btn-link btn-primary btn-md" 
                                    data-toggle="modal" data-target="#staticBackdrop {{$dsnPresep->id_dosen }}"
                                    data-id="{{ $dsnPresep->id_dosen }}" title="View Details">
                                    <i class="fa fa-eye"></i>
                                    </button>
                                    <a href="{{ route('pengajar.edit',$dsnPresep->id_dosen,'/edit') }}" title="Edit Pengajar" class="btn btn-link btn-primary btn-lg">
                                    <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="button" data-toggle="tooltip" title="Remove Supplier" class="btn btn-link btn-danger">
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
@foreach ($dosenPresep as $pddk )
<div class="modal fade" id="staticBackdrop {{ $pddk->id_dosen }}" 
    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Detail Pendidik</h2>
      </div>
      <div class="modal-body">
       <table class="table">
         <tr>
            <td> No NRP Dosen </td>
            <td> {{ $pddk->nrp_dosen }} </td>
         </tr>
         <tr>
            <td> Nama Dokter Muda </td>
            <td> {{ $pddk->nama_dosen_pengajar }} </td>
         </tr>
         <tr>
            <td> Jenis Kelamin </td>
            <td> {{ $pddk->jenis_kelamin }} </td>
         </tr>
         <tr>
            <td> Tanggal Lahir </td>
            <td> {{ date('d M Y',strtotime($pddk->tanggal_lahir)) }} </td>
         </tr>
         <tr>
            <td> Alamat </td>
            <td> {{ $pddk->alamat_dosen }} </td>
         </tr>
         <tr>
            <td> Nomor HP </td>
            <td> {{ $pddk->no_telp_hp }} </td>
         </tr>
         <tr>
            <td>Alamat</td>
            <td>{{ $pddk->alamat_dosen }}</td>
         </tr>
         <tr>
            <td>Departement</td>
            <td>{{ $pddk->nama_dept_ksm }}</td>
         </tr>
         
       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary clsModal" data-dismiss="modal" data-target="#staticBackdrop {{  $pddk->id_dosen }}">Close</button>
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
      function AddPengajar(){
        window.location = "{{ route('pengajar.create') }}";
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