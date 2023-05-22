<?php 
require_once('config.php'); 
 
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$result = $db->query("SELECT image FROM project ORDER BY proj_id"); 
?>

<?php if($result->num_rows > 0){ ?> 
    <div class="gallery"> 
        <?php while($row = $result->fetch_assoc()){ ?> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" /> 
        <?php } ?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } ?>