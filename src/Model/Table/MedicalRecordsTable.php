<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MedicalRecords Model
 *
 * @property \App\Model\Table\LocationsTable&\Cake\ORM\Association\BelongsTo $Locations
 * @property \App\Model\Table\ConsultationsTable&\Cake\ORM\Association\HasMany $Consultations
 *
 * @method \App\Model\Entity\MedicalRecord newEmptyEntity()
 * @method \App\Model\Entity\MedicalRecord newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\MedicalRecord[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MedicalRecord get($primaryKey, $options = [])
 * @method \App\Model\Entity\MedicalRecord findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\MedicalRecord patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MedicalRecord[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\MedicalRecord|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MedicalRecord saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MedicalRecord[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MedicalRecord[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\MedicalRecord[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MedicalRecord[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MedicalRecordsTable extends Table
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

        $this->setTable('medical_records');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Consultations', [
            'foreignKey' => 'medical_record_id',
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('dni')
            ->maxLength('dni', 20)
            ->requirePresence('dni', 'create')
            ->notEmptyString('dni')
            ->add('dni', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
            ->scalar('phone')
            ->maxLength('phone', 20)
            ->requirePresence('phone', 'create')
            ->notEmptyString('phone');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('address')
            ->maxLength('address', 500)
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

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
        $rules->add($rules->isUnique(['dni']), ['errorField' => 'dni']);
        $rules->add($rules->existsIn(['location_id'], 'Locations'), ['errorField' => 'location_id']);

        return $rules;
    }
}
