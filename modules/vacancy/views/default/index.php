<?php
$text = "На данный момент активных вакансий нет.";

$this->params['breadcrumbs'][] = $model->header;

app\modules\vacancy\VacancyAssets::register($this);
?>

<h1><?= $model->header ?></h1>


<div class="vacancy-index">

    <?php if ($active): ?>

        <br/>
        <br/>
        <div class="h4">Активные вакансии</div>

        <?php
        foreach ($active as $item)
            echo $this->render('_one', ['model' => $item]);

    else:
        ?>

        <p><?= $text ?></p>

    <?php endif;
    ?>


    <?php if ($inactive): ?>

        <br/>
        <br/>
        <br/>
        <div class="h4">Закрытые вакансии</div>


        <?php
        foreach ($inactive as $item)
            echo $this->render('_one', ['model' => $item]);

    endif;
    ?>


    <div class="new">
        <div class="content">
            <?= $model->content ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 contact-form">
        <?= app\modules\forms\widgets\Contact::widget(); ?>
    </div>
</div>
