<?php
require_once('controller.php');

$page = new Controller();

$status = $page->insertData();

if (isset($_GET['action']) && isset($_GET['id']) && empty($status)) {
    $id = $_GET['id'];
    $action = $_GET['action'];
    if ($action = 'delete') {
        $status = $page->deleteData($id);
    }
}

$query = $page->readData();

require('mainView.php');
