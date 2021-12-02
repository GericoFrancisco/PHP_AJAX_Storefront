<?php
session_start();

$page = $_GET['page'];
$limit = $_SESSION['search_page_limit'];

if($page >= 1) $_SESSION['searchPagesCount'] = $page;
else $_SESSION['searchPagesCount'] = $page+1;
