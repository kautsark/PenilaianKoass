@extends('layouts.home')

{{-- @section('supplier','active')
@section('supp','show') --}}

@section('content')
 <div class="page-inner">
    <h4 class="page-title"> Add Nilai Peserta Didik</h4>
    <div class="page-category"> Create Nilai Peserta Didik </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              Form Nilai Peserta Didik
            </div>
            <form action="{{ route('nilai_pdk.store') }}" method="post">
              @csrf
              @method('post')
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-3">
                    <label for="nama_supplier"> Nama Department </label>
                    <select name="id_ksm" id="ksm" class="form-control @error('id_ksm') is-invalid @enderror">
                      <option value="">Pilih..</option>
                      @foreach ($depart as $ksm)
                          <option value="{{ $ksm->id_ksm }}" data-name = "{{ $ksm->nama_dept_ksm }}"> {{ $ksm->nama_dept_ksm }}</option>
                      @endforeach
                    </select>
                    @error('id_ksm')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group col-md-3">
                    <label for="nip"> Nama Dosen Preseptor </label>
                    <select name="id_dosen" id="dosen_dsn" class="form-control @error('id_dosen') is-invalid @enderror">
                      <option value="">Pilih..</option>
                    </select>
                    @error('id_dosen')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group col-md-3">
                    <label for="periode"> Periode Koass </label>
                    <input type="text" name="periode" id="periode" class="form-control @error('periode') is-invalid @enderror" placeholder="Periode Koass">
                    @error('periode')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group col-md-3">
                    <label for="periode"> Tanggal Ujian </label>
                    <input type="date" name="tgl_ujian" id="periode" class="form-control @error('tgl_ujian') is-invalid @enderror">
                    @error('tgl_ujian')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                </div>
                {{-- <div class="row"> --}}
                  {{-- <form class="form-mhs">
                    @csrf
                    <div class="form-group row">
                      <label for="namamhs" class="col-lg-2"> Nama Mahasiswa</label>
                      <div class="col-lg-5">
                        <div class="input-group"> 
                          <input type="hidden" name="id_peserta" id="id_peserta">
                          <input type="hidden" name="nrp_peserta" id="nrp_mhs">
                          <input type="text" class="form-control" name="nama_peserta" id="nama_mhs">
                          <span class="input-group-btn"> 
                            <button onclick="tampilForm()" class="btn btn-info btn-flat" type="button"> <i class="fa fa-arrow-right"></i> </button>
                          </span>
                        </div>
                      </div>
                    </div>

                  </form> --}}
                {{-- </div> --}}
              
              </div>
              
              <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatable" class="display table table-striped">
                        <thead>
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">NRP Peserta Didik</th>
                                <th rowspan="2">Nama Peserta Didik</th>
                                <th colspan="5">Nilai</th>
                                <th rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <td> BST </td>
                                <td> CBD </td>
                                <td> CSS </td>
                                <td> JR </td>
                                <td> MINI CEX </td>
                            </tr>
                        </thead>
                        <tbody class="koassMhswa"></tbody>
                        </table> 
                        {{-- <button type="button" class="btn btn-sm btn-success" onclick="addItem();"> Pilih Mahasiswa </button> --}}
                        <button onclick="tampilForm()" class="btn btn-info btn-flat" type="button"> Pilih Mahasiswa </button>
                        <p> * Keterangan </p> 
                        <span> CBD : Case BNases Discussion </span><br>
                        <span> CSS : Clinical Science Session </span><br>
                        <span> BST : Bed Side Teaching </span><br>
                        <span> JR : Journal Reading </span><br>
                        <span> Mini CEX : Mini Clinical Evaluation Exercise </span>
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
  <!-- Modal -->
