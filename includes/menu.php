<div class="Vmenu">
    <ul>
    <li
    id="kal" 
    class="<?php
        $url = $_GET['plc'];
        if($url =='applications'){
            echo 'active';
        }
     ?>"
      info-tip="Applications"><a id="a1" href="dash.php?plc=applications" alt="Applications"><div class="inner" id="applications"></div></a>
    </li><?php  if(isset($userLevel) && $userLevel > 1){?><li class="<?php
        $url = $_GET['plc'];
        if($url == 'agents'){
            echo 'active';
        }
    ?>"
    info-tip="Agents">
    <a href="dash.php?plc=agents"><div class="inner" id="agents"></div></a></li><li class="<?php
        $url = $_GET['plc'];
        if($url == 'execs'){
            echo 'active';
        }
    ?>" 
    info-tip="Executives">
    <?php 
        if($userLevel == 3){?>
        <a href="dash.php?plc=execs"><div class="inner" id="execs"></div></a></li>
    <?php 
        } 
    }   
    ?>
    </ul>
    <div class="search">
        <form action="" method="POST">
            <input id="search" placeholder="Search for Application by ID" name="search_text" type="text" />
        </form>
    </div>
    <div class="clear"></div>
</div>