<?php

include("ChromePhp.php");

$conDB=mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
$SiteTitle = "ABCD Enterprise pvt lmt";
$SiteEmail = "info@dw-learnwell.com";
$SiteURL   = "http://www.purnadata.in";  
///////////////////////////////////

$today = date('Y-m-d');
ChromePhp::log($today);

//Days bases is late
$notice_day = 25;

$noticedate = date('Y-m-d', strtotime( "$today + $delay_days days" ));
ChromePhp::log($noticedate);

$latedate = date('Y-m-d', strtotime( "$today - $late_days days" ));
ChromePhp::log($latedate);

$link = mysqli_connect('localhost', 'root', ' ', 'abcd_enterprises');

/* check connection */
if (!$link) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$stmt = mysqli_prepare($link, "SELECT `invoice_no`, `invoice_date`,`mode_term_of_payment`,`balance`,`total` FROM `sale_invoice`");
mysqli_stmt_bind_param($stmt, 'sssd', $code, $language, $official, $percent);

ChromePhp::log($stmt );

$code = 'DEU';
$language = 'Bavarian';
$official = "F";
$percent = 11.2;

/* execute prepared statement */
mysqli_stmt_execute($stmt);

printf("%d Row inserted.\n", mysqli_stmt_affected_rows($stmt));

/* close statement and connection */
mysqli_stmt_close($stmt);

/* Clean up table CountryLanguage */
mysqli_query($link, "DELETE FROM CountryLanguage WHERE Language='Bavarian'");
printf("%d Row deleted.\n", mysqli_affected_rows($link));

/* close connection */
mysqli_close($link);
?>