<?php

namespace App\Http\Controllers;

use App\Models\Associado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AssociadoController extends Controller
{

    //FAZ UM GET EM TODOS OS ASSOCIADOS
    public function todosAssociados(Request $request)
    {
        return Associado::all();

    }
    //FAZ UM GET EM UM ASSOCIADO COM UM ID ESPECIFICO
    public function associadoPorId($id)
    {
       return Associado::findOrFail($id);
    }

    //FAZ UM POST CADASTRANDO UM NOVO ASSOCIADO
    public function cadastrarAssociado(Request $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($request->senha);
        Associado::create($input);

        return response()->json([
            'res'=> true,
            'message'=> 'Cadastro feito com sucesso'
        ]);
    }
}
