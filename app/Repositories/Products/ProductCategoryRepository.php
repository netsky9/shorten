<?php

namespace App\Repositories\Products;

use App\Models\Products\ProductCategory as Model;
use App\Repositories\CoreRepository;

class ProductCategoryRepository extends CoreRepository {

    /**
     * Отправляем модель, для создания объекта
     * @return mixed|string
     */
    protected function getModel()
    {
        return Model::class;
    }

    /**
     * Получение модели для редактирования
     * @param $id
     * @return mixed
     */
    public function GetEdit($id){
        return $this->instanceModel()->find($id);
    }

    /**
     * Получение категорий для select
     * @return mixed
     */
    public function GetForSelect(){
        $columns = ['id', 'title'];

        $result = $this
            ->instanceModel()
            ->select($columns)
            ->toBase()
            ->get();

        return $result;
    }

    /**
     * Получение родительских категорий для select
     * @return mixed
     */
    public function GetParentForSelect(){
        $columns = ['id', 'title'];

        $result = $this
            ->instanceModel()
            ->select($columns)
            ->where('parent_id', 0)
            ->toBase()
            ->get();

        return $result;
    }

    public function GetAllWithPagination($request = false, $count = 20){
        $columns = ['id', 'parent_id', 'title'];

        $query = Model::query();
        $query->with('parentCategory:id,title');

        // фильтры
        if ($request->filled('parent_id')) {
            $query->where('parent_id', $request->get('parent_id'));
        }
        if ($request->filled('title')) {
            $title = $request->get('title');
            $query->where('title', 'like', "%$title%");
        }

        if ($request->filled('sort') && $request->filled('order')) {
            $query->orderBy($request->get('sort'), $request->get('order'));
        }

        $result = $query->paginate($count, $columns);

        return $result;
    }
}