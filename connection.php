<?php
require_once('config.php');

// PDOクラスのインスタンス化
function connectPdo()
{
    try {
        return new PDO(DSN, DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
}

// ①例外時の処理をスローしていないのはなぜか。PDOの処理で例外処理が行われた場合。
// PDOのサブクラスであり、PDPクラスが発するエラーを表す、PDOExceptionクラスが存在するから。
// PDOExceptionクラスは自身でスローしてはいけないものである。
// ②PDOExceptionになっているのはなぜか。PDOExceptionクラスがスローされているから。
// 他の例外処理をcatchしたい場合は、追加でcatch処理を記載する必要がある。

// 新規作成処理
function createTodoData($todoText) {

    $dbh = connectPdo();
    $sql = 'INSERT INTO todos (content) VALUES ("' . $todoText . '")';
    $dbh->query($sql);
    var_dump($dbh);
}
//queryメソッドは、SQL文を発行した結果が含まれているPDOStatementクラスのオブジェクトを返してくれます。
//var_dump($dbh)の値は、object(PDO)#1 (0) { }となっていた。


//登録したデータをDBから全件取得する
function getAllRecords()
{
    $dbh = connectPdo();
    $sql = 'SELECT * FROM todos WHERE deleted_at IS NULL';
    return $dbh->query($sql)->fetchAll();
}
//fetchAll() で実行結果を全件配列で取得、そしてその結果をreturnしています。


//DBのUPDATE処理
function updateTodoData($post)
{
    $dbh = connectPdo();
    $sql = 'UPDATE todos SET content = "' . $post['content'] . '" WHERE id = ' . $post['id'];
    $dbh->query($sql);
}


//指定したidのTODOデータを取得する処理
function getTodoTextById($id)
{
    $dbh = connectPdo();
    /*ここを編集*/
    $sql = 'SELECT content FROM todos WHERE '. $id .' = id AND deleted_at IS NULL';
    $data = $dbh->query($sql)->fetch(PDO::FETCH_ASSOC);
    /*ここを編集*/
    return $data['content'];
}

//指定したidのレコードのdeleted_atカラムを現在の時間に更新する処理です。
function deleteTodoData($id)
{
    var_dump($id);
    $dbh = connectPdo();
    $now = date('Y-m-d H:i:s');
    /*ここを編集*/
    $sql = 'UPDATE todos SET deleted_at = "' .$now. '" WHERE id = '. $id;
    $dbh->query($sql);
    


}