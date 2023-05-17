<?php
function handle_message($botdata){
    $chat_id = $botdata["chat"]["id"];
    f("handle_botdata_functions")($botdata,[
        "handle_message_msgcmd",
        "handle_message_getfile",
        "handle_message_others",
    ]);
}