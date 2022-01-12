@extends('frontend.layouts.app')
@section('title', 'Home')

@section('content')

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop
                <span></span> Cart
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">Your Cart</h1>
                <div class="d-flex justify-content-between">
                    <h6 class="text-body">There are <span class="text-brand">{{ (auth()->user()->cart->products->count()) }}</span> products in your cart</h6>
                    <h6 class="text-body"><a href="#" class="text-muted"><i class="fi-rs-trash mr-5"></i>Clear
                            Cart</a></h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="table-responsive shopping-summery">
                    <table class="table table-wishlist">
                        <thead>
                            <tr class="main-heading">
                                <th class="custome-checkbox start pl-30">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11"
                                        value="">
                                    <label class="form-check-label" for="exampleCheckbox11"></label>
                                </th>
                                <th scope="col" colspan="2">Product</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col" class="end">Remove</th>
                            </tr>
                        </thead>

                        <form method="POST" action="{{ route('cart.update') }}">
                            @csrf
                            <tbody>
                                @php
                                    $total = 0;
                                    $currency_symbol = '$';
                                @endphp
                                @forelse ((auth()->user()->cart->products) ?? [] as $product)
                                    <tr class="pt-30">
                                        <td class="custome-checkbox pl-30">
                                            <input class="form-check-input" type="checkbox" name="checkbox"
                                                id="exampleCheckbox1" value="">
                                            <label class="form-check-label" for="exampleCheckbox1"></label>
                                        </td>
                                        <td class="image product-thumbnail pt-40"><img
                                                src="{{ asset('assets/frontend/imgs/shop/product-1-1.jpg') }}" alt="#">
                                        </td>
                                        <td class="product-des product-name">
                                            <h6 class="mb-5"><a class="product-name mb-10 text-heading"
                                                    href="{{ route('products', $product->id) }}">{{ $product->name }}</a>
                                            </h6>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width:90%">
                                                    </div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                        </td>
                                        <td class="price" data-title="Price">
                                            <h4 class="text-body">
                                                {{ $product->currency->symbol }}{{ $product->price }}
                                            </h4>
                                        </td>

                                        <td>
                                            <div class="col-md-10 col-xs-12 d-lg-flex ">
                                                <input type="button" value="-" class="qty-minus btn">
                                                <input type="number" value="1" max="10" min="1" class="qty update-qty">
                                                <input type="button" value="+" class="qty-plus btn">
                                            </div>

                                            {{-- <div class="sub">minus</div>
                                            <input type="number" value="1" min="1" max="10">
                                            <div class="add">plus</div> --}}
                                        </td>


                                        {{-- <td class="text-center detail-info" data-title="Stock">
                                            <div class="detail-extralink mr-15">
                                                <div class="detail-qty border radius">
                                                    {{-- <a href="#" class="qty-down"><i
                                                            class="fi-rs-angle-small-down"></i></a>
                                                    <input class="quty" name="quantity" min="1"
                                                        value="{{ $product->quantity }}">
                                                    {{-- <span class="qty-val">{{$product->quantity}}</span> --}}
                                        {{-- <a href="#" class="qty-up"><i
                                                            class="fi-rs-angle-small-up"></i></a> --}}



                                        {{-- </div>
                                            </div>
                                        </td> --}}

                                        {{-- <td class="text-center detail-info" data-title="Stock">
                                    <div class="detail-extralink mr-15">
                                        <div class="detail-qty border radius">
                                            <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                            <input class="quty" name="quantity" value="{{$product->quantity}}" >
                                            <span class="qty-val">{{$product->quantity}}</span>
                                            <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                        </div>
                                    </div>
                                </td> --}}

                                        <td class="price" data-title="Price">
                                            <h4 class="text-brand">{{ $product->quantity * $product->price }} </h4>
                                            <input class="d-none unit-price" value="{{ $product->price }}">
                                        </td>
                                        <td class="action text-center" data-title="Remove"><a href="#"
                                                class="text-body"><i class="fi-rs-trash"></i></a></td>
                                    </tr>
                                    @php
                                        $total += $product->quantity * $product->price;
                                        $currency_symbol = $product->currency->symbol;
                                    @endphp
                                @empty
                                    <li>

                                        <div class="shopping-cart-title">
                                            <h4>No Items</h4>
                                        </div>

                                    </li>
                                @endforelse
                            </tbody>
                        </form>


                    </table>
                </div>
                <div class="divider-2 mb-30"></div>
                <div class="cart-action d-flex justify-content-between mb-30">
                    <a class="btn "><i class="fi-rs-arrow-left mr-10"></i>Continue Shopping</a>
                    <a class="btn  mr-10 mb-sm-15"><i class="fi-rs-refresh mr-10"></i>Update Cart</a>
                </div>
            </div>



            <div class="col-lg-4">

                <div class="row">

                        <div class="border p-md-4 cart-totals ml-30">
                            <div class="table-responsive">
                                <table class="table no-border">
                                    <tbody>
                                        <tr>
                                            <td class="cart_total_label">
                                                <h6 class="text-muted">Subtotal</h6>
                                            </td>
                                            <td class="cart_total_amount">
                                                <h4 class="text-brand text-end">$12.31</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="col" colspan="2">
                                                <div class="divider-2 mt-10 mb-10"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">
                                                <h6 class="text-muted">Shipping</h6>
                                            </td>
                                            <td class="cart_total_amount">
                                                <h5 class="text-heading text-end">Free</h4< /td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">
                                                <h6 class="text-muted">Estimate for</h6>
                                            </td>
                                            <td class="cart_total_amount">
                                                <h5 class="text-heading text-end">United Kingdom</h4< /td>
                                        </tr>
                                        <tr>
                                            <td scope="col" colspan="2">
                                                <div class="divider-2 mt-10 mb-10"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">
                                                <h6 class="text-muted">Total</h6>
                                            </td>
                                            <td class="cart_total_amount">
                                                <h4 class="text-brand text-end">$12.31</h4>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <a href="#" class="btn mb-20 w-100">Proceed To CheckOut<i class="fi-rs-sign-out ml-15"></i></a>
                        </div>

                </div>

                <div class="row">

                    <div class="border p-md-4 cart-totals ml-30 mt-4">

                        <h4 class="mb-10">Apply Coupon</h4>
                        <p class="mb-30"><span class="font-lg text-muted">Using A Promo Code?</p>
                        <form method="post" action="/apply-promo" >
                            @csrf
                            <div class="d-flex justify-content-between">
                                <input class="font-medium mr-15 coupon @error('code') is-invalid @enderror " name="code" placeholder="Enter Your Code...">
                                @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <button class="btn"><i class="fi-rs-label mr-10"></i>Apply</button>
                            </div>
                        </form>

                    </div>
                    <a href="#" class="btn mb-20 w-100">Proceed To CheckOut<i class="fi-rs-sign-out ml-15"></i></a>

                </div>
            </div>
        </div>
    </div>

@endsection

<script src="{{ asset('assets/frontend/js/vendor/jquery-3.6.0.min.js') }}"></script>

<script>
    $(document).ready(function() {
        // alert("ready!");
    });


    //update cart minus

    $(document).on('click', '.qty-plus', function() {
        var max = 10;

        var prev_val = parseInt($(this).prev().val());

        if (prev_val < max) {

            prev_val = prev_val + 1;
            prev_val = $(this).prev().val(prev_val);
            // var product_unit_price = $(".unit-price").val();
            // var updated_price = prev_val * product_unit_price;
            // alert(parseInt(updated_price));
            // $('#text-brand').html(updated_price);
            //  $(this).prev().val(+$(this).prev().val() + 1);

        }


    });

    // $(document).on('click', '.qty-minus', function() {
    //     var min=1;
    //     if ($(this).next().val() > min ) $(this).next().val(+$(this).next().val() - 1);

    // });


    $(document).on('click', '.qty-minus', function() {
        var min = 1;
        if ($(this).next().val() > min) $(this).next().val(+$(this).next().val() - 1);

    });

    // $('.add').click(function() {
    //     alert('add');
    //     if ($(this).prev().val() < 3) {
    //         $(this).prev().val(+$(this).prev().val() + 1);
    //     }
    // });
    // $('.sub').click(function() {
    //     alert('sub');
    //     if ($(this).next().val() > 1) {
    //         if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
    //     }
    // });
</script>



