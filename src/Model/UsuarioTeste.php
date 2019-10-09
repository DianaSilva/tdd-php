<?php

namespace Diana\Apostas\Model;

use Diana\Apostas\Model\Usuario as Usuario;

class UsuarioTeste {

    public function validarNome ($entrada, $resultado){

        $usuario = new Usuario();

        //Inclue nome de um usuário
        $usuario->setNome($entrada);

        $resultadoTeste = $usuario->getNome();

        //Se nome inserido for igual ao nome atribuído
        if($resultadoTeste == $resultado){
            echo "Sucesso!";

        } else{
            echo "Falhou!";
        }
    }
}