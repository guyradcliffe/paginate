<?php
require_once ('path-to-db-config-file');
include("common/header.php");
?>
<div id="leftdiv">
<div class="mapholder">
<?php
  if ($_GET['location']==$location) {
    $maptext = mysql_query ("SELECT SQL_CALC_FOUND_ROWS * FROM textTbl WHERE location='$location'"); // get google map from db
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
    $gettext = mysql_query ("SELECT SQL_CALC_FOUND_ROWS * FROM textTbl WHERE location='$location'"); // get the h1 and paragraph from the db
    $url=$_SERVER['REQUEST_URI'];
  	$prev = $page - 12;
  	$nex = $page + 12;
  	$rowcount = mysql_query ("SELECT SQL_CALC_FOUND_ROWS * FROM $table"); // get the photos in db
    $numrows = mysql_num_rows($rowcount); // get the row count of photos from db
    $totalpages = ceil($numrows/12); // get the total number of pages
    if ($totalpages < 6) { // set minimum width of 170 px if there are less than 6 pages
      $divwidth = 175;
    } else { 
    $divwidth = $totalpages*32; // adjust width of div based on the number of pages
    }
    if ($gettext) {
      	while ($row = mysql_fetch_array($gettext)) {
  			echo "<h1 style='margin-bottom:15px;'>" . $row[h1] . "</h1>" . PHP_EOL;
  			if ($page == 0) { // show paragraph only on page 0 or first page
          echo "<div>" . $row[text] . "</div>" . PHP_EOL;	
        }	else {}	
  		}
  	}
  	echo "<div class='paginationholder' style='width:" . $divwidth . "px; margin-left:33%;'>" . PHP_EOL;
  	if ($page < 10) {// page equals 1 digit or any number less than 10
    	$prevurl = substr($url, 0, -8);
    	$nexturl = substr($url, 0, -8);
    	echo "<div class='prevholder'></div>" . PHP_EOL;
      echo "<div class='nextholder'><a href='" . $nexturl . "photos-" . $nex . "' style='margin-left:75px;'>Next</a></div>" . PHP_EOL;
    } elseif (($page > 9) && ($page < 100)){ // page equals 2 digits or greater than 9 and less than 100
      $prevurl = substr($url, 0, -9);
    	$nexturl = substr($url, 0, -9);
      echo "<div class='prevholder'><a href='" . $prevurl . "photos-" . $prev . "'>Previous</a></div>" . PHP_EOL;
      echo "<div class='nextholder'><a href='" . $nexturl . "photos-" . $nex . "' style='margin-left:20px;'>Next</a></div>" . PHP_EOL;
    } else { // page is more than 100
      $prevurl = substr($url, 0, -10);
    	$nexturl = substr($url, 0, -10);
    	echo "<div class='prevholder'><a href='" . $prevurl . "photos-" . $prev . "'>Previous</a></div>" . PHP_EOL;
      echo "<div class='nextholder'><a href='" . $nexturl . "photos-" . $nex . "' style='margin-left:20px;'>Next</a></div>" . PHP_EOL;
    }
    echo "</div>" . PHP_EOL; // end pagination holder 
    /* begin pagination */
    echo "<div style='width:" . $divwidth . "px; margin:0 auto;'><ul style='list-style:none;'>";
    // simultaneous loop through two variables
    for ($i = 1, $pagelink = 0; $i < $totalpages, $pagelink < $numrows; $i += 1, $pagelink += 12) {
      print "<li style='display:inline; margin-right:20px;'><a href='http://guyradcliffe.com";
      if ($page < 10) {
      echo substr($url, 0, -1);
      } elseif (($page > 9) && ($page < 100)) {
        echo substr($url, 0, -2);
      } else {
        echo substr($url, 0, -3);
      }
      print $pagelink;  
      print "'>" . $i . "</a></li>";
    } 
    echo "</ul></div>";
    /* end pagination */
    
    $result = mysql_query ("SELECT SQL_CALC_FOUND_ROWS * FROM $table ORDER BY link ASC LIMIT $page, 12"); // get the photos from the db
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
  		echo "number of rows: " . $numrows . PHP_EOL;
  		echo "<br />page is " . $page . PHP_EOL;
  	}
  }
}

getPics('boca-chica','bocachica2008',$page);
getPics('nairobi-arboretum','kenya',$page);
getPics('pre-earthquake-haiti','haitiTbl',$page);

echo "</div>";// end div right
include ("common/footer.php");

?>