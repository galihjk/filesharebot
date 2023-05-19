<?php function handle_message_upload($botdata){
    $text = $botdata["text"] ?? "";
    if(f("str_is_diawali")($text,"/upload_")){
        f("bot_kirim_perintah")("deleteMessage",[
            'chat_id'=>$upload_chatid,
            'message_id'=>$delete_msgid,
        ]);
        f("bot_kirim_perintah")("deleteMessage",[
            'chat_id'=>$botdata["chat"]["id"],
            'message_id'=>$botdata["message_id"],
        ]);
        $explode = explode("_",$text);
        $upload_chatid = $explode[1];
        $upload_msgid = $explode[2];
        $delete_msgid = $explode[3];
        $storage = f("get_config")("storage");
        $result = f("bot_kirim_perintah")("forwardMessage",[
            "chat_id"=>$storage,
            "from_chat_id"=>$upload_chatid,
            "message_id"=>$upload_msgid,
        ]);
        $link = "t.me/".f("get_config")("botuname")."?start=".$result["result"]["message_id"];
        f("bot_kirim_perintah")("sendMessage",[
            "chat_id"=>$storage,
            "text"=>$link,
            "disable_web_page_preview"=>true,
            "reply_to_message_id"=>$result["result"]["message_id"],
        ]);
        f("bot_kirim_perintah")("sendMessage",[
            "chat_id"=>$upload_chatid,
            "text"=>$link,
            "reply_to_message_id"=>$upload_msgid,
            "disable_web_page_preview"=>true,
        ]);
        return true;
    }
    return false;
}