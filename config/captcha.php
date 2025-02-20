<?php

return [
    'disable' => env('CAPTCHA_DISABLE', false),

    // Hanya menggunakan angka 0-9
    'characters' => ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'],

    'default' => [
        'length' => 4, // Hanya 4 angka
        'width' => 120, // Lebar gambar
        'height' => 50, // Tinggi gambar
        'quality' => 90, // Kualitas gambar
        'math' => false,
        'expire' => 60,
        'encrypt' => false,
    ],

    'flat' => [
        'length' => 4, // Hanya 4 angka
        'width' => 130, // Lebih besar agar jelas
        'height' => 50, 
        'quality' => 100, // Kualitas tinggi
        'lines' => 3, // Lebih sedikit garis agar mudah dibaca
        'bgImage' => false, 
        'bgColor' => '#ffffff', // Latar belakang putih
        'fontColors' => ['#000000'], // Warna teks hitam agar jelas
        'contrast' => 0,
    ],
];
