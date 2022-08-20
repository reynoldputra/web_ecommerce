<!-- Header Section Begin -->
@php
    $id = Auth::user()->id;
    $cart_nav = App\Models\Cart::where('user_id', $id)->get();
    $cart_sum = App\Models\Cart::where('user_id', $id)->sum('total_harga');
    $cart_qty = App\Models\Cart::where('user_id', $id)->sum('quantity');
@endphp
<style>
button, input[type="submit"] {
	background: none;
	color: inherit;
	border: none;
	padding: 0;
	font: inherit;
	cursor: pointer;
	outline: inherit;
}
</style>
<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="ht-left">
                <div class="mail-service">
                    <i class=" fa fa-envelope"></i> hello.shayna@gmail.com
                </div>
                <div class="phone-service">
                    <i class=" fa fa-phone"></i> +628 22081996
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="./index.html">
                            <img src={{ asset("user-asset/img/logo_website_shayna.png") }} alt="" />
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7"></div>
                <div class="col-lg-3 text-right col-md-3">
                    <ul class="nav-right">
                        <li class="cart-icon">
                            Keranjang Belanja &nbsp;
                            <a href="#">
                                <i class="icon_bag_alt"></i>
                                <span>{{ $cart_qty }}</span>
                            </a>
                            <div class="cart-hover">
                                <div class="select-items">
                                    <table>
                                        
                                        <tbody>
                                            @forelse ($cart_nav as $item)
                                                <tr>
                                                <td class="si-pic">
                                                <img src="{{ asset("user-asset/img/select-product-1.jpg") }} alt="" />
                                                </td>
                                                <td class="si-text">
                                                    <div class="product-selected">
                                                        <p>Rp{{ $item->detail_product->product->harga}} x {{ $item->quantity}}</p>
                                                        <h6>{{ $item->detail_product->product->nama }}</h6>
                                                    </div>
                                                </td>
                                                <td class="si-close">
                                                    <form action="{{ route('user.deleteCart') }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                    <button type = "submit" name="id" value="{{ $item->id }}">
                                                    <i class="ti-close"></i>
                                                </button>
                                            </form>
                                                </td>
                                            </tr>
                                            @empty
                                            <td class="si-close">Belum Ada Barang
                                            </td>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="select-total">
                                    <span>total:</span>
                                    <h5>Rp{{ $cart_sum }}</h5>
                                </div>
                                <div class="select-button">
                                    <a href="#" class="primary-btn view-card">VIEW CARD</a>
                                    <a href="{{ route('user.shoppingCart') }}" class="primary-btn checkout-btn">CHECK OUT</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->