<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Persons Model
 *
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\CitiesTable&\Cake\ORM\Association\BelongsTo $Cities
 * @property \App\Model\Table\OpeningsTable&\Cake\ORM\Association\HasMany $Openings
 * @property \App\Model\Table\PhonesTable&\Cake\ORM\Association\HasMany $Phones
 *
 * @method \App\Model\Entity\Person newEmptyEntity()
 * @method \App\Model\Entity\Person newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Person[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Person get($primaryKey, $options = [])
 * @method \App\Model\Entity\Person findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Person patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Person[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Person|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Person saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Person[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Person[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Person[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Person[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PersonsTable extends Table
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

        $this->setTable('persons');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('CounterCache', [
			'MyUsers' => ['person_count'],
            'Cities' => ['person_count'],
            'Categories' => ['person_count'],
        ]);		

        $this->belongsTo('MyUsers', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Cities', [
            'foreignKey' => 'city_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Openings', [
            'foreignKey' => 'person_id',
        ]);
        $this->hasMany('Phones', [
            'foreignKey' => 'person_id',
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
            ->nonNegativeInteger('category_id')
            ->notEmptyString('category_id');

        $validator
            ->nonNegativeInteger('city_id')
            ->notEmptyString('city_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->maxLength('description', 250)
            ->allowEmptyString('description');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 30)
            ->allowEmptyString('phone');

        $validator
            ->scalar('ext')
            ->maxLength('ext', 20)
            ->allowEmptyString('ext');

        $validator
            ->scalar('phone2')
            ->maxLength('phone2', 30)
            ->allowEmptyString('phone2');

        $validator
            ->scalar('ext2')
            ->maxLength('ext2', 20)
            ->allowEmptyString('ext2');

        $validator
            ->scalar('fax')
            ->maxLength('fax', 30)
            ->allowEmptyString('fax');

        $validator
            ->scalar('ext_fax')
            ->maxLength('ext_fax', 20)
            ->allowEmptyString('ext_fax');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('website')
            ->maxLength('website', 250)
            ->allowEmptyString('website');

        $validator
            ->scalar('address')
            ->maxLength('address', 100)
            ->allowEmptyString('address');

        $validator
            ->scalar('more')
            ->allowEmptyString('more');

        $validator
            ->scalar('keywords')
            ->maxLength('keywords', 250)
            ->allowEmptyString('keywords');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 250)
            ->allowEmptyString('slug');

        $validator
            ->scalar('iconType')
            ->maxLength('iconType', 50)
            ->allowEmptyString('iconType');

        $validator
            ->scalar('icon')
            ->maxLength('icon', 30)
            ->allowEmptyString('icon');

        $validator
            ->scalar('longitude')
            ->maxLength('longitude', 20)
            ->allowEmptyString('longitude');

        $validator
            ->scalar('latitude')
            ->maxLength('latitude', 20)
            ->allowEmptyString('latitude');

        $validator
            ->scalar('googlemap_url')
            ->maxLength('googlemap_url', 1000)
            ->allowEmptyString('googlemap_url');

        $validator
            ->integer('pos')
            ->notEmptyString('pos');

        $validator
            ->boolean('visible')
            ->notEmptyString('visible');

        $validator
            ->scalar('action')
            ->maxLength('action', 10)
            ->notEmptyString('action');

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
        $rules->add($rules->existsIn('category_id', 'Categories'), ['errorField' => 'category_id']);
        $rules->add($rules->existsIn('city_id', 'Cities'), ['errorField' => 'city_id']);

        return $rules;
    }
}
