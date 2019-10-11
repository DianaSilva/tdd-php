<?php

namespace Diana\Test;

use Diana\Apostas\Avaliador;
use Diana\Apostas\Model\Usuario;
use Diana\Apostas\Model\CriadorDeLeilao;

use PHPUnit\Framework\TestCase;

class AvaliadorTest extends TestCase {

	private $leiloeiro;
	private $edgar;
	private $valquiria;
    private $danilo;
    
	//Método padrão, aconselhável manter toda a instanciação de variáveis nesse método
	public function SetUp(): void{
		$this->leiloeiro = new Avaliador();
		var_dump("inicializando teste!");
		$this->edgar = new Usuario("Edgar");
		$this->valquiria = new Usuario("Valquiria");
		$this->danilo = new Usuario("Danilo");
	}

	//Método executado após a execução do método de teste
	public function tearDown(): void{
		var_dump("fim do teste!");
    }
    
	public function testOrdemDecrescente() {
		
		$construtor = new CriadorDeLeilao();
		
		$leilao = $construtor->para("Casa Alphavile")
		->lance($this->edgar, 300)
		->lance($this->valquiria, 200)
		->lance($this->danilo, 400)
		->constroi();
		$this->leiloeiro->avaliar($leilao);

		/*
		A ordem é sempre o esperado, depois o calculado, por último vem o arredondamento com parametros do tipo double
		*/
		$this->assertEquals(400, $this->leiloeiro->getMaiorLance(), 0.00001);
		$this->assertEquals(200, $this->leiloeiro->getMenorLance(), 0.00001);
    }
    
	public function testOrdemCrescente() {
		$construtor = new CriadorDeLeilao();
		$leilao = $construtor
		->para("Casa Alphavile")
		->lance($this->edgar, 400)
		->lance($this->valquiria, 300)
		->lance($this->danilo, 250)
		->constroi();
		$this->leiloeiro->avaliar($leilao);
		/*
		A ordem é sempre o esperado, depois o calculado, por último vem o arredondamento com parametros do tipo double
		*/
		$maiorEsperado = 400;
		$menorEsperado = 250;
		$this->assertEquals($maiorEsperado, $this->leiloeiro->getMaiorLance(), 0.00001);
		$this->assertEquals($menorEsperado, $this->leiloeiro->getMenorLance(), 0.00001);
    }
    
	public function testPegarTresMaiores() {
		$construtor = new CriadorDeLeilao();
		$leilao = $construtor->para("Casa Alphavile")
		->lance($this->edgar, 200)
		->lance($this->valquiria, 300)
		->lance($this->edgar, 400)
		->lance($this->valquiria, 500)
		->constroi();		
		$this->leiloeiro->avaliar($leilao);
		$this->assertEquals(3, count($this->leiloeiro->getMaiores()), 0.00001);
		$this->assertEquals(500, $this->leiloeiro->getMaiores()[0]->getValor(), 0.00001);
		$this->assertEquals(400, $this->leiloeiro->getMaiores()[1]->getValor(), 0.00001);
		$this->assertEquals(300, $this->leiloeiro->getMaiores()[2]->getValor(), 0.00001);
	}
	
	}

