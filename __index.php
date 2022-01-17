<html>
<head><title>PHP TEST</title>
<style type="text/css">
    table{
        border-color:skyblue;
        border-style:solid;
        boder-widht:1px;
        width:300px;
        }
    .hdr{background-color:gainsboro}
</style>
</head>
<body>
<table>
<?php
//phpinfo();

$dsn = 'sqlsrv:server=SRVSC2;database=senkyodb';
$user = 'infsenkyo';
$password = 'infsenkyo0320';
$dbh = new PDO($dsn, $user, $password);
$sql = "select * from infsenkyo.ken_mst order by ken_cd asc";

foreach ($dbh->query($sql) as $row) {
    print("<tr><td class='hdr'>".$row['KEN_CD']."</td>");
    print("<td>".$row["KEN_NM"]."</td></tr>");
}
$dbh = null;


?>

</table>
</body>
</html>
