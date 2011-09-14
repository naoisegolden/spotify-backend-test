<?php 
//this is the view 
?>
<!doctype html>
<head>
  <title>IMDB top list archive</title>
  <meta charset="utf-8">
  <meta name="author" content="Naoise Golden Santos">
  <style type="text/css">
  	html,body {  width: 100%; margin: 0; }
  	#container { width: 960px; height: 100%; margin: 0 auto; background-color: #e2e2e2; border-right: 1px solid #ccc; border-left: 1px solid #ccc; padding: 20px; }
  	.message { border: 1px solid green; background-color: lightGreen; width: 100%; margin-bottom: 20px; }
  	.error { border: 1px solid red; background-color: lightPink; width: 100%; margin-bottom: 20px; }
  	.error span, .message span { padding: 10px; display: block; }
  	table {
	    font-family: Georgia, serif;
	    font-size: 18px;
	    font-style: normal;
	    font-weight: normal;
	    letter-spacing: -1px;
	    line-height: 1.2em;
	    border-collapse:collapse;
	    text-align:center;
	}
	thead th, tfoot td{
	    padding:20px 10px 40px 10px;
	    color:#fff;
	    font-size: 26px;
	    background-color:#222;
	    font-weight:normal;
	    border-right:1px dotted #666;
	    border-top:3px solid #666;
	    text-shadow:0px 0px 1px #fff;
	    text-shadow:1px 1px 1px #000;
	}
	tfoot th{
	    padding:10px;
	    font-size:18px;
	    text-transform:uppercase;
	    color:#888;
	}
	thead th:empty{
	    background:transparent;
	}
	thead :nth-last-child(1){
	    border-right:none;
	}
	tbody th{
	    text-align:right;
	    padding:10px;
	    color:#333;
	    text-shadow:1px 1px 1px #ccc;
	    background-color:#f9f9f9;
	}
	tbody td{
	    padding:10px;
	    background-color:#f0f0f0;
	    border-right:1px dotted #999;
	    text-shadow:-1px 1px 1px #fff;
	    text-transform:uppercase;
	    color:#333;
	}
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
    	<?php if (!empty($errors)) { foreach ( $errors as $error ) { ?><div class="error"><span><?php echo $error; ?></span></div><?php } } ?>
    	<?php if (!empty($messages)) { foreach ( $messages as $message ) { ?><div class="message"><span><?php echo $message; ?></span></div><?php } } ?>
    	<?php if (!empty($data)): ?>
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
	    		<tfoot><tr></tr></tfoot>
	    	</table>
	    <?php endif; ?>
    </div><!-- /#main -->
    <footer>
    </footer>
  </div> <!-- /#container -->

</body>
</html>
