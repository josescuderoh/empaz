@extends('layouts.master') @section('title', 'Eliminar Cuestionario') @section('content')
<div class="row">
  <div class="card col-12">
    <div class="card-body">
      <h2>¿Eliminar Cuestionario?</h2>
      <form action="/cuestionarios/{{$id}}/delete" method="post" class="form">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="confirm">¿Está seguro desea eliminar este cuestionario?</label>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-danger" value="Eliminar">
          <a href="/cuestionarios" class="btn btn-primary">Cancelar</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
