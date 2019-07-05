<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Grade Entity
 *
 * @property int $id
 * @property int $calification
 * @property \Cake\I18n\FrozenTime|null $published
 * @property int $course_id
 * @property int $inscription_id
 *
 * @property \App\Model\Entity\Course $course
 * @property \App\Model\Entity\Inscription $inscription
 */
class Grade extends Entity
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
        'calification' => true,
        'published' => true,
        'course_id' => true,
        'inscription_id' => true,
        'course' => true,
        'inscription' => true
    ];
}
