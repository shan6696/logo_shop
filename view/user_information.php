<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="view/user_information.css">

        <title>LOGO.管理ページ</title>
    </head>
    <body>
        <h1>LOGO.shop管理ページ</h1>
        <a href="item_management.php">商品管理ページ</a>
        
        <h2>ユーザー情報一覧</h2>
        <table>
            <tr>
                <th>名前</th>
                <th>メールアドレス</th>
                <th>住所</th>
                <th>電話番号</th>
                <th>登録日</th>
            </tr>
            <?php if (isset($rows)) {
                    foreach ($rows as $row) { ?>
                        <tr>
                            <td><?php print $row['name']; ?></td>
                            <td><?php print $row['mail']; ?></td>
                            <td><?php print $row['address']; ?></td>
                            <td><?php print $row['tel']; ?></td>
                            <td><?php print $row['createdate']; ?></td>
                        </tr>
             <?php }
                  } ?>
        </table>
    </body>
</html>