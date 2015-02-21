<?php
define("DEFAULT_DOMAIN","b2b.archiwumdepozytowe.pl");
define("EASY_RSA_PATH",APPPATH.'/RSA/'); //ze slashem na końcu
define("PKI_PATH",EASY_RSA_PATH."pki/");
define("LOG_FILE",APPPATH.'/RSA/Log');
define("EASYRSA_REQ_COUNTRY","PL");
define("EASYRSA_REQ_PROVINCE","Lubelskie");
define("EASYRSA_REQ_CITY","Lublin");
define("EASYRSA_REQ_ORG","Archiwum Depozytowe Sp. z o.o.");
define("EASYRSA_REQ_EMAIL","admin@archiwumdepozytowe.pl");
define("EASYRSA_REQ_OU","");
define("ECMD",EASY_RSA_PATH."easyrsa ");

class EasyRSA {

    public static function saveLog($out) {
        $log=Kohana_Log::instance();
        $log->add(Log::DEBUG,"EasyRSA:".$out."\n");
    }

    public static function runER($options) {
        self::saveLog(shell_exec(ECMD.$options));
    }
    public static function PKI_initieted() {
    	if(is_dir(EASY_RSA_PATH."pki/")) return true;
    	else return false;
    }
    
    /* generuje bazowe pliki, używać tylko raz */
    public static function initPKI() {
        if(is_dir(EASY_RSA_PATH."pki/")) throw new Exception("Katalog PKI już istnieje, certyfikaty są utworzone, aby je wygenerować na nowo usuń ten katalog");
        $v=file_get_contents(APPPATH.'/RSA/'."vars.base");
        if(!$v) throw new Exception("Cannot load  vars file");
        $v=str_replace("%EASY_RSA_PATH%",rtrim(EASY_RSA_PATH,"/"),$v);
        $v=str_replace("%EASYRSA_REQ_COUNTRY%",EASYRSA_REQ_COUNTRY,$v);
        $v=str_replace("%EASYRSA_REQ_CITY%",EASYRSA_REQ_CITY,$v);
        $v=str_replace("%EASYRSA_REQ_PROVINCE%",EASYRSA_REQ_PROVINCE,$v);
        $v=str_replace("%EASYRSA_REQ_ORG%",EASYRSA_REQ_ORG,$v);
        $v=str_replace("%EASYRSA_REQ_EMAIL%",EASYRSA_REQ_EMAIL,$v);
        $v=str_replace("%EASYRSA_REQ_OU%",EASYRSA_REQ_OU,$v);
        if(!file_put_contents(EASY_RSA_PATH."vars",$v)) throw new Exception("Error when writing vars file");
        self::saveLog("Inicjacja PKI");
        self::runER("--req-cn=".DEFAULT_DOMAIN." --batch=1 init-pki");
        self::saveLog("Zainicjowany PKI");
        self::saveLog("Tworzenie certyfikatu CA");
        self::runER("--req-cn=".DEFAULT_DOMAIN." --batch=1 build-ca nopass");
        self::saveLog("Certyfikat CA utworzony");
        self::saveLog("Generuję certyfikat serwera");
        self::runER("--req-cn=".DEFAULT_DOMAIN." --batch=1 gen-req server nopass");
        self::runER("--batch=1 sign-req server server");
        self::saveLog("Certyfikat serwera utworzony");
        return true;

    }


    /* pobiera plik ca.crt dla użytkownika */
	public static function getCAFile() {
        if(!is_dir(EASY_RSA_PATH."pki/")) throw new Exception("Katalog PKI nie istnieje, ustaw stałe systemowe i uruchom funkcję init PKI");
        return PKI_PATH."ca.crt";
	}

    public static function setClientCertFile($username,$password,$company,$email,$overwrite=false) {
        if(!is_dir(EASY_RSA_PATH."pki/")) throw new Exception("Katalog PKI nie istnieje, ustaw stałe systemowe i uruchom funkcję init PKI");
        if(file_exists(PKI_PATH."private/".$username.".p12") && !$overwrite) throw new Exception("Plik z certyfikatem istnieje");
        self::saveLog("Generuję certyfikat użytkownika");
        self::runER("--req-cn=".$username." --req-org='".$company."' --req-email=".$email." --batch=1 build-client-full ".$username." nopass");
        shell_exec("openssl pkcs12 -export -out ".PKI_PATH."private/".$username.".p12 -in ".PKI_PATH."issued/".$username.".crt -inkey ".PKI_PATH."private/".$username.".key -certfile ".PKI_PATH."ca.crt -password pass:".$password);
        if(!file_exists(PKI_PATH."private/".$username.".p12")) throw new Exception("Bład podczas tworzenia certyfikatu p12");
    }



    /* pobiera certyfikat użytkownika */
	public static function getClientCertFile($username) {
        $f=PKI_PATH."private/".$username.".p12";
        if(!file_exists($f)){
        	return false;
        }else{
        	return $f;
        }
	}


    /* sprawdza czy certyfikat się zgadza z nazwą użytkownika */
	public static function getUsername() {
        if(!is_dir(EASY_RSA_PATH."pki/")) throw new Exception(die('Certificate not exist'));
		if($_SERVER['SSL_CLIENT_I_DN']!='/CN='.DEFAULT_DOMAIN ||
		   $_SERVER['SSL_SERVER_S_DN']!='/CN='.DEFAULT_DOMAIN ||
		   $_SERVER['SSL_SERVER_I_DN']!='/CN='.DEFAULT_DOMAIN) throw new Exception(die('Your certificate is incorrect. You must use your self private certificate, to have access to this page'));
        return str_replace('/CN=',"",$_SERVER['SSL_CLIENT_S_DN']);
			
	}


}
