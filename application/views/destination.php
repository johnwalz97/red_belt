<?php
$this->load->view('partials/head', ['title' => 'Travel Dashboard']);
$this->load->view('partials/nav');
$this->load->view('partials/foot');
?>
<div class="container">
    <div class="container">
        <h4><?=$trip['destination']?></h4>
        <ul>
            <li>Planned By: <?=$trip['first_name']?> <?=$trip['last_name']?></li>
            <li>Description: <?=$trip['plan']?></li>
            <li>Trip Start Date: <?=$trip['start_date']?></li>
            <li>Trip End Date: <?=$trip['end_date']?></li>
        </ul>
    </div>
    <div class="container">
        <h4>Other Users joining the trip</h4>
        <ul>
        <?php
            foreach($others as $traveler){
                echo "<li>".$traveler['first_name']." ".$traveler['last_name']."</li>";
            }
        ?>
        </ul>
    </div>
</div>