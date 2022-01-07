<?php
require_once('connection.php');

// 一覧取得の関数
function getTodoList()
{
    return getAllRecords();
}

//idで指定したレコードから、content内容を返す関数
function getSelectedTodo($id)
{
    return getTodoTextById($id);
}


//直前に遷移したページに応じて処理を分岐する関数。
function savePostedData($post)
{
    $path = getRefererPath();//store.phpに遷移する直前のページのパスを取得する。
    switch ($path) {
        case '/new.php':
            createTodoData($post['content']);
            break;
        case '/edit.php':
            updateTodoData($post);
            break;
        case '/index.php':
            deleteTodoData($post['id']);
            break;
        default:
            break;
    }
}


//直前に遷移していたページのパスを返す関数
function getRefererPath()
{
    $urlArray = parse_url($_SERVER['HTTP_REFERER']);//遷移する前のページのURLを取得する＋parse_urlは引数のURLを連想配列で取得するメソッド
    return $urlArray['path'];
}

// 更新処理の$urlArrayの値
// array(5) {
//   ["scheme"]=>
//   string(4) "http"
//   ["host"]=>
//   string(9) "localhost"
//   ["port"]=>
//   int(9999)
//   ["path"]=>
//   string(9) "/edit.php"
//   ["query"]=>
//   string(4) "id=3"
// }