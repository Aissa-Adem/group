<?php
include 'db.php';
include 'functions.php';

if (isset($_GET['id']) && isset($_GET['group_id'])) {
    delete_question($conn);
}
?>
