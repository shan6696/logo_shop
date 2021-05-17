<!doctype html>
<html lang="ja">
    <haed>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/10up-sanitize.css/4.1.0/sanitize.min.css">
        <link rel="stylesheet" type="text/css" href="view/header.css">
        <link rel="stylesheet" type="text/css" href="view/footer.css">
        <link rel="stylesheet" type="text/css" href="view/item_details.css">
        <link rel="stylesheet" type="text/css" href="view/hg_menu.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <title>logo.shop</title>
    </haed>
    <body>
        <?php include('./header.php'); ?>
    <div class="main_oya">
    <?php include('view/hg_menu.php'); ?>
        <main>
            <!--上の部分-->
            <div class="oya">
                <div class="item_image">
                    <img class="img" src="img/<?php print $row['img']; ?>">
                </div>
                <div class="details">
                    <div class="item_name_price_box">
                        <div class="item_name_price">
                            <p class="item_name"><?php print $row['name']; ?></p>
                            <?php if ($row['discount'] === 0) { ?>
                            <p class="item_price">¥<?php print $row['price']; ?></p>
                            <?php } else { ?>
                            <p class="item_price_genka">¥<?php print $row['price'] ?></p>
                            <p class="item_price"><span>¥<?php print $row['price'] * (1- $row['discount'] * 0.1) ?></span></p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="item_status_box">
                        <div class="item_status">

                            <p class="error_message"><?php if (isset($error_message)){ print $error_message; } ?></p>
                            <form method="post">
                                <div class="stock">個数: <input type="text" name="amount" value="1"></div>
                                <div class="size">サイズ: 
                                <select name="size" >
                                    <?php switch($row['size']) { 
                                    case "S": ?>
                                    <option value="S">S</option>
                                    <?php break; ?>
                                    <?php case "M": ?>
                                    <option value="M">M</option>
                                    <?php break; ?>
                                    <?php case "L": ?>
                                    <option value="L">L</option>
                                    <?php break; ?>
                                    <?php } ?>
                                </select>
                                
                                </div>
                                <?php if ($row['stock'] > 0) { ?>
                                <div class="in_stock">● 在庫あり</div>
                                <?php } else { ?>
                                <div class="not_in_stock">× 在庫なし</div>
                                <?php } ?>
                                <?php if (isset($_SESSION['id']) && $row['stock'] >0) { ?>
                                <input type="hidden" name="stock" value="<?php print $row['stock']; ?>">
                                <input type="hidden" name="id" value="<?php print $row['id']; ?>">
                                <input type="hidden" name="process_kind" value="cart_in">
                                <input class="cart_botan" type="submit" value="カートに入れる">
                                <?php } elseif ($row['stock'] <= 0) { ?>
                                <p class="login_botan">在庫がありません</p>
                                <?php } else { ?>
                                <a class="login_botan" href="login.php">ログインしてください</a>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--下の部分-->
            <div class="features">
                <h2>特徴</h2>
                <p class="comment"><?php print $row['comment']; ?></p>
            </div>
        </main>
        
 </div>
       <?php include('view/footer.php'); ?>
<?php include('script/hg_menu.php'); ?>
    </body>
</html>
