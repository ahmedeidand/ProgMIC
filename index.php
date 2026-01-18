<?php

    $text = $_GET['text'];

    $safeText = escapeshellarg($text);

    shell_exec("xdotool type $safeText");
    header('Location: index.html');
?>