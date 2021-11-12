<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="icon" href="img/mini_logo.png') }}" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <!-- themefy CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/themefy_icon/themify-icons.css') }}" />
    <!-- select2 CSS -->
     <link rel="stylesheet" href="{{ asset('assets/vendors/niceselect/css/nice-select.css') }}" />
    <!-- owl carousel CSS -->
     <link rel="stylesheet" href="{{ asset('assets/vendors/owl_carousel/css/owl.carousel.css') }}" />
    <!-- gijgo css -->
     <link rel="stylesheet" href="{{ asset('assets/vendors/gijgo/gijgo.min.css') }}" />
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/font_awesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/tagsinput/tagsinput.css') }}" />

    <!-- date picker -->
     <link rel="stylesheet" href="{{ asset('assets/vendors/datepicker/date-picker.css') }}" />

     <link rel="stylesheet" href="{{ asset('assets/vendors/vectormap-home/vectormap-2.0.2.css') }}" />

    <!-- scrollabe  -->
     <link rel="stylesheet" href="{{ asset('assets/vendors/scroll/scrollable.css') }}" />
    <!-- datatable CSS -->
     <link rel="stylesheet" href="{{ asset('assets/vendors/datatable/css/jquery.dataTables.min.css') }}" />
     <link rel="stylesheet" href="{{ asset('assets/vendors/datatable/css/responsive.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatable/css/buttons.dataTables.min.css') }}" />
    <!-- text editor css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/text_editor/summernote-bs4.css') }}" />
    <!-- morris css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/morris/morris.css') }}">
    <!-- metarial icon css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/material_icon/material-icons.css') }}" />

    <!-- menu css  -->
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu.css') }}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/colors/default.css') }}" id="colorSkinCSS">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @stack('styles')
</head>

