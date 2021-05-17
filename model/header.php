<?php
function select_sub_item($dbh) {
    if (isset($_SESSION['id'])) {
        $row_result = array();
        $user_id = $_SESSION['id'];
        $sql = '    SELECT
                        logo_carts.id,
                        logo_users.address,
                        logo_users.tel,
                        logo_carts.amount,
                        logo_items.name,
                        logo_items.price,
                        logo_items.stock,
                        logo_items.status,
                        logo_items.size,
                        logo_items.img,
                        logo_items.discount
                    FROM
                        logo_users
                    INNER JOIN logo_carts ON logo_users.id = logo_carts.user_id
                    INNER JOIN logo_items ON logo_carts.item_id = logo_items.id
                    WHERE logo_users.id = '.$user_id;
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        foreach ($rows as $row) {
            if ($row['status'] === 1 && $row['stock'] - $row['amount'] >= 0) {
            $row_result[] =  $row;
            
            } else {
                auto_sub_delete($dbh, $row);
            }
        }
        return array_filter($row_result);
    }
}
    
    function auto_sub_delete($dbh, $row) {
    $sql = 'delete from logo_carts where id ='.$row['id'];
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
}

?>