@extends('layouts.home')

@section('content')
<div class="page-inner">
    <h4 class="page-title"> List Departement </h4>
    <div class="page-category"> Manajemen Departement </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <h4 class="card-title">List Department</h4>
                        <button onclick="AddKSM()" class="btn btn-primary btn-round ml-auto">
                        <i class="fa fa-plus"></i>
                        Add Department
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatable" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th> Nama KSM / Department</th>
                            <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ( $department as $dep )
                            <tr>
                            <td> {{ $no++ }}</td>
                            <td> {{ $dep->nama_dept_ksm }}</td>
                            <td>
                                <div class="form-button-action">
                                    <button type="button" class="btn btn-link btn-primary btn-md" 
                                    data-toggle="modal" data-target="#staticBackdrop {{$dep->id_ksm }}"
                                        data-id="{{ $dep->id_ksm }}" 
                                        data-action="{{ route('role_user.destroy',$dep->id_ksm) }}" title="View Details">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <a href="{{ route('ksm.edit',$dep->id_ksm,'/edit') }}" title="Edit Department" class="btn btn-link btn-primary btn-lg">
                                    <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="button" data-toggle="tooltip" title="Remove Department" class="btn btn-link btn-danger">
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

<!-- Modal -->
@foreach ($department as $ksm )
<div class="modal fade" id="staticBackdrop {{ $ksm->id_ksm }}" 
    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Detail KSM</h2>
      </div>
      <div class="modal-body">
       <table class="table">
         <tr>
            <td> Nama User </td>
            <td> {{ $ksm->nama_dept_ksm }} </td>
         </tr>
       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary clsModal" data-dismiss="modal" data-target="#staticBackdrop {{  $ksm->id_ksm }}">Close</button>
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
      function AddKSM(){
        window.location = "{{ route('ksm.create') }}";
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