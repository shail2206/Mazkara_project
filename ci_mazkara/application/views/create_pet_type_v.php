<?php
echo form_open_multipart('pettype_management/createpet_type/');
$pettypename ='';
echo "<table>";
echo "<tr><td>Pet Type</td><td><input type=text name=pettypename value=\"$pettypename\"> </td></tr>";
echo "<tr><td>";
echo "<span class=\"text-danger\">";
echo form_error('pettypename');
echo "</span>";
echo "</td></tr>";

echo "<tr><td><input type='submit' name='submit' value='Add Entry'></td><td><input type='reset' name='reset' value='Clear Form'></td></tr>";
echo "</table>";


echo form_close();
?>