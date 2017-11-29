@extends('layouts.master') @section('title', 'Agregar Indicadores - Cuestionario') @section('content')
<div class="preguntas-form">
  @foreach($indicadores as $indicador)
  @if($preguntas->isNotEmpty())
  <h1>{{$indicador->nombre}}</h1>
  <div class="card col-12">
    <div class="card-body">
        {{ csrf_field() }}
        <input type="hidden" name="indicador_id" value="{{$indicador->id}}">
        <table class="table table-bordered table-hover table-striped">
        <thead>
          <tr>
            <th>Pregunta</th>
            <th>Requerida</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
        @foreach($preguntas as $pregunta)
      @if(!$indicador->preguntas($cuestionario->id)->pluck("id")->contains($pregunta->id))
      <form method="POST" action="/cuestionarios/{{$cuestionario->id}}/preguntas/{{$pregunta->id}}" class="form-inline">
          <tr>
            <td>{{$pregunta->nombre}}</td>
            <td><select name="required" id="required" class="form-control">
            <option value="true">Requerida</option>
            <option value="false">Opcional</option>
          </select></td>
            <td>
            <input type="submit" value="Asignar" class="btn btn-primary">
            </td>
          </tr>
       </form>
      @endif
      @endforeach   
        </tbody>
      </table>
    </div>
  </div>
  @endif
  @endforeach
  <h1>Preguntas asociadas</h1>
  <div class="card col-12">
    <div class="card-body">
      <table class="table table-bordered table-hover table-striped">
        <thead>
          <tr>
            <th>Dimension</th>
            <th>Pregunta</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($indicadores as $indicador) @foreach($indicador->preguntas($cuestionario->id) as $pregunta)
          <tr>
            <td>{{$indicador->nombre}}</td>
            <td>{{$pregunta->nombre}}</td>
            <td>
              <form action="/indicadores/{{$indicador->id}}/preguntas/{{$pregunta->id}}/delete" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="cuestionario_id" value="{{$cuestionario->id}}">
                <input type="submit" value="Eliminar" class="btn btn-danger">
              </form>
            </td>
          </tr>
          @endforeach @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="form-group">
    <a class="btn btn-warning" href="/cuestionarios/{{$cuestionario->id}}/indicadores">
      Atrás
    </a>
    <a class="btn btn-primary pull-right" href="/cuestionarios/{{$cuestionario->id}}/preguntas">
      Siguiente
    </a>
  </div>
</div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
</div>
</div>
<script>
  $(document).ready(function () {
    $('#preguntas-select').multiSelect()
  });
</script> @endsection