<body class="crm_body_bg">
    <!-- Sweetalert -->
    @include('sweetalert::alert')
    <!-- /.Sweetalert -->

    <!-- main content part here -->
    <!-- sidebar  -->
    <nav class="sidebar">
        <div class="logo d-flex justify-content-between">
            <a class="large_logo" href="{{ route('admin.dashboard') }}"><img src="{{ asset('assets/img/logo.png') }}"
                    alt=""></a>
            <a class="small_logo" href="{{ route('admin.dashboard') }}"><img
                    src="{{ asset('assets/img/mini_logo.png') }}" alt=""></a>
            <div class="sidebar_close_icon d-lg-none">
                <i class="ti-close"></i>
            </div>
        </div>
        <ul id="sidebar_menu">
            <li>
                <a href="{{ route('admin.dashboard') }}" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('assets/img/menu-icon/dashboard.svg') }}" alt="">
                    </div>
                    <div class="nav_title">
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.brands.index') }}" aria-expanded="false" class="active">
                    <div class="nav_icon_small">
                        <img src="{{ asset('assets/img/menu-icon/6.svg') }}" alt="">
                    </div>
                    <div class="nav_title">
                        <span>Brands</span>
                    </div>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.promos.index') }}" aria-expanded="false" class="active">
                    <div class="nav_icon_small">
                        <img src="{{ asset('assets/img/menu-icon/6.svg') }}" alt="">
                    </div>
                    <div class="nav_title">
                        <span>Promos</span>
                    </div>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.currencies.index') }}" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('assets/img/menu-icon/6.svg') }}" alt="">
                    </div>
                    <div class="nav_title">
                        <span>
                            Currencies</span>
                    </div>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.users.index') }}" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('assets/img/menu-icon/6.svg') }}" alt="">
                    </div>
                    <div class="nav_title">
                        <span>
                            Users</span>
                    </div>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.stores.index') }}" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('assets/img/menu-icon/6.svg') }}" alt="">
                    </div>
                    <div class="nav_title">
                        <span>
                            Stores</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.banners.index') }}" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('assets/img/menu-icon/6.svg') }}" alt="">
                    </div>
                    <div class="nav_title">
                        <span>
                            Banners</span>
                    </div>
                </a>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('assets/img/menu-icon/8.svg') }}" alt="">
                    </div>
                    <div class="nav_title">
                        <span>Products</span>
                    </div>
                </a>
                <ul class="mm-collapse mm-show" style="height: 5px;">
                    <li>
                        <a href="{{ route('admin.products.index') }}">Products</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.categories.index') }}">Categories</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.types.index') }}">Types</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.units.index') }}">Units</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.nutrition.index') }}">Nutritions</a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="{{ route('admin.carts.index') }}" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('assets/img/menu-icon/6.svg') }}" alt="">
                    </div>
                    <div class="nav_title">
                        <span>Cart</span>
                    </div>
                </a>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('assets/img/menu-icon/8.svg') }}" alt="">
                    </div>
                    <div class="nav_title">
                        <span>Orders</span>
                    </div>
                </a>
                <ul class="mm-collapse" style="height: 5px;">
                    <li class="">
                        <a href="{{ route('admin.order_statuses.index') }}">Order Status</a>
                        <a href="{{ route('admin.orders.index') }}">All Orders</a>
                        @foreach (\App\Models\OrderStatus::all() as $orderStatus)
                            <a href="{{ url('admin/orders?status=') . $orderStatus->name }}">{{ ucfirst($orderStatus->name) }}
                                Orders</a>
                        @endforeach
                    </li>
                </ul>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('assets/img/menu-icon/8.svg') }}" alt="">
                    </div>
                    <div class="nav_title">
                        <span>Settings</span>
                    </div>
                </a>
                <ul class="mm-collapse" style="height: 5px;">
                    <li class="">
                        <a href="{{ route('admin.settings.general') }}">General Settings</a>
                        <a href="{{ route('admin.settings.email') }}">Email Settings</a>
                        <a href="{{ route('admin.email_templates.index') }}">Email Templates</a>
                        <a href="{{ route('admin.settings.payment_gateway') }}">Payment Gateway</a>
                        <a href="{{ route('admin.shipping_services.index') }}">Shipping Service</a>
                        <a href="{{ route('admin.taxes.index') }}">Tax</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!--/ sidebar  -->

    <section class="main_content dashboard_part large_header_bg">
        <!-- menu  -->

        <div class="container-fluid no-gutters">
            <div class="row">
                <div class="col-lg-12 p-0 ">
                    <div class="header_iner d-flex justify-content-between align-items-center">
                        <div class="sidebar_icon d-lg-none">
                            <i class="ti-menu"></i>
                        </div>
                        <label class="switch_toggle d-none d-lg-block" for="checkbox">
                            <input type="checkbox" id="checkbox">
                            <div class="slider round open_miniSide"></div>
                        </label>

                        <div class="header_right d-flex justify-content-between align-items-center">
                            <div class="header_notification_warp d-flex align-items-center">
                                <li>
                                    <div class="serach_button">
                                        <i class="ti-search"></i>
                                        <div class="serach_field-area d-flex align-items-center">
                                            <div class="search_inner">
                                                <form action="#">
                                                    <div class="search_field">
                                                        <input type="text" placeholder="Search here...">
                                                    </div>
                                                    <button class="close_search"> <i class="ti-search"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <span class="f_s_14 f_w_400 ml_25 white_text text_white">Apps</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a class="bell_notification_clicker" href="#"> <img
                                            src="{{ asset('assets/img/icon/bell.svg') }}" alt="">
                                        <span>2</span>
                                    </a>
                                    <!-- Menu_NOtification_Wrap  -->
                                    <div class="Menu_NOtification_Wrap">
                                        <div class="notification_Header">
                                            <h4>Notifications</h4>
                                        </div>
                                        <div class="Notification_body">
                                            <!-- single_notify  -->
                                            <div class="single_notify d-flex align-items-center">
                                                <div class="notify_thumb">
                                                    <a href="#"><img src="{{ asset('assets/img/staf/2.png') }}"
                                                            alt=""></a>
                                                </div>
                                                <div class="notify_content">
                                                    <a href="#">
                                                        <h5>Cool Marketing </h5>
                                                    </a>
                                                    <p>Lorem ipsum dolor sit amet</p>
                                                </div>
                                            </div>
                                            <!-- single_notify  -->
                                            <div class="single_notify d-flex align-items-center">
                                                <div class="notify_thumb">
                                                    <a href="#"><img src="{{ asset('assets/img/staf/4.png') }}"
                                                            alt=""></a>
                                                </div>
                                                <div class="notify_content">
                                                    <a href="#">
                                                        <h5>Awesome packages</h5>
                                                    </a>
                                                    <p>Lorem ipsum dolor sit amet</p>
                                                </div>
                                            </div>
                                            <!-- single_notify  -->
                                            <div class="single_notify d-flex align-items-center">
                                                <div class="notify_thumb">
                                                    <a href="#"><img src="{{ asset('assets/img/staf/3.png') }}"
                                                            alt=""></a>
                                                </div>
                                                <div class="notify_content">
                                                    <a href="#">
                                                        <h5>what a packages</h5>
                                                    </a>
                                                    <p>Lorem ipsum dolor sit amet</p>
                                                </div>
                                            </div>
                                            <!-- single_notify  -->
                                            <div class="single_notify d-flex align-items-center">
                                                <div class="notify_thumb">
                                                    <a href="#"><img src="{{ asset('assets/img/staf/2.png') }}"
                                                            alt=""></a>
                                                </div>
                                                <div class="notify_content">
                                                    <a href="#">
                                                        <h5>Cool Marketing </h5>
                                                    </a>
                                                    <p>Lorem ipsum dolor sit amet</p>
                                                </div>
                                            </div>
                                            <!-- single_notify  -->
                                            <div class="single_notify d-flex align-items-center">
                                                <div class="notify_thumb">
                                                    <a href="#"><img src="{{ asset('assets/img/staf/4.png') }}"
                                                            alt=""></a>
                                                </div>
                                                <div class="notify_content">
                                                    <a href="#">
                                                        <h5>Awesome packages</h5>
                                                    </a>
                                                    <p>Lorem ipsum dolor sit amet</p>
                                                </div>
                                            </div>
                                            <!-- single_notify  -->
                                            <div class="single_notify d-flex align-items-center">
                                                <div class="notify_thumb">
                                                    <a href="#"><img src="{{ asset('assets/img/staf/3.png') }}"
                                                            alt=""></a>
                                                </div>
                                                <div class="notify_content">
                                                    <a href="#">
                                                        <h5>what a packages</h5>
                                                    </a>
                                                    <p>Lorem ipsum dolor sit amet</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nofity_footer">
                                            <div class="submit_button text-center pt_20">
                                                <a href="#" class="btn_1">See More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ Menu_NOtification_Wrap  -->
                                </li>
                                <li>
                                    <a class="CHATBOX_open" href="#"> <img
                                            src="{{ asset('assets/img/icon/msg.svg') }}" alt="">
                                        <span>2</span> </a>
                                </li>
                            </div>
                            <div class="profile_info">
                                <img src="{{ asset('assets/img/client_img.png') }}" alt="#">
                                <div class="profile_info_iner">
                                    <div class="profile_author_name">
                                        <h5>{{ auth()->user()->name }}</h5>
                                    </div>
                                    <div class="profile_info_details">
                                        <a href="{{ route('admin.user.profile') }}">My Profile </a>
                                        <a href="{{ route('admin.user.change_password') }}">Change Password</a>
                                        <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Log Out') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--/ menu  -->
        @yield('content')

        <!-- footer part -->

        <div class="footer_part">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer_iner text-center">
                            <p>2020 © Influence - Designed by <a href="#"> <i class="ti-heart"></i> </a><a
                                    href="#"> DashboardPack</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- main content part end -->

    <!-- ### CHAT_MESSAGE_BOX   ### -->
    <div class="CHAT_MESSAGE_POPUPBOX">
        <div class="CHAT_POPUP_HEADER">
            <div class="MSEESAGE_CHATBOX_CLOSE">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg') }}">
                    <path
                        d="M7.09939 5.98831L11.772 10.661C12.076 10.965 12.076 11.4564 11.772 11.7603C11.468 12.0643 10.9766 12.0643 10.6726 11.7603L5.99994 7.08762L1.32737 11.7603C1.02329 12.0643 0.532002 12.0643 0.228062 11.7603C-0.0760207 11.4564 -0.0760207 10.965 0.228062 10.661L4.90063 5.98831L0.228062 1.3156C-0.0760207 1.01166 -0.0760207 0.520226 0.228062 0.216286C0.379534 0.0646715 0.578697 -0.0114918 0.777717 -0.0114918C0.976738 -0.0114918 1.17576 0.0646715 1.32737 0.216286L5.99994 4.889L10.6726 0.216286C10.8243 0.0646715 11.0233 -0.0114918 11.2223 -0.0114918C11.4213 -0.0114918 11.6203 0.0646715 11.772 0.216286C12.076 0.520226 12.076 1.01166 11.772 1.3156L7.09939 5.98831Z"
                        fill="white" />
                </svg>

            </div>
            <h3>Chat with us</h3>
            <div class="Chat_Listed_member">
                <ul>
                    <li>
                        <a href="#">
                            <div class="member_thumb">
                                <img src="{{ asset('assets/img/staf/1.png') }}" alt="">
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="member_thumb">
                                <img src="{{ asset('assets/img/staf/2.png') }}" alt="">
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="member_thumb">
                                <img src="{{ asset('assets/img/staf/3.png') }}" alt="">
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="member_thumb">
                                <img src="{{ asset('assets/img/staf/4.png') }}" alt="">
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="member_thumb">
                                <img src="{{ asset('assets/img/staf/5.png') }}" alt="">
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="member_thumb">
                                <div class="more_member_count">
                                    <span>90+</span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="CHAT_POPUP_BODY">
            <p class="mesaged_send_date">
                Sunday, 12 January
            </p>

            <div class="CHATING_SENDER">
                <div class="SMS_thumb">
                    <img src="{{ asset('assets/img/staf/1.png') }}" alt="">
                </div>
                <div class="SEND_SMS_VIEW">
                    <P>Hi! Welcome .
                        How can I help you?</P>
                </div>
            </div>

            <div class="CHATING_SENDER CHATING_RECEIVEr">

                <div class="SEND_SMS_VIEW">
                    <P>Hello</P>
                </div>
                <div class="SMS_thumb">
                    <img src="{{ asset('assets/img/staf/1.png') }}" alt="">
                </div>
            </div>

        </div>
        <div class="CHAT_POPUP_BOTTOM">
            <div class="chat_input_box d-flex align-items-center">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Write your message"
                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn " type="button">
                            <!-- svg      -->
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg') }}">
                                <path
                                    d="M18.7821 3.21895C14.4908 -1.07281 7.50882 -1.07281 3.2183 3.21792C-1.07304 7.50864 -1.07263 14.4908 3.21872 18.7824C7.50882 23.0729 14.4908 23.0729 18.7817 18.7815C23.0726 14.4908 23.0724 7.50906 18.7821 3.21895ZM17.5813 17.5815C13.9525 21.2103 8.04773 21.2108 4.41871 17.5819C0.78907 13.9525 0.789485 8.04714 4.41871 4.41832C8.04752 0.789719 13.9521 0.789304 17.5817 4.41874C21.2105 8.04755 21.2101 13.9529 17.5813 17.5815ZM6.89503 8.02162C6.89503 7.31138 7.47107 6.73534 8.18131 6.73534C8.89135 6.73534 9.46739 7.31117 9.46739 8.02162C9.46739 8.73228 8.89135 9.30811 8.18131 9.30811C7.47107 9.30811 6.89503 8.73228 6.89503 8.02162ZM12.7274 8.02162C12.7274 7.31138 13.3038 6.73534 14.0141 6.73534C14.7241 6.73534 15.3002 7.31117 15.3002 8.02162C15.3002 8.73228 14.7243 9.30811 14.0141 9.30811C13.3038 9.30811 12.7274 8.73228 12.7274 8.02162ZM15.7683 13.2898C14.9712 15.1332 13.1043 16.3243 11.0126 16.3243C8.8758 16.3243 6.99792 15.1272 6.22834 13.2744C6.09642 12.9573 6.24681 12.593 6.56438 12.4611C6.64238 12.4289 6.72328 12.4136 6.80293 12.4136C7.04687 12.4136 7.27836 12.5577 7.37772 12.7973C7.95376 14.1842 9.38048 15.0799 11.0126 15.0799C12.6077 15.0799 14.0261 14.1836 14.626 12.7959C14.7625 12.4804 15.1288 12.335 15.4441 12.4717C15.7594 12.6084 15.9048 12.9745 15.7683 13.2898Z"
                                    fill="#707DB7" />
                            </svg>

                            <!-- svg      -->
                        </button>
                        <button class="btn" type="button">
                            <!-- svg  -->
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg') }}">
                                <path
                                    d="M11 0.289062C4.92455 0.289062 0 5.08402 0 10.9996C0 16.9152 4.92455 21.7101 11 21.7101C17.0755 21.7101 22 16.9145 22 10.9996C22 5.08472 17.0755 0.289062 11 0.289062ZM11 20.3713C5.68423 20.3713 1.375 16.1755 1.375 10.9996C1.375 5.82371 5.68423 1.62788 11 1.62788C16.3158 1.62788 20.625 5.82371 20.625 10.9996C20.625 16.1755 16.3158 20.3713 11 20.3713ZM15.125 10.3302H11.6875V6.98314C11.6875 6.61363 11.3795 6.31373 11 6.31373C10.6205 6.31373 10.3125 6.61363 10.3125 6.98314V10.3302H6.875C6.4955 10.3302 6.1875 10.6301 6.1875 10.9996C6.1875 11.3691 6.4955 11.669 6.875 11.669H10.3125V15.016C10.3125 15.3855 10.6205 15.6854 11 15.6854C11.3795 15.6854 11.6875 15.3855 11.6875 15.016V11.669H15.125C15.5045 11.669 15.8125 11.3691 15.8125 10.9996C15.8125 10.6301 15.5045 10.3302 15.125 10.3302Z"
                                    fill="#707DB7" />
                            </svg>

                            <!-- svg  -->
                            <input type="file">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--/### CHAT_MESSAGE_BOX  ### -->

    <div id="back-top" style="display: none;">
        <a title="Go to Top" href="#">
            <i class="ti-angle-up"></i>
        </a>
    </div>

    <!-- footer  -->
    <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <!-- bootstarp js -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- sidebar menu  -->
    <script src="{{ asset('assets/js/metisMenu.js') }}"></script>
    <!-- waypoints js -->
     <script src="{{ asset('assets/vendors/count_up/jquery.waypoints.min.js') }}"></script>
    <!-- waypoints js -->
     <script src="{{ asset('assets/vendors/chartlist/Chart.min.js') }}"></script>
    <!-- counterup js -->
     <script src="{{ asset('assets/vendors/count_up/jquery.counterup.min.js') }}"></script>

    <!-- nice select -->
     <script src="{{ asset('assets/vendors/niceselect/js/jquery.nice-select.min.js') }}"></script>
    <!-- owl carousel -->
     <script src="{{ asset('assets/vendors/owl_carousel/js/owl.carousel.min.js') }}"></script>

    <!-- responsive table -->
     <script src="{{ asset('assets/vendors/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatable/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatable/js/buttons.print.min.js') }}"></script>

    <!-- datepicker  -->
     <script src="{{ asset('assets/vendors/datepicker/datepicker.js') }}"></script>
    <script src="{{ asset('assets/vendors/datepicker/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/vendors/datepicker/datepicker.custom.js') }}"></script>

     <script src="{{ asset('assets/js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/chartjs/roundedBar.min.js') }}"></script>

    <!-- progressbar js -->
     <script src="{{ asset('assets/vendors/progressbar/jquery.barfiller.js') }}"></script>
    <!-- tag input -->
     <script src="{{ asset('assets/vendors/tagsinput/tagsinput.js') }}"></script>
    <!-- text editor js -->
     <script src="{{ asset('assets/vendors/text_editor/summernote-bs4.js') }}"></script>
    <script src="{{ asset('assets/vendors/am_chart/amcharts.js') }}"></script>

    <!-- scrollabe  -->
     <script src="{{ asset('assets/vendors/scroll/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/scroll/scrollable-custom.js') }}"></script>

    <!-- vector map  -->
     <script src="{{ asset('assets/vendors/vectormap-home/vectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/vectormap-home/vectormap-world-mill-en.js') }}"></script>

    <!-- apex chrat  -->
     <script src="{{ asset('assets/vendors/apex_chart/apex-chart2.js') }}"></script>
    <script src="{{ asset('assets/vendors/apex_chart/apex_dashboard.js') }}"></script>

    <script src="{{ asset('assets/vendors/echart/echarts.min.js') }}"></script>


     <script src="{{ asset('assets/vendors/chart_am/core.js') }}"></script>
    <script src="{{ asset('assets/vendors/chart_am/charts.js') }}"></script>
    <script src="{{ asset('assets/vendors/chart_am/animated.js') }}"></script>
    <script src="{{ asset('assets/vendors/chart_am/kelly.js') }}"></script>
    <script src="{{ asset('assets/vendors/chart_am/chart-custom.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('assets/js/dashboard_init.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @stack('script')
</body>

</html>
