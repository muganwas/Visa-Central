<?php 
    global $glip;
    global $user;
    global $id;
 ?>
<div class="applications-main">
    <div id="application-form">
        <div class="header">Create Application</div>
        <?php
            $glip->applicationForm();
         ?>
    </div>
    <div id="applicants-dits">
        <div class="header">Applicants Details</div>
        <?php $glip->applications($id, $user); ?>
    </div>
    <div id="search-results">
        <div class="header">Search Results</div>

    </div>
</div>