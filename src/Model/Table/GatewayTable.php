<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Gateway Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CampaignsTable&\Cake\ORM\Association\HasMany $Campaigns
 *
 * @method \App\Model\Entity\Gateway get($primaryKey, $options = [])
 * @method \App\Model\Entity\Gateway newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Gateway[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Gateway|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Gateway saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Gateway patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Gateway[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Gateway findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GatewayTable extends Table
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

        $this->setTable('gateway');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'joinType' => 'LEFT',
        ]);
        $this->hasMany('Campaigns', [
            'foreignKey' => 'gateway_id',
        ]);
    }
    
    public function getCodecs(){
      return [18=>'G729',0=>'ULAW',8=>'ALAW'];
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
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('ip')
            ->maxLength('ip', 100)
            ->requirePresence('ip', 'create')
            ->notEmptyString('ip');

        $validator
            ->integer('port')
            ->requirePresence('port', 'create')
            ->notEmptyString('port');

        $validator
            ->decimal('call_rate')
            // ->requirePresence('call_rate', 'create')
            ->allowEmptyString('call_rate');

        $validator
            ->integer('call_pulse')
            ->allowEmptyString('call_pulse');

        $validator
            ->decimal('service_rate')
            // ->requirePresence('service_rate', 'create')
            ->allowEmptyString('service_rate');

        $validator
            ->scalar('user')
            ->maxLength('user', 100)
            ->requirePresence('user', 'create')
            ->notEmptyString('user');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            // ->scalar('prefix')
            // ->maxLength('prefix', 255)
            // ->requirePresence('prefix', 'create')
            ->allowEmptyString('prefix');

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
        // $rules->add($rules->isUnique(['user']));
        // $rules->add($rules->existsIn(['client_id'], 'Clients'));

        return $rules;
    }
}
