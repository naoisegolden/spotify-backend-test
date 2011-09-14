<?php 
//this is the view 
?>
<!doctype html>
<head>
  <title>IMDB top list archive</title>
  <meta charset="utf-8">
  <meta name="author" content="Naoise Golden Santos">
  <style type="text/css">
  	html,body { height: 100%; width: 100%; margin: 0; }
  	#container { width: 960px; height: 100%; margin: 0 auto; background-color: #eee; border-right: 1px solid #ccc; border-left: 1px solid #ccc; padding: 20px; }
  	.error, .message { border: 1px solid red; background-color: lightPink; width: 100%; margin-bottom: 20px; }
  	.error span, .message span { padding: 10px; display: block; }
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
    	<?php if (!empty($error)) { ?><div class="error"><span><?php echo $error; ?></span></div><?php } ?>
    	<?php if (!empty($message)) { ?><div class="message"><span><?php echo $message; ?></span></div><?php } ?>
    	
    	<h2>Current IMDB Top 10 Chart</h2>
    	<table>
    		<thead>
    			<tr>
    				<th>Rank</th>
    				<th>Rating</th>
    				<th>Title</th>
    				<th>Year</th>
    				<th>Num. of votes</th>
    			</tr>
    		</thead>
    		<tbody>
    			<?php foreach ( $data as $item ): ?>
    			<tr>
    				<?php foreach ( $item as $element ): ?>
	    			<td><?php echo $element; ?></td>
	    			<?php endforeach; ?>
    			</tr>
    			<?php endforeach; ?>
    		</tbody>
    	</table>
    </div><!-- /#main -->
    <footer>
    </footer>
  </div> <!-- /#container -->

</body>
</html>
