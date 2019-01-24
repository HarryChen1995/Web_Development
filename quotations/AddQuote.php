<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>Add a Quote</title>
<link href="styles.css" rel="stylesheet" type="text/css">
</head>
 <body>
<h2> Add a Quote</h2>
<div class="QuoteAdd">
 <span class="Spang">Quote</span><textarea rows="10" cols="60"  form="quote" name="Addedquote"  placeholder="Enter a quote"></textarea><br>
<form action="controller.php" method="get" id="quote">
    <b>Author</b><input class = "Authorbox"  name="author" type="text"><br>
	<input class="formsubmit" type="submit" value="Add Quote">
</form>
</div>
<?php 
if(isset($_GET['Error1'])){

	echo  '<br><b>'.$_GET['Error1'].'</b>';
	
}
?> 
</body>





</html>