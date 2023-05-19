<?php
function handle_message_admin($botdata){
    $user = $botdata['from'];
    $userid = $user['id'];
    $admins = f("get_config")("bot_admins");
    $is_admin = in_array($userid,$admins);
    $text = $botdata["text"] ?? "";
    if($is_admin and f("str_is_diawali")($text,"/broadcast")){
        if(empty($botdata['reply_to_message'])){
            f("bot_kirim_perintah")("sendMessage",[
                "chat_id"=>$botdata["chat"]["id"],
                "text"=>"Balas suatu pesan dengan command ini, nanti pesan tersebut akan dikirimkan ke semua pengguna",
            ]);
        }
        else{
            $all_user = f("get_all_users")();
            f("bot_kirim_perintah")("sendMessage",[
                "chat_id"=>$botdata["chat"]["id"],
                "text"=>print_r($all_user,true),
            ]);
        }
        return true;
    }
    return false;
}