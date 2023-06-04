<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Campaigns Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CallsTable&\Cake\ORM\Association\BelongsTo $Calls
 * @property \App\Model\Table\GatewaysTable&\Cake\ORM\Association\BelongsTo $Gateways
 *
 * @method \App\Model\Entity\Campaign get($primaryKey, $options = [])
 * @method \App\Model\Entity\Campaign newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Campaign[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Campaign|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Campaign saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Campaign patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Campaign[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Campaign findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CampaignsTable extends Table
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

        $this->setTable('campaigns');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('Audios', [
            'foreignKey' => 'audios_id',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('Gateway', [
            'foreignKey' => 'gateway_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('PbxGateway', [
            'className' =>  'Gateway',
            'foreignKey' => 'pbx_gateway_id',
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        // $validator
            // ->scalar('file_name')
            // ->maxLength('file_name', 255)
            // ->requirePresence('file_name', 'create')
            // ->allowEmptyString('file_name');

        $validator
            ->scalar('contact_groups')
            ->maxLength('contact_groups', 255)
            ->requirePresence('contact_groups', 'create')
            ->notEmptyString('contact_groups');

        $validator
            ->integer('call_duration')
            // ->requirePresence('call_duration', 'create')
            ->allowEmptyString('call_duration');

        $validator
            ->integer('frequency')
            ->requirePresence('frequency', 'create')
            ->notEmptyString('frequency');

        $validator
            // ->requirePresence('dialing', 'create')
            ->allowEmptyString('dialing');

        $validator
            // ->requirePresence('received', 'create')
            ->allowEmptyString('received');

        $validator
            // ->requirePresence('failed', 'create')
            ->allowEmptyString('failed');

        $validator
            // ->requirePresence('busy', 'create')
            ->allowEmptyString('busy');

        $validator
            ->integer('max_call_duration')
            ->requirePresence('max_call_duration', 'create')
            ->notEmptyString('max_call_duration');

        $validator
            ->integer('max_call_retry')
            ->requirePresence('max_call_retry', 'create')
            ->notEmptyString('max_call_retry');

        $validator
            ->integer('time_between_retries')
            ->requirePresence('time_between_retries', 'create')
            ->notEmptyString('time_between_retries');

        $validator
            ->integer('play_count')
            ->notEmptyString('play_count');

        $validator
            ->integer('caller_id_number')
            // ->requirePresence('caller_id_number', 'create')
            ->allowEmptyString('caller_id_number');

        $validator
            ->scalar('description')
            ->maxLength('description', 16777215)
            // ->requirePresence('description', 'create')
            ->allowEmptyString('description');

        $validator
            ->scalar('weekdays')
            ->maxLength('weekdays', 100)
            ->requirePresence('weekdays', 'create')
            ->notEmptyString('weekdays');

        $validator
            ->date('start_at')
            ->requirePresence('start_at', 'create')
            ->notEmptyDate('start_at');

        $validator
            ->date('finished_at')
            ->requirePresence('finished_at', 'create')
            ->notEmptyDate('finished_at');

        $validator
            ->time('daily_start_time')
            ->requirePresence('daily_start_time', 'create')
            ->notEmptyTime('daily_start_time');

        $validator
            ->time('daily_stop_time')
            ->requirePresence('daily_stop_time', 'create')
            ->notEmptyTime('daily_stop_time');

        $validator
            ->scalar('timezone')
            ->maxLength('timezone', 255)
            // ->requirePresence('timezone', 'create')
            ->allowEmptyString('timezone');
        
        $validator
            ->scalar('sms')
            ->maxLength('sms', 16777215)
            // ->requirePresence('description', 'create')
            ->allowEmptyString('sms');


        $validator
            ->notEmptyString('status');

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
        $rules->add($rules->existsIn(['audios_id'], 'Audios'));
        $rules->add($rules->existsIn(['gateway_id'], 'Gateway'));
        
        return $rules;
    }
}
