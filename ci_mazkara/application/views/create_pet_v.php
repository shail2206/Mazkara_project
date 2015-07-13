<?php

echo form_open_multipart('pet/createpet/');
$petname ='';
echo "<table>";
echo "<tr><td>Pet Type</td>";
echo "<td>";
echo "<select name ='pettype' id=pettype>";
foreach($pettype as $value)
{
	echo "<option value=".$value['id'].">";
	echo $value['pet_type_name'];
	echo "</option>";
}
echo "</select>";
echo "</td>";
echo "</tr>";
echo "<tr><td>Pet </td><td><input type=text name=petname value=\"$petname\"> </td></tr>";
echo "<tr><td>";
echo "<span class=\"text-danger\">";
echo form_error('petname');
echo "</span>";
echo "</td></tr>";
echo "<tr><td><input type='submit' name='submit' value='Add Entry'></td><td><input type='reset' name='reset' value='Clear Form'></td></tr>";
echo "</table>";


echo form_close();
?>