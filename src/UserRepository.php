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
     * @param $identity
     * @return UserInterface|null
     */
    public function provide($identity):? UserInterface
    {
        return $this->select()->where($this->identity, $identity)->fetchOne();
    }
}
