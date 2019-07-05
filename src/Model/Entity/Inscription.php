<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Inscription Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $courses_id
 * @property string $year
 * @property int $cycle
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Course $course
 * @property \App\Model\Entity\Grade[] $grades
 */
class Inscription extends Entity
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
        'user_id' => true,
        'courses_id' => true,
        'year' => true,
        'cycle' => true,
        'user' => true,
        'course' => true,
        'grades' => true
    ];
}
