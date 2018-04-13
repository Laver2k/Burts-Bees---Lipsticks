<?php
include('../includes/config.php');
generateCSV();

function generateCSV() {
    // output headers so that the file is downloaded rather than displayed
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=lipstick-giveaway-data-aus-winners.csv');

    // create a file pointer connected to the output stream
    $output = fopen('php://output', 'w');

    // output the column headings
    fputcsv($output, array('userID', 'First Name', 'Last Name', 'Email', 'Address', 'Postcode', 'CountryID', 'Date', 'Timeslot', 'Winner?', 'Newsletter'));


    $sql = "SELECT entries.userID, users.fname, users.lname, users.email, users.address, users.postcode, entries.countryID, entries.date, entries.slotID, entries.win, users.newsletter FROM entries INNER JOIN users ON entries.userID=users.userID WHERE entries.win=1 AND entries.countryID = 3 ORDER by entries.timestamp DESC";


    $results = $GLOBALS["dbh"]->query($sql)->fetchall(PDO::FETCH_ASSOC);
    foreach($results as $row) {
            fputcsv($output, $row);
    }





 

}