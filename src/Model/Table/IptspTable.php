<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Iptsp Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CallbackHistoryTable&\Cake\ORM\Association\HasMany $CallbackHistory
 *
 * @method \App\Model\Entity\Iptsp get($primaryKey, $options = [])
 * @method \App\Model\Entity\Iptsp newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Iptsp[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Iptsp|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Iptsp saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Iptsp patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Iptsp[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Iptsp findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class IptspTable extends Table
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

        $this->setTable('iptsp');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('CallbackHistory', [
            'foreignKey' => 'iptsp_id',
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
            ->scalar('iptsp_user')
            ->maxLength('iptsp_user', 64)
            ->requirePresence('iptsp_user', 'create')
            ->notEmptyString('iptsp_user');

        $validator
            ->scalar('iptsp_password')
            ->maxLength('iptsp_password', 64)
            ->requirePresence('iptsp_password', 'create')
            ->notEmptyString('iptsp_password');

        $validator
            ->scalar('iptsp_ip')
            ->maxLength('iptsp_ip', 15)
            ->requirePresence('iptsp_ip', 'create')
            ->notEmptyString('iptsp_ip');

        $validator
            ->integer('iptsp_port')
            ->requirePresence('iptsp_port', 'create')
            ->notEmptyString('iptsp_port');

        $validator
            ->scalar('iptsp_number')
            ->maxLength('iptsp_number', 15)
            ->requirePresence('iptsp_number', 'create')
            ->notEmptyString('iptsp_number');

        $validator
            ->scalar('forwarding_number')
            ->maxLength('forwarding_number', 255)
            ->requirePresence('forwarding_number', 'create')
            ->notEmptyString('forwarding_number');

        $validator
            ->integer('last_registered')
            // ->requirePresence('last_registered', 'create')
            ->allowEmptyString('last_registered');

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

        return $rules;
    }
}
