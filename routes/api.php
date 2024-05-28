<?php

use App\Http\Controllers\CadastroAnimalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('animal/cadastrar', [CadastroAnimalController::class, 'Animal']);
Route::get('animal/todos', [CadastroAnimalController::class, 'AnimalRetornar']);
Route::post('animal/pesquisar/nome', [CadastroAnimalController::class, 'AnimalNome']);
Route::post('animal/pesquisar/especie', [CadastroAnimalController::class, 'PesquisarporEspecie']);
Route::post('animal/pesquisar/ra', [CadastroAnimalController::class, 'PesquisarporRa']);
Route::delete('animal/excluir/{id}', [CadastroAnimalController::class, 'AnimalExcluir']);
Route::put('animal/atualizar/{id}', [CadastroAnimalController::class, 'AtualizarAnimal']);
Route::get('animal/encontrar/{id}', [CadastroAnimalController::class, 'AnimalId']);