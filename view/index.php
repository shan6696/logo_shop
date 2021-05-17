<!doctype html>
<html lang="ja">
    <haed>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/10up-sanitize.css/4.1.0/sanitize.min.css">
        <link rel="stylesheet" type="text/css" href="view/header.css">
        <link rel="stylesheet" type="text/css" href="view/footer.css">
        <link rel="stylesheet" type="text/css" href="view/index.css">
        <link rel="stylesheet" type="text/css" href="view/hg_menu.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <title>logo.shop</title>
    </haed>
    <body>

<?php include('./header.php'); ?>
<div class="main_oya">
    <?php include('view/hg_menu.php'); ?>
    <main>
        <div class="main_sale">
            <div class"oya">
                <div class="sale">SALE.</div>
                <div class="sale_sex">
                    <a class="sale_a" href="sale_men_page.php"><div class="sale_men">MEN</div></a>
                    <a class="sale_a" href="sale_women_page.php"><div class="sale_women">WOMEN</div></a>
                </div>
            </div>
        </div>
        <div class="main_new">
            <div class="new_top">
                NEW.
            </div>
            <div class="new_bottom">
                <div class="new_bottom_left">
                    <a class="new_men" href="new_men_page.php">MEN</a>
                </div>
                <div class="new_bottom_right">
                    <a class="new_women" href="new_women_page.php">WOMEN</a>
                </div>
                <div calass="new_bottom_right">
                    
                </div>
            </div>
        </div>
    </main>
</div>
<?php include('view/footer.php'); ?>
<?php include('script/hg_menu.php'); ?>

    </body>
</html>