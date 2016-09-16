<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Problems;

/**
 * ProblemsSearch represents the model behind the search form about `frontend\models\Problems`.
 */
class ProblemsSearch extends Problems
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'courses_id'], 'integer'],
            [['title', 'description', 'created_date', 'duedate', 'files'], 'safe'],
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
        $query = Problems::find();

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
            'created_date' => $this->created_date,
            'duedate' => $this->duedate,
            'courses_id' => $this->courses_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'files', $this->files]);

        return $dataProvider;
    }
}
