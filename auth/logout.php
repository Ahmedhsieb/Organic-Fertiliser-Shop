<?php
session_start();

session_destroy();

header("refresh: 0.5 URL= ../index.php");
