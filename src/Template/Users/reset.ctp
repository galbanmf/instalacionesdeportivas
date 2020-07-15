<?php $this->assign('title', 'Melilla Deporte'); ?>
<div class="users form large-9 medium-8 columns content">
    <?php echo $this->Form->create($user) ?>
    <fieldset>
        <legend><?php echo __('Resetear contraseña') ?>
    <?php
        echo $this->Form->input('password', ['required' => true, 'autofocus' => true]); ?>
        <p class="helper">La contraseña debe tener mínimo 4 caracteres</p>
    <?php 
        echo $this->Form->input('confirm_password', ['type' => 'password', 'required' => true]);
    ?>
    </fieldset>
 	<?php echo $this->Form->button(__('Cambiar contraseña')); ?>
    <?php echo $this->Form->end(); ?>
</div>
