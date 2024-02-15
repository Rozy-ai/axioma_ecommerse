<?php

use yii\helpers\Html;

?>
<li class="dropdown">
    <i class="fas fa-map-marker-alt"></i> 
    <a class="dropdown-toggle" href="/category/<?php echo (isset($item->uri)) ? $item->uri : ''; ?>" data-toggle="dropdown"><?= $current; ?>
        <!--<span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span>-->
        <i class="fas fa-angle-down"></i>
    </a> 
    <ul class="dropdown-menu forAnimate" role="menu">
        <?php
        foreach ($links as $k => $link) :
            echo "<li>" . $link['link'] . "</li>";
        endforeach;
        ?>
    </ul>
</li>
<!-- <div class="city-choise">
    <ul class="list-inline">
        <?php // foreach ($links as $k => $link): 
        ?>
            <li class="list-inline-item">
                <?php //echo $link['link']; 
                ?>
            </li>
        <?php // echo endforeach; 
        ?>
</div> -->