<?php
session_start();

$page = $_GET['page'];

if($page <= 5) $_SESSION['prodPagesCount'] = $page;
else $_SESSION['prodPagesCount'] = $page-1;
