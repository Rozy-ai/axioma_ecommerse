<?php

namespace app\modules\stati\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\stati\models\Stati;

/**
 * NewsSearch represents the model behind the search form about `app\modules\news\models\News`.
 */
class StatiSearch extends Stati {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
//            [['id', 'created_at', 'updated_at', 'publish_at'], 'integer'],
//            [['title', 'preview', 'content', 'seo_title', 'seo_description', 'seo_keywords'], 'safe'],
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
        $query = Stati::find()->where(['parent_id' => SELF::PARENT_ID])->orderBy(['id'=>SORT_DESC]);

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
//            'created_at' => $this->created_at,
//            'updated_at' => $this->updated_at,
//            'publish_at' => $this->publish_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
//                ->andFilterWhere(['like', 'preview', $this->preview])
//                ->andFilterWhere(['like', 'content', $this->content])
//                ->andFilterWhere(['like', 'seo_title', $this->seo_title])
//                ->andFilterWhere(['like', 'seo_description', $this->seo_description])
//                ->andFilterWhere(['like', 'seo_keywords', $this->seo_keywords]);
;
        return $dataProvider;
    }

}
