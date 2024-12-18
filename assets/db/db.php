<?php

$connect = mysqli_connect('localhost:3307', 'root', '', 'cms');

if (!$connect) {
    echo "Fail to connect with Database";
}
