<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;

class VentasController extends Controller
{
    public function index(){
        $listaVentas = Venta::all();
        return view('venta.index', compact('listaVentas'));
    }

    public function create(){
        return view('venta.create');
    }

    public function store(Request $request){

        $venta = new Venta();
        $venta->producto = $request->producto;
        $venta->cantidad = $request->cantidad;
        $venta->precio = $request->precio;
        $venta->total = $request->total;
        $venta->save();

        return redirect()->route('ventas.index');
    }

    public function edit($id){
        $venta = Venta::findOrFail($id);
        return view('venta.edit', compact('venta'));
    }

    public function update(Request $request, $id){
        $venta = Venta::findOrFail($id);

        $venta->producto = $request->producto;
        $venta->cantidad = $request->cantidad;
        $venta->precio = $request->precio;
        $venta->total = $request->total;

        $venta->save();

        return redirect()->route('ventas.index');
    }

    public function destroy($id){
        $venta = Venta::findOrFail($id);
        $venta->delete();

        return redirect()->route('ventas.index');
    }
}