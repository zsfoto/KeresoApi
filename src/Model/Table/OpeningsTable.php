<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Openings Model
 *
 * @method \App\Model\Entity\Opening newEmptyEntity()
 * @method \App\Model\Entity\Opening newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Opening[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Opening get($primaryKey, $options = [])
 * @method \App\Model\Entity\Opening findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Opening patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Opening[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Opening|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Opening saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Opening[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Opening[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Opening[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Opening[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OpeningsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('openings');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('MyUsers', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Persons', [
            'foreignKey' => 'person_id',
            'joinType' => 'INNER',
        ]);

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('user_id')
            ->maxLength('user_id', 36)
            ->notEmptyString('user_id');

        $validator
            ->nonNegativeInteger('person_id')
            ->requirePresence('person_id', 'create')
            ->notEmptyString('person_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 200)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('hour_from')
            ->maxLength('hour_from', 100)
            ->allowEmptyString('hour_from');

        $validator
            ->scalar('hour_to')
            ->maxLength('hour_to', 100)
            ->allowEmptyString('hour_to');

        $validator
            ->scalar('comment')
            ->maxLength('comment', 1000)
            ->allowEmptyString('comment');

        $validator
            ->integer('pos')
            ->allowEmptyString('pos');

        $validator
            ->boolean('visible')
            ->allowEmptyString('visible');

        $validator
            ->scalar('action')
            ->maxLength('action', 10)
            ->allowEmptyString('action');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('person_id', 'Persons'), ['errorField' => 'person_id']);
        $rules->add($rules->existsIn('user_id', 'MyUsers'), ['errorField' => 'user_id']);

        return $rules;
    }

}
