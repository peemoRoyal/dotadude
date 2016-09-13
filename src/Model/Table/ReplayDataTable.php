<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ReplayData Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Matches
 *
 * @method \App\Model\Entity\ReplayData get($primaryKey, $options = [])
 * @method \App\Model\Entity\ReplayData newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ReplayData[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ReplayData|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ReplayData patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ReplayData[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ReplayData findOrCreate($search, callable $callback = null)
 */
class ReplayDataTable extends Table
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

        $this->table('replay_data');
        $this->displayField('replay_file');
        $this->primaryKey('id');

        // $this->belongsTo('Matches', [
        //     'foreignKey' => 'match_id'
        // ]);
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
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('replay_file', 'create')
            ->notEmpty('replay_file');

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
        $rules->add($rules->existsIn(['match_id'], 'Matches'));

        return $rules;
    }
}
