<!doctype html>
<html lang="ja">
    <haed>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/10up-sanitize.css/4.1.0/sanitize.min.css">
        <link rel="stylesheet" type="text/css" href="view/header.css">
        <link rel="stylesheet" type="text/css" href="view/footer.css">
        <link rel="stylesheet" type="text/css" href="view/order_completed.css">
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
            <?php if (!empty($error_message)) { 
                    foreach ($error_message as $value) {
            ?>
                <p class="complete_message"><?php print $value ?> </p>
            <?php } 
             } else { ?>
            <p class="complete_message">ご注文が完了いたしました。</p>
            <?php } ?>
            <table class="item_status">
                <tr>
                    <th>商品名</th>
                    <th>サイズ</th>
                    <th>単価</th>
                    <th>注文数</th>
                    <th>小計</th>
                </tr>
                
               </tr>
                <?php
                $total = 0;
                $sub_total = 0;
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
                            <p><?php print $row['name']; ?></p>
                        </div>
                    </td>
                    <td>
                        <p class="item_size"><?php print $row['size']; ?></p>
                    </td>
                    <td>
                        ¥<?php print $price; ?>
                    </td>
                    <td>
                        <p class="stock"><?php print $row['amount']; ?></p>
                    </td>
                    <td>
                        ¥<?php print $sub_total; ?>
                    </td>
                </tr>
                <?php
                $total = $total + $sub_total;} ?>
            </table>
            <div total_box>
                <table class="total_table">
                    <tr>
                        <td class="total_a">購入商品金額</td>
                        <td class="total_b">¥<?php print $total ?></td>
                    </tr>
                </table>
            </div>
            <div class="next_box">
            <a href="./index.php">トップページへ</a>
            </div>
            </div>
</div>
        <?php include('view/footer.php'); ?>
<?php include('script/hg_menu.php'); ?>
    </body>
</html>
