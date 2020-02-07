<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?= $this->render('_print_item_table_header', ['is_nds' => $is_nds]) ?>

<?= $this->render('_print_item', ['model' => $model, 'is_first' => true]) ?>