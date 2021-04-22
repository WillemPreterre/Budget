<?php
// Sanitize_date (Sanitize = nettoie)
function sanitize_date($date)
{
    $date_sanitize = filter_var($date, FILTER_SANITIZE_NUMBER_INT);
    return $date_sanitize;
};

function sanitize_first($first_name)
{
    $first_name_sanitize = filter_var($first_name, FILTER_SANITIZE_STRING);
    return $first_name_sanitize;
};

function sanitize_last($last_name)
{
    $last_name_sanitize = filter_var($last_name, FILTER_SANITIZE_STRING);
    return $last_name_sanitize;
};

// Validation

function validate_first($first_name)
{
    $first_name_validate = ctype_alpha ($first_name);
    return $first_name_validate;
};

function validate_last($last_name)
{
    $last_name_validate = ctype_alpha ($last_name);
    return $last_name_validate;
};

function validate_date($date)
{
    $date_validate = filter_var($date, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);

    return $date_validate;
    
};
// ----------------------------------------------------------

