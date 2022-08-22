@extends('admin.layouts.sidebar')

@section('container')
<div class="p-3">
    <div class="row justift-content-between py-3">
      <div class="col-md-4">
        <h1 class="align-middle">History Transaksi</h1>
      </div>
      <div class="col-sm-3 pt-2">
        <a href="/admin/transaction"><button class="btn btn-primary">Back</button></a>
      </div>

    </div>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
              <th scope="col">ID</th>
                <th scope="col">Bank Tujuan</th>
                <th scope="col">Detail</th>
              <th scope="col">Verifikasi</th>
            </tr>
          </thead>
          <tbody>
            <tr>    
                @foreach ($transaksis as $transaksi)
                    <th class="align-middle">{{ $transaksi["nomor_transaksi"] }}</th>
                    <td class="align-middle">{{ $transaksi["bank"]["nama"] }}</td>
                    <td><button class="btn btn-primary ajax-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-no-trans="{{ $transaksi["nomor_transaksi"] }}"  data-id="{{  url('admin/transaction/show/'.$transaksi['user_id']) }}">Detail</button></td>
                    <td>
                      <form action="/admin/transaction/undo/{{ $transaksi["id"] }}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-danger" onClick="alert('Are you sure want to undo confirm {{ $transaksi["nomor_transaksi"] }} transaction ?')">Undo Confirm</button>
                      </form>
                    </td>
                @endforeach
            </tr>
          </tbody>
    </table>

    <div id="container">
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel"></h5>
            </div>
            <div class="modal-body">
              <div class="conatiner p-1" id="isi-modal">
                <div class="mb-3 row">
                  <label for="oldCategory" class="col-md-4 col-form-label "><b>Nama</b></label>
                  <div class="col-md-4">
                    <input type="text" readonly disabled class="form-control-plaintext col-md-4 nama" id="oldCategory" value="">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="oldCategory" class="col-md-4 col-form-label "><b>No Telepon</b></label>
                  <div class="col-md-4">
                    <input type="text" readonly disabled class="form-control-plaintext col-md-4 no-telp" id="oldCategory" value="">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="oldCategory" class="col-md-4 col-form-label "><b>Alamat</b></label>
                  <div class="col-md-4">
                    <input type="text" readonly disabled class="form-control-plaintext col-md-4 alamat" id="oldCategory" value="">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="oldCategory" class="col-md-4 col-form-label "><b>Bank Pengirim</b></label>
                  <div class="col-md-4">
                    <input type="text" readonly disabled class="form-control-plaintext col-md-4 bank-pengirim" id="oldCategory" value="">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="oldCategory" class="col-md-4 col-form-label "><b>Total Harga</b></label>
                  <div class="col-md-4">
                    <input type="text" readonly disabled class="form-control-plaintext col-md-4 total-harga" id="oldCategory" value="">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="oldCategory" class="col-md-4 col-form-label "><b>Bank Tujuan</b></label>
                  <div class="col-md-4">
                    <input type="text" readonly disabled class="form-control-plaintext col-md-4 bank-tujuan" id="oldCategory" value="">
                  </div>
                </div>


                <hr>
                <h3>Product yang dibeli</h3>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Nama</th>
                      <th scope="col">Quantity</th>
                    </tr>
                  </thead>
                  <tbody class="table-product">
                  </tbody>
                </table>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
      
    $('.ajax-btn').click(function(){

      // AJAX request
      $.ajax({
       url: $(this).data('id'),
       type: 'get',
       success: function(response){ 
         // Add response in Modal body
          $(".modal-title").html("#"+ $(".ajax-btn").data('no-trans'))
          $(".nama").val(response.info_trans.nama)
          $(".no-telp").val(response.info_trans.no_telp)
          $(".alamat").val(response.info_trans.alamat)
          $(".bank-pengirim").val(response.info_trans.bank_pengirim)
          $(".bank-tujuan").val(response.info_trans.bank_tujuan)
          $(".total-harga").val(response.info_trans.total_harga)

          let data_product = "";
          response.info_product.forEach(data => {
              let product = data.detail_product.product.nama
              let quantity = data.quantity
              data_product += '<tr>'+ 
                  '<td>'+ product +'</td>' +
                  '<td>'+ quantity + '</td>'
                + '</tr>'
          });
          $(".table-product").html(data_product)
          
         // Display Modal
         $('#staticBackdrop').modal('show'); 
       }
     });
    });
    });
</script>
@endsection