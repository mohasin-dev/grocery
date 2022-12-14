@extends('backend.layouts.app2')
@section('title', 'Forget Password')

@section('content')
<div class="main_content_iner" style="margin-top: 3%; padding: 30px; padding-top: 13%; padding-bottom: 150px;">
    <div class="container-fluid p-0">
            <div class="col-lg-12">
                <div class="white_box mb_30" style="background-color: #eff3f7;">
                    <div class="row justify-content-center">
                        <div class="col-lg-4">
                            <!-- sign_in  -->
                            <div class="modal-content cs_modal">
                                <div class="modal-header theme_bg_1 justify-content-center">
                                    <h5 class="modal-title text_white ">Forget Password</h5>
                                </div>
                                <div class="modal-body">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="form-group">
                                            {{-- <input type="text" class="form-control" placeholder="Enter your email"> --}}

                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn_1 full_width text-center">SEND</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
