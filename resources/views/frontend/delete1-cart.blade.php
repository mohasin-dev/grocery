@extends('frontend.layouts.app')
@section('title', 'Cart |')

<style>
    .btn-cart {
        background-color: #3BB77E;
        width: 65% !important;
        height: 40px;
        text-align: center;
        color: #fff;
        border-radius: 5px;


    }

    .btn-cart:hover {
        background-color: #fdc040;
    }

    .qty {
        height: 40px;
        border: 1px #3BB77E solid;
        text-align: center;
        font-size: 13px;
        background-color: transparent;
    }

    #td-padding-top {
        padding-top: 4%;
        padding-left: 1.5%;

    }

    .product-name a:hover {
        text-decoration: none;

    }

    .btn-cart:hover {
        background-color: #fdc040;
    }

    .qty {
        height: 40px;
        border: 1px #3BB77E solid;
        text-align: center;
        font-size: 13px;
        background-color: transparent;

    }

    .alert-danger {
        width: 100%!important;
        border-radius: 10px!important;
        border-color: #ffd170 !important;
        background-color: #fff1d3!important;
        text-align: center;
        font-size: 20px!important;
        color: #7c7c7c!important;
        position: relative!important;
        padding: 0.8rem!important;
        margin-bottom: 1rem!important;
        border: 1px solid transparent!important;
        font-weight: 700!important;
    }
    .alert-success {
        width: 100%!important;
        border-radius: 10px!important;
        border-color: #3BB77E !important;
        background-color: #CDF0E0!important;
        text-align: center;
        font-size: 20px!important;
        color: #7c7c7c!important;
        position: relative!important;
        padding: 0.8rem!important;
        margin-bottom: 1rem!important;
        border: 1px solid transparent!important;
        font-weight: 700!important;
    }

</style>

