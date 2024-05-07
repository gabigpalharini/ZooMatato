<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnimalFormRequest;
use App\Http\Requests\AnimalUpdateFormRequest;
use App\Models\Animal;
use Illuminate\Http\Request;

class CadastroAnimalController extends Controller
{
    public function animal(AnimalFormRequest $request){
        $animal = Animal::create([
            'name' => $request->name,
            'especie' => $request->especie,
            'peso' => $request->peso,
            'altura' => $request->altura,
            'sexo' => $request->sexo,
            'dieta' => $request->dieta,
           'habitat' =>  $request->habitat,
           'idade' =>  $request->idade,
           'ra' => $request->ra,

         ]);
        return response()->json([
            "sucess" => true,
            "message" => "Registro de animal bem-sucedido",
            "data"=> $animal
        ]);
    }
    public function AnimalId($id){
        $animal = Animal::find($id);
        if($animal == null){
            return response()->json([
                'status' => false,
                'message' => "Animal não encontrado"
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $animal
        ]);
    }
    public function animalNome(Request $request){
        $animal = Animal::where('name', 'like', '%' . $request->nome . '%')->get();
        if(count($animal) > 0){
            return response()->json([
                'status' => true,
                'data' => $animal
            ]);
        }
        return response()->Json([
            'status' => false,
            'message' => "Não há resultados para pesquisa"
        ]);
    }

    public function  PesquisarporRa(Request $request){
        $animal = Animal::where('ra', 'like', '%' . $request->ra . '%')->get();
        if(count($animal) > 0){
            return response()->json([
                'status' => true,
                'data' => $animal
            ]);
        }
        return response()->Json([
            'status' => true,
            'message' => "Não há resultados para pesquisa"
        ]);
    }

    public function PesquisarPorEspecie(Request $request)
    {
        $animal = Animal::where('especie', 'like', '%' . $request->especie . '%')->get();

        if (count($animal) > 0) {

            return response()->json([
                'status' => true,
                'data' => $animal
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Não há resultados para a pesquisa.'
        ]);
    }
    
    public function AnimalRetornar(){
        $animal = Animal::All();
        return response()->json([
            'status' => true,
            'data' => $animal
        ]);
    }
    public function AnimalExcluir($id){
        $animal = Animal::find($id);
        if(!isset($animal)){
            return response()->json([
                'status' => false,
                'message' => 'Cliente não encontrado'
            ]);
        }
        $animal->delete();
        return response()->json([
            'status' => true,
            'message' => 'Animal deletado com êxito'
        ]);
        }
        
        public function AtualizarAnimal(AnimalUpdateFormRequest $request){
            $animal = Animal::find($request->id);
            if(!isset($animal)){
                return response()->json([
                    'status' => false,
                    'message' => "Animal não encontrado"
                ]);
            }
            if(isset($request->name)){
                $animal->name = $request->name;
            }
            if(isset($request->especie)){
                $animal->especie = $request->especie;
            }
            if(isset($request->peso)){
                $animal->peso = $request->peso;
            }
            if(isset($request->altura)){
                $animal->altura = $request->altura;
            }
            if(isset($request->sexo)){
                $animal ->sexo = $request->sexo;
            }
            if(isset($request->dieta)){
                $animal->dieta = $request->dieta;
            }
            if(isset($request->habitat)){
                $animal->habitat = $request->habitat;
            }
            if(isset($request->idade)){
                $animal->idade = $request->idade;
            }
            if(isset($request->ra)){
                $animal->ra = $request->ra;
            }

            $animal->update();

            return response()->json([
                'status' => true,
                'message' => "Animal atualizados"
            ]);
        }
    }

