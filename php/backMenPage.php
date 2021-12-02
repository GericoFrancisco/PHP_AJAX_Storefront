<?php
session_start();

$page = $_GET['page'];

if($page >= 1) $_SESSION['menPagesCount'] = $page;
else $_SESSION['menPagesCount'] = $page+1;
