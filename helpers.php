<?php

if (!function_exists('ipaperworks_get_paperworks')) {
    function ipaperworks_get_paperworks($options = array()){
        $default_options = array(
            'users' => null, //se envia como arreglo ['users'=>[1,2,3]]
            'date' =>null,
            'take' => 5,
            'skip' => 0,
            'order' => ['field'=>'created_at','way'=>'desc'],
        );
        $options = array_merge($default_options, $options);

        $paperworks=app('Modules\Ipaperwork\Repositories\PaperworkRepository');
        $params=json_decode(json_encode([
            "filter"=>$options,
            'include'=>[],
            'take'=> $options['take'],
            'skip'=> $options['skip'],
            'page'=> isset($options['page']) ? $options['page'] : false
        ]));

        return $paperworks->getItemsBy($params);
    }
} 


if (!function_exists('ipaperworks_get_userpaperworks')) {


    function ipaperworks_get_userpaperworks($options = array()){

        $default_options = array(
            'users' => null, //se envia como arreglo ['users'=>[1,2,3]]
            'date' =>null,
            'take' => 5,
            'skip' => 0,
            'order' => ['field'=>'created_at','way'=>'desc'],
        );

        $options = array_merge($default_options, $options);

        $userPaperworks=app('Modules\Ipaperwork\Repositories\UserPaperworkRepository');
        $params=json_decode(json_encode([
            "filter"=>$options,
            'include'=>['user'],
            'take'=> $options['take'],
            'skip'=> $options['skip'],
            'page'=> isset($options['page']) ? $options['page'] : false
        ]));

        return $userPaperworks->getItemsBy($params);

    }

}