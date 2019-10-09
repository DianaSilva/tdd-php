<?php

namespace Diana\Apostas\Model;

use Diana\Apostas\Model\Usuario as Usuario;

class UsuarioTeste {

    public function validarNome ($entrada, $resultado){

        $usuario = new Usuario();
        $usuario->setNome($entrada);

        $resultadoTeste = $usuario->getNome();

        if($resultadoTeste == $resultado){
            echo "Sucesso!";

        } else{
            echo "Falhou!";
        }
    }
}