<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="icon" type="image/gif" href="/app/assets/images/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="/app/assets/css/nulling.css" />

	<?php echo $styles; ?>

	<title><?php echo $title; ?></title>
	
</head>
<body>
	<div id="app">
		<div class="main-container">
			<?php echo $content; ?>
		</div>

		<div class="container-cover"></div>

		<div class="message_window">
			<div class="message_window-wrapper">
				<div class="message-close">
					<span class="btn-close" title="Close">X</span>
				</div>
				<div>
					<h4 class="message-status"></h4>
				</div>
				<div class="block-message"></div>
			</div>
		</div>
	</div>

	<script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.esm.js"></script>
	<script type="module" src="/app/assets/js/vue.js"></script>

	<?php echo $scripts; ?>

</body>
</html>