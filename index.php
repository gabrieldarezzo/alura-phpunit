<?php

/*
$arr = array(5,9,5,5,8);
sort($arr);
$x=  array_slice($arr, 2);
var_dump($x);
die();
*/
require_once 'config.php';



$leilao = new Leilao('Playstation 4');

$renam  = new Usuario('Renam');
$caio   = new Usuario('Caio');
$felipe = new Usuario('Felipe');


//$leilao->propoe(new Lance($renam, 5));
///$leilao->propoe(new Lance($caio, 5));
//$leilao->propoe(new Lance($felipe, 5));

$construtor = new ConstrutorDeLeilao();
$leilao = $construtor->para('Playstation 4')
    ->lance($renam, 5)
    //->lance($caio, 5)
    //->lance($felipe, 5)
    ->constroi()
;

//print_r($leilao);die();
$leiloeiro = new Avaliador();
$leiloeiro->avalia($leilao);




//try {
    /*

	$leilao = new Leilao('Arvore de Natal');

	$renam 	= new Usuario('Renam');
	$felipe = new Usuario('Felipe');
	$caio 	= new Usuario('Caio');


	$leilao->propoe(new Lance($renam, 500));
	$leilao->propoe(new Lance($felipe, 200));
	$leilao->propoe(new Lance($caio, 10)); //A Anta do Caio apertou errado o Enter ao digitar... era 1.000 hehe

	//$ultimoLance = $leilao->getUltimoLance();
	//var_dump($ultimoLance);
	//die();
	*/
    /*
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
	$leilao->dobraLance($felipe);

	//$leilao->propoe(new Lance($felipe, 4000));

	//Foda-se Felipe Wins, maximo de Lances é 5 por pessoas
	//$leilao->propoe(new Lance($renam, 8000));// +8000
	$leiloeiro = new Avaliador();
	$lances = $leiloeiro->pegarMaioresLances($leilao, 3);
	var_dump($lances);
	*/
    /*

	try {

		
		$leilao = new Leilao('TV 90 Polegada');
		$renam 	= new Usuario('Renam');
		$felipe = new Usuario('Felipe');
		
		$leilao->propoe(new Lance($renam, 50));
		//$leilao->propoe(new Lance($felipe, 100));
		$leilao->dobraLance($felipe);

		$leiloeiro = new Avaliador();
		$lances = $leiloeiro->pegarMaioresLances($leilao, 1);			
		//var_dump($lances[0]->getValor(), 3050 * 2);
		//var_dump($lances);

	} catch(Exception $exception){			
		//$this->assertInstanceOf('Exception', $exception);
		print $exception->getMessage();
	}
	*/


//} catch(Exception $exception){
    //print $exception->getMessage();
//}
