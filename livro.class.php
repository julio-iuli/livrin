<?php
	class Livro {
		public $titulo;
		public $autor;
		public $editora;
		public $ano_publicacao
		public $dono;
		
		function __construct ($tit, $aut, $edi, $ano, $don) {
			$this->titulo = $til;
			$this->autor = $aut;
			$edi != '' ? $this->editora = $edi 			: $this->editora = 0;
			$ano != '' ? $this->ano_publicacao = $ano : $this->ano_publicacao = 0;
			$don != '' ? $this->dono = $don 				: $this->dono = 0;
		}
		
		function echo_dados(){
			echo $this->titulo . '\n';
			echo $this->autor . '\n';
			echo $this->editora . '\n';
			echo $this->ano_publicacao . '\n';
			echo $this->dono . '\n';
		}
		
		
	}
?>