@extends('layouts.master') @section('title', 'Editar Pregunta') @section('content')
<div class="row indicadores-form">
    <div class="card col-12">
        <div class="card-body">
            <form action="/questions/{{$question->id}}" method="post" class="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nombre">Texto</label>
                    <input type="text" class="form-control" name="texto" value="{{$question->texto}}">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control">{{$question->descripcion}}</textarea>
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="tipo_respuesta">Tipo de Respuesta</label>
                    <br>
                    <select name="tipo_respuesta" id="tipo_respuesta" class="form-control">
                        <option value="tipo_1" {{ $question->tipo_respuesta === 'tipo_1' ? 'selected': ''}}>Tipo 1</option>
                        <option value="tipo_2" {{ $question->tipo_respuesta === 'tipo_2' ? 'selected': ''}}>Tipo 2</option>
                        <option value="tipo_3" {{ $question->tipo_respuesta === 'tipo_3' ? 'selected': ''}}>Tipo 3</option>
                        <option value="tipo_4" {{ $question->tipo_respuesta === 'tipo_4' ? 'selected': ''}}>Tipo 4</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="importancia">Indicadores</label>
                    <select name="indicadores[]" id="indicadores-select" multiple="multiple">
                        @foreach($indicadores as $indicador)
                        <option value="{{$indicador->id}}" selected>{{$indicador->nombre}}</option>
                        @endforeach
                        @foreach($restIndicadores as $indicador)
                        <option value="{{$indicador->id}}">{{$indicador->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="from-group">
                    <input type="submit" class="btn btn-primary" value="Guardar">
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
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#indicadores-select').multiSelect()
    });

</script>
@endsection
