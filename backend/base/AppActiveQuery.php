<?php

namespace backend\base;

use yii\db\ActiveQuery;
 
/**
 * Class AppActiveQuery
 * @package app\models
 * @see \app\models\Clients
 */
class AppActiveQuery extends ActiveQuery
{
    /** @var integer Если пользователь является членом какой либо компании, то он должен видеть только объекты своей компании
     *  Эта переменная хранит в себе id компании к которой привязан пользователь
     */
    public $companyId;

    /**
     * @var string Наименования отношения к компании
     */
    public $companyRelationName = 'company';

    /**
     * @inheritdoc
     */
    public function all($db = null)
    {
        if($this->companyId != null) {
            $tableName = $this->getPrimaryTableName();

            $this->andWhere([$tableName . '.company_id' => $this->companyId]);
        }

        return parent::all($db);
    }

    /**
     * @param string $q
     * @param null $db
     * @return array|int|string|\yii\db\ActiveRecord[]
     */
    public function count($q = '*', $db = null)
    {
        if($this->companyId != null)
        {
            $tableName = $this->getPrimaryTableName();

            $this->andWhere([$tableName.'.company_id' => $this->companyId]);
        }

        return parent::count($q, $db);
    }
}