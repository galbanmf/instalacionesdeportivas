<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Uso $uso
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menú') ?></li>
        <li><?= $this->Html->link(__('Volver'), ['controller' => 'users', 'action' => 'view', $iduser]) ?> </li>
    </ul>
</nav>
<div class="usos view large-9 medium-8 columns content">
    <h3><?= h('RESERVA') ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($uso->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Precio') ?></th>
            <td><?= h($this->Number->format($uso->precio).' €' ) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($uso->fecha->format('d-m-y')) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora Inicio') ?></th>
            <td><?= h($this->Time->format($uso->hora_inicio, [\IntlDateFormatter::NONE, \IntlDateFormatter::SHORT])) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora Fin') ?></th>
            <td><?= h($this->Time->format($uso->hora_fin, [\IntlDateFormatter::NONE, \IntlDateFormatter::SHORT])) ?></td>
        </tr>
    </table>
    <?= $this->Form->postLink(__('Cancelar Reserva'), ['controller'=>'reservas','action' => 'delete', $id_reserva], ['confirm' => __('¿Seguro que quiere cancelar la reserva?', $id_reserva)]) ?>
</div>
