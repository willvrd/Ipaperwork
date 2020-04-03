<?php

namespace Modules\Ipaperwork\Repositories\Eloquent;

use Modules\Ipaperwork\Repositories\UserPaperworkRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

use Modules\Ipaperwork\Events\UserPaperworkWasCreated;

class EloquentUserPaperworkRepository extends EloquentBaseRepository implements UserPaperworkRepository
{

	public function getItemsBy($params = false)
  {

      // INITIALIZE QUERY
      $query = $this->model->query();

      // RELATIONSHIPS
      $defaultInclude = [];
      $query->with(array_merge($defaultInclude, $params->include));

      // FILTERS
      if($params->filter) {
        $filter = $params->filter;

        //add filter by search
        if (isset($filter->search)) {
            //find search in columns
            $query->where(function ($query) use ($filter) {
            $query->where('id', 'like', '%' . $filter->search . '%')
            ->orWhere('updated_at', 'like', '%' . $filter->search . '%')
            ->orWhere('created_at', 'like', '%' . $filter->search . '%');
            });
        }
        
        //add filter by date
        if (isset($filter->date)) {
          $date = $filter->date;//Short filter date
          $date->field = $date->field ?? 'created_at';
          if (isset($date->from))//From a date
              $query->whereDate($date->field, '>=', $date->from);
          if (isset($date->to))//to a date
              $query->whereDate($date->field, '<=', $date->to);
        }
          
         //Order by
        if (isset($filter->order)) {
          $orderByField = $filter->order->field ?? 'created_at';//Default field
          $orderWay = $filter->order->way ?? 'desc';//Default way
          $query->orderBy($orderByField, $orderWay);//Add order to query
        }

         //add filter by user_id
        if (isset($filter->users)){
          $users = is_array($filter->users) ? $filter->users : [$filter->users];
          $query->whereIn('user_id', $users);
          //$query->where('user_id', $filter->user);
        }

      }

      /*== FIELDS ==*/
      if (isset($params->fields) && count($params->fields))
        $query->select($params->fields);

      /*== REQUEST ==*/
      if (isset($params->page) && $params->page) {
        return $query->paginate($params->take);
      } else {
        $params->take ? $query->take($params->take) : false;//Take
        return $query->get();
      }
    
  }

  public function getItem($criteria, $params = false)
  {
      // INITIALIZE QUERY
      $query = $this->model->query();

      // RELATIONSHIPS
      $includeDefault = [];
      $query->with(array_merge($includeDefault, $params->include));

      // FIELDS
      if ($params->fields) {
        $query->select($params->fields);
      }
     
      // FILTER
      if (isset($params->filter)) {
        $filter = $params->filter;
        if (isset($filter->field))
            $field = $filter->field;
      }
      
      $query->where($field ?? 'id', $criteria);

      return $query->first();

  }

  public function create($data)
  {
     
    $model = $this->model->create($data);

    // Save File
    if(isset($data["pfile"]) && $data["pfile"]->isValid()){
      $folderBase = "user-".$model->user_id;
      $filePath = $this->saveFile($data["pfile"],$model->id,$folderBase);
      if ($filePath != null) {
        $options['pfile'] = $filePath;
        $model->options = $options;
        $model->save();
      }
    }

    // Send Email
    event(new UserPaperworkWasCreated($model, $data));

    return $model;
     
  }

  public function destroy($model){

    $model->histories()->delete();
    $model->delete();
    
  }

  public function saveFile($pfile, $idPaperwork, $folderBase)
  {

      $disk = 'publicmedia';

      $original_filename = $pfile->getClientOriginalName();
      $extension = $pfile->getClientOriginalExtension();
      $allowedextensions = array('PDF');

      if (!in_array(strtoupper($extension), $allowedextensions)) {
          throw new \Exception('Error Extension File', 204);
      }

      $name = str_slug(str_replace('.' . $extension, '', $original_filename), '-');
      $namefile = $name . '.' . $extension;

      $destination_path = 'assets/ipaperwork/paperworks/'.$folderBase.'/' . $idPaperwork .'.pdf';

      \Storage::disk($disk)->put($destination_path, \File::get($pfile));
      return $destination_path;
  }

 

}
