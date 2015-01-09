<?php namespace app\EmpApp\Repositories;

use yii\data\Pagination;
use yii\db\ActiveRecord;

abstract class AbstractRepository
{
    /**
     * The model to execute queries on
     *
     * @var ActiveRecord
     */
    protected $model;

    /**
     * Create a new repository instance
     *
     * @param ActiveRecord $activeRecord
     */
    public function __construct(ActiveRecord $activeRecord)
    {
        $this->model = $activeRecord;
    }

    /**
     * Get a new instance of the model
     *
     * @return string
     */
    public function getNew()
    {
        return $this->model->instantiate($row = null);
    }

    /**
     * Set output Response json
     *
     * @var \Yii::$app->response->format = 'json';
     *
     */
    public function setJson()
    {
        \Yii::$app->response->format = 'json';
    }

    /**
     * Set output Response Xml
     *
     * @var \Yii::$app->response->format = 'xml';
     *
     */
    public function setXml()
    {
        \Yii::$app->response->format = 'xml';
    }

    /**
     * Filter HTML entities
     *
     * @param $value
     * @return string
     */
    public function e($value)
    {
        return htmlentities($value, ENT_QUOTES, 'UTF-8', false);
    }

    /**
     * Set up pagination and data Model
     *
     * @param $query
     * @return array
     */
    public function getPaginate($query)
    {
        $countQuery = clone $query;
        $pages = new Pagination(
            ['totalCount' => $countQuery->count()],
            ['defaultPageSize' => 10]
        );

        $models = $query
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $total = $pages->totalCount;
        $begin = $pages->getPage() * $pages->pageSize + 1;
        $page = $pages->getPage() + 1;
        $end = min($total, $page * $pages->pageSize);

        $pageCount = $pages->pageCount;

        return [
            "total"        => $total,
            "per_page"     => $pages->pageSize,
            "current_page" => $page,
            "last_page"    => $pageCount,
            "from"         => $begin,
            "to"           => $end,
            'data'         => $models,
        ];
    }
}