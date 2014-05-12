<?php

class Login extends DB
{
	private $tabela = 'usuarios';
	private $prefix = 'socialbigui_';
	private $cookie = true;

	public $erro = '';

	private function crip($senha)
	{
		return sha1($senha);
	}

	private function validar($usuario, $senha)
	{
		$this->crip($senha);

		try {
			$validar = self::getCon()->prepare('SELECT id FROM `' . $this->tabela . '` where `email`=? and `senha`=? LIMIT 1');
			$validar->execute(array($usuario, $senha));

			return $validar->rowCount() == 1 ? true : false;

		} catch (PDOException $e) {
			$this->erro = 'Sistema indisponível';
			logErros($e);
			return false;
		}
	}

	public function logar($usuario, $senha, $lembrar = false)
	{
		if ($this->validar($usuario, $senha)) {
			
			if ( ! $_SESSION) {
				session_start();
			}

			$_SESSION[$this->prefix . 'usuario'] = $usuario;
			$_SESSION[$this->prefix . 'logado'] = true;

			if ($this->cookie) {

				$valor = join('#', array($usuario, $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']));
				$valor = sha1($valor);

				setcookie($this->prefix . 'token', $valor, 0, '/');
			}

			if ($lembrar) {
				$this->lembrar_dados($usuario, $senha);
			}

			return true;
		}

		$this->erro = 'Usuário inválido';
		return false;
	}

	public function logado($cookie = true)
	{
		if ( ! $_SESSION) {
			session_start();
		}

		if ( ! isset($_SESSION[$this->prefix . 'logado']) AND ! $_SESSION[$this->prefix . 'logado']) {

			if ($cookie) {
				return $this->dados_lembrados();
			}

			if ($this->cookie) {
				
				if ( ! isset($_COOKIE[$this->prefix . 'token'])) {

					$this->erro = 'Você não está logado';
					return false;
				}

				$valor = join('#', array($_SESSION[$this->prefix . 'usuario'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']));
				$valor = sha1($valor);

				if ($_COOKIE[$this->prefix . 'token'] !== $valor) {

					$this->erro = 'Você não está logado.';
					return false;
				}
			}

			$this->erro('Você não está logado.');
			return false;
		}

		return true;
	}

	public function sair($cookie = true)
	{
		if ( ! $_SESSION) {
			session_start();
		}

		unset($_SESSION[$this->prefix . 'usuario']);

		$_SESSION[$this->prefix . 'logado'] = false;

		if ($this->cookie AND isset($_COOKIE[$this->prefix . 'token'])) {
			setcookie($this->prefix . 'token', false, (time() - 3600), '/');
			unset($_COOKIE[$this->prefix . 'token']);
		}

		if ($cookie) {
			$this->limpar_lembrados();
		}

		return ! $this->logado(false);
	}

	private function limpar_lembrados()
	{
		if (isset($_COOKIE[$this->prefix . 'login_user'])) {
			setcookie($this->prefix . 'login_user', false, (time() - 3600), '/');
			unset($_COOKIE[$this->prefix . 'login_user']);
		}

		if (isset($_COOKIE[$this->prefix . 'login_pass'])) {
			setcookie($this->prefix . 'login_pass', false, (time() - 3600), '/');
			unset($_COOKIE[$this->prefix . 'login_pass']);	
		}
	}

	private function dados_lembrados()
	{
		if (isset($_COOKIE[$this->prefix . 'login_user']) AND isset($_COOKIE[$this->prefix . 'login_pass'])) {
			
			$usuario = base64_decode(substr($_COOKIE[$this->prefix . 'login_user'], 1));
			$senha = base64_decode(substr($_COOKIE[$this->prefix . 'login_pass'], 1));

			return $this->logar($usuario, $senha, true));
		}

		return false;
	}

	private function lembrar_dados($usuario, $senha)
	{
		$tempo = strtotime('+', 7, ' day', time());

		$usuario = rand(', 9') . base64_encode($usuario);
		$senha = rand(', 9') . base64_encode($senha);

		setcookie($this->prefix . 'login_user', $usuario, $tempo, '/');
		setcookie($this->prefix . 'login_pass', $senha, $tempo, '/');
	}
}