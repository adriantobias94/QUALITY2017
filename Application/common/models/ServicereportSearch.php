<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Servicereport;

/**
 * ServicereportSearch represents the model behind the search form of `common\models\Servicereport`.
 */
class ServicereportSearch extends Servicereport
{
    /**
     * @inheritdoc
     */

    public $globalSearch;
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['DateStarted','globalSearch', 'DateEnd', 'Author', 'Manager', 'WeatherStation_id'], 'safe'],
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
        $query = Servicereport::find();

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

        $query->joinWith('weatherStation');


        // grid filtering conditions
        

        $query->orFilterWhere(['like', 'Author', $this->globalSearch])
            ->orFilterWhere(['like', 'Manager', $this->globalSearch])
            ->orFilterWhere(['like', 'WeatherStation.WeatherStation_Location', $this->globalSearch]);

        return $dataProvider;
    }
}
