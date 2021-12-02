<?php
session_start();

$total = $_SESSION["total-price"];

$html = "<h4>Total</h4><span>PHP $total</span>";

echo $html;