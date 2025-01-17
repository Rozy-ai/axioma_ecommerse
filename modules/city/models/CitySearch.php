<?php

namespace app\modules\city\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\city\models\City;

/**
 * CitySearch represents the model behind the search form about `app\modules\city\models\City`.
 */
class CitySearch extends City {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'cid', 'rid', 'is_enable'], 'integer'],
            [['name', 'name_eng', 'latitude', 'longitude',], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = City::find();

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
            'cid' => $this->cid,
            'rid' => $this->rid,
            'is_enable' => $this->is_enable,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'name_eng', $this->name_eng])
                ->andFilterWhere(['like', 'latitude', $this->latitude])
                ->andFilterWhere(['like', 'longitude', $this->longitude]);

        return $dataProvider;
    }

}
