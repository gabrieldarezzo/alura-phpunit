<?php

class Avaliador {	
	
	public $maiorValor = -2147483647;
	public $menorValor = 2147483647;
	
	public function avalia(Leilao $leilao){
		foreach($leilao->getLances() as $lace){
			if($lace->getValor() > $this->maiorValor){				
				$this->maiorValor = $lace->getValor();				
			} else if($lace->getValor() < $this->menorValor){				
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
	
}
