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
                "text"=>"Broadcast dimulai. Harap tunggu sampai selesai.",
            ]);
            $cnt = 0;
            foreach($all_user as $item){
                f("bot_kirim_perintah")("copyMessage",[
                    "chat_id"=>$item,
                    "from_chat_id"=>$botdata['reply_to_message']["chat"]["id"],
                    "message_id"=>$botdata['reply_to_message']["message_id"],
                ]);
                $cnt++;
            }
            f("bot_kirim_perintah")("sendMessage",[
                "chat_id"=>$botdata["chat"]["id"],
                "text"=>"Broadcast selesai ($cnt).",
            ]);
            
        }
        return true;
    }
    return false;
}