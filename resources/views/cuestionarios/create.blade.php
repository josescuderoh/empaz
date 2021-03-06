@extends('layouts.master') @section('title', 'Crear Cuestionario') @section('content')
<div class="row indicadores-form">
    <div class="card col-12">
        <div class="card-body">
            <div class="fs-title">
                <h2>Crear Cuestionario</h2>
            </div>
            <form action="/cuestionarios" method="post" class="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" maxlength="191">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="ckeditor" rows="10" cols="80" name="descripcion" id="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="version">Version</label>
                    <input type="number" class="form-control" name="version" value="1" readonly>
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select name="estado" value="{{ old('estado') }}" id="estado" class="form-control">
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                    </select>
                </div>
        </div>
        <div class="from-group">
            <a href="/cuestionarios" class="btn btn-warning">Atrás</a>
            <input type="submit" class="btn btn-primary pull-right" value="Siguiente">
        </div>
        </form>
    </div>
</div>
@endsection
