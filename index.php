<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GupShup</title>
    <?php include('./client/commonFiles.php') ?>
</head>
<body>
    <?php

    include('./server/error.php');

    include('./client/header.php');
    
    if(isset($_GET['login']) && !isset($_SESSION['user']['name'])){
        include('./client/login.php');
    } elseif(isset($_GET['signup']) && !isset($_SESSION['user']['name'])){
        include('./client/signup.php');
    } elseif(isset($_GET['ask']) && isset($_SESSION['user']['name'])){
        include('./client/ask.php');
    } elseif(isset($_GET['ques_id'])){
        include('./client/question_details.php');
    } elseif (isset($_GET['myQues']) && isset($_SESSION['user']['name'])) {
        include('./client/my_questions.php');
    } else{
        include('./client/questions.php');
    }

    ?>

    <!-- <script src="./public/script.js"></script>     -->

</body>
</html>