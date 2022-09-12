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
                <div class="card-header">{{ __('Create ZipCodes') }}
                     {{-- <a class="btn btn-danger dtn-link" style="float: right;" href="{{route('companies.index') }}">Back</a></div> --}}
                <div class="card-body">
                    <div class="card-body">

                        <form method="POST" action="{{route('cityzipcodes.update',$data->id)}}"  >
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{$data['id']}}">
    
                            <div class="row mb-3">
                                <label for="zipcode" class="col-md-4 col-form-label text-md-end">{{ __('Zipcode') }}</label>
    
                                <div class="col-md-6">
                                    <input id="zipcode" type="text" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode" value="{{$data['zipcode']}}"  autocomplete="name" autofocus>
    
                                    @error('zipcode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            


                            <div class="row mb-3" >
                                <label for="Country_id" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>
    
                                <div class="col-md-6 " >
                                    
                    
                    <select name="country_city_id" class="form-control">

                        @foreach($zipcodes as $zipcode)



<option  class="from-control" value="{{ $zipcode->id}}">{{$zipcode->name}}</option>
                      @endforeach

                    </select>
    
                                    @error('email')
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
