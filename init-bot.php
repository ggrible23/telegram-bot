<?php
/**
 * Telegram Bot
 * @author Glenn Rible
 */
include("library/Telegram.php");

// Set the bot TOKEN
$bot_token = "193865490:AAEazMzPvrqtdeQ1bcwKCgsergIQyIfGjok";

// Instances the class
$telegram = new Telegram( $bot_token );

// Take text and chat_id from the message
$text = $telegram->Text();
$chat_id = $telegram->ChatID();

// Check if the text is a command
if( (isset($text) && !is_null($text)) && (isset($chat_id) && !is_null($chat_id)) ){
    if ( $text == "/start" ) {
        $response = array('chat_id' => $chat_id, 'text' => 'Welcome to my bot.');
        $telegram->sendMessage($content);
    }
}