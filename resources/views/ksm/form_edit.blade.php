
@extends('layouts.home')

{{-- @section('addMrkBrg','active')
@section('barang','show') --}}

@section('content')
  <div class="page-inner">
    <h4 class="page-title"> Edit Department</h4>
    <div class="page-category"> Update Department </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Form Department
          </div>
          <form action="{{ route('ksm.update',$ksm->id_ksm) }}" method="POST">
            @csrf
            @method('put')
            <div class="card-body">
              <div class="form-group">
                <label for="nama_dept_ksm"> Nama Department</label>
                <input type="text" name="nama_dept_ksm" id="nama_dept_ksm" class="form-control @error('nama_dept_ksm') is-invalid @enderror" autofocus placeholder="Nama KSM/Department" value="{{ old('nama_dept_ksm',$ksm->nama_dept_ksm) }}">
                @error('nama_dept_ksm')
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
      window.location = "{{ route('ksm.index') }}"
    }
  </script>
@endpush