
<?php
global $user;
global $glip;
if(!isset($_POST['activate'])){
    $disabled = "disabled";
}else{
    $disabled = "";
    $hidden = "";
}
echo '
    <div class="inline_block">
        <form action="" method="POST">
            <input type="hidden" name="activate"/>
            <button class="small-button" type="submit" name="submit">Make Changes</button>
        </form>
    </div>
    <div>
    <form action="" method="POST">
        <label for="to_update">Column to update: </label><br/>
        <select id="to_update" name="to_update" '.$disabled.'>
            <option value="agent_number">Agent Number</option>
            <option value="email">Email Address</option>
            <option value="name">Agents User Name</option>
            <option value="password">Agents User Password</option>
            <option value="phone">Phone number</option>
            <option value="address">Agent Address</option>
            <option value="contact person">Contact Person</option>
        </select>
        <input type="text" name="update_data" placeholder="Data to insert" '.$disabled.'/>
        <input class="blue-button" type="submit" value="Update" />
    </form>
    </div>
    ';
?>
