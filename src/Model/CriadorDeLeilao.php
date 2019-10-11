<?php

namespace Diana\Apostas\Model;

use Diana\Apostas\Model\Leilao;
use Diana\Apostas\Model\Usuario;
use Diana\Apostas\Model\Lance;

class CriadordeLeilao {

    private $leilao;

	public function para($descricao){
		$this->leilao = new Leilao($descricao);
		return $this;
	}
	public function lance(Usuario $usuario, $valor){
		$this->leilao->propoe(new Lance($usuario, $valor));
		return $this;
	}
	public function constroi() {
		return $this->leilao;
	}

}