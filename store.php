<?php
require_once('functions.php');

// require_onceは引数に渡したファイルで定義されている関数などを使うことができる

savePostedData($_POST); // 追記

//リダイレクト処理
header('Location: ./index.php'); // 追記


// $_POSTの値は、連想配列。キーがinputタグのname、valueがinputタグの入力内容。
// 更新：array(2) { ["id"]=> string(1) "2" ["content"]=> string(3) "ｙ" }
// 削除：array(1) { ["id"]=> string(1) "2" } string(1) "2"　
// 新規作成：array(1) { ["content"]=> string(12) "ヒラリー" }