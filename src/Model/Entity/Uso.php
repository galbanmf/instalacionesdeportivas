<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Uso Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $fecha
 * @property \Cake\I18n\FrozenTime $hora_inicio
 * @property \Cake\I18n\FrozenTime $hora_fin
 * @property bool $disponible
 * @property float $precio
 * @property int $pista_id
 *
 * @property \App\Model\Entity\Pista $pista
 */
class Uso extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'fecha' => true,
        'hora_inicio' => true,
        'hora_fin' => true,
        'disponible' => true,
        'precio' => true,
        'pista_id' => true,
        'pista' => true,
    ];
}
