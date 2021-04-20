<?php

function filter_int_date($date)
{
    // filter
    if (filter_var($date, FILTER_SANITIZE_NUMBER_INT)) {
        echo "A INT number was found.";
    } else {
        echo "A INT number was not found.";
    }
};

function filter_string_first($first_name_verif)
{
    // filter
    if (filter_var($first_name_verif, FILTER_SANITIZE_STRING)) {
        echo "A string was found.";
    } else {
        echo "A string was not found.";
    }
};

function filter_string_last($last_name_verif)
{
    // filter
    if (filter_var($last_name_verif, FILTER_SANITIZE_STRING)) {
        echo "A string was found.";
    } else {
        echo "A string was not found.";
    }
    
};

require_once 'add_user.php';
