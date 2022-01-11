<?php
    define('PUBLIC_PATH', $_SERVER['DOCUMENT_ROOT'] . '/public/uploaded_files/');
    function get_unique_name($ext) {
        return time() . "_" . date("Y") . '.' . $ext;
    }


    function get_ext($type) {
        preg_match_all("/[a-z]{1,}/", $type, $ext);
        return $ext[0][1];
    }

    function upload($file) {
        $ext = get_ext($file['type']);
        $name = get_unique_name($ext);
        $upload = move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/public/uploaded_files/' . $name);
        return ($upload) ? true : die;
    }