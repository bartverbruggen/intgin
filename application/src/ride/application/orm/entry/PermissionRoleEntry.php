<?php

namespace ride\application\orm\entry;

use ride\library\orm\entry\GenericEntry;
use ride\web\security\model\orm\entry\PermissionEntry as AliasPermissionEntry;
use ride\web\security\model\orm\entry\RoleEntry as AliasRoleEntry;

/**
 * Generated entry for the PermissionRole model
 * 
 * NOTE: Do not edit this class directly, define your own and extend from this one.
 */
class PermissionRoleEntry extends GenericEntry {

    /**
     * @var \ride\web\security\model\orm\entry\RoleEntry
     */
    protected $role = NULL;

    /**
     * @var \ride\web\security\model\orm\entry\PermissionEntry
     */
    protected $permission = NULL;

    /**
     * @return null
     */
    public function __toString() {
        return 'PermissionRole #' . $this->getId();
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
        
        if ($this->permission && $this->permission->getEntryState() !== self::STATE_CLEAN) {
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
     * @param \ride\web\security\model\orm\entry\PermissionEntry $permission 
     * @return null
     */
    public function setPermission(AliasPermissionEntry $permission = NULL) {
        $isClean = false;
        if ((!$this->permission && !$permission) || ($this->permission && $permission && $this->permission->getId() === $permission->getId())) {
            $isClean = true;
        }
        
        $this->permission = $permission;
        
        if (!$isClean && $this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return \ride\web\security\model\orm\entry\PermissionEntry
     */
    public function getPermission() {
        return $this->permission;
    }

}
