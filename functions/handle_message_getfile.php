<?php
function handle_message_getfile($botdata){
    if(!empty($botdata['text']) and f("str_is_diawali")($botdata['text'],"/start ")){
        $code_get = explode("_",str_replace("/start ","",$botdata['text']));
        $from_chat_id = $code_get[0];
        $message_id = $code_get[1];
        $chat_id = $botdata["chat"]["id"];
        $result = f("bot_kirim_perintah")("copyMessage",[
            "chat_id"=>$chat_id,
            "from_chat_id"=>$from_chat_id,
            "message_id"=>$message_id,
        ]);
        if(!$result['ok']){
            f("bot_kirim_perintah")("sendMessage",[
                "chat_id"=>$chat_id,
                "text"=>print_r($result,true),
            ]);
        }
        return true;
    }
    else{
        return false;
    }
}