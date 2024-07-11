<?php

function add_group($conn) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $conn->query("INSERT INTO `groups` (name) VALUES ('$name')");
    header('Location: index.php');
    exit;
}

function add_question($conn) {   
    $group_id = intval($_POST['group_id']);
    $question_text = mysqli_real_escape_string($conn, $_POST['question_text']);
    $question_type = mysqli_real_escape_string($conn, $_POST['question_type']);
    $conn->query("INSERT INTO `questions` (group_id, question_text, question_type) VALUES ($group_id, '$question_text', '$question_type')");
    header("Location: group.php?id=$group_id");
    exit;
}

function delete_group($conn) {
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM `groups` WHERE id = $id");
    $conn->query("DELETE FROM `questions` WHERE group_id = $id");
    header('Location: index.php');
    exit;
}

function delete_question($conn) {
    $id = intval($_GET['id']);
    $group_id = intval($_GET['group_id']);
    $conn->query("DELETE FROM `questions` WHERE id = $id");
    header("Location: group.php?id=$group_id");
    exit;
}

function select_group($conn) {
    $group_id = intval($_GET['id']);
    $group_result = $conn->query("SELECT * FROM `groups` WHERE id = $group_id");
    $group = $group_result->fetch_assoc();
    $questions_result = $conn->query("SELECT * FROM `questions` WHERE group_id = $group_id");

    return ['group' => $group, 'questions' => $questions_result];
}

function select_groups($conn) {
    $result = $conn->query("SELECT * FROM `groups`");
    return $result;
}
?>

