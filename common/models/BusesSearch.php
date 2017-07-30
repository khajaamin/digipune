<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Buses;

/**
 * BusesSearch represents the model behind the search form about `common\models\Buses`.
 */
class BusesSearch extends Buses
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'app_id', 'status'], 'integer'],
            [['source', 'destination', 'arrival_time', 'dept_time', 'route'], 'safe'],
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
        $query = Buses::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'app_id' => $this->app_id,
            'arrival_time' => $this->arrival_time,
            'dept_time' => $this->dept_time,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'source', $this->source])
            ->andFilterWhere(['like', 'destination', $this->destination])
            ->andFilterWhere(['like', 'route', $this->route]);

        return $dataProvider;
    }
}
