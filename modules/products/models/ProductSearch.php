<?php

namespace app\modules\products\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\products\models\Product;

/**
 * ProductSearch represents the model behind the search form of `app\modules\products\models\Product`.
 */
class ProductSearch extends Product {

    const DETECT_TYPE = [
        1 => 'Радиочастотные',
        2 => 'Аккустические',
    ];

    public $detectType = 0;

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [[
            'id', 'category_id', 'price', 'ord',
            'is_enable', 'created_at', 'updated_at', 'fastcat_id',
            'detectType'
                ], 'integer'],
            [[
            'header', 'article', 'url', 'content_info',
            'content_description', 'content_characteristics',
            'content_install', 'title', 'description',
            'keywords', 'supported_products', 'short_name'
                ], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Product::find();

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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'ord' => $this->ord,
            'is_enable' => $this->is_enable,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'fastcat_id' => $this->fastcat_id,
//            'is_akustika' => ($this->detectType === 1) ? 1 : false,
//            'is_radio' => ($this->detectType === 2) ? 1 : false,
        ]);

        if ($this->detectType == 1) {

            Yii::error($this->detectType);

            $query->andFilterWhere([
                'is_radio' => 1,
            ]);
        }

        if ($this->detectType == 2) {

            Yii::error($this->detectType);

            $query->andFilterWhere([
                'is_akustika' => 1,
            ]);
        }

        $query->andFilterWhere(['like', 'header', $this->header])
                ->andFilterWhere(['like', 'url', $this->url])
                ->andFilterWhere(['like', 'short_name', $this->short_name])
                ->andFilterWhere(['like', 'article', $this->article])
                ->andFilterWhere(['like', 'content_info', $this->content_info])
                ->andFilterWhere(['like', 'content_description', $this->content_description])
                ->andFilterWhere(['like', 'content_characteristics', $this->content_characteristics])
                ->andFilterWhere(['like', 'content_install', $this->content_install])
                ->andFilterWhere(['like', 'title', $this->title])
                ->andFilterWhere(['like', 'description', $this->description])
                ->andFilterWhere(['like', 'keywords', $this->keywords])
                ->andFilterWhere(['like', 'supported_products', $this->supported_products]);

        return $dataProvider;
    }

}
