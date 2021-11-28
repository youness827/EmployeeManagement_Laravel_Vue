@extends('layouts.main')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">State</h1>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit State
                        <div class="float-right">
                            <a href="{{route('states.index')}}" class="btn btn-info fw-bold">  &larr; Back</a>
                        </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('states.update',$state->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="statename" class="col-md-4 col-form-label text-md-right">{{ __('State Name') }}</label>

                            <div class="col-md-6">
                                <input id="statename" type="text" class="form-control @error('statename') is-invalid @enderror" name="statename" value="{{ old('statename',$state->name) }}" required autocomplete="non" autofocus>

                                @error('statename')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                        </div>

                        <div class="form-group row">
                            <label for="countrycode" class="col-md-4 col-form-label text-md-right">{{ __('Country\'s Code') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="countryid">
                                    @foreach ($countries as $country)


                                    <option  value="{{ $country->id }}" {{ $state->country_id == $country->id ? 'selected' : ''}}>{{ $country->countrycode }}</option>


                                    @endforeach
                                  </select>
                            </div>


                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit State') }}
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
