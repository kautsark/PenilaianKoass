@extends('layouts.home')

{{-- @section('addMrkBrg','active')
@section('barang','show') --}}

@section('content')
 {{-- <div id="flash" data-flash={{ Session::flashdata('success') }}></div> --}}
  <div class="page-inner">
    <h4 class="page-title"> Add Role Users</h4>
    <div class="page-category"> Create Role Users </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Form Role Users
          </div>
          <form action="{{ route('role_user.store') }}"  method="post" id="formRoleUser">
            @csrf
            @method('post')
            <div class="card-body">
              <div class="form-group">
                <label for="nama_merk_barang"> Nama Role Users</label>
                <input type="text" name="role_name" id="role_name" class="form-control @error('role_name') is-invalid @enderror" autofocus placeholder="Nama Role User">
                 @error('role_name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
              </div>
            </div>
            <div class="card-action">
              <button type="submit" class="btn btn-success">Simpan</button>
									<button type="reset" class="btn btn-danger">Batal</button>
									<button type="button" onclick="backPage()" class="btn btn-info">Kembali</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  

@endsection

@push('scripts')
  <script>
    function backPage(){
      window.location = "{{ route('role_user.index') }}"
    }


  </script>

  
  
@endpush