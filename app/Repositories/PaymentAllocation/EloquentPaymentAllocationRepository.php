<?php
namespace Repositories\PaymentAllocation;

use PaymentAllocation;
use Repositories\AbstractEloquentRepository;

class EloquentPaymentAllocationRepository extends AbstractEloquentRepository implements PaymentAllocationInterface { 
  /**
   * @var Model
   */
  protected $model;
 
  /**
   * Constructor
   */
  public function __construct(PaymentAllocation $model)
  {
    $this->model = $model;
  }
 
 
}
