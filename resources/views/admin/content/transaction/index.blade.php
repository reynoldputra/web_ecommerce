@extends('admin.layouts.sidebar')

@section('container')
<div class="p-3">

{{-- {{ dd($transaksis) }} --}}
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
                    <td><button class="btn btn-primary ajax-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-no-trans="{{ $transaksi["nomor_transaksi"] }}"  data-id="{{  url('admin/transaction/show/'.$transaksi['cart_id']) }}">Detail</button></td>
                    <td>
                      <form action="/admin/transaction/confirm/{{ $transaksi["id"] }}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success" onClick="alert('Are you sure want to confirm {{ $transaksi["nomor_transaksi"] }} transaction ?')">Confirm</button>
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
                  <label for="oldCategory" class="col-md-4 col-form-label "><b>Total Harga</b></label>
                  <div class="col-md-4">
                    <input type="text" readonly disabled class="form-control-plaintext col-md-4 total-harga" id="oldCategory" value="">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="oldCategory" class="col-md-4 col-form-label "><b>Bank Pengirim</b></label>
                  <div class="col-md-4">
                    <input type="text" readonly disabled class="form-control-plaintext col-md-4 bank-pengirim" id="oldCategory" value="">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="oldCategory" class="col-md-4 col-form-label "><b>Bank Tujuan</b></label>
                  <div class="col-md-4">
                    <input type="text" readonly disabled class="form-control-plaintext col-md-4 bank-tujuan" id="oldCategory" value="">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="oldCategory" class="col-md-4 col-form-label "><b>Nama Pengirim</b></label>
                  <div class="col-md-4">
                    <input type="text" readonly disabled class="form-control-plaintext col-md-4 nama-pengirim" id="oldCategory" value="">
                  </div>
                </div>
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
      // console.log($(this).data('id'));  

      // AJAX request
      $.ajax({
       url: $(this).data('id'),
       type: 'get',
       data:{ 
                _token:'{{ csrf_token() }}'
        },
       success: function(response){ 
         // Add response in Modal body
          //  $('.modal-body').html(response);
          $(".modal-title").html("#"+ $(".ajax-btn").data('no-trans'))
          console.log(response);
          $(".total-harga").val()
          $(".bank-pengirim")
          $(".bank-tujuan")
          $(".nama-pengirim")

          
         // Display Modal
         $('#staticBackdrop').modal('show'); 
       }
     });
    });
    });
</script>
@endsection