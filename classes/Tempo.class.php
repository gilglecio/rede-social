<?php
class tempo{
	private $tinicial,$tfinal,$tgasto;

	public function operacao(){
		$this->tinicial=0;
		$this->tfinal=0;
		$this->tgasto=0;
	}
	
	public function iniciarContagem(){
		$this->tinicial=microtime(true);
	}
	
	public function pararContagem(){
		$this->tfinal=microtime(true);
		if($this->tfinal >= $this->tinicial){
			$this->tgasto=$this->tfinal-$this->tinicial;
			echo("<br />gastou: $this->tgasto s");
		}
	}
}