<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Consultations Model
 *
 * @property \App\Model\Table\MedicalRecordsTable&\Cake\ORM\Association\BelongsTo $MedicalRecords
 * @property \App\Model\Table\HospitalsTable&\Cake\ORM\Association\BelongsTo $Hospitals
 * @property \App\Model\Table\ServicesTable&\Cake\ORM\Association\BelongsTo $Services
 *
 * @method \App\Model\Entity\Consultation newEmptyEntity()
 * @method \App\Model\Entity\Consultation newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Consultation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Consultation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Consultation findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Consultation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Consultation[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Consultation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Consultation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Consultation[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Consultation[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Consultation[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Consultation[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ConsultationsTable extends Table
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

        $this->setTable('consultations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('MedicalRecords', [
            'foreignKey' => 'medical_record_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Hospitals', [
            'foreignKey' => 'hospital_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Services', [
            'foreignKey' => 'service_id',
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->dateTime('consultation_date')
            ->requirePresence('consultation_date', 'create')
            ->notEmptyDateTime('consultation_date');

        $validator
            ->scalar('doctor_dni')
            ->maxLength('doctor_dni', 20)
            ->requirePresence('doctor_dni', 'create')
            ->notEmptyString('doctor_dni');

        $validator
            ->scalar('diagnosis')
            ->maxLength('diagnosis', 200)
            ->requirePresence('diagnosis', 'create')
            ->notEmptyString('diagnosis');

        $validator
            ->scalar('treatment')
            ->maxLength('treatment', 400)
            ->requirePresence('treatment', 'create')
            ->notEmptyString('treatment');

        $validator
            ->boolean('is_admitted')
            ->notEmptyString('is_admitted');

        $validator
            ->integer('room')
            ->allowEmptyString('room');

        $validator
            ->dateTime('discharged_date')
            ->allowEmptyDateTime('discharged_date');

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
        $rules->add($rules->existsIn(['medical_record_id'], 'MedicalRecords'), ['errorField' => 'medical_record_id']);
        $rules->add($rules->existsIn(['hospital_id'], 'Hospitals'), ['errorField' => 'hospital_id']);
        $rules->add($rules->existsIn(['service_id'], 'Services'), ['errorField' => 'service_id']);

        return $rules;
    }
}
