<?php function handle_message_storefile($botdata){
    if(empty($botdata["text"])){
        $from_id = $botdata["from"]["id"];
        $chat_id = $botdata["chat"]["id"];
        $message_id = $botdata["message_id"];
        $link = "t.me/".f("get_config")("botuname")."?start=$chat_id"."_".$message_id;
        $forward_to = f("get_config")("forward_to");
        if(!empty($forward_to)){
            f("bot_kirim_perintah")("forwardMessage",[
                "chat_id"=>$forward_to,
                "from_chat_id"=>$chat_id,
                "message_id"=>$message_id,
            ]);
            f("bot_kirim_perintah")("sendMessage",[
                "chat_id"=>$forward_to,
                "text"=>$link,
                "disable_web_page_preview"=>true,
            ]);
        }
        f("bot_kirim_perintah")("sendMessage",[
            "chat_id"=>$chat_id,
            "text"=>$link,
            "reply_to_message_id"=>$message_id,
            "disable_web_page_preview"=>true,
        ]);
        return true;
    }
    return false;
}