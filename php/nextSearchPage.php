<?php
session_start();

$page = $_GET['page'];
$limit = $_SESSION['search_page_limit'];

if($page <= $limit) $_SESSION['searchPagesCount'] = $page;
else $_SESSION['searchPagesCount'] = $page-1;

