<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CallbackHistory Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\IptspsTable&\Cake\ORM\Association\BelongsTo $Iptsps
 *
 * @method \App\Model\Entity\CallbackHistory get($primaryKey, $options = [])
 * @method \App\Model\Entity\CallbackHistory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CallbackHistory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CallbackHistory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CallbackHistory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CallbackHistory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CallbackHistory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CallbackHistory findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CallbackHistoryTable extends Table
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

        $this->setTable('callback_history');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Iptsp', [
            'foreignKey' => 'iptsp_id',
            'joinType' => 'INNER',
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
            ->scalar('call_from')
            ->maxLength('call_from', 15)
            ->requirePresence('call_from', 'create')
            ->notEmptyString('call_from');

        $validator
            ->scalar('call_to')
            ->maxLength('call_to', 15)
            ->requirePresence('call_to', 'create')
            ->notEmptyString('call_to');

        $validator
            ->requirePresence('call_status', 'create')
            ->notEmptyString('call_status');

        $validator
            ->integer('call_duration')
            ->requirePresence('call_duration', 'create')
            ->notEmptyString('call_duration');

        $validator
            ->integer('connect_time')
            ->requirePresence('connect_time', 'create')
            ->notEmptyString('connect_time');

        $validator
            ->integer('establish_time')
            ->requirePresence('establish_time', 'create')
            ->notEmptyString('establish_time');

        $validator
            ->integer('disconnect_time')
            ->requirePresence('disconnect_time', 'create')
            ->notEmptyString('disconnect_time');

        $validator
            ->integer('disconnect_cause')
            ->requirePresence('disconnect_cause', 'create')
            ->notEmptyString('disconnect_cause');

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
        $rules->add($rules->existsIn(['client_id'], 'Clients'));
        $rules->add($rules->existsIn(['iptsp_id'], 'Iptsps'));

        return $rules;
    }
}
