<?php global $userLevel; $url = $_GET['plc'];
if(isset($_GET['clr'])){
    $url2 = $_GET['clr']; 
}
?>

<div class="Vmenu">
    <ul><?php if(isset($userLevel) && ($userLevel == 1 || $userLevel == 3)){?>
    <li
    id="kal" 
    class="<?php
        $url = $_GET['plc'];
        if($url =='applications'){
            echo 'active';
        }
     ?>"
      info-tip="Applications"><a id="a1" href="
      <?php 
        if($url == 'applications'){
           echo 'dash.php?plc=applications&amp;clr=1';
        }else{
            echo 'dash.php?plc=applications';
        }
     ?>
     " alt="Applications"><div class="inner" id="applications">Applications</div></a>
    </li><?php }?><?php if(isset($userLevel) && $userLevel > 1){?><li class="<?php
        $url = $_GET['plc'];
        if($url == 'agents'){
            echo 'active';
        }
    ?>"
    info-tip="Agents">
    <a href="
    <?php 
        if($url == 'agents'){
           echo 'dash.php?plc=agents&amp;clr=1';
        }else{
            echo 'dash.php?plc=agents';
        }
     ?>
    "><div class="inner" id="agents">Agents</div></a>
    </li><li class="<?php
        $url = $_GET['plc'];
        if($url == 'execs'){
            echo 'active';
        }
    ?>" 
    info-tip="Executives">
    <?php 
        if($userLevel == 3){?>
        <a href="
        <?php 
        if($url == 'execs'){
           echo 'dash.php?plc=execs&amp;clr=1';
        }else{
            echo 'dash.php?plc=execs';
        }
     ?>
        "><div class="inner" id="execs">Executives</div></a></li>
    <?php 
        } 
    }   
    ?>
    </ul>
    <?php if(isset($userLevel) && $userLevel == 3 && $_GET['plc']== "applications"){?>
    <div class="search">
        <form action="" method="POST">
            <input id="search" placeholder="Search for Application by Number" name="search_text" type="text" />
        </form>
    </div>
    <?php } ?>
    <div class="clear"></div>
</div>