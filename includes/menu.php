<div class="menu">
<ul>
<li><a href="dash.php?plc=home">Home</a></li>
<li><a href="dash.php?plc=forms&amp;approved=1">Approved</a></li>
<?php  if(isset($userLevel) && $userLevel == 4){?>
<li><a href="dash.php?plc=forms&amp;approved=0">Rejected</a></li>
<li><a href="dash.php?plc=users">System Users</a></li>
<?php }?>
</ul>
</div>