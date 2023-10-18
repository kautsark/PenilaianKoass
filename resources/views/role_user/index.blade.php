@extends('layouts.home')

@section('content')
<div class="page-inner">
    <h4 class="page-title"> Role User List </h4>
    <div class="page-category"> Manajemen Role User </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <h4 class="card-title">List Role User</h4>
                        <button onclick="AddRoleUsers()" class="btn btn-primary btn-round ml-auto">
                        <i class="fa fa-plus"></i>
                        Add Role User
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatable" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                            <th> No </th>
                            <th> Nama Role </th>
                            <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ( $role_user as $role )
                            <tr>
                            <td> {{ $no++ }}</td>
                            <td> {{ $role->role_name }}  </td>
                            <td>
                                <div class="form-button-action">
                                    @php $roleID = Crypt::encrypt($role->id_role); @endphp
                                    {{-- <a href="{{ route('role_user.edit',$role->id_role,'/edit') }}" title="Edit Role Name" class="btn btn-link btn-primary btn-lg"> --}}
                                    <a href="{{ route('role_user.edit',$roleID,'/edit') }}" title="Edit Role Name" class="btn btn-link btn-primary btn-lg">
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
@endsection


@push('scripts')
    <script>
       $(document).ready(function(){
        $('#basic-datatable').DataTable({

        });
        
      })
      function AddRoleUsers(){
        window.location = "{{ route('role_user.create') }}";
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