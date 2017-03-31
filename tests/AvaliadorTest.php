<?php

// require_once 'config.php';


class AvaliadorTest extends PHPUnit_Framework_TestCase{	
	
	public function testValorMedio(){
		
		$leilao = new Leilao('Playstation 4');

		$renam 	= new Usuario('Renam');
		$caio 	= new Usuario('Caio');
		$felipe = new Usuario('Felipe');
	
	
		$leilao->propoe(new Lance($renam, 5));
		$leilao->propoe(new Lance($caio, 5));
		$leilao->propoe(new Lance($felipe, 5));

		$leiloeiro = new Avaliador();

		$valorMedio = 5;
		$this->assertEquals($leiloeiro->valorMedio($leilao), $valorMedio);
		
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

	

	public function testUltimoLance(){
		$leilao = new Leilao('Nintendo Switch');

		$renam 	= new Usuario('Renam');
		$caio 	= new Usuario('Caio');

		$leilao->propoe(new Lance($caio, 10));

		$leilao->propoe(new Lance($renam, 200));
		$ultimoLance = $leilao->getUltimoLance();
		$this->assertEquals($ultimoLance->getValor(), 200);

	}


	public function testMaioresLances(){

		$leilao = new Leilao('Arvore de Natal');

		$renam 	= new Usuario('Renam');
		$felipe = new Usuario('Felipe');
		$caio 	= new Usuario('Caio');
	
	
		$leilao->propoe(new Lance($renam, 500));
		$leilao->propoe(new Lance($felipe, 200));
		$leilao->propoe(new Lance($caio, 1000));

		$leiloeiro = new Avaliador();
		$qntLances = 3;
		$tresUltimosMaioresLances = $leiloeiro->pegarMaioresLances($leilao, $qntLances);
		$this->assertEquals(count($tresUltimosMaioresLances), $qntLances);

		$this->assertEquals($tresUltimosMaioresLances[0]->getValor(), 1000);
		$this->assertEquals($tresUltimosMaioresLances[1]->getValor(), 500);
		$this->assertEquals($tresUltimosMaioresLances[2]->getValor(), 200);
	}


	public function testLanceDuplicado(){
		try {			
			$leilao = new Leilao('Arvore de Natal');

			$renam 	= new Usuario('Renam');
			$felipe = new Usuario('Felipe');
			$caio 	= new Usuario('Caio');		
		
			$leilao->propoe(new Lance($renam, 500));
			$leilao->propoe(new Lance($felipe, 200));			
			//A Anta do Caio apertou errado o Enter ao digitar... era 1.000 hehe
			$leilao->propoe(new Lance($caio, 10)); 
			$leilao->propoe(new Lance($caio, 1000));
			//Então deveria estourar o Exception

			
		} catch(Exception $exception){			
			$this->assertInstanceOf('Exception', $exception);
		}

	}

	public function testLanceMaior5(){
		try {			
			$leilao = new Leilao('TV 90 Polegada');

			$renam 	= new Usuario('Renam');
			$felipe = new Usuario('Felipe');

			//Competição (Renam x Felipe) hehe
			$leilao->propoe(new Lance($renam, 50));

			$leilao->propoe(new Lance($felipe, 100));
			$leilao->propoe(new Lance($renam, 150));
			$leilao->propoe(new Lance($felipe, 500));			
			$leilao->propoe(new Lance($renam, 800));			
			//EITAAA CUZÃO
			$leilao->propoe(new Lance($felipe, 1000));
			$leilao->propoe(new Lance($renam, 2000));
			//print_r('amigou estou aqui');
			$leilao->propoe(new Lance($felipe, 2500));
			$leilao->propoe(new Lance($renam, 3000));
			$leilao->propoe(new Lance($felipe, 3050));
			$leilao->propoe(new Lance($renam, 3750));
			$leilao->propoe(new Lance($felipe, 4000));



			//Foda-se Felipe Wins, maximo de Lances é 5 por pessoas
			$leilao->propoe(new Lance($renam, 8000));// +8000

			
		} catch(Exception $exception){			
			$this->assertInstanceOf('Exception', $exception);
		}

	}


	public function testDobro(){
		try {			
			$leilao = new Leilao('TV 90 Polegada');
			$renam 	= new Usuario('Renam');
			$felipe = new Usuario('Felipe');
			
			//Competição (Renam x Felipe) hehe
			$leilao->propoe(new Lance($renam, 50));

			$leilao->propoe(new Lance($felipe, 100));
			$leilao->propoe(new Lance($renam, 150));
			$leilao->propoe(new Lance($felipe, 500));			
			$leilao->propoe(new Lance($renam, 800));			
			//EITAAA CUZÃO
			$leilao->propoe(new Lance($felipe, 1000));
			$leilao->propoe(new Lance($renam, 2000));			
			$leilao->propoe(new Lance($felipe, 2500));
			$leilao->propoe(new Lance($renam, 3000));
			$leilao->propoe(new Lance($felipe, 3050));
			$leilao->propoe(new Lance($renam, 3750));

			//Take DOUBLE KILL, TRIPLE KILL DO MicaO, 
			//QUADRA NÃO, QUADRA NÃO?! É TETRA!!! TETRAAAAAA KILL!!
			$leilao->dobraLance($felipe);

			$leiloeiro = new Avaliador();
			$lances = $leiloeiro->pegarMaioresLances($leilao, 1);			
			$this->assertEquals($lances[0]->getValor(), 3050 * 2);

		} catch(Exception $exception){			
			//$this->assertInstanceOf('Exception', $exception);
			print $exception->getMessage();
		}

	}

	public function testDobroVoid(){
		try {			
			$leilao = new Leilao('TV 90 Polegada');
			$renam 	= new Usuario('Renam');
			$felipe = new Usuario('Felipe');
			
			$leilao->propoe(new Lance($renam, 50));
			//$leilao->propoe(new Lance($felipe, 100));
			$leilao->dobraLance($felipe);

			$leiloeiro = new Avaliador();
			$lances = $leiloeiro->pegarMaioresLances($leilao, 1);			

			//Deve ignorar a entrada o dobro do $felipe afinalo dobro de void é void² ^^
			$this->assertEquals($lances[0]->getValor(), 50);

		} catch(Exception $exception){			
			//$this->assertInstanceOf('Exception', $exception);
			print $exception->getMessage();
		}

	}
	


	

}
