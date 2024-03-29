<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Course Entity
 *
 * @property int $id
 * @property string $name
 * @property int $teoric_hours
 * @property int $practice_hours
 * @property int $credits
 *
 * @property \App\Model\Entity\Grade[] $grades
 */
class Course extends Entity
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
        'name' => true,
        'teoric_hours' => true,
        'practice_hours' => true,
        'credits' => true,
        'grades' => true
    ];
}
