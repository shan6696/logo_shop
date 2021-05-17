
<script>
console.log('<?php echo json_encode($rows); ?>');
let json_rows = JSON.parse('<?php echo json_encode($rows); ?>');
console.log(json_rows);
let rev_rows = json_rows.reverse();
console.log(rev_rows);
json_decode(rev_rows);
console.log(rev_rows);
var $
    $(".sort_menu").change(function() {
        var sort_menu_val = $(".sort_menu").val();
        if(sort_menu_val == "sort_new") {
            document.getElementById("ajaxreload").innerHTML = "";
        } else if(sort_menu_val == "sort_old") {
                document.getElementById("ajaxreload").innerHTML = "";
        } else if(sort_menu_val == "sort_price_higt") {
            
        } else if(sort_menu_val == "sort_price_row") {
            alert('安い順');
        }
    });
</script>