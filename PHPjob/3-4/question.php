<link rel="stylesheet" href="style.css">
<?php
$user_name = $_POST['user_name'];

$question1 = ['80', '22', '20', '21'];
$question2 = ['PHP', 'Python', 'JAVA', 'HTML'];
$question3 = ['join', 'select', 'insert', 'update'];

$correct_answer1 = $question1[0];
$correct_answer2 = $question2[3];
$correct_answer3 = $question3[1];
?>
<p>お疲れ様です
    <?php echo $user_name; ?>さん
</p>
<form action="answer.php" method="post">
    <h2>①ネットワークのポート番号は何番？</h2>
    <?php foreach ($question1 as $value) { ?>
            <input type="radio" name="selected_answer1" value="<?php echo $value ?>">
            <?php echo $value;
        } ?>
    <h2>②Webページを作成するための言語は？</h2>
    <?php foreach ($question2 as $value){ ?>
            <input type="radio" name="selected_answer2" value="<?php echo $value ?>">
            <?php echo $value;
        } ?>
    <h2>③MySQLで情報を取得するためのコマンドは？</h2>
    <?php foreach ($question3 as $value) { ?>
            <input type="radio" name="selected_answer3" value="<?php echo $value ?>">
            <?php echo $value;
        } ?>
    <br>
    <input type="hidden" name="user_name" value="<?php echo $user_name?>">
    <input type="hidden" name="correct_answer1" value="<?php echo $correct_answer1 ?>">
    <input type="hidden" name="correct_answer2" value="<?php echo $correct_answer2 ?>">
    <input type="hidden" name="correct_answer3" value="<?php echo $correct_answer3 ?>">
    <input type="submit" value="回答する">
</form>