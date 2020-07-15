<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pistas Model
 *
 * @property \App\Model\Table\InstalationsTable&\Cake\ORM\Association\BelongsTo $Instalations
 * @property \App\Model\Table\UsosTable&\Cake\ORM\Association\HasMany $Usos
 *
 * @method \App\Model\Entity\Pista get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pista newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pista[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pista|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pista saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pista patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pista[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pista findOrCreate($search, callable $callback = null, $options = [])
 */
class PistasTable extends Table
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

        $this->setTable('pistas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Installations', [
            'foreignKey' => 'installation_id',
        ]);
        $this->hasMany('Usos', [
            'foreignKey' => 'pista_id',
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('nombre')
            ->maxLength('nombre', 255)
            ->requirePresence('nombre', 'create')
            ->notEmptyString('nombre');

        $validator
            ->decimal('precio_hora')
            ->requirePresence('precio_hora', 'create')
            ->notEmptyString('precio_hora');

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
        $rules->add($rules->existsIn(['instalation_id'], 'Instalations'));

        return $rules;
    }
}
