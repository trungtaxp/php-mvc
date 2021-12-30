<h1>Create an account</h1>
<?php
use app\core\form\Form;
?>

<?php $form = Form::begin('', "post") ?>
<div class="row">
    <div class="col">
        <?php echo $form->field($model, 'Firstname') ?>
    </div>
    <div class="col">
        <?php echo $form->field($model, 'Lastname') ?>
    </div>
</div>
<?php echo $form->field($model, 'Email') ?>
<?php echo $form->field($model, 'Password')->passwordField() ?>
<?php echo $form->field($model, 'PasswordConfirm')->passwordField() ?>
<button class="btn btn-success">Submit</button>
<?php Form::end() ?>