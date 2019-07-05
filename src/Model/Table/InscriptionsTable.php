<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Inscriptions Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CoursesTable|\Cake\ORM\Association\BelongsTo $Courses
 * @property \App\Model\Table\GradesTable|\Cake\ORM\Association\HasMany $Grades
 *
 * @method \App\Model\Entity\Inscription get($primaryKey, $options = [])
 * @method \App\Model\Entity\Inscription newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Inscription[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Inscription|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Inscription saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Inscription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Inscription[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Inscription findOrCreate($search, callable $callback = null, $options = [])
 */
class InscriptionsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('inscriptions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Courses', [
            'foreignKey' => 'courses_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Grades', [
            'foreignKey' => 'inscription_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('year')
            ->requirePresence('year', 'create')
            ->allowEmptyString('year', false);

        $validator
            ->integer('cycle')
            ->requirePresence('cycle', 'create')
            ->allowEmptyString('cycle', false);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['courses_id'], 'Courses'));

        return $rules;
    }
}
