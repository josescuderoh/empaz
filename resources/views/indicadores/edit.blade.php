@extends('layouts.master') @section('title', 'Editar Indicador') @section('content')
<div class="row indicadores-form">
    <div class="card col-12">
        <div class="card-body">
            <form action="/indicadores/{{$indicador->id}}" method="post" class="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="{{$indicador->nombre}}">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control">{{$indicador->descripcion}}</textarea>
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select name="estado" id="estado" class="form-control">
                        <option value="activo" @if($indicador->estado === "activo") selected @endif>Activo</option>
                        <option value="inactivo" @if($indicador->estado === "inactivo") selected @endif>Inactivo</option>
                    </select>
                </div>
                <div class="from-group">
                        <a href="/indicadores/{{$indicador->id}}/preguntas" class="btn btn-info">
                            Preguntas
                        </a>
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
@endsection
