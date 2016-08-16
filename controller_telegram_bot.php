<?php 

class TelegramBot {
    // Set the bot TOKEN
    private static $bot_token = "193865490:AAEazMzPvrqtdeQ1bcwKCgsergIQyIfGjok";
    
    private static $request_url = "https://api.telegram.org/bot";
    
    private $chat_id;
    
    private $response_url;
    
    private $response;
    
    public function __construct() {
        $this->response_url = self::$request_url . self::$bot_token;
    }
    
    public function execute( $params ) {
        $update = json_decode( $params, true );
        $this->chat_id = $update["message"]["chat"]["id"];

        $reply_text =  $this->get_response($update['message']['text']);
        
        // send reply
        $send_reply = $this->response_url."/sendmessage?chat_id=".$this->chat_id."&text=".$reply_text;
        
        file_get_contents( $send_reply );
    }
    
    public function get_response( $code ) {
        switch ( $code ) {
            case '/reg':
                $this->response = "Registration";
                break;
            default:
                $this->response = "ERROR: Unble to get response. Please try again.";
                break;
	}
        
        return $this->response;
    }
}

$telbot = new TelegramBot();
$params = file_get_contents("php://input");

$telbot->execute( $params );