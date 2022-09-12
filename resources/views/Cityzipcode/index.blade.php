@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
        <div class="col-md-16">
            <div class="card">
                {{-- <form method="get" action="{{route('company.data')}}"> --}}
                <div class="card-header">{{ __('List Company') }} 
                
                    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                    <select class="page_limit pgination-select" name="page" id="page" onchange="myFunction()">
                        <option value="5">5</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="150">150</option>
                    </select>
                   
                    {{-- <button type="submit" class="btn btn-primary dtn-link">Submit</button> --}}

                    <a class="btn btn-primary dtn-link" style="float: right;" href="{{route('companies.create') }}">Add More</a>  </div>
                </div>
            </form>
                <div class="card-body">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                
                              <thead class="thead-light" id="myTable">
                                <tr>
                                  <th> ID</th>
                                  <th>Zipcode</th>
                                  <th>country_city_id</th>
                                  
                                  
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>

                                

                               @foreach($zipcodes as $zipcode)
          
                               <tr>
                                  <td>{{$zipcode->id}}</td>
                                  <td>{{$zipcode->zipcode}}</td>
                                  <td>{{$zipcode->id}}</td>
                                  
                                 
                                  <td>
                                    <form action="{{route('cityzipcodes.destroy', $zipcode->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger dtn-link" onclick="return confirm('Do You want to delete it')">Delete</button>
                                    </form>
                                </td>

                                <td><a href="{{route("cityzipcodes.edit",$zipcode)}}" class="btn btn-primary dtn-link">Edit</a></td>                                     
                                </tr>
          
                               @endforeach
          
                              </tbody>
                            </table>
                            

                            <script>
                                function myFunction() {
                                  var x = document.getElementById("page").value;
                                //   document.getElementById("demo").innerHTML = "You selected: " + x;
                                var url=`http://127.0.0.1:8000/companies?page=${x}`;
                                                              
                             window.location.href=url;
                                }
                                </script>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection





{{-- {{$company->logo}} --}}
