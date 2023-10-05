<?php

use yii\helpers\Html;

?>
<style>
    .city-choise-wrap li.dropdown{
        list-style: none;
    }
    .city-choise-wrap i{
        color:#b8cc76;
    }
    .city-choise-wrap a.dropdown-toggle{
        border-bottom: 1px solid #b8cc76;
    }
    .city-choise-wrap a.dropdown-toggle:hover{
        text-decoration: none;
    }
    .city-choise-wrap a.dropdown-toggle:focus{
        text-decoration: none;
    }
    .city-choise-wrap ul.dropdown-menu a{
        color:#b8cc76;
    }
</style>
<li class="dropdown">
    <i class="fas fa-map-marker-alt"></i> 
    <a class="dropdown-toggle" href="/category/<?= $item->uri ?>" data-toggle="dropdown"><?= $current; ?>
        <!--<span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span>-->
    </a> <i class="fas fa-angle-down"></i>
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