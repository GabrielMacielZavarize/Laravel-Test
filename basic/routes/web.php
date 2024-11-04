<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/produtos', [TestController::class, 'listarProdutos'])->name('produtos.index');
// Define uma rota GET que aponta para o método listarProdutos do TestController.
// Quando o usuário acessa "/produtos" no navegador, o método listarProdutos é executado.
Route::get('/produtos/create',[TestController::class,'mostrarFormulario'])->name('produtos.create');
Route::post('/produtos', [TestController::class,'salvarProduto'])->name('produtos.store');
Route::get('/produtos/{id}/edit', [TestController::class, 'editarProduto'])->name('produtos.edit');
Route::put('/produtos/{id}', [TestController::class, 'atualizarProduto'])->name('produtos.update');
Route::delete('/produtos/{id}', [TestController::class, 'excluirProduto'])->name('produtos.destroy');
Route::resource('categorias', CategoriaController::class); // Cria rotas RESTful para categorias
