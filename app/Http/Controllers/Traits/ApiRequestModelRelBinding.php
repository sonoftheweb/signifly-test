<?php


namespace App\Http\Controllers\Traits;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

trait ApiRequestModelRelBinding
{
    public function buildRelationshipsToLoad(Request $request, Builder $query) : Builder
    {
        if (!$request->has('with'))
            return $query;

        $with = explode('-', $request->with);

        $with = $this->checkForRelationships($query, $with);

        return (!empty($with)) ? $query->with($with) : $query;
    }

    /**
     * Inits the check and unset() any missing relationship
     *
     * @param Builder $query
     * @param array $with
     * @return array
     */
    private function checkForRelationships(Builder $query, array $with): array
    {
        $model = $query->getModel();

        foreach ($with as $key => $rel) {
            if (!$this->hasRelation($rel, $model))
                unset($with[$key]);
        }

        return $with;
    }

    /**
     * checks if a relationship is defined in the model
     *
     * @param string $key
     * @param Model $model
     * @return bool
     */
    private function hasRelation(string $key, Model $model): bool
    {
        if ($model->relationLoaded($key)) {
            return true;
        }

        if (method_exists($model, $key)) {
            return is_a($model->$key(), "Illuminate\Database\Eloquent\Relations\Relation");
        }

        if (strpos($key, '.')) {
            // let's see if the first method exists
            $methods = explode('.', $key);

            return $this->hasRelation($methods[0], $model);
        }

        return false;
    }
}
