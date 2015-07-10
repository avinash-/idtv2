<?php

class Manager extends Eloquent {

    protected $table = 'managers';

    public function users()
    {
        return $this->hasMany('User', 'manager_id');
    }

}