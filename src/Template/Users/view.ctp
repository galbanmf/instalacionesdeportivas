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
        <li><?= $this->Html->link(__('Editar cuenta'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Html->link(__('Recargar monedero'), ['action' => 'recarga', $user->id]) ?> </li>
        <li><?= $this->Html->link(__('Lista Reservas'), ['controller' => 'Reservas', 'action' => 'index', $user->id]) ?> </li>
        <li><?= $this->Html->link(__('Nueva Reserva'), ['controller' => 'Usos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Cerrar sesión'), ['action' => 'logout']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->username) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Dni') ?></th>
            <td><?= h($user->dni) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($user->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellidos') ?></th>
            <td><?= h($user->apellidos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefono') ?></th>
            <td><?= h($user->telefono) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Saldo Monedero') ?></th>
            <td><?= $this->Number->format($user->saldo_monedero).' €' ?></td>
        </tr>
    </table>
    
</div>
