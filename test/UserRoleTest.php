<?php 
declare(strict_types=1);
require 'classes/Role.php';
require 'classes/User.php';
require 'classes/UserRole.php';

final class UserRoleTest extends PHPUnit_Framework_TestCase
{
    private $userRole;

    protected function setUp()
    {
        $this->userRole = new UserRole();
    }
 
    protected function tearDown()
    {
        $this->userRole = NULL;
    }

    public function testEmptyUsers(): void
    {
        $this->userRole->setUsers(array());
        $this->assertEmpty($this->userRole->getSubordinates(1));
        
    }

    public function testEmptyRoles(): void
    {
        $this->userRole = new UserRole();
        $this->userRole->setRoles(array());
        $this->assertEmpty($this->userRole->getSubordinates(1));
        
    }

    public function testHasKey(): void
    {
        $this->userRole = new UserRole();
        $this->userRole->setRoles(Role::$roles);
        $this->userRole->setUsers(User::$users);
        $subordinates = $this->userRole->getSubordinates(1);
        $this->assertArrayHasKey('Id', $subordinates[0]);        
    }
    
}