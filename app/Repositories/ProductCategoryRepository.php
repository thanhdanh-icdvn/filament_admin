<?php

namespace App\Repositories;

use App\Models\ProductCategory;
use App\Repositories\Interfaces\ProductCategoryRepositoryInterface;

class ProductCategoryRepository extends BaseRepository implements ProductCategoryRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return ProductCategory::class;
    }

    public function getProductCategory()
    {
        return $this->model->all();

    }
}
