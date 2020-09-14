<?php 
if((isset($requisicao) && $requisicao==true)){
    require_once ("../core/config.php");
    require_once ("../core/configGlobal.php");
}else{
    require_once ("config.php");
    require_once ("configGlobal.php");
}



class Conectar{

    private static $instancia;

	public static function getInstancia()
	{
		if (!isset(self::$instancia)) {

			try{
				self::$instancia=new PDO('mysql:host='.SERVER.';dbname='.BASE,USER,PASS);
				self::$instancia->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				self::$instancia->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
			}catch(PDOException $e){
				echo $e->getMessage();

			}

		}
		return self::$instancia;
	}

	public static function prepare($sql){
		return self::getInstancia()->prepare($sql);

	}
}

