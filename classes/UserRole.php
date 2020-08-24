<?php

/**
 *  UserRole class
 *  Author: Shameemah <shameemah@gmail.com>
 *  Version: 1.0
 */
class UserRole
{
    private $roles = array();
    private $users = array();

    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

    public function setUsers($users)
    {
        $this->users =  $users;
    }

    public function getSubordinates($user_id)
    {
        $subordinates = array();

        if (is_array($this->users) && is_array($this->roles) && $user_id != '') {
            $user = $this->getUserById($user_id);

            if (!empty($user)) { // make sure user exist
                $role = $this->getRoleId($user['Role']);

                if (!empty($role)) {
                    if ($role['Parent'] === 0) {
                        return $this->getAllSubbies($user_id); // this user is 'Parent 0'
                    } else {
                        return $this->getRoleSubbies($user['Role']);
                    }
                }
            }
        }

        return $subordinates;
    }

    private function getUserById($id)
    {
        $user = array();
        $key = array_search($id, array_column($this->users, 'Id'));

        if ($key !== false) {
            $user = $this->users[$key];
        }

        return $user;
    }

    private function getUserByRoleId($id)
    {
        $user = array();
        $key = array_search($id, array_column($this->users, 'Role'));

        if ($key !== false) {
            $user = $this->users[$key];
        }

        return $user;
    }

    private function getRoleId($id)
    {
        $role = array();
        $key = array_search($id, array_column($this->roles, 'Id'));

        if ($key !== false) {
            $role = $this->roles[$key];
        }

        return $role;
    }

    /**
     * get all the subordinates of a specific user by it's Role and who is not 'Parent 0'
     * return array $subbies
     */
    public function getRoleSubbies($parentId)
    {
        $subbies = array();
        foreach ($this->roles as $role) {
            if ($role['Parent'] === $parentId) {
                $subbies[] = $this->getUserByRoleId($role['Id']);
                $subbies = array_merge($subbies, $this->getRoleSubbies($role['Id']));
            }
        }

        return $subbies;
    }

    /**
     * get all the subordinates of 'Parent 0'
     * return array $subbies
     */
    public function getAllSubbies($rootParentId)
    {
        $subbies = array();
        foreach ($this->users as $user) {
            if ($user['Id'] !== $rootParentId) {
                $subbies[] = $user;
            }
        }
        return $subbies;
    }
}
