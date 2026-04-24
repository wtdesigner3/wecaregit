<?php
require('../includes/function.php');
$qs=$_GET['data'];
echo '<option value="">Select Subcategory</option>';
	$abc=mysqli_query($conn,"SELECT * FROM `tbl_subcategory` WHERE `category_id`='$qs'");
	while($cdf=mysqli_fetch_array($abc))
	{
	 ?>	
		<option value="<?= $cdf['sc_id']; ?>"><?= $cdf['sc_name'];?></option>
	<?php
    }
?>