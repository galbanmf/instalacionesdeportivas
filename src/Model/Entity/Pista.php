<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pista Entity
 *
 * @property int $id
 * @property string $nombre
 * @property float $precio_hora
 * @property int|null $instalation_id
 *
 * @property \App\Model\Entity\Instalation $instalation
 * @property \App\Model\Entity\Uso[] $usos
 */
class Pista extends Entity
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
        'nombre' => true,
        'precio_hora' => true,
        'instalation_id' => true,
        'instalation' => true,
        'usos' => true,
    ];
}
