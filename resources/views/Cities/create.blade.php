@extends('layouts.main')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">City</h1>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New City
                        <div class="float-right">
                            <a href="{{route('cities.index')}}" class="btn btn-info fw-bold">  &larr; Back</a>
                        </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('cities.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="citiyname" class="col-md-4 col-form-label text-md-right">{{ __('City Name') }}</label>

                            <div class="col-md-6">
                                <input id="citiyname" type="text" class="form-control @error('citiyname') is-invalid @enderror" name="citiyname" value="{{ old('citiyname') }}" required autocomplete="non" autofocus>

                                @error('citiyname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                        </div>

                        <div class="form-group row">
                            <label for="StateName" class="col-md-4 col-form-label text-md-right">{{ __('State\'s Name') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="stateid">
                                    <option selected>States</option>
                                    @foreach ($states as $state)

                                    <option value="{{ $state->id }}">{{ $state->name }}</option>

                                    @endforeach
                                  </select>
                            </div>


                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add City') }}
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
