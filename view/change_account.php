<!doctype html>
<html lang="ja">
    <haed>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/10up-sanitize.css/4.1.0/sanitize.min.css">
        <link rel="stylesheet" type="text/css" href="view/header.css">
        <link rel="stylesheet" type="text/css" href="view/footer.css">
        <link rel="stylesheet" type="text/css" href="view/change_account.css">
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
            <h2>アカウント情報を変更する</h2>
            <form method="post">
                <div class="name">ユーザー名
                <span> <?php if (isset($error_message[0])) { print '※'.$error_message[0]; } ?></span>
                <span> <?php if (isset($error_message[4])) { print '※'.$error_message[4]; } ?></span>
                <span> <?php if (isset($error_message[6])) { print '※'.$error_message[6]; } ?></span>
                </div>
                
                <input class="text_box" type="text" name="name" value="<?php print $_SESSION['name']; ?>">
                <div class="mail">メールアドレス
                <span> <?php if (isset($error_message[1])) { print '※'.$error_message[1]; } ?></span>
                <span> <?php if (isset($error_message[7])) { print '※'.$error_message[7]; } ?></span>
                </div>
                
                <input class="text_box" type="text" name="mail" value="<?php print $_SESSION['mail']; ?>">
                <div class="address">住所
                <span> <?php if (isset($error_message[2])) { print '※'.$error_message[2]; } ?></span>
                </div>
                
                <input class="text_box" type="text" name="address" value="<?php print $_SESSION['address']; ?>">
                <div class="tel">電話番号
                <span> <?php if (isset($error_message[3])) { print '※'.$error_message[3]; } ?></span>
                <span> <?php if (isset($error_message[5])) { print '※'.$error_message[5]; } ?></span>
                </div>
                
                <input class="text_box" type="text" name="tel" value="<?php print $_SESSION['tel']; ?>">
                <input type="hidden" name="process_kind" value="change_account">
                <div class="submit"><input class="change_account_completed" type="submit" value="確定"></div>
            </form>
        </main>
    </div>
 </div>
       <?php include('view/footer.php'); ?>
<?php include('script/hg_menu.php'); ?>
    </body>
</html>