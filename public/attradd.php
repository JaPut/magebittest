<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('location:index.php');
	}
$table = $_SESSION['username'];
?>
<?php  include('serverattr.php'); ?>
<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM $table WHERE id=$id");
	if (count([$record]) == 1 ) {
		$n = mysqli_fetch_array($record);
		$attribute = $n['attribute'];
		$value = $n['value'];
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>User attributes</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../styles/admstyle.css">
</head>
<body>
<header>
	<h1 style="text-align: center;">User "<strong style="font-size:32px; color:black;"><?php echo $table ?></strong>" information</h1>
		
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
<?php 
	echo $_SESSION['message']; 
	unset($_SESSION['message']);
?>
	</div>
<?php endif ?>
</header>
<section>
	<nav>
<p>add or correct user info here:</p>
	<form method="post" action="serverattr.php" >
			<input type="hidden" name="id" value="<?php echo $id; ?>">
				<div class="input-group">
					<label>Attribute</label>
					<input type="text" name="attribute" value="<?php echo $attribute; ?>">
				</div>
				<div class="input-group">
					<label>Value</label>
					<input type="text" name="value" value="<?php echo $value; ?>">
				</div>
				<div class="input-group">
					<?php if ($update == true): ?>
						<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
					<?php else: ?>
						<button class="btn" type="submit" name="save" >Add</button>
					<?php endif ?>
				</div>
		</form>
		<a class="float-right" href="logout.php"> Logout </a>
	</nav>
	<article>
	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>
	<?php 
	$results = mysqli_query($db, "SELECT * FROM $table"); ?>
	<table>
		<thead>
			<tr>
				<th>Attribute</th>
				<th>Value</th>
				<th>Last update time</th>
				<th>Update</th>
				<th colspan="2">Delete</th>
			</tr>
		</thead>
		<?php while ($row = mysqli_fetch_array($results)) { ?>
			<tr>
				<td><?php echo $row['attribute']; ?></td>
				<td><?php echo $row['value']; ?></td>
				<td><?php echo $row['updatetime']; ?></td>
				<td>
					<a href="attradd.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Correct</a>
				</td>
				<td>
					<a href="serverattr.php?del=<?php echo $row['id']; ?>" class="del_btn">Remove</a>
				</td>
			</tr>
		<?php } ?>
	</table>
</section>
</body>
</html>