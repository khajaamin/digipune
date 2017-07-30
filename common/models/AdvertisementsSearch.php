<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Advertisements;

/**
 * AdvertisementsSearch represents the model behind the search form about `common\models\Advertisements`.
 */
class AdvertisementsSearch extends Advertisements
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'app_id', 'status'], 'integer'],
            [['shop_name', 'owner_name', 'image', 'from_date', 'to_date'], 'safe'],
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
        $query = Advertisements::find();

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
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'shop_name', $this->shop_name])
            ->andFilterWhere(['like', 'owner_name', $this->owner_name])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
