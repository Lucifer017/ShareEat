<?php
  class UserTest extends \PHPUnit_Framework_TestCase{

    public function AmbilFirstName(){
      $user = new \App\Models\User;
      $user->setFirstName('Billy');
      $this->assertEquals($user->getFirstName(), 'Billy');
    }

  }
?>
