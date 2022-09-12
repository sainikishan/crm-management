@extends('layouts.app')

@section('content')

@if (session('submit'))
    <div class="alert alert-success">
        {{ session('submit') }}
    </div>
@endif

<div class="container">

    

    <div class="row justify-content-center">
        <div class="col-md-12">
            
            <div class="card">
                <div class="card-header">{{ __('Create Country') }}

                     {{-- <a class="btn btn-danger dtn-link" style="float: right;" href="{{route('companies.index') }}">Back</a></div> --}}
                <div class="card-body">
                    <div class="card-body">

                        <form method="POST" action="{{route('countries.store') }}" enctype="multipart/form-data">
                            @csrf
    
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="capital" class="col-md-4 col-form-label text-md-end">{{ __('capital') }}</label>
    
                                <div class="col-md-6">
                                    <input id="capital" type="text" class="form-control @error('capital') is-invalid @enderror" name="capital" value="{{ old('capital') }}" autocomplete="capital">
    
                                    @error('capital')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="currency" class="col-md-4 col-form-label text-md-end">{{ __('currency') }}</label>
    
                                <div class="col-md-6">
                                    <input id="currency" type="text" class="form-control @error('currency') is-invalid @enderror" name="currency" value="{{ old('currency') }}" autocomplete="currency">
    
                                    @error('currency')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="shortcode" class="col-md-4 col-form-label text-md-end">{{ __('shortcode') }}</label>
    
                                <div class="col-md-6">
                                    <input id="shortcode" type="text" class="form-control @error('shortcode') is-invalid @enderror" name="shortcode" value="{{ old('shortcode') }}" autocomplete="shortcode">
    
                                    @error('shortcode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                                    
                            <div class="row mb-3">
                                <label for="callingcode" class="col-md-4 col-form-label text-md-end">{{ __('callingcode') }}</label>
    
                                <div class="col-md-6">
                                    <input id="callingcode" type="text" class="form-control @error('callingcode') is-invalid @enderror" name="callingcode" value="{{ old('callingcode') }}" autocomplete="callingcode">
    
                                    @error('callingcode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="flag" class="col-md-4 col-form-label text-md-end">{{ __('flag') }}</label>
    
                                <div class="col-md-6">
                                    <input id="flag" type="file" class="form-control @error('logo') is-invalid @enderror" name="flag" >
    
                                    @error('flag')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                                  

                            {{-- <div class="row mb-3">
                                <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('status') }}</label>
    
                                <div class="col-md-6">
                                    <input id="status" type="checkbox" class=" @error('email') is-invalid @enderror" name="status" value="{{ old('status') }}" autocomplete="status">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}


    
                            
    
    
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
