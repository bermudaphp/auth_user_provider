<?php


namespace Bermuda\Authentication;


use Cycle\ORM\Select\Repository;


/**
 * Class UserRepository
 * @package Bermuda\Authentication
 */
class UserRepository extends Repository implements UserProviderInterface
{
    protected string $identity;

    public function __construct(Select $select, string $identity = 'email')
    {
        parent::__construct($select);
        $this->identity = $identity;
    }

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
    public function provide($identity): ?UserInterface
    {
        return $this->select()->wherePK($identity)->orWhere($this->identity, $identity)->fetchOne();
    }
}
