<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Doctors Model
 *
 * @property \App\Model\Table\HospitalsTable&\Cake\ORM\Association\BelongsTo $Hospitals
 * @property \App\Model\Table\ServicesTable&\Cake\ORM\Association\BelongsToMany $Services
 *
 * @method \App\Model\Entity\Doctor newEmptyEntity()
 * @method \App\Model\Entity\Doctor newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Doctor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Doctor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Doctor findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Doctor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Doctor[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Doctor|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Doctor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Doctor[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Doctor[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Doctor[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Doctor[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DoctorsTable extends Table
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

        $this->setTable('doctors');
        $this->setDisplayField('name');
        $this->setPrimaryKey('dni');

        $this->belongsTo('Hospitals', [
            'foreignKey' => 'hospital_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Services', [
            'foreignKey' => 'doctor_dni',
            'targetForeignKey' => 'service_id',
            'joinTable' => 'doctors_services',
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
            ->scalar('dni')
            ->maxLength('dni', 20)
            ->allowEmptyString('dni', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 50)
            ->requirePresence('last_name', 'create')
            ->notEmptyString('last_name');

        $validator
            ->date('birthdate')
            ->requirePresence('birthdate', 'create')
            ->notEmptyDate('birthdate');

        $validator
            ->boolean('is_director')
            ->notEmptyString('is_director');

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
        $rules->add($rules->existsIn(['hospital_id'], 'Hospitals'), ['errorField' => 'hospital_id']);

        return $rules;
    }
}
