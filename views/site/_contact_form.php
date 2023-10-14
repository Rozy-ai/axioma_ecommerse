<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="thanks-contact-form">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-7 thanks">
                <?= app\modules\thanks\widgets\ThanksList::widget(); ?>
            </div>
            <div class="col-xs-12 col-sm-5 contact-form">
                <?= app\modules\forms\widgets\Contact::widget(['path' => 'home']); ?>
            </div>

        </div>
    </div>
</div>