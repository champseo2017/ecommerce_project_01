<?php
require_once './library/config.php';
require_once './library/database.php';
?>
<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
</head>
<body>
    <?php 
    $products = array();
    $sql = "SELECT * FROM tbl_product ORDER BY pd_name";
    $result = dbQuery($sql);
    while($row = dbFetchAssoc($result)){
        $products[] = $row['pd_name'];
    }
    $return_free = dbFreeResult($result); // คืนค่า $rs
    ?>
    <pre>
    <?php
    var_dump($products);
    ?>
    </pre>
</body>
</html>