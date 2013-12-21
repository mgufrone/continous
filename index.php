<!DOCTYPE html>
<html>
<head>
	<title>Continuous Ajax Request</title>
</head>
<body>
	<div id="console">
		
	</div>
	<script type="text/javascript" src="//code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript">
		var start_value = <?php print 0?>;
		var max_value = <?php print 100?>;
		$(document).ready(function(){
			function continuous(start, max)
			{
				if(start < max)
				{
					$.ajax({
						type:'POST',
						url:'post.php',
						data:{"start":start},
						success:function(data){
							start++;
							$('#console').append(
								$('<div/>').text(data.message)
							)
							// give timeout, at least 1 seconds
							var timeout = setTimeout(function(){
								clearTimeout(timeout);
								continuous(start, max);
							},5000);
						},
						dataType:'json'
					})
				}
			}
			continuous(start_value, max_value)
		});
	</script>
</body>
</html>