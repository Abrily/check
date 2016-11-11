<?php
include_once 'function.php';
$catid=$_GET['catID'];

	$subcategoryQuery  = "SELECT * FROM subcategory WHERE CategoryID='$catid' ORDER BY OrderNo ASC";
 	$subcategoryResult = $conn->query($subcategoryQuery);

echo '<div class="form-group">
                                <label for="subcategory">Sub Category</label>
<select name="subCategoryName" id="categoryNameID" class="form-control" >
                            <option value="0">Select Sub Category</option>
';
	while ($subcategoryRow = $subcategoryResult->fetch_array()) 
	{
		$SubCategoryID =  $subcategoryRow['SubCategoryID'];
		$SubCategoryName =  $subcategoryRow['SubCategoryName'];

	
		echo '<option value='.$SubCategoryID. '>'.$SubCategoryName.'</option>';


	}
echo '</select></div>';

?>