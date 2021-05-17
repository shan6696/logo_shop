<!doctype html>
<html lang="ja">
    <haed>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/10up-sanitize.css/4.1.0/sanitize.min.css">
        <link rel="stylesheet" type="text/css" href="view/header.css">
        <link rel="stylesheet" type="text/css" href="view/footer.css">
        <link rel="stylesheet" type="text/css" href="view/cart.css">
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
            <?php if (isset($error_message)) { ?>
            <div class="error_message"><?php print $error_message ?></div>
            <?php } elseif (isset($update_message)) { ?>
            <div class="update_message"><?php print $update_message ?></div>
            <?php } elseif (isset($delete_message)) { ?>
            <div class="delete_message"><?php print $delete_message ?></div>
            <?php } ?>
            <table class="item_status">
                <tr>
                    <th>商品名</th>
                    <th>サイズ</th>
                    <th>単価</th>
                    <th>注文数</th>
                    <th>小計</th>
                    <th>削除</th>
                </tr>
                
                <?php
                $total = 0;
                $sub_total = 0;
                if (isset($rows)) {
                    
                    foreach ($rows as $row) { 
                        $size = $row['size'];
                        $price = $row['price'] * (1- $row['discount'] * 0.1);
                        $sub_total = $price * $row['amount'];
                 ?>
                <tr>
                    <td class="item_name_box">
                        <div class="image">
                            <img class="item_image" src="img/<?php print $row['img']; ?>">
                        </div>
                        <div class="item_name">
                            <p class="name"><?php print $row['name']; ?></p>
                        </div>
                    </td>
                    <td>
                        <form method="post">
                            <select name="size" >
                                    <?php switch($size) { 
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
                        </form>
                    </td>
                    <td>
                        ¥<?php print $price; ?>
                    </td>
                    <td>
                        <form method="post">
                            <div class="stock"><input class="stock_value" type="text" name="amount" value="<?php print $row['amount']; ?>"></div>
                            <input type="hidden" name="cart_id" value="<?php print $row['id']; ?>">
                            <input type="hidden" name="stock" value="<?php print $row['stock']; ?>">
                            <input type="hidden" name="process_kind" value="update_amount">
                            <div　class="change_botan_box"><input class="changebotan" type="submit" value="変更"></div>
                        </form>
                    </td>
                    <td>
                        ¥<?php print $sub_total; ?>
                    </td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="cart_id" value="<?php print $row['id']; ?>">
                            <input type="hidden" name="process_kind" value="delete_cart">
                            <input type="submit" value="削除">
                        </form>
                    </td>
                </tr>
                
                <?php
                $total = $total + $sub_total;
                } } ?>
            </table>
            <?php if (empty($rows)) { ?>
                    <div class="cart_box">
                        <p class="cart_text">カートは空です</p>
                    </div>
                <?php } ?>
            <div total_box>
                <table class="total_table">
                    <tr>
                        <td class="total_a">購入商品金額</td>
                        <td class="total_b">¥<?php print $total; ?></td>
                    </tr>
                </table>
            </div>
            <div class="next_box">
            <a class="index_botan" href="./index.php">買い物を続ける</a>
            <?php if (!empty($rows)) { ?>
            <a href="account_confirmation.php">ご注文手続きへ</a>
            <?php } ?>
            </div>
        </div>
</div>
        <?php include('view/footer.php'); ?>
<?php include('script/hg_menu.php'); ?>
    </body>
</html>
