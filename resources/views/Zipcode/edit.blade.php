
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
                <div class="card-header">{{ __(' Zipcode') }}<a class="btn btn-danger dtn-link" style="float: right;" href="{{route('employees.index') }}">Back</a></div>
                
                <div class="card-body">
                    <div class="card-body">
                        <form method="POST" action="{{route('zipcodes.update',$data->id)}}"  >
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value={{$data->id}}>
                            <div class="row mb-3" >
                                <label for="city_zipcode_id" class="col-md-4 col-form-label text-md-end">{{ __('city_zipcode_id') }}</label>
    
                                <div class="col-md-6 " >
                                    
                    
                    <select name="city_zipcode_id" class="form-control">

                        @foreach($companies as $company)
<option  class="from-control" value="{{ $company->id}}">{{$company->zipcode}}</option>
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
                                <label for="streetname" class="col-md-4 col-form-label text-md-end">{{ __('streetname') }}</label>
    
                                <div class="col-md-6">
                                    <input id="streetname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="streetname" value={{$data->street_name}} autocomplete="name" autofocus>
    
                                    @error('streetname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="streetnumber" class="col-md-4 col-form-label text-md-end">{{ __('streetnumber') }}</label>
    
                                <div class="col-md-6">
                                    <input id="streetnumber" type="text" class="form-control @error('lastname') is-invalid @enderror" name="streetnumber" value={{$data->street_number}} autocomplete="name" autofocus>
    
                                    @error('streetnumber')
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
