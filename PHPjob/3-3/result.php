<?php
$numbers = $_POST['numbers'];

$length = strlen($numbers);
$rand_number = mt_rand(0, $length - 1);
$result_number = substr($numbers, $rand_number, 1);
?>
<p><?php echo date("Y-m-d", time()); ?>の運勢は</p>
<p>選ばれた数字は<?php echo $result_number; ?></p>
<p>
    <?php
    switch ($result_number) {
        case 0:
            echo '凶';
            break;
        case 1:
        case 2:
        case 3:
            echo '小吉';
            break;
        case 4:
        case 5:
        case 6:
            echo '中吉';
            break;
        case 7:
        case 8:
            echo '吉';
            break;
        case 9:
            echo '大吉';
            break;
    }
    ?>
</p>