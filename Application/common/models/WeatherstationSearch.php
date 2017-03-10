<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Weatherstation;

/**
 * WeatherstationSearch represents the model behind the search form of `common\models\Weatherstation`.
 */
class WeatherstationSearch extends Weatherstation
{
    /**
     * @inheritdoc
     */
    public $globalSearch;
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['WeatherStation_Model', 'WeatherStation_Name', 'WeatherStation_Location', 'WeatherStation_Status', 'WeatherStation_Gateway', 'WeatherStation_Logger', 'WeatherStation_Number', 'globalSearch'], 'safe'],
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
        $query = Weatherstation::find();

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
        ]);

        $query->orFilterWhere(['like', 'WeatherStation_Model', $this->globalSearch])
            ->orFilterWhere(['like', 'WeatherStation_Name', $this->globalSearch])
            ->orFilterWhere(['like', 'WeatherStation_Location', $this->globalSearch])
            ->orFilterWhere(['like', 'WeatherStation_Status', $this->globalSearch])
            ->orFilterWhere(['like', 'WeatherStation_Gateway', $this->globalSearch])
            ->orFilterWhere(['like', 'WeatherStation_Logger', $this->globalSearch])
            ->orFilterWhere(['like', 'WeatherStation_Number', $this->globalSearch]);

        return $dataProvider;
    }
}
