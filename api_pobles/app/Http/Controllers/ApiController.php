<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use App\Models\Poble;


class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    function saveDataFromAPI()
    {
        $character = HTTP::get('https://analisi.transparenciacatalunya.cat/api/views/9aju-tpwc/rows.json?data');
        $characterArray = $character->json();

        $prov = json_decode(file_get_contents("json/csvjson.json"), true);

        for ($i = 0; $i < count($characterArray["data"]) - 1; $i++) {

            $img = HTTP::get('https://en.wikipedia.org/w/api.php?action=query&formatversion=2&pilimit=3&piprop=thumbnail&prop=pageimages%7Cpageterms&redirects=&titles=' . $characterArray["data"][$i][9] . '&wbptterms=description&format=json');
            $imgArray = $img->json();


            $key = array_search($characterArray["data"][$i][9], $prov);



            if (!isset($imgArray["query"]["pages"]["0"]["thumbnail"]["source"])) {
                $url = "img/not-found.webp";
            } else {
                $url = $imgArray["query"]["pages"]["0"]["thumbnail"]["source"];
            }

            if (!isset($imgArray["query"]["pages"]["0"]["terms"]["description"]["0"])) {
                $desc = "Poble Catala";
            } else {
                $desc = $imgArray["query"]["pages"]["0"]["terms"]["description"]["0"];
            }


            Poble::create([
                'nom' => $characterArray["data"][$i][9],
                'comarca' => $characterArray["data"][$i][11],
                'codi' => $characterArray["data"][$i][8],
                'img' => $url,
                'descripcio' => $desc,
                'provincia' => $prov[$key]["Provincia"],
                'latitud' => $characterArray["data"][$i][15],
                'longitud' =>  $characterArray["data"][$i][14],
            ]);
        }
    }


    public function pobles()
    {
        $characters = Poble::all();
        // return view("main", compact("characters"));

        return view("main", compact("characters"));
    }

    public function saveImg()
    {

        $character = HTTP::get('/json/csvjson.json');
        $characters = $character->json();

        return view("main", compact("characters"));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
