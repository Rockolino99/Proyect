<?php  
	require_once "lib/Swift.php";
    require_once "lib/Swift/Connection/SMTP.php";

class Correo {
  
	public $to;
	public $subject;
	public $body;
	public $from;
	public $server;
	public $pwd;
	public $username;
  
 	function Correo () {
		$this->server  = "smtp.gmail.com";
	  	$this->pwd     = "contraseña de correo";
	  	$this->username = "correo";
	  	$this->from = "correo";
	}

  	function enviar() {
		$smtp = &new Swift_Connection_SMTP($this->server, Swift_Connection_SMTP::PORT_SECURE, Swift_Connection_SMTP::ENC_TLS);

	  	$smtp->setUsername($this->username);
		$smtp->setpassword($this->pwd);

		$swift =& new Swift($smtp);

		$message =& new Swift_Message($this->subject,$this->body,"text/html");

		if ($swift->send($message,new Swift_Address($this->to,$this->to),new Swift_Address($this->from,"CUTSIE GIRL")))
			return 1;
		else
			return 0;
	}
  
}

?>
