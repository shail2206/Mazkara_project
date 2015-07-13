<?php
echo form_open_multipart('service_management/createservice/');
$servicename ='';
echo "<table>";
echo "<tr><td>Service Name 
<span class=\"text-danger\">";
echo form_error('servicename');
echo "</span>";
echo "</td><td><input type=text name=servicename value=\"$servicename\"> </td></tr>";
echo "<tr><td><input type='submit' name='submit' value='Add Entry'></td><td><input type='reset' name='reset' value='Clear Form'></td></tr>";
echo "</table>";


echo form_close();
?>