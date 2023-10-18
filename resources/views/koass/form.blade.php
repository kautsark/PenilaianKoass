@extends('layouts.home')

{{-- @section('supplier','active')
@section('supp','show') --}}

@section('content')
 <div class="page-inner">
    <h4 class="page-title"> Add Peserta Didik</h4>
    <div class="page-category"> Create Peserta Didik </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              Form Peserta Didik
            </div>
            <form action="{{ route('peserta_didik.store') }}" method="post">
              @csrf
              @method('post')
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-3">
                    <label for="nrp_peserta_didik"> NRP </label>
                    <input type="text" name="nrp_peserta_didik" class="form-control @error ('nrp_peserta_didik') is-invalid @enderror" placeholder="NRP Peserta Didik" autofocus value="{{ old('nrp_peserta_didik') }}">
                  @error('nrp_peserta_didik')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group col-md-3">
                    <label for="nama_peserta_didik"> Nama Lengkap </label>
                    <input type="text" name="nama_peserta_didik" class="form-control @error('nama_peserta_didik') is-invalid @enderror" placeholder="Nama Peserta Didik" value="{{ old('nama_peserat_didik') }}">
                    @error('nama_peserta_didik')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group col-md-3">
                    <label for="tempat_lhr"> Tempat Lahir </label>
                    <input type="text" name="tempat_lhr"class="form-control @error('tempat_lhr') is-invalid @enderror" placeholder="Tempat Lahir Peserta Didik" value="{{ old('tempat_lhr') }}">
                    @error('tempat_lhr')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group col-md-3">
                    <label for="tgl_lahir"> Tanggal Lahir </label>
                    <input type="date" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" value="{{ old('tgl_lahir') }}">
                    @error('tgl_lahir')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-check col-md-3">
                        <label>Jenis Kelamin</label><br/>
                        <label class="form-radio-label">
                            <input class="form-radio-input" type="radio" name="jenis_kelamin" value="Laki-Laki"  checked="">
                        <span class="form-radio-gn">Laki-laki</span>
                        </label>
                        <label class="form-radio-label ml-3">
                            <input class="form-radio-input" type="radio" name="jenis_kelamin" value="Peremmpuan">
                            <span class="form-radio-sign">Perempuan</span>
                        </label>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="alamat_ktp"> Alamat KTP  </label>
                    <textarea name="alamat_ktp" id="alamat_ktp" cols="20" class="form-control @error('alamat_ktp') is-invalid @enderror" rows="3" placeholder="Alamat Tinggal">{{ old('alamat_ktp') }}</textarea>
                    @error('alamat_ktp')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group col-md-3">
                    <label for="alamat_tinggal"> Alamat Tinggal  </label>
                     <textarea name="alamat_tinggal" id="alamat_tinggal" cols="20" class="form-control @error('alamat_tinggal') is-invalid @enderror" rows="3" placeholder="Alamat Tinggal">{{ old('alamat_tinggal') }}</textarea>
                    @error('alamat_tinggal')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group col-md-3">
                    <label for="no_hp_tlp"> No Telp / HP Peserta  </label>
                    <input type="text" name="no_hp_tlp" id="no_hp_tlp" class="form-control @error('no_hp_tlp') is-invalid @enderror" placeholder="No HP/No Tlp" value="{{ old('no_hp_tlp') }}">
                    @error('no_hp_tlp')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-3">
                    <label for="email_peserta"> Email Peserta </label>
                    <input type="email" name="email_peserta" id="email_peserta" class="form-control @error('email_peserta') is-invalid @enderror" placeholder="Email Peserta Didik" value="{{ old('email_peserta') }}">
                    @error('email_peserta')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                 <div class="form-group col-md-3">
                    <label for="gol_darah"> Golongan Darah</label>
                    <select name="gol_darah" id="gol-darah" class="form-control">
                        <option value="AB"> AB </option>
                        <option value="A"> A </option>
                        <option value="B"> B </option>
                        <option value="O"> O </option>
                    </select>
                 </div>
                  <div class="form-group col-md-3">
                    <label for="tgl_lhr"> Status Perkawinan </label><br/>
                    <label class="form-radio-label">
                            <input class="form-radio-input" type="radio" name="status_perkawinan" value="KAWIN"  checked="">
                        <span class="form-radio-gn">Menikah</span>
                        </label>
                        <label class="form-radio-label ml-3">
                            <input class="form-radio-input" type="radio" name="status_perkawinan" value="BELUM KAWIN">
                            <span class="form-radio-sign">Belum Menikah</span>
                        </label>
                    @error('status_perkawinan')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group col-md-3">
                    <label for="universitas"> Universitas </label>
                    <input type="text" name="universitas" id="universitas" class="form-control @error('universitas') is-invalid @enderror" placeholder="Universitas Peserta Didik" value="{{ old('universitas') }}">
                    @error('universitas')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                </div>
                <div class="row">
                  {{-- <div class="form-group col-md-3">
                      <label>Picture :</label>
                      <div class="input-file input-file-image">
                        <img class="img-upload-preview img-circle" width="100" height="100" src="http://placehold.it/100x100" alt="preview">
                        <input type="file" class="form-control form-control-file" id="uploadImg" name="uploadImg" accept="image/*" required>
                        <label for="uploadImg" class=" label-input-file btn btn-primary btn-sm">Upload a Image</label>
                      </div>
                    </div> --}}
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
    window.location = "{{ route('peserta_didik.index') }}"
  }
</script>

@endpush