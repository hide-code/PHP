<?php
require_once('connection.php');

// 一覧取得の関数
function getTodoList()
{
    return getAllRecords();
}


//TODOのidを渡して呼び出せばそのTODOの内容を返す関数
function getSelectedTodo($id)
{
    return getTodoTextById($id);
}

//新規作成ページからPOSTされたなら、createTodoData関数 を実行（INSERT処理）
//編集ページからPOSTされたなら、updateTodoData関数を実行（UPDATE処理）
function savePostedData($post)
{
    $path = getRefererPath();
    switch ($path) {
        case '/new.php':
            createTodoData($post['content']);// 連想配列のキーがcontentであるvalueの値が入っている。
            break;
        case '/edit.php':
            updateTodoData($post);
            break;
        case '/index.php': // 追記
            deleteTodoData($post['id']); // 追記
            break; // 追記
        default:
            break;
    }
}


//リクエスト元のURLを文字列で取得しそのパスを返す
function getRefererPath()
{
    $urlArray = parse_url($_SERVER['HTTP_REFERER']);//遷移する前のページのURLを取得する。、parse_urlは引数のURLを配列で取得するメソッド
    
    // echo '<pre>';
    // var_dump($urlArray);
    // echo '</pre>';
    
    return $urlArray['path'];
}
