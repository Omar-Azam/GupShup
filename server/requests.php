<?php

session_start();

include('../common/db_connect.php');

if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

    $sql = "SELECT email FROM users WHERE email='$email';";

    $result = $conn->query($sql);



    if ($result->num_rows > 0) {
        $_SESSION['email_exist'] = "This email already exist!";
        header("Location: /omar/gupshup/?signup=true");
    } else {
        $user = $conn->prepare("INSERT INTO users (name, email, pass) VALUES (?, ?, ?)");
        $user->bind_param("sss", $name, $email, $pass);
        $result = $user->execute();

        if ($result) {
            $_SESSION['user'] = ['id' => $user->insert_id, 'name' => $name, 'email' => $email];
            header("Location: /omar/gupshup/");
        }
    }
} elseif (isset($_POST['login'])) {
    $name = "";
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $id = 0;

    // $user = $conn->prepare("SELECT * FROM users WHERE email='$email' and pass='$pass';");

    // $result = $user->execute();

    $sql = "SELECT * FROM users WHERE email='$email';";

    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $id = $row['id'];
        if(password_verify($pass, $row['pass'])){
            $_SESSION['user'] = ['id' => $id, 'name' => $name, 'email' => $email];
            header("Location: /omar/gupshup/");
        } else{
            $_SESSION['passErr'] = "Wrong Password!";
            header("Location: /omar/gupshup/?login=true");
        }
    } else {
        $_SESSION['email_do_not_exist'] = "This email does not exist!";
        header("Location: /omar/gupshup/?login=true");
    }
} elseif (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    // session_unset();
    header("Location: /omar/gupshup/");
} elseif (isset($_POST['ask'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user']['id'];
    $category_id = $_POST['category_id'];


    $question = $conn->prepare("INSERT INTO questions (title, description, user_id, category_id)VALUES (?, ?, ?, ?)");
    $question->bind_param("ssii", $title, $description, $user_id, $category_id);
    $result = $question->execute();

    if ($result) {
        header("Location: /omar/gupshup/");
    }
} elseif (isset($_POST['reply'])) {
    if (isset($_SESSION['user']['name'])) {
        $reply = $_POST['replies'];
        $question_id = $_POST['question_id'];
        $user_id = $_SESSION['user']['id'];

        $replies = $conn->prepare("INSERT INTO replies (replies, question_id, user_id)VALUES (?, ?, ?)");
        $replies->bind_param("sii", $reply, $question_id, $user_id);
        $result = $replies->execute();

        if ($result) {
            header("Location: /omar/gupshup/?ques_id=$question_id");
        }
    } else {
        header("Location: /omar/gupshup/?login=true");
    }
} elseif (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $question = $conn->prepare("DELETE FROM questions WHERE id = ?;");
    $question->bind_param("i", $id);
    $result = $question->execute();
    
    if($result){
        header("Location: /omar/gupshup/?myQues=true");
    }
}
