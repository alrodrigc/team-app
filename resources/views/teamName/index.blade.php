@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="jumbotron">
      <h1 class="display-4">Nombres registrados</h1>
      <p class="lead">
        Regístrate para votar.
        <ul>
          <li>Si votaste por un nombre, puedes volver a votar por el mismo una semana después</li>
          <li>Puedes votar por varios nombres</li>
          <li>Puedes registrar tantos nombres como quieras.</li>
        </ul>
      </p>
      <hr class="my-4" />
      <table class="table table-sm table-bordered table-light table-striped table-hover">
        <thead class="thead-dark">
          <tr>
            <th>Nombre</th>
            <th>Votos</th>
            @auth
            <th>&nbsp;</th>
            @endauth
          </tr>
        </thead>
        <tbody id="records">
          @foreach($teamNames as $n)
            <tr>
              <td>{{ $n->name }}</td>
              <td align="center">{{ $n->votes_count }}</td>
              @auth
              <td align="center">
                <vote-button team-name="{{ $n->name }}"
                             disabled="{{ in_array($n->name, $userVotes) }}" />
              </td>
              @endauth
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-center">
        <a class="btn btn-primary btn-lg"
           href="{{ route('teamNames.create') }}" role="button">Agregar</a>
      </div>
    </div>
  </div>
@endsection
