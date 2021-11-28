@extends('layouts.main')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">City</h1>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit City
                        <div class="float-right">
                            <a href="{{route('cities.index')}}" class="btn btn-info fw-bold">  &larr; Back</a>
                        </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('cities.update',$city->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="cityname" class="col-md-4 col-form-label text-md-right">{{ __('City Name') }}</label>

                            <div class="col-md-6">
                                <input id="cityname" type="text" class="form-control @error('cityname') is-invalid @enderror" name="cityname" value="{{ old('cityname',$city->name) }}" required autocomplete="non" autofocus>

                                @error('cityname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                        </div>

                        <div class="form-group row">
                            <label for="statename" class="col-md-4 col-form-label text-md-right">{{ __('State Name') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="stateid">
                                    @foreach ($states as $state)


                                    <option  value="{{ $state->id }}" {{ $state->id == $city->state_id ? 'selected' : ''}}>{{ $state->name }}</option>


                                    @endforeach
                                  </select>
                            </div>


                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit City') }}
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
