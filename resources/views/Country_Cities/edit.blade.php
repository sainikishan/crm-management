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
                <div class="card-header">{{ __('Create Country_Cities') }}
                     {{-- <a class="btn btn-danger dtn-link" style="float: right;" href="{{route('companies.index') }}">Back</a></div> --}}
                <div class="card-body">
                    <div class="card-body">

                        <form method="POST" action="{{route('country_cities.update',$data->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="id" value={{$data['id']}}>
    
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value={{$data['name']}}  autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            


                            <div class="row mb-3" >
                                <label for="Country_id" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>
    
                                <div class="col-md-6 " >
                                    
                    
                    <select name="country_id" class="form-control">

                        @foreach($companies as $company)



<option  class="from-control" value="{{ $company->id}}" >{{$company->name}}</option>
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
