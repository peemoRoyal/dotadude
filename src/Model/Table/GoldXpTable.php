<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GoldXp Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Matches
 *
 * @method \App\Model\Entity\GoldXp get($primaryKey, $options = [])
 * @method \App\Model\Entity\GoldXp newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GoldXp[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GoldXp|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GoldXp patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GoldXp[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GoldXp findOrCreate($search, callable $callback = null)
 */
class GoldXpTable extends Table
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

        $this->table('gold_xp');
        $this->displayField('id');
        $this->primaryKey('id');
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
            ->allowEmpty('net_worth');

        $validator
            ->allowEmpty('hero_name');

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
