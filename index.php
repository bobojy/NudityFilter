<?php
error_reporting(0);
/*Include the Nudity Filter file*/
include ('./nf.php');
/*Create a new class called $filter*/
$filter = new ImageFilter;
/*Get the score of the image*/
$score = $filter -> GetScore($_FILES['img']['tmp_name']);
echo $score;
/*If the $score variable is set*/
if (isset($score)) {
	/*If the image contains nudity display image score and message. Score value If more than 60%, it consider as adult image.*/
	if ($score >= 60){
		$error = "<b>Image scored " . $score . "%, It seems that you have uploaded a nude picture.</b>";
	/*If the image doesn't contain nudity*/
	} else if ($score < 0) {
		$error = "<b>Congratulations, you have uplaoded an non-nude image.</b>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<meta charset="utf-8" />
	<head>
		<title>Nudity Filter - RRPowered</title>
	</head>
	<body>
		<?php echo $error;?>
        <form method="post" enctype="multipart/form-data" action="<?php echo $SERVER['PHP_SELF'];?> ">
        Upload image:
        <input type="file" name="img" id="img" />
        <br />
        <input type="submit" value="Sumit Image" />
        </form>
	</body>
</html>