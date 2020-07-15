<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Installation $installation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menú') ?></li>
        <li><?= $this->Html->link(__('Instalaciones'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="installations view large-9 medium-8 columns content">
    <h3><?= h($installation->nombre) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($installation->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Direccion') ?></th>
            <td><?= h($installation->direccion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefono') ?></th>
            <td><?= h($installation->telefono) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Máquina de bebidas') ?></th>
             <?php
            if ($installation->maquina == 0) {
                $maquina = 'NO';
            }
            else {
                $maquina = 'SÍ';
            }
            ?>
            <td><?= h($maquina) ?></td>
        </tr>
        <tr>
            <th scope="row" class="actions"><?= __(' ') ?></th>
            <td class="actions">
                    <?= $this->Html->link(__('Ver Pistas'), ['controller' => 'pistas' , 'action' => 'viewbyinstallation', $installation->id]) ?>
                </td>
        </tr>
    </table>
</div>
