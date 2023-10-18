@extends('layouts.home')

@section('content')
<div class="page-inner">
    <h4 class="page-title"> User List </h4>
    <div class="page-category"> Manajemen User </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <h4 class="card-title">List User</h4>
                        <button onclick="AddUser()" class="btn btn-primary btn-round ml-auto">
                        <i class="fa fa-plus"></i>
                        Add User
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatable" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                            <th> No </th>
                            <th> Nama User</th>
                            <th> Email User</th>
                            <th> Role User</th>
                            <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ( $users as $user )
                            <tr>
                            <td> {{ $no++ }}</td>
                            <td> {{ $user->name }}</td>
                            <td> {{ $user->email }}</td>
                            <td> {{ $user->role_name }}</td>
                            <td>
                                <div class="form-button-action">
                                    <button type="button" data-toggle="tooltip" class="btn btn-link btn-primary btn-lg" title="View Users">
                                    <i class="fa fa-eye"></i>
                                    </button>
                                    <a href="{{ route('users.edit',$user->id,'/edit') }}" title="Edit Users" class="btn btn-link btn-primary btn-lg">
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
      function AddUser(){
        window.location = "{{ route('users.create') }}";
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