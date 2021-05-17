
<header>
    
    <div class="left-menu">
        
        <div class="menu"><a href="#!"><img class="hg_menu" src="view/images/icon/hg_menu.png"></a></div>
        
        <div class="men"><a href="./all_men_page.php">MEN</a></div>
        <div class="women"><a href="./all_women_page.php">WOMEN</a></div>
    </div>
    
    <div class="logo"><a href="./index.php">LOGO.</a></div>
    <div class="right-menu">
            <?php if (!empty($_SESSION)) { ?>
            <div class="header_login"><a href="./logout.php">ログアウト</a></div>
            <div class="header_account"><a href="my_account.php">マイアカウント</a></div>
            <?php } ?>
            <?php if (empty($_SESSION)) { ?>
            <div class="header_login"><a href="./login.php">ログイン</a></div>
            <?php } ?>
            <?php if (!empty($_SESSION)) { ?>
            <div class="header_cart"><a href="cart.php"><img class="cart_png" src="view/images/icon/cart.png"></a></div>
            <?php } ?>
    </div>
    
</header>
<div class="cart_action">
        <a class="cart_close_btn" href="#!">×</a>
        
        <div class="cart_sub_action">
            
            <div class="cart_sub_oya">
                
                <?php
                $total = 0;
                
                if (!empty($header_rows)) {
                    
                    foreach ($header_rows as $h_row) { ?>
                    
                <div class="cart_item_sub_box">
                    <img class="cart_sub_img" src="img/<?php print $h_row['img']; ?>">
                    <div class="cart_sub_detail">
                        <p class="sub_item_name"><?php print $h_row['name']; ?></p>
                        <p class="sub_item_price">¥<?php print $h_row['price']; ?></p>
                        <p class="sub_item_amound">×<?php print $h_row['amount']; ?></p>
                    </div>
                </div>
                
                <?php  $total = $total + ($h_row['price'] * $h_row['amount']);
                } ?>
                
                </div>
            <p class="cart_sub_total">total : ¥<?php print $total; ?></p>
        <?php } elseif (empty($header_rows)) { ?>
        <p class="cart_sub_message">カートは空です</p>
        <?php } ?>
        </div>
        
    </div>
</div>

