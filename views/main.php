<?php 
//this is the view 
?>
<!doctype html>
<head>
  <title>IMDB top list archive</title>
  <meta charset="utf-8">
  <meta name="author" content="Naoise Golden Santos">
  <style type="text/css">
  	#container { width: 980; margin: 0 auto; background-color: #ccc; border-right: 1px solid #333; border-left: 1px solid #333; }
  	.message { border: 1px solid red; background-color: lightRed; padding: 10px; width: 100%; }
  </style>
  <script type="text/javascript">
  	/* js */
  </script>
</head>

<body>

  <div id="container">
    <header>
    </header>
    <div id="main" role="main">
    	<?php if (!empty($message)) { ?><div class="message"><?php echo $message; ?></div><?php } ?>
    	<p><?php echo $var; ?></p>
    	<p><?php echo $var2 ?></p>
    </div><!-- /#main -->
    <footer>
    </footer>
  </div> <!-- /#container -->

</body>
</html>
