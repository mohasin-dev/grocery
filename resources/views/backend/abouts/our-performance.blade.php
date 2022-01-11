@extends('backend.layouts.app')
@section('title', 'About Our performance')

@section('content')
<div class="main_content_iner ">
    <div class="container-fluid p-0 sm_padding_15px">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">About Our performance</h3>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <form action="{{ route('admin.about.update') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="section2_tittle">Tittle</label>
                                        <input type="text" name="section2_tittle"
                                            class="form-control @error('section2_tittle') is-invalid @enderror" id="section2_tittle"
                                            aria-describedby="emailHelp" placeholder="About Main Tittle"
                                            value="{{ old('section2_tittle') ?? $abouts->section2_tittle }}">
                                        @error('section2_tittle')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="section2_description">Description</label>
                                        <textarea rows="3" name="section2_description"
                                            class="form-control @error('section2_description') is-invalid @enderror" id="summernote"
                                            aria-describedby="emailHelp" placeholder="section2_description"
                                            >{{ old('section2_description') ?? $abouts->section2_description }}</textarea>
                                        @error('section2_description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="section2_image1">Image 01</label><br>
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" name="section2_image1" class="custom-file-input" id="inputGroupFile02" >
                                                <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                            </div>
                                        </div>
                                      </div>
                                    @error('logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="who_description">Who we are</label>
                                            <textarea rows="5" name="who_description"
                                                class="form-control @error('who_description') is-invalid @enderror"
                                                aria-describedby="emailHelp" placeholder="who_description"
                                                >{{ old('who_description') ?? $abouts->who_description  }}</textarea>
                                            @error('who_description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="our_description">Our history</label>
                                            <textarea rows="5" name="our_description"
                                                class="form-control @error('our_description') is-invalid @enderror"
                                                aria-describedby="emailHelp" placeholder="our_description"
                                                >{{ old('our_description') ?? $abouts->our_description  }}</textarea>
                                            @error('our_description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label for="mission_description">Our mission</label>
                                            <textarea rows="5" name="mission_description"
                                                class="form-control @error('mission_description') is-invalid @enderror"
                                                aria-describedby="emailHelp" placeholder="mission_description"
                                                >{{ old('mission_description') ?? $abouts->mission_description   }}</textarea>
                                            @error('mission_description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">About Performance Image</h3>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="section2_image1">Previous Image 01</label><br>
                                <div class="form-group">
                                    <img class="custom-img" src='{{ asset('assets/img/uploads/abouts/'.$abouts->section2_image1) }}' width='280' height='280' >
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