<?php
namespace Repositories\Triggers;

use Triggers;
use Repositories\AbstractEloquentRepository;

class EloquentTriggersRepository extends AbstractEloquentRepository implements TriggersInterface { 
  /**
   * @var Model
   */
  protected $model;
 
  /**
   * Constructor
   */
  public function __construct(Triggers $model)
  {
    $this->model = $model;
  }
 
 
}
