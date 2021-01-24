<?php

namespace App\Entity;

use Cycle\ORM\Select\Repository;

/**
 * Class UserRepository
 * @package Bermuda\Authentication
 */
class UserRepository extends Repository implements UserProviderInterface
{
    /**
     * @param string|array $identity
     * @return UserInterface|null
     */
    public function provide($identity):? UserInterface
    {
        if (is_array($identity))
        {
            return $this->select()->fetchOne($identity);
        }
        
        return $this->select()->wherePk($identity)->fetchOne();
    }
}
