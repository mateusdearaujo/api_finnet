<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel;
use phpDocumentor\Reflection\Location;

class UserController extends Controller {

    private $array = ['error' => '', 'result' => []];

    public function get($id) {
        $user = UserModel::find($id);

        if($user) {
            $this->array['result'] = $user;
        } else {
            $this->array['error'] = 'ID não encontrado';
        }
        return $this->array;
    }

    public function new(Request $request) {
        $name = $request->input('nome');
        $birth = $request->input('data_nascimento');
        $birth = implode('-', array_reverse(explode('/', $birth)));

        if($name && $birth) {
            $user = new UserModel();
            $user->name = $name;
            $user->birth = $birth;
            $user->save();

            $this->array['result'] = [
                'id' => $user->id,
                'name' => $name,
                'birth' => $birth
            ];
        } else {
            $this->array['error'] = "Favor preencher todos os campos";
        }
        return $this->array;
    }

    public function edit(Request $request) {
        $id = $request->header('id');
        $name = $request->input('nome');
        $birth = $request->input('data_nascimento');
        $birth = implode('-', array_reverse(explode('/', $birth)));

        if($id && $name && $birth) {
            $user = UserModel::find($id);

            if($user) {
                $user->name = $name;
                $user->birth = $birth;
                $user->save();

                $this->array['result'] = [
                    'id' => $id,
                    'name' => $name,
                    'birth' => $birth
                ];
            } else {
                $this->array['error'] = 'ID inexistente';
            }
        } else {
            $this->array['error'] = 'Favor preencher todos os campos';
        }
        return $this->array;
    }

    public function delete($id) {
        $user = UserModel::find($id);

        if($user) {
            $user->delete();
            $this->array['result'] = "Usuário apagado com sucesso";
        } else {
            $this->array['error'] = "ID inexistente";
        }
        return $this->array;
    }
}
