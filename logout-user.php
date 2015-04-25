<?php
require_once(__DIR__ . "/php/Model/config.php");
unset($_SESSION["authenticated"]);
session_destroy();
header("Location: " . $path . "../index.php");