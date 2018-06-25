@extends('layouts.master') @section('title', 'Editar Perfil') @section('content')
<div class="row indicadores-form">
    <div class="card col-12">
        <div class="card-body">
          <h2>Perfil de su empresa</h2>
            <form action="/profile/{{Auth::user()->id}}/edit" method="POST" class="form" >
              {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="user_name">Persona de contacto</label>
                        <input type="text" class="form-control" name="user_name" value="{{Auth::user()->nombre}}" readonly/>
                    </div>

                    <!-- Fill name -->
                    <div class="form-group col-md-6">
                        <label for="nombre">Nombre de la Empresa</label>
                        <input type="text" class="form-control" name="nombre" value="{{$empresa->nombre}}" id="nombre">
                    </div>

                    <!-- Select Country -->
                    <div class="form-group col-md-4">
                        <label for="pais">País</label>
                        <select class="form-control" id="pais" name="pais">
                          <?php
                              function utf8_fopen_read($fileName) {
                                $fc = iconv('windows-1250', 'utf-8', file_get_contents($fileName));
                                $handle=fopen("php://memory", "rw");
                                fwrite($handle, $fc);
                                fseek($handle, 0);
                                return $handle;
                              }

                              $filename = base_path('public\countries.csv');
                              $file = utf8_fopen_read($filename, "r");
                              $countries = array();
                              while (($data = fgetcsv($file, 200, ",")) !==FALSE ){
                                if ($data[0] != "") {
                                  array_push($countries, $data[0]);
                                }
                              }
                              fclose($file);
                              sort($countries);
                          ?>
                            @foreach($countries as $country)
                              <option value="{{$country}}" selected="{{$empresa->pais === $country ? 'selected' : ''}}" >{{$country}}</option>
                            @endforeach
                          </select>
                    </div>

                    <!-- Select departamento -->
                    <div class="form-group col-md-4">
                        <label for="departamento">Departamento</label>
                        <select class="form-control" id="departments" name="departamento">
                            <option>Seleccione una opcion</option>
                        </select>
                    </div>

                    <!-- Select municipio -->
                    <div class="form-group col-md-4">
                        <label for="municipio">Municipio</label>
                        <select class="form-control" id="cities" name="municipio" value="{{ $empresa->municipio ? $empresa->municipio : '' }}">
                            <option>Seleccione una opcion</option>
                        </select>
                    </div>

                    <!-- FIll address -->
                    <div class="form-group col-md-6">
                        <label for="direccion">Dirección</label>
                        <input type="text" name="direccion" value="{{$empresa->direccion}}" class="form-control">
                        <small id="passwordHelp" class="form-text text-muted">Diligencie la dirección completa de su empresa, por ejemplo: Calle 12 # 13 - 24 Of. 301 Edificio Torre Empresarial</small>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="telefono">Teléfono</label>
                        <input type="tel" name="telefono" value="{{$empresa->telefono}}" class="form-control">
                        <small id="passwordHelp" class="form-text text-muted">Si su empresa se ubica en Colombia digite: código ciudad + número sin espacios, puntos ni guiones. En caso de que su empresa no se encuentre en Colombia digite: código país + código ciudad + número.</small>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="web">Pagina Web</label>
                        <input type="text" name="web" value="{{ $empresa->web ? $empresa->web : '' }}" class="form-control">
                    </div>

                    <div class="form-group  col-md-6">
                        <label for="tamano">Tamaño de la Empresa
                          <a class="descripcion tip" data-placement="bottom" href="#" data-toggle="tooltip"><i class="fa fa-info-circle" aria-hidden="true"></i>
                            <span>1. Microempresa: planta de personal no superior a los diez (10) trabajadores y activos totales excluida la vivienda por valor inferior a quinientos (500) salarios mínimos mensuales legales vigentes.
                            2. Pequeña empresa: planta de personal entre once (11) y cincuenta (50) trabajadores y activos totales por valor entre quinientos uno (501) y menos de cinco mil (5.000) salarios mínimos mensuales legales vigentes.
                            3. Mediana empresa: planta de personal entre cincuenta y uno (51) y doscientos (200) trabajadores y activos totales por valor entre cinco mil uno (5.001) a treinta mil (30.000) salarios mínimos mensuales legales vigentes.
                            4. Gran Empresa: planta de personal superior a los doscientos (200) trabajadores y activos totales superiores a treinta mil (30.000) salarios mínimos mensuales legales vigentes.</span>
                          </a>
                        </label>
                        <select class="form-control" id="tamano" name="tamano">
                            <option value="1" selected={{$empresa->tamano === "1" ? 'selected' : ''}}>Micro</option>
                            <option value="2" selected={{$empresa->tamano === "2" ? 'selected' : ''}}>Pequeña</option>
                            <option value="3" selected={{$empresa->tamano === "3" ? 'selected' : ''}}>Mediana</option>
                            <option value="4" selected={{$empresa->tamano === "4" ? 'selected' : ''}}>Grande</option>
                            <option >Seleccione una opción</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="num_trabajadores" class="form-label">Número de trabajadores</label>
                        <input class="form-control" name="num_trabajadores" type="number" min="0" id="num_trabajadores" value="{{ $empresa->num_trabajadores }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="nit">NIT</label>
                        <input type="number" id="nit" name="nit" value="{{$empresa->nit ? $empresa->nit : ''}}" class="form-control" placeholder="Ingrese el NIT">
                        <small id="passwordHelp" class="form-text text-muted">Digite el número de identificación sin puntos ni guiones, para el NIT el dígito de Verificación no es requerido.</small>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="sector_economico">Sector Económico</label>
                        <select class="form-control" name="sector_economico" value="{{$empresa->sector_economico}}">
                            <?php
                            $filename = base_path('public\sectores_empaz.csv');
                            $file = utf8_fopen_read($filename, "r");
                            $sectores = array();
                            while (($data = fgetcsv($file, 500, ",")) !==FALSE ){
                                array_push($sectores, $data[0]);
                            }
                            fclose($file);
                             ?>
                             @foreach($sectores as $sector)
                               <option value="{{$sector}}">{{$sector}}</option>
                             @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="ciiu_principal">Código CIIU Actividad Económica Principal</label>
                        <select class="form-control" name="ciiu_principal" id="ciiu-principal" value="{{$empresa->ciiu_principal ? $empresa->ciiu_principal : ''}}">
                            <option value="Ninguno" selected>Ninguno</option>
                            <?php
                            $filename = base_path('public\codigos_ciiu.csv');
                            $file = utf8_fopen_read($filename, "r");
                            $ciius = array();
                            $ciius_description = array();
                            while (($data = fgetcsv($file, 500, ",")) !==FALSE ){
                                array_push($ciius, $data[0]);
                                array_push($ciius_description, $data[1]);
                            }

                            $ciiu_array = array_combine($ciius, $ciius_description);
                            fclose($file);
                             ?>
                             @foreach($ciiu_array as $ciiu => $ciiu_d)
                               <option value="{{$ciiu}}">{{$ciiu}} - {{$ciiu_d}}</option>
                             @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="ciiu_secundario">Código CIIU Actividad Económica Secundaria</label>
                        <select class="form-control" name="ciiu_secundario" id="ciiu-secundario" value="{{$empresa->ciiu_secundario ? $empresa->ciiu_secundario : '' }}">
                            <option value="Ninguno">Ninguno</option>
                            @foreach($ciiu_array as $ciiu => $ciiu_d)
                              <option value="{{$ciiu}}">{{$ciiu}} - {{$ciiu_d}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript">

'use strict';

function loadDepartamentos() {

    var url = '/js/colombia.json';
    $.get(url, function (data) {
        if (data.length > 0) {
            $.each(data, function (index, item) {
                var contentMenu = document.getElementById("departments");
                var ventana = '<option value="' + item.departamento + '">' + item.departamento + '</option>';

                $(contentMenu).append(ventana);
            });
        }
    });
}

$('#pais').on('change', function (e) {
    var target = e.target;
    if (target.value === 'Colombia') {
        $('#departments').prop('disabled', false);
        $('#cities').prop('disabled', false);
        loadDepartamentos();
    } else {
        $('#cities').prop('disabled', 'disabled');
        $('#cities').val("N/A");
        $('#departments').prop('disabled', 'disabled');
        $('#departments').val("N/A");
    }
});

$('#pais').on('change', function (e) {
    var target = e.target;
    if (target.value === 'Colombia') {
        $('#nit').prop('disabled', false);
        $('#ciiu-principal').prop('disabled', false);
        $('#ciiu-secundario').prop('disabled', false);
    } else {
      $('#nit').prop('disabled', 'disabled');
      $('#ciiu-principal').prop('disabled', 'disabled');
      $('#ciiu-secundario').prop('disabled', 'disabled');
    }
});


$(function () {
    new handleDeparmentsAndCitiesSelectors('#departments', '#cities');
});
</script> @endsection