<?php

namespace ride\application\orm\entry;

use \InvalidArgumentException;
use ride\application\orm\entry\SecuredPathEntry as AliasSecuredPathEntry;
use ride\library\orm\entry\DatedEntry;
use ride\library\orm\entry\GenericEntry;
use ride\library\orm\entry\VersionedEntry;
use ride\web\security\model\orm\entry\PermissionEntry as AliasPermissionEntry;

/**
 * Generated entry for the Role model
 * 
 * NOTE: Do not edit this class directly, define your own and extend from this one.
 */
class RoleEntry extends GenericEntry implements DatedEntry, VersionedEntry {

    /**
     * @var string
     */
    protected $name;

    /**
     * @var integer
     */
    protected $weight;

    /**
     * @var array
     */
    protected $permissions = array();

    /**
     * @var array
     */
    protected $rolePaths = array();

    /**
     * @var integer
     */
    protected $version;

    /**
     * @var integer
     */
    protected $dateAdded;

    /**
     * @var integer
     */
    protected $dateModified;

    /**
     * @return null
     */
    public function __toString() {
        return 'Role #' . $this->getId();
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
        
        if ($this->permissions) {
            foreach ($this->permissions as $value) {
                if ($value->getEntryState() !== self::STATE_CLEAN) {
                    return self::STATE_DIRTY;
                }
            }
        }
        
        if ($this->rolePaths) {
            foreach ($this->rolePaths as $value) {
                if ($value->getEntryState() !== self::STATE_CLEAN) {
                    return self::STATE_DIRTY;
                }
            }
        }
        
        return self::STATE_CLEAN;
    }

    /**
     * @param string $name 
     * @return null
     */
    public function setName($name) {
        if ($this->name === $name) {
            return;
        }
        
        $this->name = $name;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param integer $weight 
     * @return null
     */
    public function setWeight($weight) {
        if ($this->weight === $weight) {
            return;
        }
        
        $this->weight = $weight;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return integer
     */
    public function getWeight() {
        return $this->weight;
    }

    /**
     * @param \ride\web\security\model\orm\entry\PermissionEntry $entry 
     * @return null
     */
    public function addToPermissions(AliasPermissionEntry $entry) {
        $this->getPermissions();
        
        $this->permissions[] = $entry;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @param \ride\web\security\model\orm\entry\PermissionEntry $entry 
     * @return null
     */
    public function removeFromPermissions(AliasPermissionEntry $entry) {
        $this->getPermissions();
        
        $status = false;
        
        foreach ($this->permissions as $permissionsIndex => $permissionsValue) {
            if ($permissionsValue === $entry || $permissionsValue->getId() === $entry->getId()) {
                unset($this->permissions[$permissionsIndex]);
        
                $status = true;
        
                break;
            }
        }
        
        if ($status && $this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
        
        return $status;
    }

    /**
     * @param array $permissions 
     * @return null
     */
    public function setPermissions(array $permissions = array()) {
        foreach ($permissions as $permissionsIndex => $permissionsValue) {
            if (!$permissionsValue instanceof AliasPermissionEntry) {
                throw new InvalidArgumentException("Could not set permissions: value on index $permissionsIndex is not an instance of ride\\web\\security\\model\\orm\\entry\\PermissionEntry");
            }
        }
        
        $this->permissions = $permissions;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return array
     */
    public function getPermissions() {
        return $this->permissions;
    }

    /**
     * @param \ride\application\orm\entry\SecuredPathEntry $entry 
     * @return null
     */
    public function addToRolePaths(AliasSecuredPathEntry $entry) {
        $this->getRolePaths();
        
        $this->rolePaths[] = $entry;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @param \ride\application\orm\entry\SecuredPathEntry $entry 
     * @return null
     */
    public function removeFromRolePaths(AliasSecuredPathEntry $entry) {
        $this->getRolePaths();
        
        $status = false;
        
        foreach ($this->rolePaths as $rolePathsIndex => $rolePathsValue) {
            if ($rolePathsValue === $entry || $rolePathsValue->getId() === $entry->getId()) {
                unset($this->rolePaths[$rolePathsIndex]);
        
                $status = true;
        
                break;
            }
        }
        
        if ($status && $this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
        
        return $status;
    }

    /**
     * @param array $rolePaths 
     * @return null
     */
    public function setRolePaths(array $rolePaths = array()) {
        foreach ($rolePaths as $rolePathsIndex => $rolePathsValue) {
            if (!$rolePathsValue instanceof AliasSecuredPathEntry) {
                throw new InvalidArgumentException("Could not set rolePaths: value on index $rolePathsIndex is not an instance of ride\\application\\orm\\entry\\SecuredPathEntry");
            }
        }
        
        $this->rolePaths = $rolePaths;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return array
     */
    public function getRolePaths() {
        return $this->rolePaths;
    }

    /**
     * @param integer $version 
     * @return null
     */
    public function setVersion($version) {
        if ($this->version === $version) {
            return;
        }
        
        $this->version = $version;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return integer
     */
    public function getVersion() {
        return $this->version;
    }

    /**
     * Sets the add date
     * @param integer $timestamp UNIX timestamp of the date
     * @return null
     */
    public function setDateAdded($timestamp) {
        if ($this->getDateAdded()) {
            return;
        }
        
        $this->dateAdded = $timestamp;
        $this->dateModified = $timestamp;
    }

    /**
     * @return integer
     */
    public function getDateAdded() {
        return $this->dateAdded;
    }

    /**
     * @param integer $dateModified 
     * @return null
     */
    public function setDateModified($dateModified) {
        if ($this->dateModified === $dateModified) {
            return;
        }
        
        $this->dateModified = $dateModified;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return integer
     */
    public function getDateModified() {
        return $this->dateModified;
    }

}
