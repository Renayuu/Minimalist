<!-- JQUERY -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<!-- BOOTSTRAP LINKS -->

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<!-- Custom Styles -->
	<link rel="stylesheet" type="text/css" href="../css/styles.css">


<?php
	// if ($PHP_SELF != '/closet.php')
	// { $closet = 'none'; } else { $nav_closet = 'active'; }
	// if ($PHP_SELF != '/about.php')
	// { $about = 'none'; } else { $nav_about = 'active'; }
	// if ($PHP_SELF != '/goals.php')
	// { $goals = 'none'; } else { $nav_ = 'active'; }
?>

<header>
	

	<nav class="navbar navbar-default navbar-fixed-top">


		<ul class="nav nav-pills pull-right">
		  <li role="presentation"><a href="http://s4325075-minimalist.uqcloud.net" class="<?echo $nav_closet;?>"><font face="proxima nova soft">My Closet</font></a></li>
		  <li role="presentation"><a href="about.php" class="<?echo $nav_about;?>"><font face="proxima nova soft">About</font></a></li>
		  <li role="presentation"><a href="development.php" class="<?echo $nav_development;?>"><font face="proxima nova soft">Development</font></a></li>
		  <li role="presentation"><a href="goals.php" class="<?echo $nav_goals;?>"><font face="proxima nova soft">Goals</font></a></li>
		  <li role="presentation"><a href="marketplace.php" class="<?echo $nav_marketplace;?>"><font face="proxima nova soft">Marketplace</font></a></li>
		</ul>

	</nav>
</header>

