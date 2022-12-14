@extends('backend.layouts.app')
@push('styles')
    <style>
        .password_with_eye {
            width: 100%;
            display: inline-flex;
            overflow: hidden;

        }

        .eye-icon {

            position: absolute;
            margin-left: -44px;
            margin-top: 13px;

        }

    </style>
@endpush
@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Change Password</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <form action="{{ route('admin.user.update_password') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="old_password">Old Password</label>
                                    <input type="password" name="old_password"
                                        class="form-control password_with_eye @error('old_password') is-invalid @enderror" id="old_password"
                                        aria-describedby="old_passwordHelp" placeholder="Old Password"
                                        value="{{ old('old_password') }}">
                                        <i class="fa fa-eye-slash eye-icon" aria-hidden="true"></i>
                                    @error('old_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">New Password</label>
                                    <input type="password" name="password"
                                        class="form-control password_with_eye @error('password') is-invalid @enderror" id="password"
                                        aria-describedby="passwordHelp" placeholder="New Password"
                                        value="{{ old('password') }}">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control password_with_eye "
                                        id="password_confirmation" aria-describedby="passwordHelp"
                                        placeholder="Confirm Password" value="{{ old('password_confirmation') }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
    
@push('script')
    <script>
        $(document).ready(function() {
            $(".eye-icon").on('click', function(event) {
                event.preventDefault();
                if ($('.password_with_eye').attr("type") == "text") {
                    $('.password_with_eye').attr('type', 'password');
                    $('.eye-icon').addClass("fa-eye-slash");
                    $('.eye-icon').removeClass("fa-eye");
                } else if ($('.password_with_eye').attr("type") == "password") {
                    $('.password_with_eye').attr('type', 'text');
                    $('.eye-icon').removeClass("fa-eye-slash");
                    $('.eye-icon').addClass("fa-eye");
                }
            });
        });
    </script>
@endpush