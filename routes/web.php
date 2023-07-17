<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Product; // Importamos el modelo Product 

Route::get('products', function () { // Definimos la ruta
    $products = Product::orderBy('created_at', 'desc')->get();
    return view('products.index', compact('products')); // Retornamos la vista index
})->name('products.index'); // Le asignamos un nombre a la ruta

Route::get('products/create', function () {
    return view('products.create');
})->name('products.create');

Route::post('products', function (Request $request) {
    $new_product = new Product;
    $new_product->description = $request->input('description');
    $new_product->price = $request->input('price');
    $new_product->save();
    return redirect()->route('products.index')->with('info', 'Producto creado exitosamente');
})->name('products.store');

Route::delete('products/{id}', function ($id) {
    return $id;
})->name('products.destroy');