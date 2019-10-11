<?php

namespace Diana\Apostas\Model;
use PHPUnit\Framework\TestCase;

class Lance {

	private $usuario;
    private $valor;
    
	function __construct(Usuario $usuario, $valor) {
		if ($valor <= 0) {
			throw new \InvalidArgumentException("Todo lance deve ser maior que 0." );
		}	
		$this->usuario = $usuario;
		$this->valor = $valor;
	}
	public function getUsuario(){
		return $this->usuario;
    }
    
	public function getValor(){
		return $this->valor;
	}
}
