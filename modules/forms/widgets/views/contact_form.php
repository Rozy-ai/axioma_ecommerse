<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;
use yii\captcha\Captcha;

$this->registerJsFile('@web/js/form/contact_form.js', ['depends' => ['app\assets\AppAsset']]);
?>
<?php
$form = ActiveForm::begin([
    'id' => 'contact-form',
    'enableClientValidation' => true,
    'action' => '/forms/default/contact-form',
    'options' => ['enctype' => 'multipart/form-data']
]);
?>
<style>
    #files-area {
        /* width: 30%;
        width: 30%;
        margin: 0 11% 0 auto;
        display: flex; */
    }

    .file-block {
        border-radius: 10px;
        /* background-color: rgba(144, 163, 203, 0.2); */
        margin: 5px;
        color: initial;
        display: flex;
        justify-content: right;

        &>span.name {
            padding-right: 10px;
            width: max-content;
            display: inline-flex;
        }
    }

    .file-delete {
        display: flex;
        width: 24px;
        color: initial;
        background-color: #6eb4ff00;
        font-size: large;
        justify-content: center;
        margin-right: 3px;
        cursor: pointer;

        &:hover {
            background-color: rgba(144, 163, 203, 0.2);
            border-radius: 10px;
        }

        &>span {
            transform: rotate(45deg);
        }
    }

    input[type="file"]:focus {
        outline: none;
    }

    .field-fileInput label.control-label {
        right: 15%;
        top: 0!important;
        left: auto!important;
    }
    .help-block{
        display: flex;
    }
</style>
<div class="home-contact-form">
    <p>Возникли вопросы ?</p>
    <p class="h2">Получить консультацию специалиста</p>
    <div class="row contact-fields">
        <div class="row">
            <div class="col-xs-12 col-md-3">

                <?= $form->field($model, 'title')->hiddenInput()->label(false); ?>

                <?=
                    $form->field($model, 'name')->textInput()
                    ?>
                <?=
                    $form->field($model, 'phone')->widget(MaskedInput::className(), [
                        'mask' => '+7 (999) 999-9999',
                        'options' => ['class' => 'form-control'],
                    ])
                    ?>

                <?=
                    $form->field($model, 'email')->textInput([
                        'type' => 'email'
                    ])
                    ?>


                <div class="form-group fileds-radio">
                    <input type="radio" name="option" value="option1" checked id="option1">
                    Получить ответ на e-mail
                    &nbsp;
                    <input type="radio" name="option" value="option2" id="option2">
                    Перезвонить
                </div>

            </div>
            <div class="col-xs-12 col-md-9">
                <?=
                    $form->field($model, 'message')->textarea([
                        'placeholder' => 'Текст вопроса ...',
                        'rows' => 7,
                    ])
                    ?>
                <!-- <span id="fileName"></span> -->
                <?= $form->field($model, 'file')->fileInput(['id' => 'fileInput', 'class' => 'custom-file-input', 'multiple' => true])->label('<i class="fas fa-paperclip" style="color: #b8cc76;"></i>') ?>
            </div>
            <div class="col-xs-12 col-md-9 text-right" style="display: flex;justify-content: end;">
                <p id="files-area">
                    <span id="filesList">
                        <span id="files-names"></span>
                    </span>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <!-- <p class="star-text">*Поля обязательны для заполнения</p> -->
                <p class="politic-text">*Нажимая кнопку «Отправить» Вы соглашаетесь с
                    <a href="/soglasie">политикой конфиденциальности</a> сайта.
                </p>
                <p>**Вы можете самостоятельно связаться со специалистом компании «Аксиома» по бесплатному номеру
                    телефону 8
                    (800) 333-54-83</p>
            </div>
            <div class="col-xs-12 col-md-3">
                <div class="form-group button-wrap">
                    <?=
                        Html::submitButton('Отправить', [
                            'class' => 'btn btn-primary',
                        ])
                        ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php

$script = <<<JS
    $('#contact-form').on('beforeSubmit', function (e) {
        ym(53040199,'reachGoal','feed-back');
    });
//     const option1 = document.getElementById('option1');
// const option2 = document.getElementById('option2');
// const option1Data = document.getElementById('option1-data');
// const option2Data = document.getElementById('option2-data');

// option1.addEventListener('change', function() {
//   if (this.checked) {
//     option1Data.style.display = 'block';
//     option2Data.style.display = 'none';
//   }
// });

// option2.addEventListener('change', function() {
//   if (this.checked) {
//     option1Data.style.display = 'none';
//     option2Data.style.display = 'block';
//   }
// });

        // $('#fileInput').change(function(){
        //     var fileNames = '';
        //     for (var i = 0; i < $(this)[0].files.length; i++) {
        //         fileNames += $(this)[0].files[i].name + ', ';
        //     }
        //     $('#fileName').text(fileNames.slice(0, -2)); // Remove the last comma and space
        // });
        const dt = new DataTransfer(); // Permet de manipuler les fichiers de l'input file

$("#fileInput").on('change', function(e){
	for(var i = 0; i < this.files.length; i++){
		let fileBloc = $('<span/>', {class: 'file-block'}),
			 fileName = $('<span/>', {class: 'name', text: this.files.item(i).name});
		fileBloc.append(fileName).append('<span class="file-delete"><span>+</span></span>');
		$("#filesList > #files-names").append(fileBloc);
	};
	// Ajout des fichiers dans l'objet DataTransfer
	for (let file of this.files) {
		dt.items.add(file);
	}
	// Mise à jour des fichiers de l'input file après ajout
	this.files = dt.files;

	// EventListener pour le bouton de suppression créé
	$('span.file-delete').click(function(){
		let name = $(this).next('span.name').text();
		// Supprimer l'affichage du nom de fichier
		$(this).parent().remove();
		for(let i = 0; i < dt.items.length; i++){
			// Correspondance du fichier et du nom
			if(name === dt.items[i].getAsFile().name){
				// Suppression du fichier dans l'objet DataTransfer
				dt.items.remove(i);
				continue;
			}
		}
		// Mise à jour des fichiers de l'input file après suppression
		document.getElementById('fileInput').files = dt.files;
	});
});
JS;
$this->registerJs($script, \yii\web\View::POS_READY, );

?>


<?php
ActiveForm::end();
?>