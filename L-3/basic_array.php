<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PHP Basics</title>
</head>
<body>

	<h1>PHP Basics</h1>

	<?php 
		$cars = array(array('name' => 'Ford', 'country' => 'USA', 'year' => 1988),
				array('name' => 'Mercedes', 'country' => 'Germany', 'year' => 1978),
				array('name' => 'Toyota', 'country' => 'Japan', 'year' => 1958));
	?>

	<?php 
		echo "Car - unorderd list";
		echo "<ul>";
		foreach($cars as $key => $value) {
			echo "<li>". $value['name'] . " - " . $value['country'] . " - " . $value['year'] ."</li>";
		}
		echo "</ul>";
	?>

	<hr>

<?php 
echo "Car ";

$cars = array(
    array('name' => 'Ford', 'country' => 'USA', 'year' => 1988),
    array('name' => 'Mercedes', 'country' => 'Germany', 'year' => 1978),
    array('name' => 'Toyota', 'country' => 'Japan', 'year' => 1958)
);
?>

<table>
    <tr>
        <th>NAME</th>
        <th>COUNTRY</th>
        <th>YEAR</th>
    </tr>
    <?php foreach($cars as $car): ?>
    <tr>
        <td><?php echo $car['name']; ?></td>
        <td><?php echo $car['country']; ?></td>
        <td><?php echo $car['year']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>