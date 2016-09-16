<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Scaffolding;

/**
 * ScaffoldingSearch represents the model behind the search form about `frontend\models\Scaffolding`.
 */
class ScaffoldingSearch extends Scaffolding
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['problems_id'], 'integer'],
            [['scaff1', 'scaff2', 'scaff3', 'scaff4'], 'safe'],
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
        $query = Scaffolding::find();

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
            'problems_id' => $this->problems_id,
        ]);

        $query->andFilterWhere(['like', 'scaff1', $this->scaff1])
            ->andFilterWhere(['like', 'scaff2', $this->scaff2])
            ->andFilterWhere(['like', 'scaff3', $this->scaff3])
            ->andFilterWhere(['like', 'scaff4', $this->scaff4]);

        return $dataProvider;
    }
}
