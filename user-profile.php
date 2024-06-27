<?php
$page_title = "User Profile";
include('authentication.php');
include('includes/header.php');
include('includes/navbar.php');
include("dbcon.php");

$result = mysqli_query($con, "SELECT * FROM users");
?>

<br>

<h2 style="text-align: center;">User Profile</h2>
<hr>

<?php
if (mysqli_num_rows($result) > 0) {
?>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Usertype</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["phone"]; ?></td>
                    <td><?php echo $row["usertype"]; ?></td>
                    <td><a href="update-details.php?id=<?php echo $row["id"]; ?>">Update</a></td>
                </tr>
                <?php
                $i++;
            }
            ?>
        </tbody>
    </table>
</div>
<?php
} else {
    echo "No Details Found";
}
?>

<br><br><br><br><br><br><br><br><br>

<?php include('includes/footer.php');?>

