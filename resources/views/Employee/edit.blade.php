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
                <div class="card-header">{{ __(' Update Employees') }} <a class="btn btn-danger dtn-link" style="float: right;" href="{{route('employees.index') }}">Back</a></div>
                <div class="card-body">
                    <div class="card-body">
                        <form method="POST" action="{{route('employees.update',$data->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                          
                            <input type="hidden" name="id" value="{{$data['id']}}">
    
                            <div class="row mb-3">
                                <label for="Firstname" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{$data['firstname']}}"  autocomplete="name" autofocus>
    
                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Lastname" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{$data['lastname']}}"  autocomplete="name" autofocus>
    
                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            

    
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$data['email']}}" autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3" >
                                <label for="Company" class="col-md-4 col-form-label text-md-end">{{ __('Company') }}</label>
    
                                <div class="col-md-6 " >
                                    
                    
                    <select name="company">
                        @foreach($companies as $company)



<option  class="from-control" value="{{ $company->id}}">{{$company->name}}</option>
                      @endforeach

                    </select>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('phone') }}</label>
    
                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$data['phone']}}" autocomplete="phone">
    
                                    @error('phone')
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
