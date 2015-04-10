<?php

namespace ride\application\orm\entry;

use ride\library\orm\entry\GenericEntry;
use ride\web\security\model\orm\entry\RoleEntry as AliasRoleEntry;
use ride\web\security\model\orm\entry\UserEntry as AliasUserEntry;

/**
 * Generated entry for the RoleUser model
 * 
 * NOTE: Do not edit this class directly, define your own and extend from this one.
 */
class RoleUserEntry extends GenericEntry {

    /**
     * @var \ride\web\security\model\orm\entry\UserEntry
     */
    protected $user = NULL;

    /**
     * @var \ride\web\security\model\orm\entry\RoleEntry
     */
    protected $role = NULL;

    /**
     * @return null
     */
    public function __toString() {
        return 'RoleUser #' . $this->getId();
    }

    /**
     * Gets the state of the entry
     * @return null
     */
    public function getEntryState() {
        $entryState = parent::getEntryState();
        if ($entryState !== self::STATE_CLEAN) {
            return $entryState;
        }
        
        if ($this->user && $this->user->getEntryState() !== self::STATE_CLEAN) {
            return self::STATE_DIRTY;
        }
        
        if ($this->role && $this->role->getEntryState() !== self::STATE_CLEAN) {
            return self::STATE_DIRTY;
        }
        
        return self::STATE_CLEAN;
    }

    /**
     * @param \ride\web\security\model\orm\entry\UserEntry $user 
     * @return null
     */
    public function setUser(AliasUserEntry $user = NULL) {
        $isClean = false;
        if ((!$this->user && !$user) || ($this->user && $user && $this->user->getId() === $user->getId())) {
            $isClean = true;
        }
        
        $this->user = $user;
        
        if (!$isClean && $this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return \ride\web\security\model\orm\entry\UserEntry
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * @param \ride\web\security\model\orm\entry\RoleEntry $role 
     * @return null
     */
    public function setRole(AliasRoleEntry $role = NULL) {
        $isClean = false;
        if ((!$this->role && !$role) || ($this->role && $role && $this->role->getId() === $role->getId())) {
            $isClean = true;
        }
        
        $this->role = $role;
        
        if (!$isClean && $this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return \ride\web\security\model\orm\entry\RoleEntry
     */
    public function getRole() {
        return $this->role;
    }

}
