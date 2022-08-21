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
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="{{ asset('user-asset/img/mickey1.jpg') }}" alt="" />
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    <div class="pt active" data-imgbigurl="img/mickey1.jpg">
                                        <img src="img/mickey1.jpg" alt="" />
                                    </div>

                                    <div class="pt" data-imgbigurl="img/mickey2.jpg">
                                        <img src="img/mickey2.jpg" alt="" />
                                    </div>

                                    <div class="pt" data-imgbigurl="img/mickey3.jpg">
                                        <img src="img/mickey3.jpg" alt="" />
                                    </div>

                                    <div class="pt" data-imgbigurl="img/mickey4.jpg">
                                        <img src="img/mickey4.jpg" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach ($product as $item)
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
                                    <p>
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam possimus quisquam animi, commodi, nihil voluptate nostrum neque architecto illo officiis doloremque et corrupti cupiditate voluptatibus error illum. Commodi expedita animi nulla aspernatur.
                                        Id asperiores blanditiis, omnis repudiandae iste inventore cum, quam sint molestiae accusamus voluptates ex tempora illum sit perspiciatis. Nostrum dolor tenetur amet, illo natus magni veniam quia sit nihil dolores.
                                        Commodi ratione distinctio harum voluptatum velit facilis voluptas animi non laudantium, id dolorem atque perferendis enim ducimus? A exercitationem recusandae aliquam quod. Itaque inventore obcaecati, unde quam
                                        impedit praesentium veritatis quis beatae ea atque perferendis voluptates velit architecto?
                                    </p>
                                    <h4>{{ $item->harga }}</h4>
                                </div>
                                <form action="{{ route('user.addToCart') }}" method="POST">
                                @csrf
                                <select name="size" id="">
                                    @foreach ($product_size as $item)
                                    <option value="{{ $item->size->id }}">{{ $item->size->nama_size }}</option>
                                    @endforeach
                                </select>
                                @error('size')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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
                <div class="col-lg-3 col-sm-6">
                    @foreach ($related_products as $item)
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="{{ asset('user-asset/img/products/women-1.jpg') }}" alt="" />
                                <ul>
                                    <li class="w-icon active">
                                        <a href="#"><i class="icon_bag_alt"></i></a>
                                    </li>
                                    <li class="quick-view"><a href="#">+ Quick View</a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                             
                                <div class="catagory-name">{{ $item->category->nama }}</div>
                                <a href="#">
                                    <h5>{{ $item->nama }}</h5>
                                </a>
                                <div class="product-price">
                                    {{ $item->harga }}
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