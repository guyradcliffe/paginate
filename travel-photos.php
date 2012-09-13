<?php
require_once ('path-to-db-connection-file');
include("include-a-header-file");
?>
<div class="clearer"></div>
<div id="leftdiv">
	<div class="mapholder">
		<h5 style="color:#2a2a2a; margin-bottom:7px;">Where is Boca Chica?</h5>
		<iframe width="230" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Dominican+Republic&amp;aq=0&amp;oq=Do&amp;sll=16.172473,-65.753174&amp;sspn=7.928981,12.557373&amp;ie=UTF8&amp;hq=&amp;hnear=Dominican+Republic&amp;t=m&amp;ll=18.450952,-69.56543&amp;spn=0.227971,0.31723&amp;z=10&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Dominican+Republic&amp;aq=0&amp;oq=Do&amp;sll=16.172473,-65.753174&amp;sspn=7.928981,12.557373&amp;ie=UTF8&amp;hq=&amp;hnear=Dominican+Republic&amp;t=m&amp;ll=18.450952,-69.56543&amp;spn=0.227971,0.31723&amp;z=10" style="color:#000;text-align:left" target="_blank">View Larger Map</a></small>
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
	<h1 style="font-size:24px; margin-bottom:5px;">Photos of Boca Chica, Dominican Republic</h1>
	<p>
		Boca Chica is a small, quiet resort town about 30 minutes from Santo Domingo in the Dominican Republic.
	</p>
	<div class="adspacer"></div>
	<?php
	//check if the starting row variable was passed in the URL or not
	if (!isset($_GET['page']) or !is_numeric($_GET['page'])) {
  		//we give the value of the starting row to 0 because nothing was found in URL
  		$page = 0;
		//otherwise we take the value from the URL
	} else {
  		$page = (int)$_GET['page'];
	}
	
	// database queries	
	$result = mysql_query ("SELECT SQL_CALC_FOUND_ROWS * FROM bocachica2008 WHERE alt='Boca Chica, Dominican Republic' ORDER BY link ASC LIMIT $page, 4"); // Run the query.
	$countData = mysql_fetch_assoc(mysql_query("SELECT found_rows() AS total"));
	$totalRows = $countData['total'];
	if ($result) {
		$url=$_SERVER['REQUEST_URI'];
		$prev = $page - 12;
		$nex = $page + 12;
		$pagesPerPage = 12;
		$totalPages = ceil($totalRows / $pagesPerPage);
		$currentpage = $page / 12 + 1;
		if (($page > 9) && ($page < 100)) {
    	$prevurl = substr($url, 0, -7);
    	$nexturl = substr($url, 0, -7);
    	echo "<div class='paginationholder'><div class='prevholder'><a href='". $prevurl .= "page=" . $prev . "'>Previous</a></div><div class='pageholder'>Page <b>" . $currentpage . "</b> of " . $totalPages . "</div>" . PHP_EOL;
      echo "<div class='nextholder'><a href='". $nexturl .="page=" . $nex . "' style='margin-left:20px;'>Next</a></div></div>" . PHP_EOL;
    } elseif ($page > 100) {
    	$prevurl = substr($url, 0, -8);
    	$nexturl = substr($url, 0, -8);
    	echo "<div class='paginationholder'><div class='prevholder'><a href='". $prevurl .= "page=" . $prev . "'>Previous</a></div><div class='pageholder'>Page <b>" . $currentpage . "</b> of " . $totalPages . "</div>" . PHP_EOL;
    	if ($currentpage == $totalPages) {
    		echo "<div class='nextholder'>&nbsp;</div></div>" . PHP_EOL;
    	} else {
      	echo "<div class='nextholder'><a href='". $nexturl .="page=" . $nex . "' style='margin-left:20px;'>Next</a></div></div>" . PHP_EOL;
    	}
    } else {
    	$prevurl = substr($url, 0, -6);
    	$nexturl = substr($url, 0, -6);
    	echo "<div class='paginationholder'><div class='prevholder'>&nbsp;</div><div class='pageholder'>Page <b>" . $currentpage . "</b> of " . $totalPages . "</div>" . PHP_EOL;
      echo "<div class='nextholder'><a href='". $nexturl .="page=" . $nex . "' style='margin-left:20px;'>Next</a></div></div>" . PHP_EOL;
    } 
	/************* END PAGINATION SCRIPT ***************/
		echo "<div class='textphoto'>" . PHP_EOL;
    	while ($row = mysql_fetch_array($result)) {
			echo "<a href='" . $row[link] . "' rel='prettyPhoto[tanzania]' title='" . $row[title] . "'><img src='" . $row[link] . "' alt='" . $row[alt] . "' class='" . $row[css_class] . "' /></a>" . PHP_EOL;				
			$row_count++;
		}
		echo "</div>" . PHP_EOL;
	}
	$secondrow = $page + 4;
	$result = mysql_query ("SELECT SQL_CALC_FOUND_ROWS * FROM bocachica2008 WHERE alt='Boca Chica, Dominican Republic' ORDER BY link ASC LIMIT $secondrow, 4"); // Run the query.
	$countData = mysql_fetch_assoc(mysql_query("SELECT found_rows() AS total"));
	$totalRows = $countData['total'];
	if ($result) {
		echo "<div class='textphoto'>" . PHP_EOL;
    	while ($row = mysql_fetch_array($result)) {
			echo "<a href='" . $row[link] . "' rel='prettyPhoto[tanzania]' title='" . $row[title] . "'><img src='" . $row[link] . "' alt='" . $row[alt] . "' class='" . $row[css_class] . "' /></a>" . PHP_EOL;				
			$row_count++;
		}
		echo "</div>" . PHP_EOL;
	}
	$thirdrow = $page + 8;
	$result = mysql_query ("SELECT SQL_CALC_FOUND_ROWS * FROM bocachica2008 WHERE alt='Boca Chica, Dominican Republic' OR alt='San Juan, Puerto Rico' ORDER BY link ASC LIMIT $thirdrow, 4"); // Run the query.
	$countData = mysql_fetch_assoc(mysql_query("SELECT found_rows() AS total"));
	$totalRows = $countData['total'];
	if ($result) {
		echo "<div class='textphoto'>" . PHP_EOL;
    	while ($row = mysql_fetch_array($result)) {
			echo "<a href='" . $row[link] . "' rel='prettyPhoto[tanzania]' title='" . $row[title] . "'><img src='" . $row[link] . "' alt='" . $row[alt] . "' class='" . $row[css_class] . "' /></a>" . PHP_EOL;				
			$row_count++;
		}
		echo "</div>" . PHP_EOL;
		/* script */
		$url=$_SERVER['REQUEST_URI'];
		$prev = $page - 12;
		$nex = $page + 12;
		$pagesPerPage = 12;
		$totalPages = ceil($totalRows / $pagesPerPage);
		$currentpage = $page / 12 + 1;
		if (($page > 9) && ($page < 100)) {
    	$prevurl = substr($url, 0, -7);
    	$nexturl = substr($url, 0, -7);
    	echo "<div class='paginationholder'><div class='prevholder'><a href='". $prevurl .= "page=" . $prev . "'>Previous</a></div><div class='pageholder'>Page <b>" . $currentpage . "</b> of " . $totalPages . "</div>" . PHP_EOL;
      echo "<div class='nextholder'><a href='". $nexturl .="page=" . $nex . "' style='margin-left:20px;'>Next</a></div></div>" . PHP_EOL;
    } elseif ($page > 100) {
    	$prevurl = substr($url, 0, -8);
    	$nexturl = substr($url, 0, -8);
    	echo "<div class='paginationholder'><div class='prevholder'><a href='". $prevurl .= "page=" . $prev . "'>Previous</a></div><div class='pageholder'>Page <b>" . $currentpage . "</b> of " . $totalPages . "</div>" . PHP_EOL;
    	if ($currentpage == $totalPages) {
    		echo "<div class='nextholder'>&nbsp;</div></div>" . PHP_EOL;
    	} else {
      	echo "<div class='nextholder'><a href='". $nexturl .="page=" . $nex . "' style='margin-left:20px;'>Next</a></div></div>" . PHP_EOL;
    	}
    } else {
    	$prevurl = substr($url, 0, -6);
    	$nexturl = substr($url, 0, -6);
    	echo "<div class='paginationholder'><div class='prevholder'>&nbsp;</div><div class='pageholder'>Page <b>" . $currentpage . "</b> of " . $totalPages . "</div>" . PHP_EOL;
      echo "<div class='nextholder'><a href='". $nexturl .="page=" . $nex . "' style='margin-left:20px;'>Next</a></div></div>" . PHP_EOL;
    }
    /* begin script */
    echo "<div style='clear:both;'><ul style='list-style:none; display:inline;'>";
    // simultaneous loop through two variables
    for ($i = 1, $foolink = 0; $i < $totalPages + 1, $foolink <= 108; $i += 1, $foolink += 12) {
      print "<li style='display:inline; margin-right:20px;'><a href='/boca-chica-photos2.php?page="; 
        print $foolink;  
      print "'>" . $i . "</a></li>";
    } 
    echo "</ul></div>";
    /* end script */
	}

echo "<div class='clearer'></div>" . PHP_EOL;
echo "<div style='margin:15px 0 0 0; float:left;'><p>Last modified: " . date ("j F, Y.", getlastmod()) . "</p></div>" . PHP_EOL;
echo "</div>" . PHP_EOL; // closes rightdiv div
?>	

<?php include ("common/footer.php"); ?>