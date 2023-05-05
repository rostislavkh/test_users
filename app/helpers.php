<?php

function user_logs($bool, $str = '') {
    $file_name = 'user-logs.txt';
    $file = fopen(public_path() . '/' . $file_name, 'a');

    if ($file === false) {
        $file = fopen($file_name, 'w');
    }

    if ($bool) {
        fwrite($file, \Carbon\Carbon::now()->toDateString() . " | Успішна реєстрація юзера $str\n");
    } else {
        fwrite($file, \Carbon\Carbon::now()->toDateString() . " | Неуспішна реєстрація юзера бо '$str'\n");
    }

    fclose($file);
}
