<script>
$(document).ready(function(){
$("a.myclass").click(function(e){
		e.preventDefault();
		var str= this.id;
		var chckaction =str.split("_");
		if(chckaction[1]=='delete')
		{
			$.ajax({
				type:"post",
				url:"deleteservice",
				data:'serviceid='+chckaction[0],
				datatype:'json',
				success:function(data)
				{
					location.reload();
				},
				error:function(error)
				{
				}
			});
		}
		else
		{
			$("#"+chckaction[0]+"_row").hide();
			$("#"+chckaction[0]+"_row1").show();
			$("#"+chckaction[0]+"_row1").focusout(function(){
			var newservicename = $("#"+chckaction[0]+"_txt").val();
			$("#"+chckaction[0]+"_txt").val('');
				$.ajax({
					type:"post",
					url:"updateservice",
					data:'servicename='+newservicename+'&sid='+chckaction[0],
					success:function(data)
					{
						location.reload();
					}
				});
			});
		}
			
	});
});
</script>
<?php
echo form_open_multipart('service_management/createservice/');
echo "<table width='70%' border=2 bordercolor='green' cellpadding='10'>";
echo "<tr><th>Name</th><th>Action</th></tr>";
foreach($servicelist as $value)
{
	echo "<tr>";
	echo "<td >";
	echo "<div id=".$value['id']."_row>" . $value['service_name']."</div>";
	echo "<div style='display: none;' id=".$value['id']."_row1><input type=text name=service_name placeholder='Enter New Value here' id=".$value['id']."_txt></div>";
	echo "</td>";
	echo "<td>";
	echo "<a href='' id=".$value['id']."_edit class='myclass'> Edit </a><a href='' id=".$value['id']."_delete class='myclass'> Delete </a>";
	echo "</td>";
	echo "</tr>";
}
echo "</table>";
echo form_close();
?>