<?php 

function format_date($date)
{
    $formattedDate = new DateTime($date);
    return $formattedDate->format("d/m/Y");
}

?>