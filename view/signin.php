<!doctype html>
<html lang="ja">
    <haed>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/10up-sanitize.css/4.1.0/sanitize.min.css">
        <link rel="stylesheet" type="text/css" href="view/header.css">
        <link rel="stylesheet" type="text/css" href="view/footer.css">
        <link rel="stylesheet" type="text/css" href="view/signin.css">
        <link rel="stylesheet" type="text/css" href="view/hg_menu.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <title>logo.shop</title>
    </haed>
    <body>
        
        <?php include('./header.php'); ?>
    <div class="main_oya">
    <?php include('view/hg_menu.php'); ?>
    <div class="main_flex">
        <div class="oya">
        
        <?php
            if (isset($error_message)) { ?>
                <div class="error_message">
            <?php foreach ($error_message as $value) {
            ?> 
                    <p><?php print $value; ?></p>
            <?php
                } ?>
                </div>
            <?php
            }
            ?>
        <?php if(isset($error_message)) { ?>
        <main class="main_error_message">
        <?php } else { ?>
        <main class="no_message">
        <?php } ?>
            <h2>アカウントを作成する</h2>
            
            <form method="post">
                <div class="name">ユーザー名</div><input class="text_box" type="text" name="name" placeholder="半角英数字かつ6文字以上">
                <div class="mail">メールアドレス</div><input class="text_box" type="text" name="mail" placeholder="メールアドレス">
                <div class="password">パスワード</div><input class="text_box" type="password" name="password" placeholder="６文字以上">
                <div class="address">住所</div><input class="text_box" type="text" name="address" placeholder="大阪府大阪市〇〇区○丁目○番○○マンション○号室">
                <div class="tel">電話番号</div><input class="text_box" type="text" name="tel" placeholder="090-xxxx-xxxxx">
                <input type="hidden" name="process_kind" value="new_account">
                <div class="submit"><input class="new_account_botan" type="submit" value="アカウント作成"></div>
            </form>
        </main>
        </div>
        </div>
</div>
        <?php include('view/footer.php'); ?>
        
<?php include('script/hg_menu.php'); ?>
    </body>
</html>