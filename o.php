<?php

// Note that this header is required to disable xss filters in modern web browsers
header("X-XSS-Protection: 0");
if (isset($_GET['submit']))
{require_once('clean.php');
$string = clean($_GET['comment']);
$_GET['comment']=$string;
$string = clean($_GET['name']);
$_GET['name']=$string;
$string = clean($_GET['submit']);
$_GET['submit']=$string;

?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Test 1 Comment</title>
</head>

<body>
	 <h1>Thanks for your comment <?php echo $_GET['name'] ?></h1>
	 <p><?php print("<em>Your comment</em>: ${_GET['comment']}"); ?></p>
</body>
</html>


<?php

   
}
else {

?>
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Test 1</title>
</head>

<body>
	 <h1>Hello!</h1>
	 <p>Share your views with us:</p>
	 <form>
	   Name: <input name="name" type="text"><br>
	   Comment: <textarea name="comment"></textarea><br>
	   <input name="submit" type="submit">
	 </form>
</body>
</html>

<?php } ?>
