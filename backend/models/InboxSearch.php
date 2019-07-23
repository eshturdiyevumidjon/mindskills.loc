<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Inbox;

/**
 * InboxSearch represents the model behind the search form about `backend\models\Inbox`.
 */
class InboxSearch extends Inbox
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'from', 'to', 'reply'], 'integer'],
            [['title', 'file', 'text', 'date_cr', 'starred', 'deleted', 'is_read'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Inbox::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'from' => $this->from,
            'to' => $this->to,
            'date_cr' => $this->date_cr,
            'reply' => $this->reply,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'starred', $this->starred])
            ->andFilterWhere(['like', 'deleted', $this->deleted])
            ->andFilterWhere(['like', 'is_read', $this->is_read]);

        return $dataProvider;
    }
}
