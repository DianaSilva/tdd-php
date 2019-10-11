<?php

namespace Diana\Test;

use Diana\Apostas\Model\Usuario;
use PHPUnit\Framework\TestCase;

class UsuarioTest extends TestCase {

    public function testValidarNome(){

        $usuario = new Usuario();

        $usuario->setNome('Diana');
        $nome = $usuario->getNome();

        $resultadoTeste = $usuario->getNome();

        $this->assertEquals('Diana', $nome);
    }
}