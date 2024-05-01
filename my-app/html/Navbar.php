<?php
    $login;
	$about;
    $home;
	$article;
	$contact;
	$str_session_name;
?>

<ul>
	<li>
		<a href="<?php echo $login; ?>">
			Login
		</a>
	</li>
	<li>
		<a href="<?php echo $about; ?>">
			About
		</a>
	</li>
	<li>
		<a href="<?php echo $home; ?>">
			Home
		</a>
	</li>
	<li>
		<a href="<?php echo $article; ?>">
			Article
		</a>
	</li>
	<li>
		<a href="<?php echo $contact; ?>">
			Contact
		</a>
	</li>
	<?php
		if (isset($str_session_name)) {
			echo '<li><a>' . $str_session_name . '</a></li>';
		} else {
			echo '<li><a>login</a></li>';
		}
	?>
</ul>