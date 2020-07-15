<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
 </nav>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menú') ?></li>
        <li><?= $this->Html->link(__('Volver'), ['controller'=>'users','action' => 'view', $iduser]) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= 'Seleccione una opción' ?></h3>
    <table class="vertical-table">
        <tr><td><?= $this->Html->link(('Padel'), ['action' => 'aluso', 'Padel' ]) ?></td>
        <td><?= $this->Html->link(('Tenis'), ['action' => 'aluso', 'Tenis']) ?></td>
        <td><?= $this->Html->link(('Fútbol Sala'), ['action' => 'aluso', 'FS']) ?></td>
        <td><?= $this->Html->link(('Fútbol 7'), ['action' => 'aluso', 'F7']) ?></td>
        <td><?= $this->Html->link(('Atletismo'), ['action' => 'aluso', 'Atletismo']) ?></td>
        <td><?= $this->Html->link(('Baloncesto'), ['action' => 'aluso', 'Baloncesto']) ?></td>
        <td><?= $this->Html->link(('Natación'), ['action' => 'aluso', 'Natación']) ?></td></tr>
    </table>
</div>