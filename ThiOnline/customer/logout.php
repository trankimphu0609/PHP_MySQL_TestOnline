<?php

    session_start();
    session_destroy();

    echo "<script> alert('Bạn đã thoát!'); window.location='../index.php';</script>";
?>