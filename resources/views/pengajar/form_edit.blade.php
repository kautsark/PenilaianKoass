@extends('layouts.home')

{{-- @section('supplier','active')
@section('supp','show') --}}

@section('content')
 <div class="page-inner">
    <h4 class="page-title"> Edit Pengajar (Dosen)</h4>
    <div class="page-category"> Update Pengajar </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              Form Pengajar
            </div>
            <form action="{{ route('pengajar.update',$pengajar->id_dosen) }}" method="post">
              @csrf
              @method('put')
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-3">
                    <label for="nrp_dosen"> NRP Dosen </label>
                    <input type="text" name="nrp_dosen" id="nrp_dosen" readonly class="form-control @error ('nrp_dosen') is-invalid @enderror" autofocus placeholder="NRP Pengajar" value="{{ old('nrp_dosen',$pengajar->nrp_dosen) }}">
                    @error('nrp_dosen')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group col-md-3">
                    <label for="nama_dosen_pengajar"> Nama Pengajar (Dosen) </label>
                    <input type="text" name="nama_dosen_pengajar" id="nama_dosen_pengajar" class="form-control @error('nama_dosen_pengajar') is-invalid @enderror" placeholder="Nama Pengajar" value="{{ old('nama_dosen_pengajar',$pengajar->nama_dosen_pengajar) }}">
                    @error('nama_dosen_pengajar')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group col-md-3">
                    <label for="tanggal_lahir"> Tanggal Lahir </label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir',$pengajar->tanggal_lahir) }}">
                    @error('tanggal_lahir')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group col-md-3">
                    <label for="id_ksm"> Unit Kerja / Departement </label>
                    <select name="id_ksm" class="form-control @error('id_ksm') is-invalid @enderror">
                      <option value="">Pilih..</option>
                      @foreach ($ksm as $ksm_dep )
                            <option value="{{ $ksm_dep->id_ksm }}" {{ $pengajar->id_ksm==$ksm_dep->id_ksm ? 'selected' : null }}> {{ $ksm_dep->nama_dept_ksm }}</option>
                      @endforeach
                    </select>
                    @error('id_ksm')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-3">
                    <label for="alamat_dosen"> Alamat Pengajar </label>
                    {{-- <input type="text" name="alamat_dosen" id="alamat_dosen" class="form-control @error('alamat_dosen') is-invalid @enderror" placeholder="Alamat Pengajar"> --}}
                    <textarea name="alamat_dosen" class="form-control @error('alamat_dosen') is-invalid @enderror"  placeholder="Alamat Pengajar" id="" cols="15" rows="3"> {{ $pengajar->alamat_dosen }} </textarea>
                    @error('alamat_dosen')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group col-md-3">
                    <label for="no_telp_hp"> No Telp / HP Pengajar </label>
                    <input type="text" name="no_telp_hp" id="no_telp_hp" class="form-control  @error('no_telp_hp') is-invalid @enderror" placeholder="No Telp Pengajar" value="{{old('no_telp_hp',$pengajar->no_telp_hp)}}">
                    @error('no_telp_hp')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-check col-md-3">
										<label>Jenis Kelamin</label><br/>
										<label class="form-radio-label">
											<input class="form-radio-input" type="radio" name="jenis_kelamin" value="Laki-Laki" @if(old('jenis_kelamin',$pengajar->jenis_kelamin)=="Laki-Laki") checked @endif >
                    <span class="form-radio-gn">Laki-laki</span>
										</label>
										<label class="form-radio-label ml-3">
											<input class="form-radio-input" type="radio" name="jenis_kelamin" value="Perempuan" @if(old('jenis_kelamin',$pengajar->jenis_kelamin)=="Perempuan") checked @endif>
											<span class="form-radio-sign">Perempuan</span>
										</label>
									</div>
                  <div class="form-group col-md-3">
                    <label for="tanggal_masuk_rs"> Tanggal Masuk RS </label>
                    <input type="date" name="tanggal_masuk_rs" value="{{old('tanggal_masuk_rs',$pengajar->tanggal_masuk_rs) }}" id="tanggal_masuk_rs" class="form-control @error('tanggal_masuk_rs') is-invalid @enderror" placeholder="Email Pengajar">
                    @error('tanggal_masuk_rs')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
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
    window.location = "{{ route('pengajar.index') }}"
  }
</script>
@endpush