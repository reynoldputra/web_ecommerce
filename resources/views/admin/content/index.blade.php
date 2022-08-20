@extends('admin.layouts.sidebar')

@section('container')

<div class="main-box px-5 py-3">


    <div class="header mb-3">
        <a href="/admin/product/create"><div class="btn btn-primary">Add Product</div></a>
    </div>

    {{-- {{ dd($products) }} --}}
    <div class="row justify-content-center w-100 ">
        @foreach ($products as $product)
            <div class="col-lg-4 mb-3">
                <div class="card py-3 px-3 ">
                    <img src="{{ asset('storage/product/'.$product["gambar"])}}" alt="" width="100%" height="auto" >
                    <div class="d-flex flex-column align-items-center">    
                        <p class="text-muted pt-3">{{ $product["category"]["nama"] }}</p>
                        <h5 class="">{{ $product["nama"] }}</h5>
                        <p class="text-warning">Rp {{ $product["harga"] }}</p>
                        <div>
                            <a href="/admin/product/{{ $product["id"] }}/edit"><span class="badge bg-warning"><i data-feather="edit-2"></i></span></a>
                            <a href="/admin/product/{{ $product["id"] }}" ><span class="badge bg-primary"><i data-feather="eye"></i></span></a>
                            <form action="/admin/product/{{ $product["id"] }}"  method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="border-0 bg-transparent text-primary px-0 py-0"><span class="badge bg-danger"><i data-feather="trash"></i></span></button>  
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        @endforeach
    </div>
    
</div>
@endsection