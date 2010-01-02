<?php
class uiComponents extends sfComponents
{
  public function executeViewpoint()
  {
    $member = $this->getUser()->getMember();
    $this->point = $member->getConfig('PAYMENT_POINT');
    $this->member = $member;
  }
}

