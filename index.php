<?php

require_once 'config.php';



$leilao = new Leilao('Playstation 4');


$felipe = new Usuario('Felipe');
	
$leilao->propoe(new Lance($felipe, 33));


$leiloeiro = new Avaliador();
$leiloeiro->pegarMaiorLances($leilao, 2);


// $test = new AvaliadorTest();
// $test->test();
