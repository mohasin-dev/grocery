@extends('frontend.layouts.app')
@section('title', 'Track Order')


@section('content')
    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Track Order
                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="dashboard-menu">
                                    <ul class="nav flex-column" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('user.dashboard') }}"
                                                aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Dashboard</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('user.orders') }}"
                                                aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="{{ route('user.track.orders') }}"
                                                aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Order
                                                Tracking</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('user.address') }}"
                                                aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>My Address</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('user.profile') }}"
                                                aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Account
                                                Details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('user.change.password') }}"
                                                aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Change
                                                Password</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                        document.getElementById('logout-form').submit();"><i class=" fi-rs-sign-out mr-10"></i>Logout</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">

                                <div class="col-lg-11 m-auto">
                                    <div class="login_wrap widget-taber-content p-30 background-white border-radius-10">
                                        <div class="padding_eight_all bg-white">
                                            <div class="heading_s1 mb-20 text-center">
                                                <h3 class="mb-20">Order tracking</h3>
                                                <p>Tracking your order status</p>
                                            </div>
                                            <form method="GET" action="https://nest.botble.com/orders/tracking">
                                                <div class="form-group"><label for="txt-order-id">Order
                                                        ID<sup>*</sup></label> <input name="order_id" id="txt-order-id"
                                                        type="text" value="" placeholder="Order ID" class="form-control">
                                                </div>
                                                <div class="form-group"><label for="txt-email">Email
                                                        Address<sup>*</sup></label> <input name="email" id="txt-email"
                                                        type="email" value="" placeholder="Your Email"
                                                        class="form-control"></div>
                                                <button type="submit" class="btn btn-fill-out submit font-weight-bold"
                                                    name="submit" value="Submit">Find</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    {{-- <div class="login_wrap widget-taber-content p-30 background-white border-radius-10"> --}}
                                        <div class="content" style="width:100%; border-radius: 15px;">
                                            <div class="content1" style="background-color: #3bb77e; padding: 13px; border-radius: 10px;">
                                              <h4 style="font-size: 28px; padding: 10px; color: #fff; text-transform: uppercase;">Order Tracking : Order No</h4>
                                            </div>
                                            <div class="content2" style="background-color: #79d1a9; border-radius: 10px;" >
                                              <div class="content2-header1">
                                                <p>Shipped Via : <span>Ipsum Dolor</span></p>
                                              </div>
                                              <div class="content2-header1">
                                                <p>Status : <span>Checking Quality</span></p>
                                              </div>
                                              <div class="content2-header1">
                                                <p>Expected Date : <span style="">7-NOV-2015</span></p>
                                              </div>
                                              <div class="clear"></div>
                                            </div>
                                            <div class="content3">
                                              <div class="shipment">
                                                <div class="confirm">
                                                  <div class="imgcircle active">
                                                    <img src="{{ asset('assets/frontend/imgs/theme/confirm.png') }}" alt="confirm order">
                                                  </div>
                                                  <span class="line active"></span>
                                                  <p>Confirmed Order</p>
                                                </div>
                                                <div class="process">
                                                  <div class="imgcircle active">
                                                    <img src="{{ asset('assets/frontend/imgs/theme/process.png') }}" alt="process order">
                                                  </div>
                                                  <span class="line active"></span>
                                                  <p>Processing Order</p>
                                                </div>
                                                <div class="quality">
                                                  <div class="imgcircle active">
                                                    <img src="{{ asset('assets/frontend/imgs/theme/quality.png') }}" alt="quality check">
                                                  </div>
                                                  <span class="line"></span>
                                                  <p>Quality Check</p>
                                                </div>
                                                <div class="dispatch">
                                                  <div class="imgcircle">
                                                    <img src="{{ asset('assets/frontend/imgs/theme/dispatch.png') }}" alt="dispatch product">
                                                  </div>

                                                  {{-- <span class="line"></span> --}}

                                                  <p>Dispatched Item</p>
                                                </div>

                                                {{-- <div class="delivery">
                                                  <div class="imgcircle">
                                                    <img src="{{ asset('assets/frontend/imgs/theme/delivery.png') }}" alt="delivery">
                                                  </div>
                                                  <p>Product Delivered</p>
                                                </div> --}}

                                                <div class="clear"></div>
                                              </div>
                                            </div>
                                          </div>
                                    {{-- </div> --}}
                                </div>





                                {{-- <div class="tab-content account dashboard-content pl-50">
                                    <div class="tab-pane fade active show">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="mb-0">Your Orders</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Order</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th>Total Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($orders as $item)
                                                                <tr>
                                                                    <td>#{{ $item->invoice_id }}</td>
                                                                    <td>{{ $item->created_at->format('F j, Y') }}</td>
                                                                    <td>{{ $item->status->name }}</td>
                                                                    <td>${{ $item->total }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection
