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
                <div class="card-header">{{ __('List Company') }} <a class="btn btn-primary dtn-link" style="float: right;" href="{{route('companies.create') }}">Add More</a>  </div>
                
                <div class="card-body">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                
                              <thead class="thead-light" id="myTable">
                                <tr>
                                  <th> ID</th>
                                  <th>Name</th>
                                  <th>E-mail</th>
                                  <th>Logo</th>
                                  <th>Url</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>

                                

                               @foreach($companies as $company)
          
                               <tr>
                                  <td>{{$company->id}}</td>
                                  <td>{{$company->name}}</td>
                                  <td>{{$company->email}}</td>
                                  <td><img src="{{url('image/'.$company->logo)}}" width="70px" height="70px" alt="logo"></td>
                                  <td>{{$company->url}}</td>
                                  <td>
                                    <form action="{{route('companies.destroy', $company->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger dtn-link" onclick="return confirm('Do You want to delete it')">Delete</button>
                                    </form>
                                </td>

                                <td><a href="{{route("companies.edit",$company->id)}}" class="btn btn-primary dtn-link">Edit</a></td>
                                  

                                  
                                  
                                  
                                                                       
                                </tr>
          
                               @endforeach
          
                              </tbody>
                            </table>
                            {!! $companies->links() !!}
                          
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- {{$company->logo}} --}}
