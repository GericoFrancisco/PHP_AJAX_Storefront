<?php
session_start();

$page = $_GET['page'];

if($page <= 3) $_SESSION['womenPagesCount'] = $page;
else $_SESSION['womenPagesCount'] = $page-1;
