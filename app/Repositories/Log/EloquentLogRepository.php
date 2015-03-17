<?php
namespace Repositories\Log;

use Log;
use Repositories\AbstractEloquentRepository;

class EloquentLogRepository extends AbstractEloquentRepository implements LogInterface { 
  /**
   * @var Model
   */
  protected $model;
 
  /**
   * Constructor
   */
  public function __construct(Log $model)
  {
    $this->model = $model;
  }
 
 
}
