
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav" >
    <a class="navbar-brand" href="home">SITE : Clearance Management System</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="students">
          <a class="nav-link" href="home">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Students </span>
          </a>
        </li>
		
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="events">
          <a class="nav-link" href="events">
            <i class="fa fa-fw fa-calendar"></i>
            <span class="nav-link-text">Events</span>
          </a>
        </li>
        
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="sanctions">
          <a class="nav-link" href="sanctions">
            <i class="fa fa-fw fa-list-alt"></i>
            <span class="nav-link-text">Sanctions</span>
          </a>
        </li>
		
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="violations">
          <a class="nav-link" href="violations">
            <i class="fa fa-fw fa-ban"></i>
            <span class="nav-link-text">Violations</span>
          </a>
        </li>
		
		
		
		<?php
			if($user_utype == "1" || $user_utype == "3") {
				echo"
				<li class='nav-item' data-toggle='tooltip' data-placement='right' title='inventory'>
				  <a class='nav-link' href='inventory'>
					<i class='fa fa-fw fa-book'></i>
					<span class='nav-link-text'>Inventory</span>
				  </a>
				</li>";
			
		?>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="logs">
          <a class="nav-link" href="logs">
            <i class="fa fa-fw fa-history"></i>
            <span class="nav-link-text">Logs</span>
          </a>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-archive"></i>
            <span class="nav-link-text">Archive</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="archive_events">Event Archive</a>
            </li>
			<li>
              <a href="archive_sanctions">Sanction Archive</a>
            </li>
			<li>
              <a href="archive_students">Student Archive</a>
            </li>
          </ul>
        </li>
		<?php 
			}

			if($user_utype == "1" || $user_utype == "3") {
				echo "<li class='nav-item' data-toggle='tooltip' data-placement='right' title='Account Management'>
					  <a class='nav-link nav-link-collapse collapsed' data-toggle='collapse' href='#collapseMulti' data-parent='#exampleAccordion'>
						<i class='fa fa-fw fa-user'></i>
						<span class='nav-link-text'>Account Manager</span>
					  </a>
					<ul class='sidenav-second-level collapse' id='collapseMulti'>
					      <li><a href='register'>Register</a></li>
						  <li><a href='user_list'>List of Accounts</a></li>
					</ul>";  
			}
		?>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler" >
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
	  <ul class="navbar-nav ml-auto" >
	    <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-user"></i> Welcome : <img src="<?php echo $user_avatar;?>" class="img-thumbnail" alt="prof-pic" width="30px;"> <b><?php echo $user_fname." ".$user_lname; ?></b>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
			<?php
				if($user_utype == "1" || $user_utype == "3") {
				echo "<a class='dropdown-item' href='manage-sy'>Manage School Year</a>";
				}
			?>
		    <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="change-password">Change Password</a>
            <a class="dropdown-item" href="profile">Profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout" data-toggle="modal" data-target="#exampleModal">Logout</a>
          </div>
         </li>
	  </ul>
    </div>
  </nav>