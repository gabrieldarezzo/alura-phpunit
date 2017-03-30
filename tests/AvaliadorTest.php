<?php

require_once 'config.php';


class AvaliadorTest extends PHPUnit_Framework_TestCase{	
	
	public function test(){
		
		$leilao = new Leilao('Playstation 4');

		$renam 	= new Usuario('Renam');
		$caio 	= new Usuario('Caio');
		$felipe = new Usuario('Felipe');
	
	
		$leilao->propoe(new Lance($renam, 400));
		$leilao->propoe(new Lance($caio, 450));
		$leilao->propoe(new Lance($felipe, 250));

		$leiloeiro = new Avaliador();
		$leiloeiro->avalia($leilao);

		$maiorEsperado = 420;
		$menorEsperado = 250;
		$this->assertEquals($leiloeiro->getMaiorLance(), $maiorEsperado);
		$this->assertEquals($leiloeiro->getMenorLance(), $menorEsperado);
	}

}
