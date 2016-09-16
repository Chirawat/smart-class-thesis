<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Turnins;

/**
 * TurninsSearch represents the model behind the search form about `frontend\models\Turnins`.
 */
class TurninsSearch extends Turnins
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'problems_id', 'user_id', 'score'], 'integer'],
            [['answer', 'files', 'date'], 'safe'],
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
        $query = Turnins::find();

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
            'problems_id' => $this->problems_id,
            'user_id' => $this->user_id,
            'date' => $this->date,
            'score' => $this->score,
        ]);

        $query->andFilterWhere(['like', 'answer', $this->answer])
            ->andFilterWhere(['like', 'files', $this->files]);

        return $dataProvider;
    }
}
