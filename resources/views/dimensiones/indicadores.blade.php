@extends('layouts.master') @section('title', 'Agregar Dimensiones - Cuestionario') @section('content')
<div class="indicadores-form">
  @foreach($dimensiones as $dimension)
  @if($indicadores->isNotEmpty())
  <h1>{{$dimension->nombre}}</h1>
  <div class="card col-12">
    <div class="card-body">
      @foreach($indicadores as $indicador)
      @if(!$dimension->indicadores($cuestionario->id)->pluck("id")->contains($indicador->id))
      <h3>{{$indicador->nombre}}</h3>
      <form method="POST" action="/cuestionarios/{{$cuestionario->id}}/indicadores/{{$indicador->id}}" class="form-inline">
        {{ csrf_field() }}
        <input type="hidden" name="dimension_id" value="{{$dimension->id}}">
        <div class="input-group col-sm-12">
          <label for="importancia">Asigna un nivel de importancia para este indicador y agregalo a la dimensión:</label>
        </div>
        <div class="input-group col-sm-5">
          <input name="nivel_importancia" class="slider-select" id="ex21" type="text" data-provide="slider" data-slider-ticks="[1, 2, 3, 4]"
            data-slider-ticks-labels='["Bajo", "Medio", "Alto", "Muy Alto"]' data-slider-min="1" data-slider-max="5" data-slider-step="1"
            data-slider-value="" data-slider-tooltip="hide" />
        </div>
        <div class="input-group col-sm-7">
          <input type="submit" value="Asignar" class="btn btn-primary">
        </div>
      </form>
      @endif @endforeach
    </div>
  </div>
  @endif
  @endforeach
  <h1>Indicadores asociados</h1>
  <div class="card col-12">
    <div class="card-body">
      <table class="table table-bordered table-hover table-striped">
        <thead>
          <tr>
            <th>Dimension</th>
            <th>Indicador</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($dimensiones as $dimension) @foreach($dimension->indicadores($cuestionario->id) as $indicador)
          <tr>
            <td>{{$dimension->nombre}}</td>
            <td>{{$indicador->nombre}}</td>
            <td>
              <form action="/dimensiones/{{$dimension->id}}/indicadores/{{$indicador->id}}/delete" method="POST">
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
    <a class="btn btn-warning" href="/cuestionarios/{{$cuestionario->id}}/dimensiones">
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
    $('#indicadores-select').multiSelect()
  });
</script> @endsection