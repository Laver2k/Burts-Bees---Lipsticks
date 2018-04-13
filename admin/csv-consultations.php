<?php
include('../includes/config.php');
generateCSV();

function generateCSV() {
    // output headers so that the file is downloaded rather than displayed
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=consultations.csv');

    // create a file pointer connected to the output stream
    $output = fopen('php://output', 'w');

    // output the column headings
    fputcsv($output, array('userID', 'First Name', 'Last Name', 'Email', 'City', 'Time', 'Date', 'Newsletter'));


    $sql = "SELECT id, fname, lname, email, city, time, date, newsletter FROM consultations";


    $results = $GLOBALS["dbh"]->query($sql)->fetchall(PDO::FETCH_ASSOC);
    foreach($results as $row) {
            fputcsv($output, $row);
    }





 

}