<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="view/item_management.css">

        <title>LOGO.管理ページ</title>
    </head>
    <body>
        <h1>LOGO.shop管理ページ</h1>
        <a href="user_information.php">ユーザー管理ページ</a>
        <?php
        if (!empty($error_message)) {
            foreach ($error_message as $value) { ?>
                <p class="error_msg"><?php print $value; ?></p>
        <?php 
            }
        } ?>
        <?php if(isset($add_message)) {  ?> <p class="success_msg"><?php print $add_message; ?></p><?php } ?>
        <?php if(isset($update_stock_message)) {  ?> <p class="success_msg"><?php print $update_stock_message; ?></p><?php } ?>
        <?php if(isset($update_discount_message)) {  ?> <p class="success_msg"><?php print $update_discount_message; ?></p><?php } ?>
        <?php if(isset($update_status_message)) {  ?> <p class="success_msg"><?php print $update_status_message; ?></p><?php } ?>
        <?php if(isset($delete_message)) {  ?> <p class="success_msg"><?php print $delete_message; ?></p><?php } ?>
        <form method="post" enctype="multipart/form-data">
            <div class="oya">
                <div class="oya_left">
                    <div class="item_name">商品名: <input type="text" name="name"></div>
                    
                    <div class="item_price">値　段: <input type="text" name="price"></div>
                    
                    <div class="item_stock">個　数: <input type="text" name="stock"></div>
        
                    <div class="item_size">サイズ: 
                                                <input type="radio" name="size" value="S">S
                                                <input type="radio" name="size" value="M">M
                                                <input type="radio" name="size" value="L">L
                    </div>
                    
                    <div class="sex">性　別: 
                                                <input type="radio" name="sex" value="men">men
                                                <input type="radio" name="sex" value="women">women
                    </div>
                    
                    <div class="type">種　類: 
                        <select name="type">
                            <option value=""></option>
                            <option value="0">アウター</option>
                            <option value="1">パンツ</option>
                            <option value="2">インナー</option>
                        </select>
                    </div>
                    
                    <div class="item_image">画　像: <input type="file"name="img"></div>
                    
                    <div class="status">ステータス:
                        <select name="status">
                            <option value=""></option>
                            <option value="0">非公開→公開</option>
                            <option value="1">公開→非公開</option>
                        </select>
                    </div>
                </div>
            
                <div class="features">特徴: 
                <textarea name="features" rows="13" cols="60"></textarea>
                </div>
            
            </div>
            <input class="botton" type="submit" value="追加">
            <input type="hidden" name="process_kind" value="add_item">
        </form>
        
        <h2>一覧・変更</h2>
        
        <table>
            <tr>
                <th>画像</th>
                <th>商品名</th>
                <th>サイズ</th>
                <th>性別</th>
                <th>価格</th>
                <th>在庫数</th>
                <th>特徴</th>
                <th>セール</th>
                <th>追加日</th>
                <th>ステータス</th>
                <th>操作</th>
            </tr>
            <?php foreach ($rows as $row) { ?>
            <?php if ($row['status'] === 0) { ?>
            <tr class="status0">
            <?php } ?>
            <?php if ($row['status'] === 1) { ?>
            <tr>
            <?php } ?>
            
                <td>
                    <img src="img/<?php print $row['img']; ?>">
                </td>
                <td>
                    <p><?php print $row['name']; ?></p>
                </td>
                <td>
                    <?php print $row['size']; ?>
                </td>
                <td>
                    <?php print $row['sex']; ?>
                </td>
                <td>
                    ¥<?php print $row['price']; ?>
                </td>
                <td>
                    <form method="post">
                        <input class="stock_a"　type="text" name="stock" value="<?php print $row['stock']; ?>">個<br>
                        <input type="hidden" name="id" value="<?php print $row['id']; ?>">
                        <input type="hidden" name="process_kind" value="update_stock">
                        <input type="submit" value="変更">
                    </form>
                </td>
                <td>
                    <p><?php print $row['comment']; ?></p>
                </td>
                <td>
                    <?php
                    if(time_dif($row['createdate']) !== true) { ?>
                        <form method="post">
                        <select name="discount">
                            <?php 
                            $discount = array('なし', '10%', '20%', '30%', '40%', '50%') ;
                            $i = 0;
                            $count = $row['discount'];
                            while ($i <=5) { ?>
                            <?php if($count === $i){ ?>
                            <option value="<?php print $i ?>" selected><?php print $discount[$i]; ?></option>
                            <?php } elseif($count !== $i) {  ?>
                            <option value="<?php print $i ?>" ><?php print $discount[$i]; ?></option>
                            <?php } ?>
                            <?php $i++; } ?>
                        </select>
                        <input type="hidden" name="id" value="<?php print $row['id']; ?>">
                        <input type="hidden" name="process_kind" value="update_discount">
                        <input type="submit" value="変更">
                    </form>
                    <?php
                    } else { ?>
                        new商品はセール価格を選べません
                    <?php
                    }
                    ?>
                    
                </td>
                <td>
                    <?php 
                    print
                    substr($row['createdate'],0,10);
                    ?><br>
                    <?php
                    if(time_dif($row['createdate']) === true) {
                        print 'new';
                    }
                    ?>
                </td>
                <td>
                    <form method="post">
                      
                        <?php if ($row['status'] === 0) { ?>
                        <p class="status">非公開中</p>
                        <input type="hidden" name="status" value="1">
                        <input type="hidden" name="id" value="<?php print $row['id'] ?>">
                        <input type="hidden" name="process_kind" value="update_status">
                        <input type="submit" value="公開にする">
                        <?php } elseif ($row['status'] === 1) { ?>
                        <p class="status">公開中</p></p>
                        <input type="hidden" name="status" value="0">
                        <input type="hidden" name="id" value="<?php print $row['id'] ?>">
                        <input type="hidden" name="process_kind" value="update_status">
                        <input type="submit" value="非公開にする">
                        <?php } ?>
                    </form>
                </td>
                <td>
                    <form method="post">
                        <input type="hidden" name="id" value="<?php print $row['id'] ?>">
                        <input type="hidden" name="process_kind" value="delete_item">
                        <input type="submit" value="削除">
                    </form>
                </td>
            </tr>
            <?php
            } ?>
        </table>
    </body>
</html>