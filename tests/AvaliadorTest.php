<?php

// require_once 'config.php';


class AvaliadorTest extends PHPUnit_Framework_TestCase{	
	
	public function test(){
		
		$leilao = new Leilao('Playstation 4');

		$renam 	= new Usuario('Renam');
		$caio 	= new Usuario('Caio');
		$felipe = new Usuario('Felipe');
	
	
		$leilao->propoe(new Lance($renam, 5));
		$leilao->propoe(new Lance($caio, 5));
		$leilao->propoe(new Lance($felipe, 5));

		$leiloeiro = new Avaliador();
		// $leiloeiro->avalia($leilao);
		// $leiloeiro->avalia($leilao);

		// $maiorEsperado = 400;
		// $menorEsperado = 250;
		// $this->assertEquals($leiloeiro->getMaiorLance(), $maiorEsperado);
		// $this->assertEquals($leiloeiro->getMenorLance(), $menorEsperado);
		$this->assertEquals($leiloeiro->valorMedio($leilao), 5);
	}
	
	
	public function testAceitaApenasUmLance(){
		
		$leilao = new Leilao('Playstation 4');

		$renam 	= new Usuario('Renam');
		$caio 	= new Usuario('Caio');
		$felipe = new Usuario('Felipe');
	
	
		$leilao->propoe(new Lance($renam, 33));

		$leiloeiro = new Avaliador();
		$leiloeiro->avalia($leilao);
		
		$maiorEsperado = 33;
		$menorEsperado = 33;
		$this->assertEquals($leiloeiro->getMaiorLance(), $maiorEsperado);
		$this->assertEquals($leiloeiro->getMenorLance(), $menorEsperado);
	}

}
