@extends('backend.layouts.app')
@section('title', 'Edit Currency')

@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Edit Currency</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <form action="{{ route('admin.currencies.update', $currency->id) }}" method="POST">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        id="name" aria-describedby="emailHelp" placeholder="Name"
                                        value="{{ old('name') ?? $currency->name }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Symbol</label>
                                    <input type="text" name="symbol"
                                        class="form-control @error('symbol') is-invalid @enderror" id="symbol"
                                        aria-describedby="emailHelp" placeholder="Symbol"
                                        value="{{ old('name') ?? $currency->symbol }}">
                                    @error('symbol')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
