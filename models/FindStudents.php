<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Students;

/**
 * FindStudents represents the model behind the search form about `app\models\Students`.
 */
class FindStudents extends Students
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'umur'], 'integer'],
            [['nama', 'kelas'], 'safe'],
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
        $query = Students::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id'   => $this->id,
            'umur' => $this->umur,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'kelas', $this->kelas]);

        return $dataProvider;
    }
}
