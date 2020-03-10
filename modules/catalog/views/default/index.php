<div class="catalog-index">

    <h1><?= $this->title ?></h1>

    <?php
    foreach ($model as $item)
        echo $this->render('_one', ['model' => $item]);
    ?>

</div>