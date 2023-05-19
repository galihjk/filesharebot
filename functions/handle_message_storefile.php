<?php function handle_message_storefile($botdata){
    $chat_id = $botdata["chat"]["id"];
    $message_id = $botdata["message_id"];
    if(empty($botdata["text"])){
        $result = f("bot_kirim_perintah")("sendMessage",[
            "chat_id"=>$chat_id,
            "text"=>"Loading...",
            "reply_to_message_id"=>$message_id,
            "disable_web_page_preview"=>true,
        ]);
        f("bot_kirim_perintah")("editMessageText",[
            "chat_id"=>$chat_id,
            "text"=>"Gunakan command ini untuk membuat linknya: /upload_$chat_id"."_"."$message_id"."_".$result['result']['message_id'],
            "message_id"=>$result['result']['message_id'],
            "disable_web_page_preview"=>true,
        ]);
        return true;
    }
    return false;
}