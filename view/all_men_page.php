<!doctype html>
<html lang="ja">
    <haed>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/10up-sanitize.css/4.1.0/sanitize.min.css">
        <link rel="stylesheet" type="text/css" href="view/header.css">
        <link rel="stylesheet" type="text/css" href="view/footer.css">
        <!--menもwomenも同じcss-->
        <link rel="stylesheet" type="text/css" href="view/all_page.css">
        <link rel="stylesheet" type="text/css" href="view/hg_menu.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        
        
        <title>logo.shop</title>
    </haed>
    <body>
        
<?php include('./header.php'); ?>
    <div class="main_oya">
    <?php include('view/hg_menu.php'); ?>
<div class="new_page">
    <img class="new_top_img"  src="view/images/background/men_page.png">
    <div class="new_sub_menu">
        <!--<form>-->
        <!--並べ替え:-->
        <!--    <select class="sort_menu">-->
        <!--        <option value="sort_new"><button>新しい順</button></option>-->
        <!--        <option value="sort_old">古い順</option>-->
        <!--        <option value="sort_price_higt">値段が高い順</option>-->
        <!--        <option value="sort_price_row">値段が低い順</option>-->
        <!--    </select>-->
        <!--</form>-->
    </div>
    <div class="new_item_count"><?php print count($rows); ?> ITEMS</div>
    <main id="ajaxreload">
            <?php
        foreach ($rows as $row) { ?>
        <?php
            $to_date = date('Y-m-d H:i:s');
            $createdate = $row['createdate'];
            $if_new = strtotime($to_date) - strtotime($createdate);
            $discount = $row['price'] * (1- $row['discount'] * 0.1);
            if ($if_new <=3600 ) { ?>
                <div class="item_box">
                    <a href="item_details.php?id=<?php print $row['id']; ?>">
                        <img class="item_image" src='./img/<?php print $row['img'] ?>'>
                        <div class="item_status_box">
                        <div class="new_message">new</div>
                        <p class="item_name"><?php print $row['name']; ?></p>
                        <div class="new_item_price">¥<?php print $row['price']; ?></div>
                        </div>
                    </a>
                </div>
            <?php } elseif ($row['discount'] !== 0) { ?>
                <div class="item_box">
                    <a href="item_details.php?id=<?php print $row['id']; ?>">
                    <img class="item_image" src='./img/<?php print $row['img'] ?>'>
                    <div class="item_status_box">
                        <div class="sale_message">sale</div>
                        <p class="item_name"><?php print $row['name']; ?></p>
                        <div class="item_price_line">¥<?php print $row['price']; ?></div>
                        <div class="item_sale_price">¥<?php print $discount; ?></div>
                    </div>
                     </a>
                </div>
           
            <?php } else {?>
            
                <div class="item_box">
                    <a href="item_details.php?id=<?php print $row['id']; ?>">
                        <img class="item_image" src='./img/<?php print $row['img'] ?>'>
                        <div class="item_status_box">
                        <div class="blank"></div>
                        <p class="item_name"><?php print $row['name']; ?></p>
                        <div class="item_price">¥<?php print $row['price']; ?></div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        <?php
        }
        ?>
    </main>
</div>
</div>

<?php include('view/footer.php'); ?>
<?php include('script/sort.php'); ?>
<?php include('script/hg_menu.php'); ?>
    </body>
</html>