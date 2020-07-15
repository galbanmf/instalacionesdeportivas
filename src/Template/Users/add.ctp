<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menú') ?></li>
        <li><?= $this->Html->link(__('Iniciar sesión'), ['action' => 'login']) ?></li>
        <li><?= $this->Html->link(__('Nuestras instalaciones'), ['controller' => 'Reservas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Volver a inicio'), ['controller' => 'Pages','action' => 'home']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Crear Usuario') ?></legend>
        <?php
            echo $this->Form->control('dni',['label'=>'DNI sin la letra','autocomplete'=>'off']);
            echo $this->Form->control('nombre',['autocomplete'=>'off']);
            echo $this->Form->control('apellidos',['autocomplete'=>'off']);
            echo $this->Form->control('telefono',['autocomplete'=>'off']);
            echo $this->Form->control('username',array('label'=>'Email', 'autocomplete'=>'off'));
            echo $this->Form->control('password',array('label'=>'Contraseña', 'type'=>'password', 'autocomplete'=>'off'));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Crear')) ?>
    <?= $this->Form->end() ?>
</div>
