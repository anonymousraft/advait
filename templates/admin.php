<div class="wrap">
<h1>Advait Plugin Dashboard</h1>
<?php settings_errors();  //wp built in function trigger when we update fields  ?>

<ul class=	"nav nav-tabs">
	<li class="active"> <a href="#tab-1">Manage Settings</a></li>
	<li><a href="#tab-2">Updates</a></li>
	<li><a href="#tab-3">Author</a></li>
</ul>

<div class="tab-content">

	<div id="tab-1" class="tab-pane active">

		<form method="post" action="options.php">
		<?php
			settings_fields( 'advait_settings' );  //option group id
			do_settings_sections( 'advait_plugin' );  //page from the section
			submit_button();
		?>
		</form>

	</div>

	<div id="tab-2" class="tab-pane">
		<h2>Updates related to plugin</h2>
	</div>


	<div id="tab-3" class="tab-pane">
		<h3>About</h3>
	</div>

</div>
</div>

