<?php

namespace ride\application\orm\entry;

use ride\application\orm\entry\SecuredPathEntry as AliasSecuredPathEntry;
use ride\library\orm\entry\GenericEntry;
use ride\web\security\model\orm\entry\RoleEntry as AliasRoleEntry;

/**
 * Generated entry for the RoleSecuredPath model
 * 
 * NOTE: Do not edit this class directly, define your own and extend from this one.
 */
class RoleSecuredPathEntry extends GenericEntry {

    /**
     * @var \ride\web\security\model\orm\entry\RoleEntry
     */
    protected $role = NULL;

    /**
     * @var \ride\application\orm\entry\SecuredPathEntry
     */
    protected $securedPath = NULL;

    /**
     * @return null
     */
    public function __toString() {
        return 'RoleSecuredPath #' . $this->getId();
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
        
        if ($this->role && $this->role->getEntryState() !== self::STATE_CLEAN) {
            return self::STATE_DIRTY;
        }
        
        if ($this->securedPath && $this->securedPath->getEntryState() !== self::STATE_CLEAN) {
            return self::STATE_DIRTY;
        }
        
        return self::STATE_CLEAN;
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

    /**
     * @param \ride\application\orm\entry\SecuredPathEntry $securedPath 
     * @return null
     */
    public function setSecuredPath(AliasSecuredPathEntry $securedPath = NULL) {
        $isClean = false;
        if ((!$this->securedPath && !$securedPath) || ($this->securedPath && $securedPath && $this->securedPath->getId() === $securedPath->getId())) {
            $isClean = true;
        }
        
        $this->securedPath = $securedPath;
        
        if (!$isClean && $this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return \ride\application\orm\entry\SecuredPathEntry
     */
    public function getSecuredPath() {
        return $this->securedPath;
    }

}
