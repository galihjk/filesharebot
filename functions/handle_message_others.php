<?php
function handle_message_others($botdata){
    $from_id = $botdata["from"]["id"];
    $chat_id = $botdata["chat"]["id"];
    $message_id = $botdata["message_id"];
    if(in_array($from_id,f("get_config")("bot_admins"))){
        f("bot_kirim_perintah")("sendMessage",[
            "chat_id"=>$chat_id,
            "text"=>print_r($botdata,true),
        ]);
    }
    f("bot_kirim_perintah")("sendMessage",[
        "chat_id"=>"t.me/".f("get_config")("botuname")."?start=$chat_id"."_".$message_id,
        "text"=>"/start",
    ]);
    
    return true;
}