<?php
require_once ('path-to-db-config-file');
include("common/header.php");
?>
<div id="leftdiv">
<div class="mapholder">
<?php
    if ($_GET['location']==$location) {
      $maptext = mysql_query ("SELECT SQL_CALC_FOUND_ROWS * FROM textTbl WHERE location='$location'"); // Run the query.
      if ($maptext) {
        	while ($row = mysql_fetch_array($maptext)) {
    			echo "<h5 style='color:#2a2a2a; margin-bottom:7px;'>" . $row[maptext] . "</h1>" . PHP_EOL;
          echo "<iframe width='230' height='175' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='" . $row[map] . "'></iframe><br /><small><a href='" . $row[map] . "' style='color:#0000FF;text-align:left'target='_blank'>View Larger Map</a></small>" . PHP_EOL;				
    		}
    	}
  	}
  ?>
</div><!-- end mapholder -->
<div class="adspacer"></div>
<script type="text/javascript"><!--
google_ad_client = "ca-pub-4537884625055504";
/* 200 x 200 */
google_ad_slot = "2212442369";
google_ad_width = 200;
google_ad_height = 200;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
<div class="adspacer"></div>

<script type="text/javascript"><!--
	google_ad_client = "ca-pub-4537884625055504";
	/* 234 x 60 Half Banner */
	google_ad_slot = "6076138034";
	google_ad_width = 234;
	google_ad_height = 60;
	//-->
</script>
<script type="text/javascript"
	src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
<div class="adspacer"></div>

</div><!-- end leftdiv -->
<div id="rightdiv">

<?php
$page = $_GET['page'];
$row_count = 0;
function getPics ($location, $table, $page) {
  if ($_GET['location']==$location) {
    $gettext = mysql_query ("SELECT SQL_CALC_FOUND_ROWS * FROM textTbl WHERE location='$location'"); // Run the query.
    if ($gettext) {
      	while ($row = mysql_fetch_array($gettext)) {
  			echo "<h1>" . $row[h1] . "</h1><div>" . $row[text] . "</div>" . PHP_EOL;				
  		}
  	}
    $result = mysql_query ("SELECT SQL_CALC_FOUND_ROWS * FROM $table ORDER BY link ASC LIMIT $page, 12"); // Run the query.
    $countData = mysql_fetch_assoc(mysql_query("SELECT found_rows() AS total"));
  	$totalRows = $countData['total'];
  	if ($result) {
  		echo "<div class='textphoto'>" . PHP_EOL;
      	while ($row = mysql_fetch_array($result)) {
  			echo "<a href='" . $row[link] . ".jpg' rel='prettyPhoto[]' title='" . $row[caption] . "'><img src='" . $row[link] . "-thumb.jpg' alt='" . $row[alt] . "' /></a>" . PHP_EOL;				
  			$row_count++;
        if (($row_count %4==0)&&($row_count %12!=0)) {
  			 echo "</div><div class='textphoto'>";
  			} elseif (($row_count %4==0)&&($row_count %12==0)) { 
          "</div>" . PHP_EOL;
        } else {}
  		}
  		echo "</div>" . PHP_EOL;
  	}
  }
}

getPics('boca-chica','bocachica2008',$page);
getPics('nairobi-arboretum','kenya',$page);
getPics('pre-earthquake-haiti','haitiTbl',$page);

echo "</div>";// end div right
include ("common/footer.php");

?>