<?php
require_once ('path-to-db-config-file');
include("common/header.php");
?>
<div id="leftdiv">
<div class="mapholder">
	<h5 style="color:#2a2a2a; margin-bottom:7px;">Where is Port-au-Prince?</h5>
	<iframe width="230" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;t=m&amp;ll=18.427502,-72.103271&amp;spn=1.823901,2.515869&amp;z=7&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;t=m&amp;ll=18.427502,-72.103271&amp;spn=1.823901,2.515869&amp;z=7&amp;source=embed" style="color:#0000FF;text-align:left"target="_blank">View Larger Map</a></small>
</div>
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
	<h1 style="font-size:24px; margin-bottom:5px;">Pre Earthquake Haiti Photos</h1>
	<p>
		I made several trips from Philadelphia to Port-au-Prince, Haiti between 2002 and 2004.
	</p>

<?php
$page = $_GET['page'];
$row_count = 0;
function getPics ($location, $table, $alt, $page) {
  if ($_GET['location']==$location) {
    $result = mysql_query ("SELECT SQL_CALC_FOUND_ROWS * FROM $table WHERE alt='$alt' ORDER BY link ASC LIMIT $page, 12"); // Run the query.
    $countData = mysql_fetch_assoc(mysql_query("SELECT found_rows() AS total"));
  	$totalRows = $countData['total'];
  	if ($result) {
  		echo "<div class='textphoto'>" . PHP_EOL;
      	while ($row = mysql_fetch_array($result)) {
  			echo "<a href='" . $row[link] . "' rel='prettyPhoto[tanzania]' title='" . $row[title] . "'><img src='" . $row[link] . "' alt='" . $row[alt] . "' class='" . $row[css_class] . "' /></a>" . PHP_EOL;				
  			$row_count++;
  			echo $row_count;
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

getPics('boca-chica','bocachica2008','Boca Chica, Dominican Republic', $page);
getPics('nairobi-arboretum', 'nairobi-table', 'nairobi, kenya', $page);
getPics('haiti', 'haitiTbl', 'Remembering Pre Earthquake Haiti', $page);

echo "</div>";// end div right
include ("common/footer.php");

?>