<?php
include_once 'function.php';
$catid=$_GET['catID'];

	$subcategoryQuery  = "SELECT * FROM subcategory WHERE CategoryID='$catid' ORDER BY OrderNo ASC";
 	$subcategoryResult = $conn->query($subcategoryQuery);

echo '<select name="categoryName" id="subCategoryNameID" class="form-control" >
                            <option value="0">Select Sub Category</option>
							<option value="0">All</option>
';
	while ($subcategoryRow = $subcategoryResult->fetch_array()) 
	{
		$SubCategoryID =  $subcategoryRow['SubCategoryID'];
		$SubCategoryName =  $subcategoryRow['SubCategoryName'];

	
		echo '<option value='.$SubCategoryID. '>'.$SubCategoryName.'</option>';


	}
echo '</select>';

?>