<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\App;

/**
 * AppSearch represents the model behind the search form about `common\models\App`.
 */
class AppSearch extends App
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'mobile1', 'mobile2', 'status', 'created_by', 'updated_by', 'is_deleted'], 'integer'],
            [['name', 'logo_image', 'city', 'about_us', 'email', 'created_at', 'updated_at'], 'safe'],
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
        $query = App::find();

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
            'mobile1' => $this->mobile1,
            'mobile2' => $this->mobile2,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'is_deleted' => $this->is_deleted,
        ]);
        

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'logo_image', $this->logo_image])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'about_us', $this->about_us])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
