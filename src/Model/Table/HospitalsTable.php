<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Hospitals Model
 *
 * @property \App\Model\Table\LocationsTable&\Cake\ORM\Association\BelongsTo $Locations
 * @property \App\Model\Table\ConsultationsTable&\Cake\ORM\Association\HasMany $Consultations
 * @property \App\Model\Table\DoctorsTable&\Cake\ORM\Association\HasMany $Doctors
 * @property \App\Model\Table\DoctorsServicesTable&\Cake\ORM\Association\HasMany $DoctorsServices
 * @property \App\Model\Table\ServicesTable&\Cake\ORM\Association\BelongsToMany $Services
 *
 * @method \App\Model\Entity\Hospital newEmptyEntity()
 * @method \App\Model\Entity\Hospital newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Hospital[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Hospital get($primaryKey, $options = [])
 * @method \App\Model\Entity\Hospital findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Hospital patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Hospital[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Hospital|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Hospital saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Hospital[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Hospital[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Hospital[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Hospital[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class HospitalsTable extends Table
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

        $this->setTable('hospitals');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Consultations', [
            'foreignKey' => 'hospital_id',
        ]);
        $this->hasMany('Doctors', [
            'foreignKey' => 'hospital_id',
        ]);
        $this->hasMany('DoctorsServices', [
            'foreignKey' => 'hospital_id',
        ]);
        $this->belongsToMany('Services', [
            'foreignKey' => 'hospital_id',
            'targetForeignKey' => 'service_id',
            'joinTable' => 'hospitals_services',
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
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 20)
            ->requirePresence('phone', 'create')
            ->notEmptyString('phone');

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
        $rules->add($rules->existsIn(['location_id'], 'Locations'), ['errorField' => 'location_id']);

        return $rules;
    }
}
