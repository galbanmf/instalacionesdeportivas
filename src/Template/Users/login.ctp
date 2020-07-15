<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="users form">
<?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Por favor, ingrese su email y su contraseña') ?></legend>
        <?= $this->Form->control('username', ['label'=>'Usuario']) ?>
        <?= $this->Form->control('password', ['label'=>'Contraseña']) ?>
    </fieldset>
    <?= $this->Form->button(__('Iniciar sesión')); ?>
    <?= $this->Form->end() ?>
    <ul>
    <div><?= $this->Html->link('He olvidado mi contraseña',array('action'=>'password', 'class'=>'btn btn-info'));?></div>
    </ul>
</div>
