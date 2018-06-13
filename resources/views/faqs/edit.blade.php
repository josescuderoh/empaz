@extends('layouts.master') @section('title', 'FAQs - Editar') @section('content')

<h2>Editar FAQ</h2>
        {!! Form::open(['action' => ['FaqController@update', $faq->id], 'method' =>'POST']) !!}
        <div class="form-group">
          {{Form::bsLabel('Pregunta')}}
          {{Form::bsText('question', $faq->question, ['placeholder'=>'Ingrese la pregunta'])}}
        </div>
        <div class="form-group">
          {{Form::bsLabel('Respuesta')}}
          {{Form::bsTextArea('answer', $faq->answer, ['placeholder'=>'Ingrese la respuesta correspondiente'])}}
        </div>
          {{ Form::hidden('_method', 'PUT') }}
          {{Form::bsSubmit('Guardar', ['class'=>'btn btn-primary'])}}
        {!!Form::close()!!}
</div>

@endsection
