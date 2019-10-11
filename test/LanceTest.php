<?php

namespace Diana\Test;

use Diana\Apostas\Model\Usuario;
use Diana\Apostas\Model\Lance;

use PHPUnit\Framework\TestCase;

class LanceTest extends TestCase {
	/**
	*	@exceptedException \InvalidArgumentException
	*/

	public function testRecusarLanceComZero(){
		$usuario = new Usuario("Débora");
		$lance = new Lance($usuario,0);
	}

	/**
	*	@exceptedException \InvalidArgumentException
	*/

	public function testRecusarLanceNegativo(){
		$usuario = new Usuario("Débora");
		$lance = new Lance($usuario,-10);
	}
}