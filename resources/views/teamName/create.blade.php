@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Agrega un nombre') }}</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            <form method="POST" action="{{ route('teamNames.store') }}" >
              @csrf
              <div class="form-group">
                <label for="name">Nombre</label>
                <input class="form-control @error('name') is-invalid @enderror"
                       placeholder="Escribe un nombre"
                       type="text" id="name"
                       name="name" value="{{ old('name') }}"
                       required autofocus />

                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="description">Descripción</label>
                <textarea class="form-control"
                          id="description"
                          name="description"
                          rows="3"></textarea>
              </div>
              <div class="form-group d-flex justify-content-center">
                <input class="btn btn-primary" type="submit" value="Enviar" />
              </div>
            </form>
            <br/>
            <a href="{{ route('teamNames.index') }}">{{ __('Regresar') }}</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
