<link rel="stylesheet" href="style.css">
<?php
$user_name = $_POST['user_name'];

$selected_answer1 = $_POST['selected_answer1'];
$selected_answer2 = $_POST['selected_answer2'];
$selected_answer3 = $_POST['selected_answer3'];

$correct_answer1 = $_POST['correct_answer1'];
$correct_answer2 = $_POST['correct_answer2'];
$correct_answer3 = $_POST['correct_answer3'];

function matcher ($selected, $correct) {
    if ($selected === $correct) {
        echo "正解！";
    } else {
        echo "残念・・・";
    }
}
?>
<p>
    <?php echo $user_name; ?>さんの結果は・・・？
</p>
<p>①の答え</p>
<?php
    matcher ($selected_answer1, $correct_answer1)
?>
<p>②の答え</p>
<?php
    matcher ($selected_answer2, $correct_answer2)
?>
<p>③の答え</p>
<?php
    matcher ($selected_answer3, $correct_answer3)
?>