<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
<?php
$dbconn = pg_connect( "host=localhost port=5432
dbname=Space  user=edvige password=edvige" )
or die ( ' Could not connect: ' . pg_lasterror( ) ) ;
$query = 'SELECT name, points FROM records ';
pg_send_query($dbconn, $query) or die( ' Query failed: ' . pg_lasterror( ) ) ;
$result = pg_get_result($dbconn);
// P r i n t i n g r e s u l t s i n HTML
echo "<table>\n " ;
while( $line = pg_fetch_array( $result , null , PGSQL_ASSOC ) ) {
echo "\t<tr>\n"  ;
foreach ( $line as $colvalue) {
echo "\t\t<td>$colvalue </td>" ;
}
echo "\t</tr>\n " ;
}
echo "</table>\n"  ;
pg_free_result( $result);
pg_close( $dbconn ) ;
?> 
</body>
</html>
