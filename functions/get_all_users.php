<?php
function get_all_users(){
    $scanned_directory = [];
    $folder = "data/users";
    if (is_dir($folder)){
        $scanned_directory = array_diff(scandir($folder), array('..', '.'));
    }
    return $scanned_directory;
}
