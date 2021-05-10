<?php
// Sanitize_date (Sanitize = nettoie)

// ----------------------- Nettoyage des int fonction------------------

function sanitize_int($date_choice)
{
    $date_sanitize = filter_var($date_choice, FILTER_SANITIZE_NUMBER_INT);
    return $date_sanitize;
};


// ----------------------- Nettoyage des string fonction------------------
function sanitize_string($first_name_choice)
{
    $first_name_sanitize = filter_var($first_name_choice, FILTER_SANITIZE_STRING);
    return $first_name_sanitize;
};


// Validation des string

function validate_string($first_name)
{
    $first_name_validate = ctype_alpha ($first_name);
    return $first_name_validate;
};


// Validation des int
function validate_int($date)
{
    $date_validate = filter_var($date, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);

    return $date_validate;
    
};


// ----------------------- Print_r fonction------------------
function print_r_function($value)
{
    echo '<pre>' . print_r($value, true) . '</pre>';
}

// ----------------------- validation des dates fonction------------------
function isValid($date, $format = 'Y-m-d')
{

    $time = DateTime::createFromFormat($format, $date);
    return $time && $time->format($format) === $date;
}

// ----------------------------------------------------------

