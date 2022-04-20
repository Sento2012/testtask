<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * VideoSearch represents the model behind the search form of `app\models\Video`.
 */
class VideoSearch extends Video
{
    public const LIMITS = [
        20 => 20,
        40 => 40,
        60 => 60,
    ];

    public const VIEW_SORTS = [
        '' => '',
        '-views' => 'По убыванию',
        'views' => 'По возрастанию',
    ];

    public const DATE_SORTS = [
        '' => '',
        '-added' => 'По убыванию',
        'added' => 'По возрастанию',
    ];

    public int $limit = 20;
    public string $viewsSort = '';
    public string $addedSort = '-added';

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['id', 'duration', 'views', 'limit'], 'integer'],
            [['title', 'thumbnail', 'added'], 'safe'],
            [['viewsSort', 'addedSort'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios(): array
    {
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params): ActiveDataProvider
    {
        $query = Video::find();

        $this->load($params);

        $dataProvider = new ActiveDataProvider([
            'pagination' => [
                'pageSize' => $this->limit,
            ],
            'query' => $query,
        ]);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'duration' => $this->duration,
            'views' => $this->views,
            'added' => $this->added,
        ]);

        $query->andFilterWhere(['ilike', 'title', $this->title])
            ->andFilterWhere(['ilike', 'thumbnail', $this->thumbnail]);

        $query->limit($this->limit);
        $query->orderBy($this->createSortExpressions());

        return $dataProvider;
    }

    protected function isDescendingSort(string $field): bool
    {
        return preg_match('/^\-/isu', $field);
    }

    protected function addFieldSortExpression(array $sortExpressions, string $field, string $fieldValue): array
    {
        if (!$fieldValue) {
            return $sortExpressions;
        }

        return array_merge($sortExpressions, [$field => $this->isDescendingSort($fieldValue) ? SORT_DESC : SORT_ASC]);
    }

    protected function createSortExpressions(): array
    {
        $sort = [];
        $sort = $this->addFieldSortExpression($sort, 'added', $this->addedSort);
        $sort = $this->addFieldSortExpression($sort, 'views', $this->viewsSort);

        return $sort;
    }
}