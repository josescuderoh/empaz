@extends('layouts.master') @section('title', 'Panel de Dimensiones') @section('content')
<div class="row">
  <div class="col-12 card">
    <div class="card-body">
      <h2>Lista de Dimensiones</h2>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($dimensiones as $dimension)
          <p></p>
          <tr>
            <td>{{$dimension->nombre}}</td>
            <!-- <td>{{$dimension->descripcion}}</td> -->
            <!-- <td>
              @if($dimension->logo)
              <img class="dimension-logo" src="{{asset("storage/".$dimension->logo)}}" alt="logo-{{$dimension->nombre}}">
              @else
              <span>No logo avalaible.</span>
              @endif
            </td> -->
            <td>{{ucfirst($dimension->estado)}}</td>
            <td>
              <a class="btn btn-sm btn-primary" href="/dimensiones/{{$dimension->id}}/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
              <a class="btn btn-sm btn-danger" href="/dimensiones/{{$dimension->id}}/delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
              <a class="btn btn-sm btn-primary descripcion" href="#" data-toggle="tooltip" title="{{$dimension->descripcion}}"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer">
      <div class="pull-righ">
        <a class="btn btn-primary" href="/dimensiones/new/">Crear dimensión</a>
      </div>
    </div>
  </div>
</div>
@endsection