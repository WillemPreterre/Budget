<?php
// Sanitize_date (Sanitize = nettoie)
function sanitize_int($date_choice)
{
    $date_sanitize = filter_var($date_choice, FILTER_SANITIZE_NUMBER_INT);
    return $date_sanitize;
};

function sanitize_string($first_name_choice)
{
    $first_name_sanitize = filter_var($first_name_choice, FILTER_SANITIZE_STRING);
    return $first_name_sanitize;
};

// Validation

function validate_string($first_name)
{
    $first_name_validate = ctype_alpha ($first_name);
    return $first_name_validate;
};

function validate_int($date)
{
    $date_validate = filter_var($date, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);

    return $date_validate;
    
};
// ----------------------------------------------------------

