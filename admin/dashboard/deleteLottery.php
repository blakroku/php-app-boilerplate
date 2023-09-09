<?php
require_once '../../config/app.php';

if (isset($_GET['id'])) {
    $result = R::load('results', $_GET['id']);
    R::trash($result);
    $_SESSION['deleted'] = 'Lottery result successfully deleted';
    header('Location: index.php');
} else {
    header('Location: index.php');
}