<?php
function handle_message_others($botdata){
    f("bot_kirim_perintah")("sendMessage",[
        "chat_id"=>$botdata["chat"]["id"],
        "text"=>"Perintah tidak dipahami. Gunakan /start",
    ]);
    return true;
}