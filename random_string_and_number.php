<?php
// Generate a random string
$random_string = substr(md5(mt_rand()), 0, 8); // Example: Generate an 8-character random string

// Generate a random number
$random_number = mt_rand(1000, 9999); // Example: Generate a random 4-digit number

// Combine the random string and number
$random_string_and_number = $random_string . $random_number;

// Return the combined string and number as the response
echo $random_string_and_number;
?>