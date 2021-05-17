<!doctype html>
<html lang="ja">
    <haed>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/10up-sanitize.css/4.1.0/sanitize.min.css">
        <link rel="stylesheet" type="text/css" href="view/header.css">
        <link rel="stylesheet" type="text/css" href="view/footer.css">
        <link rel="stylesheet" type="text/css" href="view/change_account_completed.css">
        <link rel="stylesheet" type="text/css" href="view/hg_menu.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <title>logo.shop</title>
    </haed>
    <body>
    <?php include('view//header.php'); ?>
    <div class="main_oya">
    <?php include('view/hg_menu.php'); ?>
    <div class="main_flex">
        <main>
            <p><?php print $_SESSION['name']; ?>様</p>
            <p>変更が完了いたしました。</p>
            <a href="./index.php">トップページへ</a>
        </main>
    </div>
 </div>
       <?php include('view/footer.php'); ?>
<?php include('script/hg_menu.php'); ?>
    </body>
</html>