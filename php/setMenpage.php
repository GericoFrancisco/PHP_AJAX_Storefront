<?php
session_start();
$page = $_GET['page'];
$_SESSION['menPagesCount'] = $page;