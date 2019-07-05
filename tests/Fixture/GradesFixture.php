<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * GradesFixture
 */
class GradesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'id nota', 'autoIncrement' => true, 'precision' => null],
        'calification' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'calificacion', 'precision' => null, 'autoIncrement' => null],
        'published' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'comment' => 'fecha publicacion', 'precision' => null],
        'course_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'id curso', 'precision' => null, 'autoIncrement' => null],
        'inscription_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'Codigo usuario', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'course_id' => ['type' => 'index', 'columns' => ['course_id'], 'length' => []],
            'inscription_id' => ['type' => 'index', 'columns' => ['inscription_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'grades_ibfk_1' => ['type' => 'foreign', 'columns' => ['course_id'], 'references' => ['courses', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'grades_ibfk_2' => ['type' => 'foreign', 'columns' => ['inscription_id'], 'references' => ['inscriptions', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_spanish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'calification' => 1,
                'published' => '2019-06-12 19:46:41',
                'course_id' => 1,
                'inscription_id' => 1
            ],
        ];
        parent::init();
    }
}
