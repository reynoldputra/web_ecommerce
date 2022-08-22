@extends('user.layouts.master')

@section('content')
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                        <span>Detail</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        @foreach ($product as $item)
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src={{ asset('storage/product/'.  $item->gambar ) }} alt="" />
                            </div>
                        </div>
                       
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span>{{ $item->category->nama }}</span>
                                    <h3>{{ $item->nama }}</h3>
                                </div>
                                <div class="pd-desc">
                                    <p>
                                        {{ $item->deskripsi }}
                                    </p>
                                    <h4>{{ $item->harga }}</h4>
                                </div>
                                <form action="{{ route('user.addToCart') }}" method="POST">
                                @csrf
                                <label for="size">Size</label>
                                <select name="size" id="size" class="form-control">
                                    @foreach ($product_size as $item)
                                    <option value="{{ $item->size->id }}">{{ $item->size->nama_size }}</option>
                                    @endforeach
                                </select>
                                @error('size')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <br>
                                <div class="quantity">
                                    <button type="submit" name="id" value="{{ $item->id }}" class="primary-btn pd-cart">Add To Cart</button>
                                </div>
                            </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Related Products Section End -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($related_products as $item)
                <div class="col-lg-3 col-sm-6">
                    
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src={{ asset('storage/product/'.  $item->gambar ) }} alt="" />
                                <ul>
                                    <li class="w-icon active">
                                        <a href="{{ url('product/'. $item->id ) }}"><i class="icon_bag_alt"></i></a>
                                    </li>
                                    <li class="quick-view"><a href="{{ url('user/product/'. $item->id ) }}">+ Quick View</a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                             
                                <div class="catagory-name">{{ $item->category->nama }}</div>
                                <a href="#">
                                    <h5>{{ $item->nama }}</h5>
                                </a>
                                <div class="product-price">
                                    Rp{{ $item->harga }}
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    @endforeach
            </div>
        </div>
    </div>
</body>
@endsection
    <!-- Related Products Section End -->
    <!-- Js Plugins -->
@push("script")
    <script src={{ asset("user-asset/js/jquery-3.3.1.min.js") }}></script>
    <script src={{ asset("user-asset/js/bootstrap.min.js") }}></script>
    <script src={{ asset("user-asset/js/jquery-ui.min.js") }}></script>
    <script src={{ asset("user-asset/js/jquery.countdown.min.js") }}></script>
    <script src={{ asset("user-asset/js/jquery.nice-select.min.js") }}></script>
    <script src={{ asset("user-asset/js/jquery.zoom.min.js") }}></script>
    <script src={{ asset("user-asset/js/jquery.dd.min.js") }}></script>
    <script src={{ asset("user-asset/js/jquery.slicknav.js") }}></script>
    <script src={{ asset("user-asset/js/owl.carousel.min.js") }}></script>
    <script src={{ asset("user-asset/js/main.js") }}></script>
@endpush

</html>