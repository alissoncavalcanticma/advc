<?php

abstract class Main{
    
    private $pdo;
    public $params = array();

    abstract public function get();
    abstract public function insert($params);
    abstract public function edit($params);
    abstract public function delete($params);

    public function __construct($pdo){

      $this->pdo = $pdo;
      $this->pdo->exec('SET NAMES utf8');

	}
}