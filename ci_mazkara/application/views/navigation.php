<div class='row'>
	<div class='span12'>
		
			
			<ul class="nav nav-tabs">
			  <li class="active"><a href="#">Home</a></li>
			  <li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">Sevices
				<span class="caret"></span></a>
				<ul class="dropdown-menu">
				  <li><a href="<?php echo base_url().'service_management/createservice'; ?>">Create Service</a></li>
				  <li><a href="<?php echo base_url().'service_management/listservice'; ?>">Service Management</a></li>
				</ul>
			  </li>
			  				
				<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">PetType
				<span class="caret"></span></a>
				<ul class="dropdown-menu">
				  <li><a href="<?php echo base_url().'pettype_management/createpet_type'; ?>">Create PetType</a></li>
				  <li><a href="<?php echo base_url().'pettype_management/listpet_type'; ?>">PetType Management</a></li>
				</ul>
			  </li>
				
				<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">Pets
				<span class="caret"></span></a>
				<ul class="dropdown-menu">

				  <li><a href="<?php echo base_url().'pet/createpet'; ?>">Add New Pet</a></li>
				  <li><a href="<?php echo base_url().'pet/listpet'; ?>">Pet Management</a></li>
				</ul>
			  </li>
					<?php
					if(!isset($this->session->userdata['loginuser']))
					{
						echo "<li class=active><a href=".base_url()."auth/login>Login</a></li>";
						echo "<li><a href=\"\">Signup</a></li>";
					}
					else
					{
						echo "<li><a href=".base_url()."auth/logout>Logout</a></li>";
						echo "<li class=active style='background-color:yellow'> &nbsp;&nbsp; Welcome MR. ".$this->session->userdata['username']." &nbsp;&nbsp; </li>";

					}
					?>
                    
				

			</ul>


	</div>
</div>
