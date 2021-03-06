@extends('layouts.master') @section('title', 'Crear Pregunta') @section('content')
<div class="row">
      <div class="card col-12">
        <div class="card-body">
        <div class="fs-title">
            <h2>Crear pregunta</h2>
        </div>
        <form action="/preguntas" method="post" class="form fs-form fs-form-full" id="myform" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="nombre">Texto</label>
                <textarea type="text" rows="1.5" class="form-control" name="nombre">{{ old('nombre') }}</textarea>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="ckeditor" rows="10" cols="80" name="descripcion" id="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                <select name="estado" id="estado" class="form-control cs-select cs-skin-boxes fs-anim-lower">
                    <option value="activo" @if(old('estado')==='activo') selected='selected' @endif>Activo</option>
                    <option value="inactivo" @if(old('estado')==='inactivo') selected='selected' @endif>Inactivo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tipo_respuesta">Tipo de Respuesta</label>
                <br>
                <select name="tipo_respuesta" id="tipo_respuesta" class="form-control">
                    <option value="">Tipo de respuesta</option>
                    <option value="tipo_1" @if(old('tipo_respuesta')==='tipo_1') selected='selected' @endif>Tipo 1</option>
                    <option value="tipo_2" @if(old('tipo_respuesta')==='tipo_2') selected='selected' @endif>Tipo 2</option>
                    <option value="tipo_3" @if(old('tipo_respuesta')==='tipo_3') selected='selected' @endif>Tipo 3</option>
                    <option value="tipo_4" @if(old('tipo_respuesta')==='tipo_4') selected='selected' @endif>Tipo 4</option>
                </select>
            </div>
            <div class="form-group" id="respuesta_1">
                <label for="respuesta_1">Respuesta 1</label>
                <textarea type="text" rows="1.5" name="respuestas[]" class="form-control"  >{{old('respuestas')[0]}}</textarea>
            </div>

            <div class="form-group" id="respuesta_2">
                <label for="respuesta_2">Respuesta 2</label>
                <textarea type="text" rows="1.5" name="respuestas[]" class="form-control"  >{{old('respuestas')[1]}}</textarea>
            </div>

            <div class="form-group" id="respuesta_3">
                <label for="respuesta_3">Respuesta 3</label>
                <textarea type="text" rows="1.5" name="respuestas[]" class="form-control"  >{{old('respuestas')[2]}}</textarea>
            </div>

            <div class="form-group" id="respuesta_4">
                <label for="respuesta_4">Respuesta 4</label>
                <textarea type="text" rows="1.5" name="respuestas[]" class="form-control"  >{{old('respuestas')[3]}}</textarea>
            </div>
            <div class="form-group" id="respuesta_5">
                <label for="respuesta_5">Respuesta N/A</label>
                <input type="text" name="respuestas[]" class="form-control" value="No aplica">
            </div>
            <div class="from-group">
                <a href="/preguntas" class="btn btn-warning">Atrás</a>
                <input type="submit" class="btn btn-primary pull-right" value="Guardar">
            </div>
    </form>
  </div>
</div>
</div>
<script>

    $(document).ready(function () {
        $('#indicadores-select').multiSelect();
        $("#tipo_respuesta").bind('change', function () {
            var respuestaTipo = this.value;
            if (respuestaTipo === "tipo_1") {
                $("#respuesta_4").css("display", "block");
                $("#respuesta_3").css("display", "block");
                $("#respuesta_4").attr("disabled", false);
                $("#respuesta_3").attr("disabled", false);
            }
            if (respuestaTipo === "tipo_2") {
                $("#respuesta_4").css("display", "none");
                $("#respuesta_3").css("display", "block");
                $("#respuesta_4 input").attr("disabled", true);
                $("#respuesta_3").attr("disabled", false);
            }
            if (respuestaTipo === "tipo_3") {
                $("#respuesta_4").css("display", "none");
                $("#respuesta_3").css("display", "none");
                $("#respuesta_4 input").attr("disabled", true);
                $("#respuesta_3 input").attr("disabled", true);
            }
            if (respuestaTipo === "tipo_4") {
                $("#respuesta_4").css("display", "none");
                $("#respuesta_3").css("display", "block");
                $("#respuesta_4 input").attr("disabled", true);
                $("#respuesta_3").attr("disabled", false);
            }
        });
        $('#tipo_respuesta').trigger('change');
    });

</script> @endsection
