<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dimension;
use App\Enunciado;
use App\Indicador;
use App\IndicadoresDimensiones;
use Storage;

class DimensionesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'experto']);
    }

    public function index()
    {
        $dimensiones = Dimension::all();
        return view("dimensiones.index")->with(["dimensiones" => $dimensiones]);
    }

    public function create()
    {
        return view("dimensiones.create");
    }

    public function store(Request $request)
    {
        $validations = [
            "nombre" => "required",
            "descripcion" => "required",
            "enunciados" => "required|array"
        ];
        $this->validate($request, $validations);
        $logo = '';
        if ($request->file("logo")) {
            $logo = Storage::disk('local')->putFile('dimensiones', $request->file("logo"));
        }
        $inputs = $request->all();
        $enunciados = [
            "bajo" => $inputs["enunciados"][0],
            "medio" => $inputs["enunciados"][1],
            "alto" => $inputs["enunciados"][2],
            "muy alto" => $inputs["enunciados"][3]
        ];
        $inputs["logo"] = $logo;
        $dimension = Dimension::create($inputs);
        foreach ($enunciados as $nivel_importancia => $enunciado) {
            $new_enunciado = Enunciado::create([
                "nivel_importancia" => $nivel_importancia,
                "descripcion" => $enunciado,
                "dimension_id" => $dimension->id
            ]);
        }
        return redirect("/dimensiones");
    }

    public function edit($id)
    {
        $dimension = Dimension::find($id);
        $enunciados = Enunciado::where("dimension_id", "=", $dimension->id)->get();
        return view("dimensiones.edit")->with(["dimension" => $dimension, "enunciados" => $enunciados]);
    }

    public function update($id, Request $request)
    {
        $validations = [
            "nombre" => "required",
            "descripcion" => "required",
            "enunciados" => "required|array"
        ];
        $this->validate($request, $validations);
        $dimension = Dimension::find($id);
        if ($request->file("logo")) {
            $logo = Storage::disk('local')->putFile('dimensiones', $request->file("logo"));
            $inputs = $request->all();
            $inputs["logo"] = $logo;
        } else {
            $inputs = $request->all();
        }
        $enunciados = [
            "bajo" => $inputs["enunciados"][0],
            "medio" => $inputs["enunciados"][1],
            "alto" => $inputs["enunciados"][2],
            "muy alto" => $inputs["enunciados"][3]
        ];
        $dimension->update($inputs);
        $dimension->save();
        foreach ($enunciados as $nivel_importancia => $enunciado) {
            $newEnunciado = Enunciado::where("dimension_id", "=", $dimension->id)
                        ->where("nivel_importancia", "=", $nivel_importancia)->first();
            $newEnunciado->descripcion = $enunciado;
            $newEnunciado->save();
        }
        return redirect("/dimensiones");
    }

    public function show($id)
    {
        return redirect("/dimensiones/".$id."/edit");
    }

    public function delete($id, Request $request)
    {
        return view("dimensiones.delete")->with(["id" => $id]);
    }

    public function deleteConfirm($id, Request $request)
    {
        $dimension = Dimension::find($id);
        $dimension->delete();
        return redirect('/dimensiones');
    }

    public function addIndicadores($id)
    {
        $dimension = Dimension::find($id);
        $indicadoresIds = IndicadoresDimensiones
            ::where("dimension_id", "=", $id)->pluck("indicador_id");
        $indicadores = Indicador::whereNotIn("id", $indicadoresIds)->get();
        return view('dimensiones.indicadores')->with([
            "dimension" => $dimension,
            "indicadores" => $indicadores
        ]);
    }

    public function storeIndicadores($id, $indicador_id, Request $request)
    {
        $validations = [
            "nivel_importancia" => "required"
        ];
        $this->validate($request, $validations);
        $importancia = $request->nivel_importancia;
        $dimensionCuestionario = new IndicadoresDimensiones();
        $dimensionCuestionario->indicador_id = $indicador_id;
        $dimensionCuestionario->dimension_id = $id;
        $dimensionCuestionario->nivel_importancia = $importancia;
        $dimensionCuestionario->save();
        return redirect("/dimensiones/".$id."/indicadores");
    }

    public function deleteIndicadores($id, $indicador_id, Request $request)
    {
        $dimensionCuestionario = IndicadoresDimensiones
            ::where("dimension_id", "=", $id)
            ->where("indicador_id", "=", $indicador_id)->first();
        $dimensionCuestionario->delete();
        return redirect("/dimensiones/".$id."/indicadores");
    }
}