@section('content')

    <div id="old-div">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Cart
                </div>
            </div>
        </div>
        <div class="container mb-80 mt-50">
            <div class="row">
                <div class="col-lg-8 mb-40">
                    <h1 class="heading-2 mb-10">Your Cart</h1>
                    <div class="d-flex justify-content-between">
                        <h6 class="text-body">There are <span class="text-brand"
                                id="quantitys">{{ auth()->user()->cart
                                    ? auth()->user()->cart->products->count()
                                    : 0 }}</span>
                            products in
                            your
                            cart</h6>
                        {{-- <h6 class="text-body"><a href="#" class="text-muted"><i class="fi-rs-trash mr-5"></i>Clear
                                Cart</a></h6> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="table-responsive shopping-summery">
                        <table class="table table-wishlist">
                            <thead>
                                <tr class="main-heading">
                                    <th class="start pl-20">Image</th>
                                    <th scope="col" colspan="2">Product</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col" style="text-align:center; padding-right:30px;">Quantity</th>
                                    <th scope="col" style="padding-right: 10px;">Subtotal</th>
                                    <th scope="col" class="end">Remove</th>
                                </tr>
                            </thead>

                            <form id="cartForm">
                                @csrf
                                <tbody id="cartId">
                                    @php
                                        $total = 0;
                                        $currency_symbol = settings('currency');
                                    @endphp
                                    @forelse ((auth()->user()->cart->products) ?? [] as $product)
                                        <tr class="pt-30 product-modifiers "
                                            data-product-price="{{ $product->discount_price }}">
                                            <td class="image product-thumbnail pt-10" style="padding-left: 1%;">

                                                @if (count($product->images) > 0)
                                                    <img class="default-img"
                                                        src="{{ asset('assets/img/uploads/products/featured/' . $product->featured_image) }}"
                                                        alt="" />
                                                @else
                                                    <img class="default-img"
                                                        src="{{ asset('assets/frontend/imgs/shop/product-2-2.jpg') }}"
                                                        alt="" />
                                                @endif

                                                {{-- <img src="{{ asset('assets/frontend/imgs/shop/product-1-1.jpg') }}" alt="#"> --}}
                                            </td>
                                            <td class="product-des product-name">
                                                <h6 class="mb-5"><a class="product-name mb-10 text-heading"
                                                        href="{{ route('products', $product->slug) }}">{{ ucwords(strtolower(Str::limit($product->name, 28))) }}</a>
                                                </h6>
                                                <div class="product-rate-cover">
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating"
                                                            style="width:{{ $product->rating * 20 }}%">
                                                        </div>
                                                    </div>
                                                    <span class="font-small ml-5 text-muted">
                                                        ({{ round($product->rating, 1) }})
                                                    </span>
                                                </div>
                                            </td>

                                            <td class="custome-checkbox pl-30"></td>

                                            <td class="price" data-title="Price" id="td-padding-top">
                                                <h6 class="text-body">
                                                    {{ settings('currency') }}{{ $product->discount_price }}
                                                </h6>
                                            </td>

                                            <td>
                                                <div class="col-md-10 col-xs-10 d-lg-flex " id="td-padding-top">
                                                    <input type="hidden" class="product-id" name="product_ids[]"
                                                        value="{{ $product->id }}">
                                                    <input type="button" value="-" class="qty-minus btn-cart"
                                                        style="padding-left: 0px; padding-right: 0px; margin-right: 4px; background-color: #3BB77E;">
                                                    <input type="text" name="qty[]" readonly type="number"
                                                        value="{{ $product->quantity }}" max="10" min="1"
                                                        class="qty update-qty" style="width: 60%; padding-left: 0px;">
                                                    <input type="button" value="+" class="qty-plus btn-cart"
                                                        style="padding-left: 0px; padding-right: 0px; margin-left: 4px; background-color: #3BB77E;">
                                                </div>
                                            </td>
                                            <td class="price" data-title="Price" id="td-padding-top">
                                                <h6 class="text-brand">
                                                    {{ settings('currency') }}<span
                                                        class="cart-subtotal">{{ $product->quantity * $product->discount_price }}</span>
                                                </h6>
                                                <input class="d-none unit-price" value="{{ $product->discount_price }}">
                                            </td>
                                            <td class="action text-center ajax-product-remove " data-title="Remove"
                                                id="td-padding-top"><i class="fi-rs-trash"></i>
                                                <input type="hidden" class="pro-id" value="{{ $product->id }}">
                                            </td>
                                        </tr>
                                        @php
                                            $total += $product->quantity * $product->discount_price;
                                            $currency_symbol = settings('currency');
                                        @endphp
                                    @empty
                                        <tr class="pt-30">
                                            <td class="image product-thumbnail pt-40"
                                                style="left: 32%; text-align: center; position: relative;">
                                                <h4 class="text-brand" style="color: #fdc040 !important;">No Product
                                                    Found
                                                </h4>
                                            </td>
                                            <td class="action text-center" data-title="Remove">
                                                <a href="#" class="text-body"><i class=""></i></a>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </form>


                        </table>
                    </div>
                    <div class="divider-2 mb-30"></div>
                    <div class="cart-action d-flex justify-content-between mb-30">
                        <a href="/" style="color: #fff;" class="btn "><i
                                class="fi-rs-arrow-left mr-10"></i>Continue
                            Shopping</a>
                        {{-- <button onclick="submit()" class="btn ml-10"><i class="fi-rs-refresh ml-10"></i>Update
                            Cart</button> --}}
                    </div>
                </div>



                <div class="col-lg-4">

                    <div class="row" id="old-div-sub">

                        <div class="border p-md-4 cart-totals ">
                            <div class="table-responsive">
                                <table class="table no-border">
                                    <tbody>
                                        @if (!session('totalAfterDiscount'))
                                            <tr>
                                                <td class="cart_total_label">
                                                    <h6 class="text-muted">Subtotal</h6>
                                                </td>
                                                <td class="cart_total_amount">
                                                    <h6 class="text-brand text-end subtotal">
                                                        {{ settings('currency') }}{{ $subtotal }}</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="col" colspan="2">
                                                    <div class="divider-2 mt-10 mb-10"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">
                                                    <h6 class="text-muted">Tax</h6>
                                                </td>
                                                <td class="cart_total_amount">
                                                    <h6 class="text-heading text-end tax">
                                                        {{ settings('currency') }}{{ $tax }}</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="col" colspan="2">
                                                    <div class="divider-2 mt-10 mb-10"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">
                                                    <h6 class="text-muted">Total</h6>
                                                    <small>(Shipping fees not included)</small>
                                                </td>
                                                <td class="cart_total_amount">
                                                    <h6 class="text-brand text-end total">
                                                        {{ settings('currency') }}{{ $subtotal + $tax }}</h6>
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td class="cart_total_label">
                                                    <h6 class="text-muted">Subtotal</h6>
                                                </td>
                                                <td class="cart_total_amount">
                                                    <h6 class="text-brand text-end subtotal">
                                                        {{ settings('currency') }}{{ $subtotal }}</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="col" colspan="2">
                                                    <div class="divider-2 mt-10 mb-10"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">
                                                    <h6 class="text-muted">Tax</h6>
                                                </td>
                                                <td class="cart_total_amount">
                                                    <h6 class="text-heading text-end tax">{{ settings('currency') }}{{ $tax }}</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">
                                                    <h6 class="text-muted">Promo Discount</h6>
                                                </td>
                                                <td class="cart_total_amount">
                                                    <h6 class="text-brand text-end">{{ settings('currency') }}
                                                        {{ session('discountAmount') }}</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="col" colspan="2">
                                                    <div class="divider-2 mt-10 mb-10"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">
                                                    <h6 class="text-muted">Total</h6>
                                                    <small>(Shipping fees not included)</small>
                                                </td>
                                                <td class="cart_total_amount">
                                                    <h6 class="text-brand text-end total">{{ settings('currency') }}
                                                        {{ session('totalAfterDiscount') }}</h6>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <a href="{{ route('checkout') }}" class="btn mb-20 w-100">Proceed To CheckOut<i
                                    class="fi-rs-sign-out ml-15"></i></a>
                        </div>

                    </div>

                    <div class="row" id="new-div-sub">

                    </div>

                    {{-- <div class="row">

                        <div class="border p-md-4 cart-totals  mt-4">

                            <h4 class="mb-10">Apply Coupon</h4>
                            <p class="mb-30"><span class="font-lg text-muted">Using A Promo Code?</p>
                            <form >
                                @csrf
                                <div class="d-flex justify-content-between">
                                    <input class="font-medium mr-15 coupon @error('code') is-invalid @enderror " name="code" id="promoId"
                                        name="code" placeholder="Enter Your Code...">
                                    <input type="numaric" name="cupon" id="cuponId" value="1" hidden>
                                    @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <button class="btn" id="promoCode" ><i class="fi-rs-label mr-10"></i>Apply</button>
                                </div>
                            </form>


                            <div id="promoError" style="padding-top: 10px;"></div>
                            <div id="noCartError" style="padding-top: 10px;"></div>
                        </div>

                    </div> --}}
                    
                </div>
            </div>
        </div>
    </div>

    <div id="new-div">
    </div>

@endsection

<script src="{{ asset('assets/frontend/js/vendor/jquery-3.6.0.min.js') }}"></script>

<script>
    // $(document).ready(function() {
    //     var products = $(".product-modifiers");
    //     var subtotal = 0;
    //     var tax = "{{ $tax }}";

    //     for (var i = 0; i < products.length; i += 1) {
    //         subtotal += parseFloat($(products[i]).find(".cart-subtotal").text());
    //     }

    //     var symbol = "{{ settings('currency') }}";
    //     $('.subtotal').text(symbol + parseFloat(subtotal).toFixed(2));

    //     var totalAfterDiscount = '{{ Session::get('totalAfterDiscount') }}';
    //     var discountAmount = '{{ Session::get('discountAmount') }}';

    //     if (totalAfterDiscount) {
    //         subtotal = subtotal - parseFloat(discountAmount);
    //     }

    //     subtotal += parseFloat(tax);

    //     $('.tax').text(symbol + tax);
    //     $('.total').text(symbol + parseFloat(subtotal).toFixed(2));

    // });



    $(document).on('click', '.qty-plus', function() {

        var tax = "{{ $tax }}";
        var max = 10;
        var prev_val = parseInt($(this).prev().val());

        if (prev_val == 10) {
            tata.error('Reached Quantity 10 !!', 'Maximum product added in cart.');
            return;
        }
        var ctr = $(this).closest(".product-modifiers");
        var product_id = ctr.find(".product-id").val();

        var productPrice = parseFloat(ctr.data("product-price"));
        var subtotalCtr = ctr.find(".cart-subtotal");
        if (prev_val <= 9) {
            var quantity = prev_val + 1;
        } else {
            tata.error('Reached Quantity 10 !!', 'Maximum product added in cart.');
        }

        var subtotalPrice = quantity * productPrice;
        subtotalCtr.text(subtotalPrice.toFixed(2));

        var products = $(".product-modifiers"),
            subtotal = 0;

        for (var i = 0; i < products.length; i += 1) {
            subtotal += parseFloat($(products[i]).find(".cart-subtotal").text());
            //subtotal += subtotal.toFixed(2);
        }
        var symbol = "{{ settings('currency') }}"

        $('.subtotal').text(symbol + parseFloat(subtotal).toFixed(2));

        var taxRate = "{{ settings('tax') }}";
        var newtax = ((taxRate / 100) * subtotal).toFixed(2);

        $('.tax').text(symbol + newtax);

        var totalAfterDiscount = '{{ Session::get('totalAfterDiscount') }}';
        var discountAmount = '{{ Session::get('discountAmount') }}';

        if (totalAfterDiscount) {
            subtotal = subtotal - parseFloat(discountAmount);
        }

        subtotal += parseFloat(tax);
        // subtotal.toFixed(2);

        $('.total').text(symbol + parseFloat(subtotal).toFixed(2));
        // -----------------------------------------

        if (prev_val < max) {
            prev_val = prev_val + 1;
            prev_val = $(this).prev().val(prev_val);
        }

        ajaxUpdateCart(product_id, quantity);
        ajaxUpdateNavCart(ajaxUpdateNavCart);


    });

    $(document).on('click', '.qty-minus', function() {
        var tax = "{{ $tax }}";
        var min = 1;
        var prev_val = $(this).next().val();

        if (prev_val == 1) {
            tata.error('Reached Quantity!!', 'Minimum product added in cart.');
            return;
        }

        var ctr = $(this).closest(".product-modifiers");
        var product_id = ctr.find(".product-id").val();

        var productPrice = parseFloat(ctr.data("product-price"));
        var subtotalCtr = ctr.find(".cart-subtotal");
        if (prev_val > min) {
            var quantity = prev_val - 1;
        }

        var subtotalPrice = quantity * productPrice;
        subtotalCtr.text(subtotalPrice.toFixed(2));

        var products = $(".product-modifiers"),
            subtotal = 0;

        for (var i = 0; i < products.length; i += 1) {
            subtotal += parseFloat($(products[i]).find(".cart-subtotal").text());
        }
        var symbol = "{{ settings('currency') }}"
        $('.subtotal').text(symbol + parseFloat(subtotal).toFixed(2));

        var totalAfterDiscount = '{{ Session::get('totalAfterDiscount') }}';
        var discountAmount = '{{ Session::get('discountAmount') }}';

        if (totalAfterDiscount) {
            subtotal = subtotal - parseFloat(discountAmount);
        }

        subtotal += parseFloat(tax);
        // subtotal.toFixed(2);

        var taxRate = "{{ settings('tax') }}"
        var newtax = ((taxRate / 100) * subtotal).toFixed(2);

        $('.tax').text(symbol + newtax);
        $('.total').text(symbol + parseFloat(subtotal).toFixed(2));
        // -----------------------------------------

        if ($(this).next().val() >= 2) {
            $(this).next().val(+$(this).next().val() - 1);
        }

        ajaxUpdateCart(product_id, quantity);
        ajaxUpdateNavCart(product_id);
    });

    function ajaxUpdateCart(product_id, quantity) {
        var pid = product_id;
        var quantity = quantity;
        var url = "{!! route('cart.update') !!}";
        $.ajax({
            method: 'GET',
            url: url,
            data: {
                id: pid,
                quantity: quantity,
            },
            success: function(result) {
                //
            },
            error: function(error) {
                console.log(error);
            }
        });
    }


    function ajaxUpdateNavCart(product_id) {
        var pid = product_id;
        var url = "{!! route('updateCartAjax', ':id') !!}";
        url = url.replace(':id', pid);
        $.ajax({
            method: 'GET',
            url: url,
            data: {
                id: pid,
            },
            success: function(result) {

                $('#old-cart').empty();
                $('#new-cart').html(result);

            },
            error: function(error) {
                if (error.status == 401) {
                    window.location.href = "/login";
                }
            }
        });
    }

    function deleteFromCartById(id) {
        var pid = id;
        var url = "{!! route('cart.remove', ':id') !!}";
        url = url.replace(':id', pid);
        $.ajax({
            method: 'GET',
            url: url,
            data: {
                id: pid,

            },
            success: function(result) {

                $('#old-cart').empty();
                $('#new-cart').html(result);

            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    $(document).on('click', '.ajax-product-remove', function() {

        var pro_div = $(this).closest(".product-modifiers");
        var pro_id = pro_div.find(".pro-id").val();
        var pd = pro_id;
        var url = "{!! route('cart.remove.div', ':id') !!}";
        url = url.replace(':id', pd);
        deleteFromCartById(pd);

        $.ajax({
            method: 'GET',
            url: url,
            data: {
                id: pd,
            },
            success: function(result) {
                $('#old-div').empty();
                $('#new-div').html(result);
            },
            error: function(error) {
                console.log(error);
            }
        });
     });
</script>


<script>
    $(document).ready(function() {
        $("#promoCode").click(function(event) {
            event.preventDefault();
            var promoId = $('#promoId').val();
            var cuponId = $('#cuponId').val();
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            $.ajax({
                method: 'POST',
                url: "{{ route('promo.code') }}",
                type: 'post',
                data: {
                    code: promoId,
                    cupon: cuponId,
                },
                success: function(response) {
                    console.log(response);
                    if (response == '1') {
                        $('#promoError').html(
                            '<div class="alert alert-danger">Invalid promo code !</div>');
                            return;
                    }
                    if (response == '4') {
                        $('#promoError').html(
                            '<div class="alert alert-danger">Please enter your promo code</div>');
                            return;
                    }
                    if (response == '0') {
                        $('#noCartError').html(
                            '<div class="alert alert-danger">No cart found</div>');
                            return;
                    }if(response == '2'){
                        $('#noCartError').html(
                            '<div class="alert alert-danger">Buy more mroducts to get discount</div>');
                            return;
                    }
                    else {
                        $('#promoError').html(
                            '<div class="alert alert-success">Promo code applied successfully</div>');
                        $('#oldCheckoutProducts').hide();
                        $('#newCheckoutProducts').html(response);
                    }

                }
            });
        });

    });
</script>

