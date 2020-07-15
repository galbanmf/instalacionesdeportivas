<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Installations Model
 *
 * @method \App\Model\Entity\Installation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Installation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Installation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Installation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Installation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Installation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Installation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Installation findOrCreate($search, callable $callback = null, $options = [])
 */
class InstallationsTable extends Table
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

        $this->setTable('installations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        
        $this->hasMany('Pistas', [
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
            ->scalar('direccion')
            ->maxLength('direccion', 255)
            ->requirePresence('direccion', 'create')
            ->notEmptyString('direccion');

        $validator
            ->scalar('telefono')
            ->maxLength('telefono', 9)
            ->requirePresence('telefono', 'create')
            ->notEmptyString('telefono');

        return $validator;
    }
}
