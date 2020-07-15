<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menú') ?></li>
        <li><?= $this->Html->link(__('Volver'), ['controller'=>'users','action' => 'view', $iduser]) ?> </li>
    </ul>
</nav>
<div class="heading view large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?php echo __('Introduzca los datos') ?>
        <tr>
            <td><?= $this->Form->control('deporte', array('options'=>['Padel','Tenis','FS','F7','Voleibol','Baloncesto','F11'], 'required' => true))?></td>            
            <td><?= $this->Form->control('fecha', ['label'=>'Día', 'class' => 'datepicker', 'empty' => true, 'required' => true])?></td>
            <td><?= $this->Form->control('hora', array('label'=>'Franja horaria', 'options'=>['09:00-14:00','15:00-19:00','20:00-22:00'], 'required' => true))?></td>
    </fieldset>
    <?= $this->Form->button(__('Aceptar')) ?>
    <?= $this->Form->end() ?>
</div>
<script>
    $(function () {
        $('.datepicker').datepicker({ 
            minDate : 0, 
            maxDate : +14, 
            dateFormat : 'yy-mm-dd'});
    });
</script>
