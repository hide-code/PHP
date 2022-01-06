<?php
require_once('functions.php');

// var_dump($_POST)による出力結果:array(1) { ["content"]=> string(3) "う" }
// $_POSTの値は、連想配列。キーがinputタグのname、valueがinputタグの入力内容。

savePostedData($_POST); // 追記
// header('Location: ./index.php'); // 追記

