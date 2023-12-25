<?php
defined('BASEPATH') or exit('No direct script access allowed');

// ord mengetahui nilai desimal dari inputan ascii
// chr mengembalikan desimal ke ascii
function viginere_e($p)
{
    $key = "secret";
    $key_i = 0;
    $chipertext = "";
    for ($i = 0; $i < strlen($p); $i++) {
        $key_ascii = ord($key[$key_i]); // mengubah ascii ke desimal
        $plain_ascii = ord($p[$i]);

        $cipher_ascii = ($plain_ascii + $key_ascii) % 127; // rumus enkripsi vigenere
        $chipertext .= chr($cipher_ascii); // mengubah desimal ke ascii

        // proses penambahan key index bertambah 1
        $key_i++;
        if ($key_i > strlen($key) - 1) {
            $key_i = 0;
        }
    }
    return $chipertext;
}

function vigenere_d($c)
{
    $key = "secret";
    $key_i = 0;
    $plaintext = "";
    for ($i = 0; $i < strlen($c); $i++) {
        $key_ascii = ord($key[$key_i]);
        $plain_ascii = ord($c[$i]);

        $plain_ascii = ($plain_ascii - $key_ascii) + 127;
        $plaintext .= chr($plain_ascii);

        // proses penambahan key index bertambah 1
        $key_i++;
        if ($key_i > strlen($key) - 1) {
            $key_i = 0;
        }
    }
    return $plaintext;
}

function affine_e($p)
{
    // (51,127) relative prima
    $a = 51;
    $b = 5;
    $ciphertext = "";
    for ($i = 0; $i < strlen($p); $i++) {
        $key_a = $a;
        $key_b = $b;
        $plain_ascii = ord($p[$i]); // mengubah ascii ke desimal

        $cipher_ascii = ($key_a * $plain_ascii + $key_b) % 127; // rumus enkripsi affine
        $ciphertext .= chr($cipher_ascii); // mengubah desimal ke hexadesimal
    }
    return $ciphertext;
}

function affine_d($c)
{
    // (51,127) relative prima
    // 51x = 1 + 127k
    //   x = (1 + 127k)/51
    // k    x
    // 2    255/51 = 5
    // a invers = 5
    $a = 5;
    $b = 5;
    $plaintext = "";
    for ($i = 0; $i < strlen($c); $i++) {
        $key_a_invers = $a;
        $key_b = $b;
        $plain_ascii = ord($c[$i]);

        $cipher_ascii = ($key_a_invers * ($plain_ascii - $key_b)) % 127;
        $plaintext .= chr($cipher_ascii);
    }
    return $plaintext;
}

// Untuk Users

function enkrip($p)
{
    $key = "secret";
    $key_i = 0;
    $chipertext = "";
    for ($i = 0; $i < strlen($p); $i++) {
        $key_ascii = ord($key[$key_i]);
        $plain_ascii = ord($p[$i]);

        $cipher_ascii = ($plain_ascii + $key_ascii);
        if ($cipher_ascii > 127) {
            $cipher_ascii = ($plain_ascii + $key_ascii) - 127;
        } else {
            $cipher_ascii = ($plain_ascii + $key_ascii) % 127;
        }
        $chipertext .= dechex($cipher_ascii);

        // proses penambahan key index bertambah 1
        $key_i++;
        if ($key_i >= strlen($key)) {
            $key_i = 0;
        }
    }
    return $chipertext;
}

function dekrip($c)
{
    $cipher_hexa = strlen($c);
    $get_two_char = $cipher_hexa / 2;
    $start = 0;
    $two_char = [];
    for ($i = 0; $i < $get_two_char; $i++) {
        $two_char[] = substr($c, $start, 2);
        $start += 2;
    }

    $key = "secret";
    $key_i = 0;
    $plaintext = "";
    $cipher_desimal = "";
    for ($i = 0; $i < count($two_char); $i++) {
        $key_ascii = ord($key[$key_i]);
        $temp = $two_char[$i];
        $cipher_desimal = hexdec($temp);

        $cipher_ascii = ($cipher_desimal - $key_ascii);
        if ($cipher_ascii < 0) {
            $cipher_ascii = ($cipher_desimal - $key_ascii) + 127;
        } else {
            $cipher_ascii = ($cipher_desimal - $key_ascii) % 127;
        }
        $plaintext .= chr($cipher_ascii);

        // proses penambahan key index bertambah 1
        $key_i++;
        if ($key_i >= strlen($key)) {
            $key_i = 0;
        }
    }
    return $plaintext;
}
