<?php
  // CONEXION MYSQL
  $host_db = "localhost";
  mysql_connect('localhost', 'usuario', 'password');
  mysql_select_db('basededatos');
  mysql_query("SET NAMES 'utf8'");
        
  // FUNCIONES
  function get_real_ip(){
    if (isset($_SERVER["HTTP_CLIENT_IP"])){
      return $_SERVER["HTTP_CLIENT_IP"];
    }elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
      return $_SERVER["HTTP_X_FORWARDED_FOR"];
    }elseif (isset($_SERVER["HTTP_X_FORWARDED"])){
      return $_SERVER["HTTP_X_FORWARDED"];
    }elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])){
      return $_SERVER["HTTP_FORWARDED_FOR"];
    }elseif (isset($_SERVER["HTTP_FORWARDED"])){
      return $_SERVER["HTTP_FORWARDED"];
    }else{
      return $_SERVER["REMOTE_ADDR"];
    }
  }
  function obtenerdominio($dominio){
    $dominio = trim($dominio);
    $dominio = str_replace(array("http://", "www."),'',$dominio);
    $dominio = explode("/", $dominio);
    $dominio = $dominio[0];
    return $dominio;
  }
  function obtenerpagina($dominio){
    $dominio = explode("/",$dominio);
    return end($dominio);
  }
  // FIN FUNCIONES
  
  $ipadress   = get_real_ip();
  $hostname   = gethostbyaddr($ipadress);
  $useragent  = $_SERVER['HTTP_USER_AGENT'];
  $keyweb     = $_POST['key'];
  $web        = obtenerdominio($_POST['web']);
  $pagina     = obtenerpagina($_POST['web']);
  $usuario    = $_POST['usuario'];
  $type       = intval($_POST['type']);/*0 entrada, 1 salida*/
            
  if($keyweb==$web){
    $str_datos  = file_get_contents("http://api.ipinfodb.com/v3/ip-city/?key=45abd2951ee0a74973b579544185c02820ca02a4a692f615786a68d9e7e8903a&ip=".$ipadress."&format=json");
    $datos      = json_decode($str_datos,true);
    $ciudad     = $datos["cityName"];
    $pais       = $datos["countryName"];
    $cp         = $datos["zipCode"];
    $latitud    = $datos["latitude"];
    $longitud   = $datos["longitude"];
    $time       = $datos["timeZone"];

    if(empty($type)){
      $reg = mysql_query("INSERT INTO contador (ip, host, navegador, ciudad, pais, cp, latitud, longitud, time, fecha, usuario, web, pagina, type) VALUES ('$ipadress', '$hostname', '$useragent', '$ciudad', '$pais', '$cp', '$latitud', '$longitud', '$time', NOW(), '$usuario', '$web', '$pagina', '0')") or die(mysql_error());
    }else{
      $reg = mysql_query("INSERT INTO contador (ip, host, navegador, ciudad, pais, cp, latitud, longitud, time, fecha, usuario, web, pagina, type) VALUES ('$ipadress', '$hostname', '$useragent', '$ciudad', '$pais', '$cp', '$latitud', '$longitud', '$time', NOW(), '$usuario', '$web', '$pagina', '$type')") or die(mysql_error());
    }
  }
}
