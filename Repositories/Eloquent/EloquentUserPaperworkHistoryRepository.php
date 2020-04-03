<?php

namespace Modules\Ipaperwork\Repositories\Eloquent;

use Modules\Ipaperwork\Repositories\UserPaperworkHistoryRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

use Modules\Ipaperwork\Events\UserPaperworkHistoryWasCreated;

class EloquentUserPaperworkHistoryRepository extends EloquentBaseRepository implements UserPaperworkHistoryRepository
{

    public function create($data)
    {

        $newStatus = (int)$data['status'];

        $model = $this->model->create($data);

        if($model){
            $param = array(
                'status' => $newStatus
            );
            $model->userPaperwork->update($param);
        }

        // Send Email
        event(new UserPaperworkHistoryWasCreated($model, $data));
  
        return $model;

    }

}
