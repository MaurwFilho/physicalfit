<?php 

class Aluno {

	private $nome;
	private $sexo;
	private $nascimento;
	private $estatura;
	private $peso;
	private $repouso;



	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}

	public function getSexo() {
		return $this->sexo;
	}

	public function setSexo($sexo) {
		$this->sexo = $sexo;
	}

	public function getNascimento() {
		return $this->nascimento;
	}

	public function setNascimento($nascimento) {
		$this->nascimento = $nascimento;
	}

	public function getEstatura() {
		return $this->estatura;
	}

	public function setEstatura($estatura) {
		$this->estatura = $estatura;
	}

	public function getPeso() {
		return $this->peso;
	}

	public function setPeso($peso) {
		$this->peso = $peso;
	}

	public function getRepouso() {
		return $this->repouso;
	}

	public function setRepouso($repouso) {
		$this->repouso = $repouso;
	}
}

 ?>