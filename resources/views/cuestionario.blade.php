@extends('layouts.masterAnimationCues') @section('title', 'Responder Cuestionario') @section('content')

      <div class="fs-form-wrap r-cuestionario" id="fs-form-wrap">
      <div class="fs-title">
      <h3>Responder cuestionario {{$cuestionario->nombre}}</h3>
      </div>
      <form action="/responder/{{$cuestionario->id}}" method="post" class="form fs-form fs-form-full" enctype="multipart/form-data" id="cuestForm" autocomplete="off">
      {{ csrf_field() }}
      <?php
       ?>
      <ol class="fs-fields">
        @component('components/instructions')
        @endcomponent
        @foreach($cuestionario->allPreguntas() as $index => $pregunta)
          @component('components/preguntafield',['pregunta' => $pregunta, 'cuest_id' => $cuestionario->id, 'index' => $index+1])
          @endcomponent
        @endforeach
      </ol>
      <div class="center-content fs-submit" style="position: relative;">
          <a href="/responder/{{$cuestionario->id}}" class="btn btn-danger">Limpiar</a>
        @if(Auth::user()->role === 'superadmin' ||Auth::user()->role === 'experto')
          <a class="btn btn-warning" href="/responder">Volver</a>
        @endif
        @if(Auth::user()->role === 'empresa')
          <input type="submit" class="btn btn-primary" value="guardar" id="save_button">
          <input type="submit" class="btn btn-success btn-small" value="enviar" onclick="validate_fields();" title="Todas las preguntas deben tener una respuesta asginada para enviar.">
        @endif
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

  <script type="text/javascript">
    function validate_fields(){
      $("select").attr('required',true);
    }

    $(document).on("click", function () {
      var flag = 1;
      $("select").each(function(){
        if (!$(this).val()) {
          flag = 0;
        }
      }
      )
      if (flag===1) {
        $('#save_button').hide()
      }
    });

    $(document).on("click", "#continuar", function() {
      $("#numbers").css('display', 'block');
      $(".instructions-box").css('display', 'none');
      $(".fs-jump").css('display', 'block');
    });


  </script>

  @endsection
