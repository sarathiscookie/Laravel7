@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ __('general.dashboard.header') }}</h1>
      </div>

      <div class="card border-primary">
        <div class="card-header bg-primary"> {{ __('general.dashboard.cardHeader') }} </div>

        @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }} <br><br>

              Js File:- {{ session('clientJS') }} <br><br>

              Button Link:- {{ session('clientURL') }}
          </div>
        @endif

        <div class="card-body">
          <form method="POST" action="{{ route('model.store') }}" enctype="multipart/form-data">

            @csrf

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="name">{{ __('general.dashboard.name') }} <span class="required">*</span></label>
                
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="Model Name" maxlength="150" autocomplete="off">
                
                @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group col-md-6">
                <label for="number">{{ __('general.dashboard.number') }} <span class="required">*</span></label>
                
                <input type="number" class="form-control @error('number') is-invalid @enderror" name="number" id="number" value="{{ old('number') }}" placeholder="Model Number" maxlength="50" autocomplete="off">
                
                @error('number')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="size">{{ __('general.dashboard.size') }} <span class="required">*</span></label>
                
                <input type="text" class="form-control @error('size') is-invalid @enderror" name="size" id="size" placeholder="Size" maxlength="50" autocomplete="off">
                
                @error('size')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group col-md-6">
                <label for="photo">{{ __('general.dashboard.photo') }}</label>
                <input type="file" class="form-control-file" name="photo" id="photo">
              </div>
            </div>

            <div class="form-group">
              <label for="description">{{ __('general.dashboard.description') }} </label>
              <textarea class="form-control" id="description" name="description" rows="5" placeholder="Model Description"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">{{ __('general.dashboard.buttonName') }}</button>
            
          </form>
        </div>

      </div>
    </main>
@endsection
