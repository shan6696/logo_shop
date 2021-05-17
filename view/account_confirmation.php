<!doctype html>
<html lang="ja">
    <haed>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/10up-sanitize.css/4.1.0/sanitize.min.css">
        <link rel="stylesheet" type="text/css" href="view/header.css">
        <link rel="stylesheet" type="text/css" href="view/footer.css">
        <link rel="stylesheet" type="text/css" href="view/account_confirmation.css">
        <link rel="stylesheet" type="text/css" href="view/hg_menu.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <title>logo.shop</title>
    </haed>
    <body>
        <?php include('./header.php'); ?>
    <div class="main_oya">
    <?php include('view/hg_menu.php'); ?>
    <div class="main_flex">
        <div class="cart_status_box">
                <div class="status_a">カート確認</div>
                <div class="status_b">お客様情報確認</div>
                <div class="status_c">ご注文内容確認</div>
                <div class="status_d">ご注文完了</div>
            </div> 
        
        <main>
            <h2>アカウント情報</h2>
                <div class="name">お名前</div>
                <p><?php print $_SESSION['name']; ?></p>
                <div class="address">住所</div>
                <p><?php print $_SESSION['address']; ?></p>
                <div class="tel">電話番号</div>
                <p><?php print $_SESSION['tel']; ?></p>
                <a href="./order.php">確認</a>
        </main>
    </div>
    </div>

        <?php include('view/footer.php'); ?>
<?php include('script/hg_menu.php'); ?>
    </body>
</html>