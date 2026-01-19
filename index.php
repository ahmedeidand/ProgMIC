<?php

    $text = $_POST['text'];

    $safeText =  escapeshellarg($text . ' ')  ;



// Detect language
    if (preg_match('/[\x{0600}-\x{06FF}]/u', $safeText)) {
        $layout = 'ar';
    } else {
        $layout = 'us';
    }

// Optional: store current layout
    $currentLayout = trim(shell_exec("setxkbmap -query | grep layout | awk '{print $2}'"));

// Switch layout
    shell_exec("setxkbmap $layout");

// Type text
    shell_exec("xdotool type --delay 5 $safeText");

// Restore layout
    if ($currentLayout) {
        shell_exec("setxkbmap $currentLayout");
    }

    header('Location: index.html');




?>