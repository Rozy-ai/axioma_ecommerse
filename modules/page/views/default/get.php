<?php
//print_r($parent);
if ($parent && $parent->id != 1)
    $this->params['breadcrumbs'][] = ['url' => $parent->url, 'label' => $parent->name];
$this->params['breadcrumbs'][] = $page->h1 ? $page->h1 : $page->name ;
?>
<div class="page">
    <h1><?= $page->h1 ? $page->h1 : $page->name ?></h1>
    <?= $page->content ?>
</div>

<div class="childs">

    <?php
    if ($childs)
        foreach ($childs as $child)
            echo $this->render('_child', ['model' => $child]);
    ?>
</div>
