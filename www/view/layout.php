<!doctype html>
<html lang="ru">
<head>
    <link rel="stylesheet" type="text/css" href="/style/style.css">
    <meta charset="UTF-8" />
    <title><?php echo $title; ?></title>
	
	<link rel="icon" href="/img/favicon2.ico" type="image/x-icon">
	<link rel="shortcut icon" href="/img/favicon2.ico" type="image/x-icon">
	
	<script src="/view/jquery-2.1.3.min.js" type="text/javascript"></script>
	<script src="/view/chosen.jquery.js" type="text/javascript"></script>
	<script src="/view/easyResponsiveTabs.js" type="text/javascript"></script>
	<link href="/view/chosen.css" rel="stylesheet">
	
	
</head>

<body>

<header>

<div class="ph-dot-nav nav">
		<a href="#">Главная</a>
		<a href="#">О нас</a>
		<a href="#">Галерея</a>
		<a href="#">Контакты</a>
		<div class="effect"></div>
</div>

<div class=buttom-battle> В бой! </div>

<div class=clearf> </div>

<div class=line> </div>

</header>

<div class=content>

		<?php echo $content;
		//echo print_r(call("SELECT * FROM `links`"));
		?>

		<div class=footer-push> </div>
</div>

<footer class="footer">
	<div class="wrap">
		<span>Game all planet</span>
	</div>
</footer>
</body>

<script type="text/javascript">
    var config = {
      '.chosen-select'           : {max_selected_options: 6},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
	  $(".chosen-select").chosen({width: '350px'});
    }
  </script>
</html>