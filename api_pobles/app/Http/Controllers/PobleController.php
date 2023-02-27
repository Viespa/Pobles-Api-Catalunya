<?php

namespace App\Http\Controllers;

use App\Models\Poble;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PobleController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pobles = Poble::paginate(10);
        return view("poble", compact("pobles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $poble = new Poble();
        $title = __("Afegir poble");
        $textButton = __("Afegir");
        $route = route("poble.store");
        return view("poble.create", compact("poble", "title", "textButton", "route",));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            "nom" => "required",
            "comarca" => "required",
            "provincia" => "required",
            "img" => "required",
            "descripcio" => "required",
            "latitud" => "required",
            "longitud" => "required",



        ]);
        Poble::create($request->all());
        return redirect(route("poble.index"))
            ->with("success", __("El poble " . $request->nom . " s'ha afegit correctament!"));
    }

    public function edit(Poble $poble)
    {
        $update = true;
        $title = __("Editar Poble");
        $textButton = __("Actualitzar");
        $route = route("poble.update", ["poble" => $poble]);;
        return view("poble.edit", compact("poble", "update", "title", "textButton", "route"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Poble $poble)
    {
        $this->validate($request, [

            "nom" => "required",
            "comarca" => "required",
            "provincia" => "required",
            "img" => "required",
            "descripcio" => "required",
            "latitud" => "required",
            "longitud" => "required",
        ]);
        $poble->update($request->all());
        return back()
            ->with("success", __("El Poble " . $request->nom . " s'ha actualitzat correctament!"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Poble $poble)
    {
        $poble->delete();
        return back()->with("success", __("El poble " . $poble->nom . " s'ha eliminat correctament"));
    }
}
