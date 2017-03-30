<?php

class Avaliador {	
	
	public $maiorValor = -2147483647;
	public $menorValor = 2147483647;
	public $valorMedio = 0;
	public $maiores ;
	
	public function avalia(Leilao $leilao){
		foreach($leilao->getLances() as $lace){
			if($lace->getValor() > $this->maiorValor){				
				$this->maiorValor = $lace->getValor();				
			}

			if($lace->getValor() < $this->menorValor){				
				$this->menorValor = $lace->getValor();		
			}
		}
	}
	
	public function getMaiorLance(){
		return $this->maiorValor;
	}
	
	public function getMenorLance(){
		return $this->menorValor;
	}
	
	public function valorMedio(Leilao $leilao){
		
		$total = 0;
		foreach($leilao->getLances() as $lance){
			$total += $lance->getValor();
		}
		
		return $total / count($leilao->getLances());
	}
	
	public function pegarMaiorLances(Leilao $leilao, $qntLances){
		
		$lances = $leilao->getLances();
		usort($lances, function($a, $b){
			if($a->getValor() == $b->getValor()) return 0;
			if($a->getValor() < $b->getValor()) return 1;
			return -1;	
		});
		return array_slice($lances, $qntLances);
		
		// print_r($lances);
		
		// return $total / count($leilao->getLances());
	}
	
}
