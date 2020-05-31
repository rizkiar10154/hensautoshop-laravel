<?php

namespace App\Http\Controllers\Admin;

use App\Accesories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccesoriesController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

    public function __construct()
    {
        $this->middleware('auth');
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
        $accesories_list = Accesories::where('id_brand', $id)->where('accesories_delete', 0)->get();

        return view('admin.accesories.index', compact('accesories_list'));
    }
}
