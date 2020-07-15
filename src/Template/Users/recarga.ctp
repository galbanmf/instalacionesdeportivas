<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Recarga monedero') ?></legend>
        <?= $this->Form->control('recarga', ['style' => 'width:100px; height:40px;', 'label' => 'Ingrese la cantidad a recargar']) ?>
    </fieldset>
    <?= $this->Form->button(__('Recargar')); ?>
    <?= $this->Form->end() ?>
</div>

