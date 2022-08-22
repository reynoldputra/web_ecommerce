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
                        <a href="{{ route('user.index') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-table">
                                <table>
                                    <thead>
                                       
                                        <tr>
                                            <th>Image</th>
                                            <th class="p-name text-center">Product Name</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($cart as $item)
                                        <tr>
                                            <td class="cart-pic first-row">
                                                <img src={{ asset('storage/product/'.$item->detail_product->product->gambar) }} />
                                            </td>
                                            <td class="cart-title first-row text-center">
                                                <h5>{{ $item->detail_product->product->nama }}</h5>
                                            </td>
                                            <td class="p-price first-row">Rp{{ $item->detail_product->product->harga }}</td>
                                            <td class="delete-item"><a href="#"><i class="material-icons">
                                                @forelse ($user_trans as $item)
                                                {{ $item->status_transaksi->status }}
                                                @empty
                                                <td>-</td>
                                                @endforelse
                                              </i></a></td>
                                        
                                        @empty
                                        <td>-</td>
                                        @endforelse
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <h4 class="mb-4">
                                Informasi Pembeli:
                            </h4>
                            <div class="user-checkout">
                                <form method="POST" action="{{ route('user.checkout') }}">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label for="bank">Bank :</label>
                                        
                                        <select name="bank" id="bank" class="form-control">
                                            @foreach ($bank_admin as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    
                                            @endforeach
                                        </select>
                                        @error('bank')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nomor_bank">Nomor Rekening :</label>
                                        <input type="text" class="form-control" name="nomor_bank" value="" id="nomor_bank" aria-describedby="nobankHelp" placeholder="Masukan Nomor Rekening">
                                        @error('nomor_bank')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button class="form-control" type="submit">Kirim</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="proceed-checkout">
                                <ul>
                                    @forelse ( $user_trans as $item)
                                    <li class="subtotal">ID Transaction <span>{{ $item->nomor_transaksi }}</span></li>
                                    <li class="subtotal mt-3">Total Biaya <span>Rp{{ $cart_total }}</span></li>
                                    <li class="subtotal mt-3">Bank Transfer <span>{{$status}}
                                    </span></li>
                                    <li class="subtotal mt-3">No. Rekening <span>{{ $status2 }}</span></li>
                                    <li class="subtotal mt-3">Nama Penerima <span>{{ Auth::user()->name }}</span></li>
                                    @empty
                                        Belum melakukan pemesanan
                                    @endforelse
                                </ul>
                                <a href="success.html" class="proceed-btn">@forelse ( $user_trans as $item)
                                    <th>{{ $item->status_transaksi->status }}</th>
                                @empty
                                    Belum Dibayar
                                @endforelse
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
    @endsection
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