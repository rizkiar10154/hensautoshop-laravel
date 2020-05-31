<?php

namespace App\Http\Controllers\Hensautoshop;

use App\Http\Requests\RegistrasiRequest;
use App\Kategori;
use App\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use storage;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Compound;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('hensautoshop.register.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //  $kategori = Kategori::pluck('kategori_nama','id');

        return view('hensautoshop.register.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegistrasiRequest $request)
    {
        //
        $input = $request->all();

        //upload foto
        if ($request->hasFile('brand_foto')) {
            $foto = $request->file('brand_foto');
            $ext = $foto->getClientOriginalExtension();

            if ($request->file('brand_foto')->isValid()) {
                $foto_name = date('YmdHis') . ".$ext";
                $upload_path = 'public/fotobrand';
                $request->file('brand_foto')->move($upload_path, $foto_name);
                $input['brand_foto'] = $foto_name;
            }
        }

        $data = Brand::create($input);
        $id = $data->id;

        $data->kategori()->attach($request->input('brand_kategori'));



        Session::flash('flash_message', 'Registrasi Berhasil, Tunggu konfirmasi dari kami.');
        Session::flash('penting', true);
        return redirect('register');
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
        $new_register = Brand::findOrFail($id);
        return view('hensautoshop.register.index', compact('new_register'));
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
