<!doctype html>
<html lang="ja">
    <haed>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/10up-sanitize.css/4.1.0/sanitize.min.css">
        <link rel="stylesheet" type="text/css" href="view/header.css">
        <link rel="stylesheet" type="text/css" href="view/footer.css">
        <link rel="stylesheet" type="text/css" href="view/login.css">
        <link rel="stylesheet" type="text/css" href="view/hg_menu.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <title>logo.shop</title>
    </haed>
    <body>
        <?php include('./header.php'); ?>
     <div class="main_oya">
    <?php include('view/hg_menu.php'); ?>
    <div class="main_flex">
       <main>
            <h2>マイアカウント</h2>
            <div class="oya">
                <div class="login">
                    <h4>アカウントにログインする</h2>
                    <?php  if(isset($mail_error_message)) { ?>
                    <span><?php print $mail_error_message; ?></span>
                    <?php } ?>
                    <?php if(isset($pass_error_message)) { ?>
                    <span><?php print $pass_error_message; ?></span>
                    <?php } ?>
                    <form method="post">
                        <div class="mail">ユーザー名</div>
                        <input class="text_box" type="text" name="name" placeholder="ユーザー名">
                        <div class="password">パスワード</div>
                        <input class="text_box" type="password" name="password" placeholder="６文字以上">
                        <div class="oya">
                        <div class="check"><input type="checkbox" name="check">　パスワードを保存する</div>
                        <input type="hidden" name="process_kind" value="login">
                        <input class="login_botan" type="submit" value="ログイン">
                        </div>
                    </form>
                </div>
                <div class="account">
                    <h4>初めてのお客様へ</h2>
                    <p>アカウントをお持ちでないお客様は、<br>アカウント作成をお願いいたします。</p>
                    <a href="./signin.php">アカウント作成</a>
                </div>
            </div>
        </main>
    </div>
</div>
        <?php include('view/footer.php'); ?>
<?php include('script/hg_menu.php'); ?>
    </body>
</html>
