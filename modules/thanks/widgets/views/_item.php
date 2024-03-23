<?php

use yii\helpers\Html;

if (strlen($item->content) > 700) {
    $words = explode(' ', $item->content);
    $croppedText = implode(' ', array_slice($words, 0, 39));
} else {
    $croppedText = $item->content;
}
?>
<div class="col-sm-12 one-service">

    <div class="service-wrap wrap-<?= $item->id ?>">
        <div class="img-wrap">
            <a href="<?= $item->img ?>" class="image-link">
                <img src="<?= $item->img ?>" alt="<?= $item->name ?>">
            </a>
        </div>
        <p class="title"> &laquo;
            <?= $item->name ?> &raquo;
        </p>
        <p><strong>
                <?= $item->employee_name ?>
            </strong></p>
        <p class="title">
            <?= $item->employee_job ?>
        </p>
        <br>
        <div class="content">
            <?= Html::tag('p', $croppedText, ['class' => 'anons lessText']) ?>
            <?= Html::tag('p', $item->content, ['class' => 'anons fullText', 'style' => 'display: none']) ?>
        </div>
        <?php if (strlen($item->content) > 700): ?>
            <p class="link-next show-all-btn-<?= $item->id ?>">Читать полностью...</p>
        <?php endif; ?>
    </div>
</div>

<script>

    document.addEventListener('DOMContentLoaded', function () {
        var buttons = document.querySelectorAll('.show-all-btn-<?= $item->id ?>');

        buttons.forEach(function (button) {
            button.addEventListener('click', function () {
                var container = this.closest('.service-wrap');

                var lessText = container.querySelector('.lessText');
                var fullText = container.querySelector('.fullText');

                if (lessText && fullText) {
                    lessText.style.display = 'none';
                    fullText.style.display = 'block';
                    container.style.height = 'auto';
                    button.style.display = 'none';
                }
            });
        });
    });
    

</script>

<?php
    $this->registerJs(<<<JS
    $(document).ready(function() {
        $('.image-link').magnificPopup({type:'image'});
    });
JS
);

?>

<!-- 
<div class="row">

        <div class="col-xs-4 grid-item">

            <?php //echo Html::img($item->img, ['class' => 'img img-responsive img-thumbnail'])   ?>
        </div>


</div> -->