<?php

namespace Diana\Apostas;

use Diana\Apostas\Model\Leilao;

class Avaliador{

	private $maiorValor = -INF;
	private $menorValor = INF;
    private $maiores;
    
	public function avaliar(Leilao $leilao) {
		
		$total = 0;
		if (count($leilao->getLances()) <= 0) {
			throw new \InvalidArgumentException("Um leilão precisa ter pelo menos um lance.");
        }
        
		foreach ($leilao->getLances() as $lance) {
			if($lance->getValor() > $this->maiorValor) $this->maiorValor = $lance->getValor();
			
			if($lance->getValor() < $this->menorValor) $this->menorValor = $lance->getValor();
			$total += $lance->getValor();
		}
		
		$this->pegaOsMaioresNo($leilao);
    }
    
	public function pegaOsMaioresNo(Leilao $leilao){
		
		$lances = $leilao->getLances();
		usort($lances, function($a,$b){
			if($a->getValor() == $b->getValor()) return 0;
			return $a->getValor() < $b->getValor() ? 1 : -1;
		});
		$this->maiores = array_slice($lances, 0,3);
    }
    
	public function getMaiores(){
		return $this->maiores;
    }
    
	public function getMaiorLance(){
		return $this->maiorValor;
    }
    	
	public function getMenorLance(){
		return $this->menorValor;
	}
}
