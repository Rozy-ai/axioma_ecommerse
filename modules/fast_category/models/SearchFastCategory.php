<?php

namespace app\modules\fast_category\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\fast_category\models\FastCategory;

/**
 * SearchCategory represents the model behind the search form about `app\models\Category`.
 */
class SearchFastCategory extends FastCategory {
    

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
//            [['id', 'parent_id', 'parent_id2', 'ord', 'created_at', 'in_menu'], 'integer'],
//            [['header', 'url', 'preview', 'content', 'image', 'seo_title', 'seo_description', 'seo_keywords'], 'safe'],
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
        $query = FastCategory::find();

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
//            'parent_id' => $this->parent_id,
//            'ord' => $this->ord,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'header', $this->header])
                ->andFilterWhere(['like', 'url', $this->url])
//                ->andFilterWhere(['like', 'preview', $this->preview])
//                ->andFilterWhere(['like', 'content', $this->content])
//                ->andFilterWhere(['like', 'image', $this->image])
//                ->andFilterWhere(['like', 'seo_title', $this->seo_title])
//                ->andFilterWhere(['like', 'seo_description', $this->seo_description])
//                ->andFilterWhere(['like', 'seo_keywords', $this->seo_keywords])
        ;

        return $dataProvider;
    }

}