<div class="modal fade" id="modalkoass" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Peserta Didik</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
            <table id="table_koass" class="display table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NRP Peserta Didik</th>
                    <th>Nama Peserta Didik</th>
                    <th>Universitas</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($mahskoass as $key=>$item)
                  <tr>
                     <td> {{ $key+1 }} </td>
                     <td> {{ $item->nrp_peserta_didik }} </td>
                     <td> {{ $item->nama_peserta_didik }} </td>
                     <td> {{ $item->universitas }} </td>
                     <td> 
                        <button id="pilih" 
                        data-id="{{ $item->id_peserta }}" 
                        data-nrp ="{{ $item->nrp_peserta_didik }}" 
                        data-name="{{ $item->nama_peserta_didik }}" 
                        class="btn btn-primary btn-xs btn-flat" > Pilih </button>
                          {{-- <a href="#" class="btn btn-primary btn-sm btn-flat" 
                          onclick="pilihMhs('{{$item->id_peserta}}','{{$item->nrp_peserta_didik}}','{{$item->nama_peserta_didik}}')">
                          <i class="fa fa-check-circle"></i>
                          Pilih  
                        </a> --}}
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

@endsection


@push('scripts')
    <script>
       $(document).ready(function(){
        $('#basic-datatable').DataTable({
          
        });
      })
    </script>
@endpush

@push('scripts')
<script>
  function backPage(){
    window.location = "{{ route('nilai_pdk.index') }}"
  }
</script>

<script>
    jQuery(document).ready(function ()
      {
        jQuery('select[name="id_ksm"]').on('change',function(){
            var categoryID = jQuery(this).val();
            if(categoryID)
            {
              jQuery.ajax({
                  url : '/nilai_pdk/fetchDosen/' +categoryID,
                  type : "GET",
                  dataType : "json",
                  success:function(data)
                  {
                    console.log(data);
                    jQuery('select[name="id_dosen"]').html('<option value=""> Select Dosen Preseptor </option>');
                    jQuery.each(data, function(key,value){
                        $('select[name="id_dosen"]').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                  }
              });
            }
            else
            {
              $('select[name="id_dosen"]').empty();
            }
        });
    });
</script>

<script>
  
  function tampilForm(){
    $('#modalkoass').modal('show');
  }

  function hideKoass(){
    $('#modalkoass').modal('hide');
  }
</script>


<script>
  var listItem = [];

  function pilihMhs(id,nrp,nama)
  {
    $('#id_peserta').val(id);
    $('#nrp_mhs').val(nrp);
    $('#nama_mhs').val(nama);
    hideKoass();
    tambahKoassItem();
  }
    $(document).on('click','#pilih', function(){
      var item = {
        id_peserta : $(this).data('id'),
        nrp : $(this).data('nrp'),
        name : $(this).data('name'),
      }
      listItem.push(item);

      hideKoass();
      tambahKoassItem();
    }); 

    function tambahKoassItem(){
      var html =''; 
      listItem.map((el,index) =>  {
        html += `
          <tr>
              <td>${index + 1} </td>  
              <td>${el.nrp}</td>  
              <td>${el.name}</td>  
               <input type = 'hidden' name = 'id_peserta[]' value = '${el.id_peserta}'> 
              <td><input type='text' name='nilai_bst[]' style='min-width:50px' class='form-control' required></td>
              <td><input type='text' name='nilai_cbd[]' style='min-width:50px' class='form-control' required></td>
              <td><input type='text' name='nilai_css[]' style='min-width:50px' class='form-control' required></td>
              <td><input type='text' name='nilai_jr[]' style='min-width:50px' class='form-control' required></td>
              <td><input type='text' name='nilai_mincex[]' style='min-width:50px class='form-control' required></td>
              
              <td><button type='button' onclick='deleteRow(${index})' class='btn btn-sm btn-danger'>Delete</button></td>
          </tr>
        `
      })
      $('.koassMhswa').html(html);
    }

    function deleteRow(index) {
      var item = listItem[index]
      listItem.splice(index,1)
      tambahKoassItem()
  }
</script>

@endpush