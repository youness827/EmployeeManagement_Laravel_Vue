@extends('layouts.main')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Country</h1>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Country
                        <div class="float-right">
                            <a href="{{route('countries.index')}}" class="btn btn-info fw-bold">  &larr; Back</a>
                        </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('countries.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="countrycode" class="col-md-4 col-form-label text-md-right">{{ __('Code Country') }}</label>

                            <div class="col-md-6">
                                <input id="countrycode" type="text" class="form-control @error('countrycode') is-invalid @enderror" name="countrycode" value="{{ old('countrycode') }}" required autocomplete="non" autofocus>

                                @error('countrycode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="countryname" class="col-md-4 col-form-label text-md-right">{{ __('Country Name') }}</label>

                            <div class="col-md-6">
                                <input id="countryname" type="text" class="form-control @error('countryname') is-invalid @enderror" name="countryname" value="{{ old('countryname') }}" required autocomplete="non" autofocus>

                                @error('countryname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Country') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
