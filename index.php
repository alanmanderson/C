<html>

<head>
	<link rel="stylesheet" type="text/css" href="main.css" />
  <title>YAY!!!</title>
  <script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="json2.js"></script>
	<script type="text/javascript" src="jquery-1.4.2.js"></script>
  <script type="text/javascript" src="jquery.label_over.js"></script>
	<script type="text/javascript">
		$(function() {
				$("#mode").click(function() {
					alert("test");
					var mode = $('#mode').val();
					var url = "start.php?mode=" + mode;
					location.href = url;
				});
			})
			
		function callStart(){
			var mode = document.getElementsByName("mode")[0].value;
			var url = "start.php?mode="+ mode;
			location.href=url;
		}		
	</script>
</head>
<body>
	<form>
		<?php
			$mode = $_GET["mode"];
			if (!$mode){
				$mode = "start";
			}
		?>
		<!--<div class="button" id="mode"><?php echo($mode); ?></div>-->
		<input type="button" value="<?php echo($mode); ?>" name="mode" onclick="callStart()"/>
		<table id="contractions">
			<th>Start</th><th>End</th><th>Duration</th><th>Since Last Contraction</th>
			<?php
				$mydb = mysql_connect("sql.mit.edu", "alanma", "daBrav3s") or die(mysql_error());
				mysql_select_db("alanma+C") or die(mysql_error());
				
				$sql="SELECT * FROM c";
				$result = mysql_query($sql);
				while($row=mysql_fetch_array($result)){
					echo("<tr><td>");
					echo($row['Start']);
					echo("</td><td>");
					echo($row['End']);
					echo("</td></tr>");
				}
			?>
		</table>
	</form>
</body>

</html>