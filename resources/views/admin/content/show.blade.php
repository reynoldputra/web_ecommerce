@extends('admin.layouts.sidebar')

@section('container')
{{-- {{ dd($product["detail_product"]) }} --}}
<div class="container py-5 px-5">
    <div class="row">
        <div class="col col-sm-4">
          <img src="{{ asset('storage/product/'.$product["gambar"])}}" alt="" class="img-thumbnail" >
        </div>
        <div class="col">
            <h5 class="">{{ $product["nama"] }}</h5>
            <p class="text-muted ">{{ $product["category"]["nama"] }}</p>
            <p>{{ $product["deskripsi"] }}</p>
            <p class="text-warning">Rp {{ $product["harga"] }}</p>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Detail Product
                      </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Size</th>
                                <th scope="col">Stock</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>S</td>
                                <td><?php 
                                    $result = 0;
                                    foreach($product["detail_product"] as $data){
                                      if($data["size_id"] == 1){
                                        ECHO $data["stock"];
                                        $result = 1;
                                        break;
                                      }
                                    }
                                    if (!$result) ECHO "0";
                                ?></td>
                              </tr>
                              <tr>
                                <td>M</td>
                                <td><?php
                                    $result = 0;
                                    foreach($product["detail_product"] as $data){
                                      if($data["size_id"] == 2){
                                        ECHO $data["stock"];
                                        $result = 1;
                                        break;
                                      }
                                    }
                                    if (!$result) ECHO "0";
                                ?></td>
                              </tr>
                              <tr>
                                <td>L</td>
                                <td><?php 
                                    $result = 0;
                                    foreach($product["detail_product"] as $data){
                                      if($data["size_id"] == 3){
                                        ECHO $data["stock"];
                                        $result = 1;
                                        break;
                                      }
                                    }
                                    if (!$result) ECHO "0";
                                ?></td>
                              </tr>
                              <tr>
                                <td>XL</td>
                                <td><?php
                                    $result = 0;
                                    foreach($product["detail_product"] as $data){
                                      if($data["size_id"] == 4){
                                        ECHO $data["stock"];
                                        $result = 1;
                                        break;
                                      }
                                    }
                                    if (!$result) ECHO "0";
                                ?></td>
                              </tr>
                            </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection