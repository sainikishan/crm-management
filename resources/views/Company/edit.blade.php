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
                <div class="card-header">{{ __('Update Company') }} <a class="btn btn-danger dtn-link" style="float: right;" href="{{route('companies.index') }}">Back</a></div>
                <div class="card-body">
                    <div class="card-body">

                        <form method="POST" action="{{route('companies.update',$data->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                          
                            <input type="hidden" name="id" value="{{$data['id']}}">
    
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data['name'] }}"  autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $data['email'] }}" autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="logo" class="col-md-4 col-form-label text-md-end">{{ __('logo') }}</label>
    
                                <div class="col-md-6">
                                    <input id="logo" type="file" class="form-control @error('logo') is-invalid @enderror" name="logo" value="{{ $data['logo'] }}" >
    
                                    @error('logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <img src="{{url('image/'.$data['logo']) }}"  width="70px" height="70px" alt="">
                                </div>


                            </div>
    
                            <div class="row mb-3">
                                <label for="Website" class="col-md-4 col-form-label text-md-end">{{ __('website') }}</label>
    
                                <div class="col-md-6">
                                    <input id="url" type="url" class="form-control @error('url') is-invalid @enderror" name="url"  value="{{ $data['url'] }}">
                                    @error('url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
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
