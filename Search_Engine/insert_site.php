<!DOCTYPE html>
<html>
	<head>
		<title>Search Engine In PHP</title>
	</head>
	<body bgcolor="gray">
		<form action="insert_site.php" method="post" enctype="multipart/form-data">
			<table bgcolor="green" width="500" border="2" cellspacing="2" align="center">
				<tr>
					<td colspan="2" align="center"><h2>Insert New Website</h2></td>
				</tr>
				<tr>
					<td align="right"><b>Site Title:</b></td>
					<td><input type="text" name="site_title" placeholder="Enter Title" /></td>
				</tr>
				<tr>
					<td align="right"><b>Site Link:</b></td>
					<td><input type="text" name="site_link" placeholder="Enter Link" /></td>
				</tr>
				<tr>
					<td align="right"><b>Site Keywords:</b></td>
					<td><input type="text" name="site_keywords" placeholder="Enter Keywords" /></td>
				</tr>
				<tr>
					<td align="right"><b>Site Description:</b></td>
					<td><textarea cols="20" rows="8" name="site_desc"></textarea></td>
				</tr>
				<tr>
					<td align="right"><b>Site Image:</b></td>
					<td><input type="file" name="site_image" /></td>
				</tr>
				<tr>
					<td align="center" colspan="2">
						<input type="submit" name="submit" value="Add Site" />
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>
<?php
$connect = mysqli_connect("localhost", "root", "", "search");
if ($connect->connect_error) {
    die("Connection Failed: " . $connect->connect_error);
}
echo "Connected Successfully";

if (isset($_POST['submit'])) {
    $site_title = $_POST['site_title'];
    $site_link = $_POST['site_link'];
    $site_keywords = $_POST['site_keywords'];
    $site_desc = $_POST['site_desc'];
    $site_image = $_FILES['site_image']['name'];
    $site_image_tmp = $_FILES['site_image']['tmp_name'];

    if ($site_title == '' || $site_link == '' || $site_keywords == '' || $site_desc == '') {
        echo "<script>alert('Please make sure to fill in all of the fields!')</script>";
    } else {
        // Use prepared statements to prevent SQL injection
        $insert_query = "INSERT INTO sites (site_title, site_link, site_keywords, site_desc, site_image) VALUES (?, ?, ?, ?, ?)";
        $stmt = $connect->prepare($insert_query);
        $stmt->bind_param("sssss", $site_title, $site_link, $site_keywords, $site_desc, $site_image);
        
        if ($stmt->execute()) {
            move_uploaded_file($site_image_tmp, "images/" . $site_image);
            echo "<script>alert('Data inserted into table')</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
    $connect->close();
}
?>
