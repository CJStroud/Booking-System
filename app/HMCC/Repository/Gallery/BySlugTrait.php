<?php
namespace HMCC\Repository\Gallery;

/**
 * Gets the a model by slug
 */
trait BySlugTrait
{
    public function bySlug($slug)
    {
        return $this->model->where('slug', '=', $slug)->firstOrFail();
    }
}
