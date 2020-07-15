<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <?php $options=array(1=>'SÍ', 'NO') ?>
    <?php $selected = array(1,2) ?>
    <fieldset>
        <legend><?= __('ACTIVACIÓN CUENTA') ?></legend>
        <?= $this->Form->input('active', ['label' => 'AUTORIZADO', 'type' => 'radio', 'multiple' => 'checkbox', 'options' => $options, 'selected' => $selected]) ?>
    </fieldset>
    <?= $this->Form->button(__('Aceptar')); ?>
    <?= $this->Form->end() ?>
</div>

