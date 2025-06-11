<?php
require_once "config.php";

$connection = mysqli_connect(
    $config["connection"]["host"],
    $config["connection"]["user"],
    $config["connection"]["pass"],
    $config["connection"]["dbname"]
);
