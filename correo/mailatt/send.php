<?php

class Email {
	
	var $nlegal;
	var $rfc;
	var $curp;
	var $ine;

	var $razon;
	var $dfiscal;
	var $tel1;
	var $tel2;
	var $email;
	var $efirma;
	var $cif;
	var $attacta;
	var $lista;
	var $accionistas;
	var $publicaciones;

	var $attcv;
	var $attacreditacion;

	var $complementarios;

	var $tclientes;

	var $exitos;

	var $me = "isra.fing@gmail.com";


	//enviar el mensaje
	private $sender;
	//url para redireccionar
	private $url;

	//función constructora
	public function __construct(){
		//cada uno de ellos es el parámetro que enviamos desde el formulario
		$this->nlegal = $a;
		$this->rfc = $b;
		$this->curp = $c;
		$this->ine = $d;
		$this->razon = $e;
		$this->dfiscal = $f;
		$this->tel1 = $g;
		$this->tel2 = $h;
		$this->email = $i;
		$this->efirma = $j;
		$this->cif = $k;
		$this->attacta = $att1;
		$this->lista = $l;
		$this->accionistas = $m;
		$this->publicaciones = $n;
		$this->attcv = $att2;
		$this->attacreditacion = $att3;
		$this->complementarios = $o;
		$this->tclientes = $p;
		$this->exitos = $q;


	}

	//método enviar con los parámetros del formulario
	public function enviar($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$att1,$att2,$att3){
		//si existe post
		if(isset($_POST)){

			//si existe adjunto
			if($att1) {
				//añadimos texto al nombre original del archivo
				$dir_subida = 'Acta_';
				//nombre del fichero creado -> fichero_nombreArchivo.pdf
				$fichero_ok1 = $dir_subida . basename($att1);
				//y lo subimos a la misma carpeta
				move_uploaded_file($_FILES['attacta']['tmp_name'], $fichero_ok1);
			}
			if($att2) {
				$dir_subida = 'CV_';
				$fichero_ok2 = $dir_subida . basename($att2);
				move_uploaded_file($_FILES['attacv']['tmp_name'], $fichero_ok2);
			}
			if($att3) {
				$dir_subida = 'Acre_';
				$fichero_ok3 = $dir_subida . basename($att3);
				move_uploaded_file($_FILES['attacreditacion']['tmp_name'], $fichero_ok3);
			}
			//creamos el mensaje
			$contenido = '
				<h2>Nuevo mensaje de: '.$a.'</h2>
				<hr>
				rfc: <b>'.$b.'</b><br>
				curp: <br><b>'.$c.'</b><br>
				ine: <b>'.$d.'</b><br>
				razon social: <b>'.$e.'</b><br>
				dominio fiscal: <b>'.$f.'</b><br>
				Telefono 1: <b>'.$g.'</b><br>
				Telefono 2: <b>'.$h.'</b><br>
				email: <b>'.$i.'</b><br>
				efirma: <b>'.$j.'</b><br>
				CIF: <b>'.$k.'</b><br>
				Productos: <b>'.$l.'</b><br>
				Accionistas: <b>'.$m.'</b><br>
				Publicaciones: <b>'.$n.'</b><br>
				Complemenatarios: <b>'.$o.'</b><br>
				Clienets: <b>'.$p.'</b><br>
				Exitos: <b>'.$q.'</b><br>

			';
			//archivo necesario para enviar los archivos adjuntos
			require_once 'AttachMailer.php';

			//enviamos el mensaje           (emisor,receptor,asunto,mensaje)
			$this->sender = new AttachMailer($me, $i, $e, $contenido);
			$this->sender->attachFile($fichero_ok1);
			$this->sender->attachFile($fichero_ok2);
			$this->sender->attachFile($fichero_ok3);

			//eliminamos el fichero de la carpeta con unlink()
			//si queremos que se guarde en nuestra carpeta, lo comentamos o borramos
			unlink($fichero_ok1);
			unlink($fichero_ok2);
			unlink($fichero_ok3);
			//enviamos el email con el archivo adjunto
			$this->sender->send();
			//url para redireccionar
			$this->url = 'http://www.ingeniowork.com/';
			//redireccionamos a la misma url conforme se ha enviado correctamente con la variable si
			header('Location:'.$this->url.'?s=si');
		}
		else{
			//redireccionamos a la misma url conforme NO se ha enviado correctamente con la variable no
			header('Location:'.$this->url.'?s=no');
		}
	}
}

//llamamos a la clase
$obj = new Email();
//ejecutamos el método enviar con los parámetros que recibimos del formulario
$obj->enviar($_POST['nlegal'], $_POST['rfc'], $_POST['curp'], $_POST['ine'], $_POST['razon'], $_POST['dfiscal'], $_POST['tel1'], $_POST['tel2'], $_POST['email'], $_POST['efirma'], $_POST['cif'], $_POST['lista'], $_POST['accionistas'], $_POST['publicaciones'], $_POST['complementarios'], $_POST['tclientes'], $_POST['exitos'], $_FILES['attacta']['name'], $_FILES['attcv']['name'], $_FILES['attacreditacion']['name']);

?>