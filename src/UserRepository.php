<?php

namespace Bermuda\Authentication;

use Cycle\ORM\Select\Repository;

/**
 * Class UserRepository
 * @package Bermuda\Authentication
 */
class UserRepository extends Repository implements UserProviderInterface
{
    protected string $identity = 'email';

    /**
     * @param string $identity
     * @return $this
     */
    public function setIdentity(string $identity): self
    {
        $this->identity = $identity;
        return $this;
    }

    /**
     * @param string|array $identity
     * @return UserInterface|null
     */
    public function provide($identity):? UserInterface
    {
        if (!is_array($identity))
        {
            return $this->select()->wherePk($identity);
        }
        
        return $this->select()->fetchOne($identity);
    }
}
