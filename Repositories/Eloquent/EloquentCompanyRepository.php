<?php

namespace Modules\Ipaperwork\Repositories\Eloquent;

use Modules\Ipaperwork\Repositories\CompanyRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentCompanyRepository extends EloquentBaseRepository implements CompanyRepository
{

    public function create($data)
    {
        $model = $this->model->create($data);
        if ($model) {
            $model->paperworks()->sync(array_get($data, 'paperworks', []));
        }
        return $model;
    }

    public function update($model, $data)
    {

      $model->update($data);
      $model->paperworks()->sync(array_get($data, 'paperworks', []));
      return $model;

    }

    public function destroy($model){

        $model->paperworks()->detach();
        $model->delete();
       
    }

}
