 <?php 

    if (isset($_GET['slug'])) {

	  $slug = $_GET['slug'];

	  $query = "SELECT * FROM posts WHERE slug = '$slug'";
	  $posts = $db->select($query);


    	if ($posts) {
        while ($result = $posts->fetch_assoc()){ ?>

		<title><?php echo $result['title']; ?> -<?php echo TITLE; ?></title>
		<meta name="keywords" content="<?php echo $result["tags"]; ?>">

        <?php } } 
    } else{ ?>
	<title><?php echo $hp->title(); ?> - <?php echo TITLE; ?></title>
	<meta name="keywords" content="<?php echo KEYWORDS; ?>">
        <?php } ?>
 
<meta name="language" content="English">
<meta name="description" content="It is a Blog website">
<meta name="author" content="Kanak">