@extends('layouts.main')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Departement</h1>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Departement
                        <div class="float-right">
                            <a href="{{route('departements.index')}}" class="btn btn-info fw-bold">  &larr; Back</a>
                        </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('departements.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="departementname" class="col-md-4 col-form-label text-md-right">{{ __('Departement Name') }}</label>

                            <div class="col-md-6">
                                <input id="departementname" type="text" class="form-control @error('departementname') is-invalid @enderror" name="departementname" value="{{ old('departementname') }}" required autocomplete="non" autofocus>

                                @error('departementname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Departement') }}
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
