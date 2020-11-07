<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DoctorsServices Model
 *
 * @property \App\Model\Table\ServicesTable&\Cake\ORM\Association\BelongsTo $Services
 * @property \App\Model\Table\HospitalsTable&\Cake\ORM\Association\BelongsTo $Hospitals
 *
 * @method \App\Model\Entity\DoctorsService newEmptyEntity()
 * @method \App\Model\Entity\DoctorsService newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\DoctorsService[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DoctorsService get($primaryKey, $options = [])
 * @method \App\Model\Entity\DoctorsService findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\DoctorsService patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DoctorsService[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DoctorsService|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DoctorsService saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DoctorsService[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DoctorsService[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\DoctorsService[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DoctorsService[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DoctorsServicesTable extends Table
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

        $this->setTable('doctors_services');
        $this->setDisplayField('doctor_dni');
        $this->setPrimaryKey(['doctor_dni', 'service_id', 'hospital_id']);

        $this->belongsTo('Services', [
            'foreignKey' => 'service_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Hospitals', [
            'foreignKey' => 'hospital_id',
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
            ->scalar('doctor_dni')
            ->maxLength('doctor_dni', 20)
            ->allowEmptyString('doctor_dni', null, 'create');

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
        $rules->add($rules->existsIn(['service_id'], 'Services'), ['errorField' => 'service_id']);
        $rules->add($rules->existsIn(['hospital_id'], 'Hospitals'), ['errorField' => 'hospital_id']);

        return $rules;
    }
}
