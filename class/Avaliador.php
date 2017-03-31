<?php

class Avaliador {	
	
	public $maiorValor = -2147483647;
	public $menorValor = 2147483647;
	public $valorMedio = 0;	
	
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
	
	public function pegarMaioresLances(Leilao $leilao, int $qntLances){
		
		$lances = $leilao->getLances();
		usort($lances, function($a, $b){
			if($a->getValor() == $b->getValor()) return 0;
			return ($a->getValor() > $b->getValor()) ? -1 : 1;
		});
		
		return array_slice($lances , 0, $qntLances);
	}
	
}
