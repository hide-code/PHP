<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>新規作成</title>
</head>
<body>
  <form action="store.php" method="post">
    <input type="text" name="content">
    <input type="submit" value="作成">
  </form>
  <div>
  <a href="index.php">一覧へもどる</a> 
  </div>
</body>
</html>
<!-- new.phpは新規作成のファイル
フォームタグに入力された内容を、サーバにPOST形式でリクエスト(要求)している。
サーバとはstore.phpのこと？ -->
