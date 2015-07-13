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
				url:"deletepet",
				data:'petid='+chckaction[0],
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
		else if(chckaction[1]=='edit')
		{
			$("#"+chckaction[0]+"_row").hide();
			$("#"+chckaction[0]+"_row1").show();
			$("#"+chckaction[0]+"_row1").focusout(function(){
			var newpetname = $("#"+chckaction[0]+"_txt").val();
			$("#"+chckaction[0]+"_txt").val('');
				$.ajax({
					type:"post",
					url:"updatepet",
					data:'petname='+newpetname+'&petid='+chckaction[0],
					success:function(data)
					{
						location.reload();
					}
				});
			});
		}
		else {
			var petid= chckaction[0];
			$.ajax({
					type:"post",
					url:"<?php echo base_url().'ajax_service/pettype'; ?>",
					data:'petid='+petid,
					success:function(data)
					{
						$("#"+chckaction[0]+"_typediv").html(data);
						$('#ajxpettype').change(function(){
							var typeid=$('#ajxpettype').val();
							$.ajax({
								type:'post',
								url:"<?php echo base_url().'ajax_service/pet_petype'; ?>",
								data:'typeid='+typeid+'&petid='+chckaction[0],
								success:function(data)
								{
									location.reload();
								}
							});
						});
					}
				});
		}
			
	});
});
</script>
<?php
echo form_open_multipart('');
echo "<table width='70%' border=2 bordercolor='green' cellpadding='10'>";
echo "<tr><th>Name</th><th>Action</th></tr>";
foreach($petlist as $value)
{
	echo "<tr>";
	echo "<td >";
	echo "<div id=".$value['id']."_row>" . $value['name']."</div>";
	echo "<div style='display: none;' id=".$value['id']."_row1><input type=text name=name placeholder='Enter New Value here' id=".$value['id']."_txt></div>";
	echo "</td>";
	echo "<td>";
	echo "<a href='' id=".$value['id']."_edit class='myclass'> Edit </a> | <a href='' id=".$value['id']."_delete class='myclass'> Delete </a> | <a href='' id=".$value['id']."_select class='myclass'> Choose Relation Between Pets & Petype </a> <div id = ".$value['id']."_typediv ></div> ";
	echo "</td>";
	echo "</tr>";
}
echo "</table>";
echo form_close();
?>