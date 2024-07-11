<?php
include 'db.php';
include 'functions.php';

if (isset($_GET['id'])) {
    delete_group($conn);
}
?>
