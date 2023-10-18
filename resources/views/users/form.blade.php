@extends('layouts.home')

{{-- @section('addUsers','active')
@section('users','show') --}}

@section('content')
<div class="page-inner">
    <h4 class="page-title"> Add User</h4>
    <div class="page-category"> Create User </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Form User
          </div>
          <form action="{{ route('users.store') }}" method="post">
            @csrf
            @method('post')
            <div class="card-body">
              <div class="row">
                <div class="form-group col-md-4">
                  <label for="name"> Nama User</label>
                  <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" autofocus placeholder="Nama User" value="{{ old('name') }}">
                  @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group col-md-4">
                  <label for="email"> Email </label>
                  <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Input Email" value="{{ old('email') }}">
                  @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group col-md-4">
                  <label for="username"> Role User </label>
                  <select onchange="myNewFunction(this);" name="id_role" id="id_role" class="form-control @error('id_role') is-invalid @enderror" value="{{ old('id_role') }}">
                    <option value=""> Pilih... </option>
                        @foreach ($roleUser as $role )
                            <option value="{{ $role->id_role }}" data-name = "{{ $role->role_name }}"> {{ $role->role_name }}</option>
                        @endforeach
                  </select>
                  <input name="role_name" type="hidden" class="form-control">
                  @error('id_role')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-4">
                  <label for="password"> Password </label>
                  <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                   @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group col-md-4">
                  <label for="name"> Confirm Password </label>
                  <input type="password" name="conf_password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Confirm Password" autocomplete="current-password">
                  @error('conf_password')
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
        window.location = "{{ route('users.index') }}";
      }
      
    jQuery(function($) {
      $('select[name=id_role]').on('change', function() {
        var name = $(this).find('option:selected').text();
        var otherValue = $(this).find('option:selected').attr("data-name");
        console.log(otherValue);
        $('input[name=role_name]').val(otherValue);
        
      });
    });
  </script>

  {{-- <script>
     function updateText(val) {
      var $el = document.getElementById("adv1");
      // output = selectElement.options[selectElement.selectedIndex].text;
      // document.querySelector('#adv1').textContent = output;
      if(val == $el.value){
       $el.value = 
      } else {
       $el.value = "0";
      }
     }
    </script> --}}
@endpush