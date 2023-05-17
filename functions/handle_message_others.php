<?php
function handle_message_others($botdata){
    $from_id = $botdata["from"]["id"];
    $chat_id = $botdata["chat"]["id"];
    if(in_array($from_id,f("get_config")("bot_admins"))){
        f("bot_kirim_perintah")("sendMessage",[
            "chat_id"=>$chat_id,
            "text"=>print_r($botdata,true),
        ]);
    }
    else{
        f("bot_kirim_perintah")("sendMessage",[
            "chat_id"=>$chat_id,
            "text"=>"/start",
            "parse_mode"=>"MarkDown",
        ]);
    }
    
    return true;
}