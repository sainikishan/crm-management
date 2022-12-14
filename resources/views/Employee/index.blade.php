@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <form method="get" action="{{route('employee.data')}}">
                <div class="card-header">{{ __('Create Employee') }} 
                   
                        {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                        <select class="page_limit pgination-select" name="page">
                            <option value="5">5</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="150">150</option>
                        </select>
                        <button type="submit" class="btn btn-primary dtn-link">Submit</button>
                        </form>
                    <a class="btn btn-primary dtn-link" style="float: right;" href="{{route('employees.create') }}">Add Employee</a></div></div>
                <div class="card-body">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                
                              <thead class="thead-light" id="myTable">
                                <tr>
                                  <th> ID</th>
                                  <th>FirstName</th>
                                  <th>LastName</th>
                                  <th>Company Id</th>
                                  <th>Email</th>
                                  <th>Phone</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>


                               @foreach($companies as $company)
          
                               <tr>
                                  <td>{{$company->id}}</td>
                                  <td>{{$company->firstname}}</td>
                                  <td>{{$company->lastname}}</td>
                                  <td>{{$company->company_id}}</td>
                                  <td>{{$company->email}}</td>
                                  <td>{{$company->phone}}</td>
                                  <td>
                                    <form action="{{route('employees.destroy', $company->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger dtn-link" onclick="return confirm('Do You want to delete it ?')">Delete</button>
                                    </form>
                                </td>

                                <td><a href="{{route("employees.edit",$company->id)}}" class="btn btn-primary dtn-link" onclick="return confirm('Do You want to Edit it ?')">Edit</a></td>
                                                                       
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
