<?php

session_start();

include('../common/db_connect.php');

if (!isset($_GET['signup'])) {
    unset($_SESSION['name']);
    unset($_SESSION['email']);
    unset($_SESSION['pass']);
    unset($_SESSION['conf_pass']);
}
if (!isset($_GET['login'])) {
    unset($_SESSION['login_name']);
    unset($_SESSION['login_email']);
}

if (!isset($_GET['ask'])) {
    unset($_SESSION['title']);
    unset($_SESSION['description']);
    unset($_SESSION['category_id']);
}

if (!isset($_GET['ques_id'])) {
    unset($_SESSION['reply']);
}

if (isset($_POST['signup'])) {

    if (empty($_POST['name'])) {
        $_SESSION['name_error'] = "*Name is Required!";
    } else {
        unset($_SESSION['name_error']);
        $_SESSION['name'] = htmlspecialchars($_POST['name']);
    }

    if (empty($_POST['email'])) {
        $_SESSION['email_error'] = "*Email is Required!";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['email_error'] = "*Email is not correctly formatted!";
    } else {
        unset($_SESSION['email_error']);
        $_SESSION['email'] = htmlspecialchars($_POST['email']);
    }

    if (empty($_POST['pass'])) {
        $_SESSION['pass_error'] = "*Password is Required!";
    } elseif (strlen($_POST['pass']) < 8) {
        $_SESSION['pass_error'] = "*Password should be atleast 8 characters long!";
    } else {
        unset($_SESSION['pass_error']);
        $_SESSION['pass'] = htmlspecialchars($_POST['pass']);
    }

    if (empty($_POST['conf_pass'])) {
        $_SESSION['conf_pass_error'] = "*Confirm Password is Required!";
    } elseif ($_POST['conf_pass'] !== $_POST['pass']) {
        if (empty($_POST['pass'])) {
            $_SESSION['conf_pass_error'] = "*Please enter Password first!";
        } else {
            $_SESSION['conf_pass_error'] = "*Confirm Password is not matching with Password!";
        }
    } else {
        unset($_SESSION['conf_pass_error']);
        $_SESSION['conf_pass'] = htmlspecialchars($_POST['conf_pass']);
    }

    if (
        !isset($_SESSION['name_error'])   &&
        !isset($_SESSION['email_error'])  &&
        !isset($_SESSION['pass_error'])   &&
        !isset($_SESSION['conf_pass_error'])
    ) {

        $name = trim($_SESSION['name']);
        $email = trim($_SESSION['email']);
        $pass = password_hash(trim($_SESSION['pass']), PASSWORD_DEFAULT);

        $sql = "SELECT email FROM users WHERE email='$email';";

        $result = $conn->query($sql);



        if ($result->num_rows > 0) {
            $_SESSION['email_error'] = "*This email is already registered!";
            unset($_SESSION['email']);
            header("Location: /omar/gupshup/?signup=true");
        } else {
            $user = $conn->prepare("INSERT INTO users (name, email, pass) VALUES (?, ?, ?)");
            $user->bind_param("sss", $name, $email, $pass);
            $result = $user->execute();

            if ($result) {
                $_SESSION['user'] = ['id' => $user->insert_id, 'name' => $name, 'email' => $email];
                unset($_SESSION['name']);
                unset($_SESSION['email']);
                unset($_SESSION['pass']);
                unset($_SESSION['conf_pass']);
                header("Location: /omar/gupshup/");
            }
        }
    } else {
        header("Location: /omar/gupshup/?signup=true");
    }
} elseif (isset($_POST['login'])) {

    if (empty($_POST['email'])) {
        $_SESSION['email_error'] = "*Email is Required!";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['email_error'] = "*Email is not correctly formated!";
    } else {
        unset($_SESSION['email_error']);
        $_SESSION['login_email'] = htmlspecialchars($_POST['email']);
    }

    if (empty($_POST['pass'])) {
        $_SESSION['pass_error'] = "*Password is Required!";
    } else {
        unset($_SESSION['pass_error']);
        $_SESSION['login_pass'] = htmlspecialchars($_POST['pass']);
    }

    if (
        !isset($_SESSION['email_error'])  &&
        !isset($_SESSION['pass_error'])
    ) {

        $name = "";
        $email = trim($_SESSION['login_email']);
        $pass = trim($_SESSION['login_pass']);
        $id = 0;

        // $user = $conn->prepare("SELECT * FROM users WHERE email='$email' and pass='$pass';");

        // $result = $user->execute();

        $sql = "SELECT * FROM users WHERE email='$email';";

        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $id = $row['id'];
            if (password_verify($pass, $row['pass'])) {
                $_SESSION['user'] = ['id' => $id, 'name' => $name, 'email' => $email];
                unset($_SESSION['login_email']);
                unset($_SESSION['login_pass']);
                header("Location: /omar/gupshup/");
            } else {
                $_SESSION['pass_error'] = "*Wrong Password!";
                unset($_SESSION['login_pass']);
                header("Location: /omar/gupshup/?login=true");
            }
        } else {
            $_SESSION['email_error'] = "*This email is not registered!";
            unset($_SESSION['login_email']);
            header("Location: /omar/gupshup/?login=true");
        }
    } else {
        header("Location: /omar/gupshup/?login=true");
    }
} elseif (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    // session_unset();
    header("Location: /omar/gupshup/");
} elseif (isset($_POST['ask'])) {

    if (empty($_POST['title'])) {
        $_SESSION['title_error'] = "*Title is Required!";
    } else {
        unset($_SESSION['title_error']);
        $_SESSION['title'] = htmlspecialchars($_POST['title']);
    }

    if (empty($_POST['description'])) {
        $_SESSION['description_error'] = "*Description is Required!";
    } else {
        unset($_SESSION['description_error']);
        $_SESSION['description'] = htmlspecialchars($_POST['description']);
    }

    // $categories = $conn->prepare("SELECT * FROM category;");
    // $result = $categories->get_result();
    $sql = "SELECT * FROM category;";
    $result = $conn->query($sql);
    $validate_category = TRUE;

    if ($result) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $category_id = $row['id'];
                if ($_POST['category_id'] == $category_id) {
                    $validate_category = FALSE;
                    break;
                }
            }
        }
    }

    if (empty($_POST['category_id'])) {
        $_SESSION['category_id_error'] = "*Please select a category!";
    } elseif ($validate_category) {
        $_SESSION['category_id_error'] = "*Please select a valid category!";
    } else {
        unset($_SESSION['category_id_error']);
        $_SESSION['category_id'] = htmlspecialchars($_POST['category_id']);
    }

    if (
        !isset($_SESSION['title_error'])   &&
        !isset($_SESSION['description_error'])  &&
        !isset($_SESSION['category_id_error'])
    ) {
        $title = trim($_SESSION['title']);
        $description = trim($_SESSION['description']);
        $user_id = $_SESSION['user']['id'];
        $category_id = trim($_SESSION['category_id']);


        $question = $conn->prepare("INSERT INTO questions (title, description, user_id, category_id)VALUES (?, ?, ?, ?)");
        $question->bind_param("ssii", $title, $description, $user_id, $category_id);
        $result = $question->execute();

        if ($result) {
            unset($_SESSION['title']);
            unset($_SESSION['description']);
            unset($_SESSION['category_id']);
            header("Location: /omar/gupshup/");
        }
    } else {
        header("Location: /omar/gupshup/?ask=true");
    }
} elseif (isset($_POST['reply'])) {

    if (isset($_SESSION['user']['name'])) {

        if (empty($_POST['replies'])) {
            $_SESSION['reply_error'] = "*Please write something!";
        } else {
            unset($_SESSION['reply_error']);
            $_SESSION['reply'] = htmlspecialchars($_POST['replies']);
        }

        if (!isset($_SESSION['reply_error'])) {
            $reply = trim($_SESSION['reply']);
            $question_id = htmlspecialchars(trim($_POST['question_id']));
            $user_id = $_SESSION['user']['id'];

            $replies = $conn->prepare("INSERT INTO replies (replies, question_id, user_id)VALUES (?, ?, ?)");
            $replies->bind_param("sii", $reply, $question_id, $user_id);
            $result = $replies->execute();

            if ($result) {
                unset($_SESSION['reply']);
                header("Location: /omar/gupshup/?ques_id=$question_id");
            }
        } else {
            $question_id = htmlspecialchars(trim($_POST['question_id']));
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

    if ($result) {
        header("Location: /omar/gupshup/?myQues=true");
    }
}
