<?php
$host   =   "dbprojects.eecs.qmul.ac.uk"  ;
$user   =   "hc303"  ;
$pass   =   "kWIt2xAbU6QVE"  ;
$db   =   "hc303"  ;
 
$link  =  mysql_connect ( $host ,  $user ,  $pass );
if (! $link ) {
    die( 'Could not connect: '  .  mysql_error ());
}
echo  'Connected successfully' ;

$db_selected  =  mysql_select_db ( $db ,  $link );
if (! $db_selected ) {
    die ( 'Can\'t use $db : '  .  mysql_error ());
}

 $id =$_GET['id'];

    // sending query
    mysql_query("DELETE FROM content WHERE id = $id")
    or die(mysql_error());      


	header('Location: viewBlog.php');
mysql_close ( $link );

?>
