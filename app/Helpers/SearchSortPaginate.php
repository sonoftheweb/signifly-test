<?php


namespace App\Helpers;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SearchSortPaginate
{

    protected $paginateCount;

    protected $order;

    protected $search;

    protected $sortBy;

    protected $query;

    /**
     * SearchSortPaginate constructor.
     * @param Builder $query
     * @param Request $request
     */
    public function __construct(Builder $query, Request $request)
    {
        $this->paginateCount = ($request->has('per_page')) ? $request->per_page : 10;

        $this->sortBy = ($request->has('sort_by')) ? $request->sort_by : 'id';

        $this->order = ($request->has('order')) ? $request->order : 'asc';

        $this->search = ($request->has('search')) ? $request->search : null;

        $this->query = $query;
    }

    public function searchSortPaginateData()
    {
        return $this->buildSearch()
            ->buildSort()
            ->getData();
    }

    public function buildSearch()
    {
        if ($this->search)
            $this->searchClauseBuilder();

        return $this;
    }

    public function buildSort()
    {
        $this->query = $this->query->orderBy($this->sortBy, $this->order);

        return $this;
    }

    public function getData()
    {
        $data = null;

        if (!request()->has('no-paginate'))
            $data = $this->query->paginate();
        else
            $data = $this->query->get();

        return $data;
    }

    private function searchClauseBuilder()
    {

    }
}
