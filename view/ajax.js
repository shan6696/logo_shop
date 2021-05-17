<main class="main_sort_hyojun">

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
    </main>