<?php

namespace Lio\Forum\Topics;

final class EloquentTopicRepository implements TopicRepository
{
    /**
     * @var \Lio\Forum\Topics\EloquentTopic
     */
    private $model;

    public function __construct(EloquentTopic $model)
    {
        $this->model = $model;
    }

    /**
     * @return \Lio\Forum\Topics\Topic[]
     */
    public function findAll()
    {
        return $this->model->all();
    }

    public function find($id): Topic
    {
        return $this->model->findOrFail($id);
    }

    public function findBySlug(string $slug): Topic
    {
        return $this->model->where('slug', $slug)->firstOrFail();
    }
}