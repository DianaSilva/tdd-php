<?php

namespace Diana\Apostas\Model;

use Diana\Apostas\Model\Lance;
use Diana\Apostas\Model\Usuario;

class Leilao {

	private $descricao;
    private $lances;
    
	function __construct($descricao)
	{
		$this->descricao = $descricao;
		$this->lances = array();
    }
    
	public function propoe(Lance $lance)
	{
		if (count($this->lances) === 0 || $this->darLance($lance->getUsuario()))
			$this->lances[] = $lance;
    }
    
	private function darLance(Usuario $usuario)
	{
		$total = $this->lanceUsuario($usuario);
		return $this->ultimoLance()->getUsuario() !== $usuario && $total < 5;
    }
    
	private function lanceUsuario(Usuario $usuario)
	{
		$total = 0;
		foreach ($this->lances as $lanceAtual) {
			if($lanceAtual->getUsuario() === $usuario) $total++;
		}
		return $total;
    }
    
	public function ultimoLance()
	{
		return $this->lances[count($this->lances) -1];
    }
    
	public function getDescricao()
	{
		return $this->descricao;
    }
    
	public function getLances()
	{
		return $this->lances;
	}
}


