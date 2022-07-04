<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ingredient;
use Milon\Barcode\DNS1D;

class IngredientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function ingredientPage(Request $request)
    {
        // $products = Ingredient::getAllData($request);
        // $this->setBarcode($products['data']);

        // if (empty($request->reqType)) {
        //     return ['datarows' => $products['data'], 'count' => $products['count']];
        // } else {
        //     return ['datarows' => $products];
        // }
        // return view("ingredients.ProductsIndex");
        return dd("something");

    }

    // public function getIngredient(Request $request)
    // {
    //     $products = Ingredient::getAllData($request);
    //     $this->setBarcode($products['data']);

    //     if (empty($request->reqType)) {
    //         return ['datarows' => $products['data'], 'count' => $products['count']];
    //     } else {
    //         return ['datarows' => $products];
    //     }
    // }

    // private function setBarcode($products)
    // {
    //     $collection = collect($products);
    //     $barcodeManipulation= $collection->map(function ($item) {

    //         $variants = collect($item->variants);

    //         $variants->map(function ($barcode){
    //             $barcode->newBarcode = '<img src="data:image/png;base64,' . (new DNS1D)->getBarcodePNG($barcode->newBarcode, "C39") . '" alt="barcode" />';
    //         });
    //     });
    //     return $barcodeManipulation->all();

    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
