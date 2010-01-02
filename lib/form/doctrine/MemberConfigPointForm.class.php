<?php
class MemberConfigPointForm extends MemberConfigForm
{
  protected $category = 'point';
  public function setMemberConfigWidget($name)
  {
    $result = parent::setMemberConfigWidget($name);
    return $result;
  }
  public function validate($validator,$value)
  {
    return $value;
  }
}


