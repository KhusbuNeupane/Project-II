<?php include ( "../inc/connect.inc.php" ); ?>
<?php 
ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
	$user = "";
}
else {
	$user = $_SESSION['user_login'];
	$result = mysqli_query($con, "SELECT * FROM users WHERE id='$user'");
		$get_user_email = mysqli_fetch_assoc($result);
			$uname_db = $get_user_email['first_name'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Seasonings</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php include ( "../inc/mainheader.inc.php" ); ?>
	<div class="categolis">
		<table>
			<tr>
				<th>
					<a href="NoodlesCanned.php" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;;border-radius: 12px;">Noodles</a>
				</th>
				<th><a href="Seasonings.php" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #24bfae;border-radius: 12px;">Seasonings</a></th>
				<th><a href="Drinks.php" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;;border-radius: 12px;">Soft Drinks</a></th>
				<th><a href="Snacks.php" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;;border-radius: 12px;">Snacks</a></th>
				<th><a href="Sweets.php" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;;border-radius: 12px;">Chocolate Bars</a></th>
				<th><a href="Soap&Detergent.php" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;;border-radius: 12px;">Soap</a></th>
				<th><a href="Shampoo.php" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;;border-radius: 12px;">Shampoo</a></th>
				
			</tr>
		</table>
	</div>
	<div style="padding: 60px 160px; font-size: 20px; margin: 0 auto; display: table; width: 98%;">
		<div>
		<?php 
			$getposts = mysqli_query($con, "SELECT * FROM products WHERE available >='1' AND item ='seasoning'  ORDER BY id DESC LIMIT 10") or die(mysqlI_error($con));
					if (mysqli_num_rows($getposts)) {
					echo '<ul id="recs">';
					while ($row = mysqli_fetch_assoc($getposts)) {
						$id = $row['id'];
						$pName = $row['pName'];
						$price = $row['price'];
						$description = $row['description'];
						$picture = $row['picture'];
						
						echo '
							<ul style="float: left;">
								<li style="float: left; padding: 0px 25px 25px 25px;">
									<div class="home-prodlist-img"><a href="view_product.php?pid='.$id.'">
										<img src="../image/product/seasoning/'.$picture.'" class="home-prodlist-imgi">
										</a>
										<div style="text-align: center; padding: 0 0 6px 0;"> <span style="font-size: 15px;">'.$pName.'</span><br> Price: Rs.'.$price.' </div>
									</div>
									
								</li>
							</ul>
						';

						}
				}
		?>
			
		</div>
	</div>
</body>
</html>