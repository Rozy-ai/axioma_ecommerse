<?php

use yii\bootstrap\Html;
?>
<?php foreach ($model as $img): ?>
    <div class="col-xs-6">
        <div class="panel panel-default">
            <div class="panel panel-heading">
            </div>
            <div class="panel panel-body">
                <?=
                Html::img('/image/portfolio/' . $img->image
                        , ['class' => 'img img-responsive'])
                ?>
            </div>
            <div class="panel panel-footer">

                <div class="btn-group">
                    <?php if ($img->is_main): ?>

                        <?=
                        Html::button('Главное изображение'
                                , ['class' => 'btn btn-default'
                            , 'id' => $img->id])
                        ?>

                    <?php else: ?>
                        <?=
                        Html::button('Сделать главным'
                                , ['class' => 'btn btn-success  btn-setmain'
                            , 'id' => $img->id])
                        ?>
                    <?php endif; ?>
                    <?=
                    Html::button('Удалить'
                            , ['class' => 'btn btn-danger btn-delete'
                        , 'id' => $img->id])
                    ?>
                </div>
            </div>
        </div>


    </div>
    <?php
endforeach;
