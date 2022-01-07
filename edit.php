<?php
require_once('functions.php');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>編集</title>
</head>
<body>
  
<!-- array(1) { ["id"]=> string(1) "1" } -->
<!-- 上記でindexからgetで送られてきた内容 -->
<!-- idで指定したレコードから、todo内容を返す関数 -->
  <form action="store.php" method="post">
    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
    <input type="text" name="content" value="<?= getSelectedTodo($_GET['id']); ?>">
    <input type="submit" value="更新">
  </form>
  <div>
    <a href="index.php">一覧へもどる</a>
  </div>
</body>
</html>

