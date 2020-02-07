<?php

namespace app\modules\catalog\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\catalog\models\CS;

/**
 * SearchCatalog represents the model behind the search form about `app\modules\catalog\models\Catalog`.
 */
class SearchCatalog extends CS {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'parent_id', 'user_id', 'news_type', 'act', 'ord', 'visit_counter'], 'integer'],
            [['model', 'name', 'h1', 'anons', 'news_date', 'content', 'content2', 'url', 'title', 'keywords', 'description', 'create_time', 'update_time', 'image', 'file', 'priority'], 'safe'],
            [['price', 'price2'], 'number'],
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
        $query = CS::find()->where(['model' => 'ProductionCategory']);

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
            'parent_id' => $this->parent_id,
            'user_id' => $this->user_id,
            'news_date' => $this->news_date,
            'news_type' => $this->news_type,
            'act' => $this->act,
            'ord' => $this->ord,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'visit_counter' => $this->visit_counter,
            'price' => $this->price,
            'price2' => $this->price2,
        ]);

        $query->andFilterWhere(['like', 'model', $this->model])
                ->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'h1', $this->h1])
                ->andFilterWhere(['like', 'anons', $this->anons])
                ->andFilterWhere(['like', 'content', $this->content])
                ->andFilterWhere(['like', 'content2', $this->content2])
                ->andFilterWhere(['like', 'url', $this->url])
                ->andFilterWhere(['like', 'title', $this->title])
                ->andFilterWhere(['like', 'keywords', $this->keywords])
                ->andFilterWhere(['like', 'description', $this->description])
                ->andFilterWhere(['like', 'image', $this->image])
                ->andFilterWhere(['like', 'file', $this->file])
                ->andFilterWhere(['like', 'priority', $this->priority]);

        return $dataProvider;
    }

}
