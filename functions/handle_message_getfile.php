<?php
function handle_message_getfile($botdata){
    if(!empty($botdata['text']) and f("str_is_diawali")($botdata['text'],"/start ")){
        $get_msg_id = str_replace("/start ","",$botdata['text']);
        $chat_id = $botdata["chat"]["id"];
        f("bot_kirim_perintah")("sendMessage",[
            "chat_id"=>$chat_id,
            "text"=>f("get_config")("storage") . "~$get_msg_id",
            "disable_web_page_preview"=>true,
        ]);
        // $result = f("bot_kirim_perintah")("copyMessage",[
        //     "chat_id"=>$chat_id,
        //     "from_chat_id"=>$from_chat_id,
        //     "message_id"=>$message_id,
        // ]);
        // if(!$result['ok']){
        //     f("bot_kirim_perintah")("sendMessage",[
        //         "chat_id"=>$chat_id,
        //         "text"=>print_r($result,true),
        //     ]);
        // }
        return true;
    }
    else{
        return false;
    }
}