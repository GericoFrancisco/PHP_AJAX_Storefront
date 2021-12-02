<?php
session_start();

$page = $_GET['page'];

if($page >= 1) $_SESSION['womenPagesCount'] = $page;
else $_SESSION['womenPagesCount'] = $page+1;
