<?php
	class Livro {
		
		private $idlivro;
		public $titulo;
		public $autor;
		public $editora;
		public $ano_publicacao;
		public $dono;
		
		function __construct ($id, $tit, $aut, $edi, $ano, $don) {
			$this->idlivro = $id;
			$this->titulo = $tit;
			$this->autor = $aut;
			$this->editora = $edi;
			$this->ano_publicacao = $ano;
			$this->dono = $don;
		}
		
		function __construct ($tit, $aut, $edi) {
			$this->titulo = $tit;
			$this->autor = $aut;
			$this->editora = $edi;
		}
		
		function echo_dados(){
			echo $this->titulo . '\n';
			echo $this->autor . '\n';
			echo $this->editora .'\n';
			echo $this->ano_publicacao .'\n';
			echo $this->dono . '\n';
		}
		
		
	}
?>