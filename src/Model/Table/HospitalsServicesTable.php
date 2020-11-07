<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HospitalsServices Model
 *
 * @property \App\Model\Table\HospitalsTable&\Cake\ORM\Association\BelongsTo $Hospitals
 * @property \App\Model\Table\ServicesTable&\Cake\ORM\Association\BelongsTo $Services
 *
 * @method \App\Model\Entity\HospitalsService newEmptyEntity()
 * @method \App\Model\Entity\HospitalsService newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\HospitalsService[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HospitalsService get($primaryKey, $options = [])
 * @method \App\Model\Entity\HospitalsService findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\HospitalsService patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\HospitalsService[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\HospitalsService|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HospitalsService saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HospitalsService[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\HospitalsService[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\HospitalsService[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\HospitalsService[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class HospitalsServicesTable extends Table
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

        $this->setTable('hospitals_services');
        $this->setDisplayField('service_id');
        $this->setPrimaryKey(['service_id', 'hospital_id']);

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
            ->integer('beds_total')
            ->notEmptyString('beds_total');

        $validator
            ->integer('beds_available')
            ->notEmptyString('beds_available');

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
        $rules->add($rules->existsIn(['service_id'], 'Services'), ['errorField' => 'service_id']);

        return $rules;
    }
}
