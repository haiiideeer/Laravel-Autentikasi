<?php

use Illuminate\Support\Facades\Validator;

$request->validate([
    'captcha' => 'required|captcha'
]);