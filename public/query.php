<!-- addressbar: http://codeup.dev/query.php?key=value&key=value2&userid=35&delete= -->


<?php

	var_dump($_GET);

	if(!empty($_GET)) {
		$id = $_GET['id'];
		$delete = $_GET['delete'];
	}

	if($delete == 'yes') {
		echo 'post ' . $id . ' deleted';
	}

?>

<p>Blog post</p>
<p><a href="?id=23&delete=yes">Delete Blog</a></p>
