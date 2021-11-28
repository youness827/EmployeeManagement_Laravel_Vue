@extends('layouts.main')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Countries</h1>
</div>
    <div class="row">
    <div class="card mx-auto">

      @if (session()->has('message'))
          <div class="alert alert-success">
            {{
             session('message');
            }}
          </div>
      @endif

      <div class="card-header">
       <a href="{{route('countries.create')}}" class="float-right btn btn-outline-primary">Create New Countries</a>

       <form method="GET" action="{{route('countries.index')}}">
        <div class="form-row align-items-center">
          <div class="col-auto">
            <input type="text" name="search" class="form-control mb-2" id="inlineFormInput" placeholder="By Country's Code ...">
          </div>
          <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-2">Search</button>
          </div>
        </div>
      </form>

      </div>
    <div class="card-body">
    <table class="table table-responsive">
            <thead>
            <tr>

               <th scope="col">Country code</th>
               <th scope="col">Country Name</th>
               <th scope="col">Created_at</th>
               <th scope="col">Updated_at</th>
               <th scope="col" class="text-red">Operations</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($countries as $country)
            <tr>

               <td>{{$country->countrycode}}</td>
               <td>{{$country->name}}</td>
               <td>{{$country->created_at}}</td>
               <td>{{$country->updated_at}}</td>
               <td>
                <div class="container px-4">
                  <div class="row gx-5">
                    <div class="col">
                     <div class="p-1">
                       <a href="{{ route('countries.edit', $country->id ) }}" class="btn btn-primary" >Edit</a>
                     </div>
                    </div>
                    <div class="col">
                      <div class="p-1">
                        <form action="{{ route('countries.destroy', $country->id ) }}" method="post">
                        @csrf
                        @method('delete')
                          <button type="submit" class="btn btn-danger" >Delete</button>
                        </form></div>
                    </div>
                  </div>
                </div>



              </td>
            </tr>
            @endforeach
            </tbody>
        </table>
</div>
  </div>
    </div>

@endsection