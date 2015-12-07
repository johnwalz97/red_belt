<?php
if(!empty($this->session->userdata('user'))){
	$button = 'Log Out';
}
else {
	$button = 'Sign In';
}
?>
<nav class="navbar navbar-default" style="border-bottom: solid thin black;">
    <div class="container">
        <div class="navbar-header">
            <span class="active navbar-brand">Travel Buddy</span>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="/travels/">Home</a></li>
        </ul>
        <ul class="nav navbar-nav pull-right">
            <li class="pull-right"><a href="/welcome/logout"><?=$button?></a></li>
        </ul>
    </div>
</nav>