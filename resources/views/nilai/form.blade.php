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
                        <table id="tblMhsKoass" class="display table table-striped">
                        <thead>
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">NRP Peserta Didik</th>
                                <th rowspan="2">Nama Peserta Didik</th>
                                <th colspan="5" style="text-align: center">Nilai</th>
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
                        {{-- <tbody class="koassMhswa"></tbody> --}}
                        <tbody></tbody>
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
                        class="btn btn-primary btn-xs btn-flat" 
                        onclick="tambahItem('{{$item->id_peserta}}','{{$item->nrp_peserta_didik}}','{{$item->nama_peserta_didik}}')"> 
                        Pilih </button>
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
 function tambahItem(idpsr,nrpmhs,namamhs){
  var idpsrtList = document.getElementsByName('id_peserta[]');
  for(var i=0;i<idpsrtList.length;i++){
    if(idpsr==idpsrtList[i].value){
      return false;
    }
  }
  addItem(idpsr,nrpmhs,namamhs);
  hideKoass();
 }

 function addItem(idpsr,nrpmhs,namamhs)
 {
  var tblList = document.getElementById("tblMhsKoass");
  var tblBody = tblList.tBodies[0];
  var lastRow = tblBody.rows.length;
  var row     = tblBody.insertRow(lastRow);

  var newCell0 = row.insertCell(0);
  newCell0.align = "center";
  newCell0.innerHTML = lastRow+1;
  
  var newCell1 = row.insertCell(1);
  newCell1.align = "left";
  newCell1.innerHTML = nrpmhs+"<input type='hidden' name='id_peserta[]' id='id_peserta[]' value='"+idpsr+"' />"
  
  var newCell2 = row.insertCell(2);
  newCell2.align = "left";
  newCell2.innerHTML = namamhs+"<input type='hidden' name='namamhs[]' id='namamhs["+lastRow+"]' value='"+namamhs+"' />"
  var newCell3 = row.insertCell(3);
  newCell3.align = "left";
  newCell3.innerHTML = "<input type='text' name='nilai_bst[]' id='nilaibst["+lastRow+"]' class='form-control' style='width:75px'/>"
  var newCell4 = row.insertCell(4);
  newCell4.align = "left";
  newCell4.innerHTML = "<input type='text' name='nilai_cbd[]' id='nilaicbd["+lastRow+"]' class='form-control'style='width:75px'/>"
  var newCell5 = row.insertCell(5);
  newCell5.align = "left";
  newCell5.innerHTML = "<input type='text' name='nilai_css[]' id='nilaicss["+lastRow+"]' class='form-control' style='width:75px'/>"
  var newCell6 = row.insertCell(6);
  newCell6.align = "left";
  newCell6.innerHTML = "<input type='text' name='nilai_jr[]' id='nilaijr"+lastRow+"]' class='form-control' style='width:75px'/>"
  var newCell7 = row.insertCell(7);
  newCell7.align = "left";
  newCell7.innerHTML = "<input type='text' name='nilai_mincex[]' id='nilaimincex["+lastRow+"]' class='form-control' style='width:75px'/>"
  
  var newCell8 = row.insertCell(8);
  newCell8.align ="center";
    // newCell8.innerHTML = "<img src='images/mark1.gif'  style='cursor:pointer;border:none;' onclick='removeItem(" + lastRow + ",this);' title='Remove item' />";
  newCell8.innerHTML = "<button type='button' onclick='removeItem(" + lastRow + ",this);' class='btn btn-link btn-danger' title='Hapus Baris'><i class='fa fa-times'></i></button>";

 }

  // var listItem = [];

  // function pilihMhs(id,nrp,nama)
  // {
  //   $('#id_peserta').val(id);
  //   $('#nrp_mhs').val(nrp);
  //   $('#nama_mhs').val(nama);
  //   hideKoass();
  //   tambahKoassItem();
  // }
  //   $(document).on('click','#pilih', function(){
  //     var item = {
  //       id_peserta : $(this).data('id'),
  //       nrp : $(this).data('nrp'),
  //       name : $(this).data('name'),
  //     }
  //     listItem.push(item);

  //     hideKoass();
  //     tambahKoassItem();
  //   }); 

  //   function tambahKoassItem(){
  //     var html =''; 
  //     listItem.map((el,index) =>  {
  //       html += `
  //         <tr>
  //             <td>${index + 1} </td>  
  //             <td>${el.nrp}</td>  
  //             <td>${el.name}</td>  
  //             <input type = 'hidden' name = 'id_peserta[]' value = '${el.id_peserta}'> 
  //             <td><input type='text' name='nilai_bst[]' style='width:75px' class='form-control' required></td>
  //             <td><input type='text' name='nilai_cbd[]' style='width:75px' class='form-control' required></td>
  //             <td><input type='text' name='nilai_css[]' style='width:75px' class='form-control' required></td>
  //             <td><input type='text' name='nilai_jr[]' style='width:75px' class='form-control' required></td>
  //             <td><input type='text' name='nilai_mincex[]' style='width:75px' class='form-control' required></td>
              
  //             <td><button type='button' onclick='deleteRow(${index})' class='btn btn-sm btn-danger'>Delete</button></td>
  //         </tr>
  //       `
  //     })
  //     $('.koassMhswa').html(html);
  //   }

  //   function deleteRow(index) {
  //     var item = listItem[index]
  //     listItem.splice(index,1)
  //     tambahKoassItem()
  // }
  function removeItem(id,objek) {
    var tblList = document.getElementById("tblMhsKoass");
    var tblBody = tblList.tBodies[0];
    tblBody.deleteRow(id);
    updateIndex();
}

</script>

@endpush