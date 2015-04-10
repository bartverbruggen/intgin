<?php

namespace ride\application\orm\entry;

use \InvalidArgumentException;
use ride\application\orm\entry\UserPreferenceEntry as AliasUserPreferenceEntry;
use ride\library\orm\entry\DatedEntry;
use ride\library\orm\entry\GenericEntry;
use ride\library\orm\entry\VersionedEntry;
use ride\web\security\model\orm\entry\RoleEntry as AliasRoleEntry;

/**
 * Generated entry for the User model
 * 
 * NOTE: Do not edit this class directly, define your own and extend from this one.
 */
class UserEntry extends GenericEntry implements DatedEntry, VersionedEntry {

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var boolean
     */
    protected $isEmailConfirmed;

    /**
     * @var string
     */
    protected $image;

    /**
     * @var array
     */
    protected $userPreferences = array();

    /**
     * @var array
     */
    protected $roles = array();

    /**
     * @var boolean
     */
    protected $isActive;

    /**
     * @var boolean
     */
    protected $isSuperUser;

    /**
     * @var string
     */
    protected $lastIp;

    /**
     * @var integer
     */
    protected $dateLastLogin;

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
        return 'User #' . $this->getId();
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
        
        if ($this->userPreferences) {
            foreach ($this->userPreferences as $value) {
                if ($value->getEntryState() !== self::STATE_CLEAN) {
                    return self::STATE_DIRTY;
                }
            }
        }
        
        if ($this->roles) {
            foreach ($this->roles as $value) {
                if ($value->getEntryState() !== self::STATE_CLEAN) {
                    return self::STATE_DIRTY;
                }
            }
        }
        
        return self::STATE_CLEAN;
    }

    /**
     * @param string $username 
     * @return null
     */
    public function setUsername($username) {
        if ($this->username === $username) {
            return;
        }
        
        $this->username = $username;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * @param string $password 
     * @return null
     */
    public function setPassword($password) {
        if ($this->password === $password) {
            return;
        }
        
        $this->password = $password;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getPassword() {
        return $this->password;
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
     * @param string $email 
     * @return null
     */
    public function setEmail($email) {
        if ($this->email === $email) {
            return;
        }
        
        $this->email = $email;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @param boolean $isEmailConfirmed 
     * @return null
     */
    public function setIsEmailConfirmed($isEmailConfirmed) {
        if ($this->isEmailConfirmed === $isEmailConfirmed) {
            return;
        }
        
        $this->isEmailConfirmed = $isEmailConfirmed;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return boolean
     */
    public function isEmailConfirmed() {
        return $this->isEmailConfirmed;
    }

    /**
     * @param string $image 
     * @return null
     */
    public function setImage($image) {
        if ($this->image === $image) {
            return;
        }
        
        $this->image = $image;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getImage() {
        return $this->image;
    }

    /**
     * @param \ride\application\orm\entry\UserPreferenceEntry $entry 
     * @return null
     */
    public function addToUserPreferences(AliasUserPreferenceEntry $entry) {
        $this->getUserPreferences();
        
        $this->userPreferences[] = $entry;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @param \ride\application\orm\entry\UserPreferenceEntry $entry 
     * @return null
     */
    public function removeFromUserPreferences(AliasUserPreferenceEntry $entry) {
        $this->getUserPreferences();
        
        $status = false;
        
        foreach ($this->userPreferences as $userPreferencesIndex => $userPreferencesValue) {
            if ($userPreferencesValue === $entry || $userPreferencesValue->getId() === $entry->getId()) {
                unset($this->userPreferences[$userPreferencesIndex]);
        
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
     * @param array $userPreferences 
     * @return null
     */
    public function setUserPreferences(array $userPreferences = array()) {
        foreach ($userPreferences as $userPreferencesIndex => $userPreferencesValue) {
            if (!$userPreferencesValue instanceof AliasUserPreferenceEntry) {
                throw new InvalidArgumentException("Could not set userPreferences: value on index $userPreferencesIndex is not an instance of ride\\application\\orm\\entry\\UserPreferenceEntry");
            }
        }
        
        $this->userPreferences = $userPreferences;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return array
     */
    public function getUserPreferences() {
        return $this->userPreferences;
    }

    /**
     * @param \ride\web\security\model\orm\entry\RoleEntry $entry 
     * @return null
     */
    public function addToRoles(AliasRoleEntry $entry) {
        $this->getRoles();
        
        $this->roles[] = $entry;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @param \ride\web\security\model\orm\entry\RoleEntry $entry 
     * @return null
     */
    public function removeFromRoles(AliasRoleEntry $entry) {
        $this->getRoles();
        
        $status = false;
        
        foreach ($this->roles as $rolesIndex => $rolesValue) {
            if ($rolesValue === $entry || $rolesValue->getId() === $entry->getId()) {
                unset($this->roles[$rolesIndex]);
        
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
     * @param array $roles 
     * @return null
     */
    public function setRoles(array $roles = array()) {
        foreach ($roles as $rolesIndex => $rolesValue) {
            if (!$rolesValue instanceof AliasRoleEntry) {
                throw new InvalidArgumentException("Could not set roles: value on index $rolesIndex is not an instance of ride\\web\\security\\model\\orm\\entry\\RoleEntry");
            }
        }
        
        $this->roles = $roles;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return array
     */
    public function getRoles() {
        return $this->roles;
    }

    /**
     * @param boolean $isActive 
     * @return null
     */
    public function setIsActive($isActive) {
        if ($this->isActive === $isActive) {
            return;
        }
        
        $this->isActive = $isActive;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return boolean
     */
    public function isActive() {
        return $this->isActive;
    }

    /**
     * @param boolean $isSuperUser 
     * @return null
     */
    public function setIsSuperUser($isSuperUser) {
        if ($this->isSuperUser === $isSuperUser) {
            return;
        }
        
        $this->isSuperUser = $isSuperUser;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return boolean
     */
    public function isSuperUser() {
        return $this->isSuperUser;
    }

    /**
     * @param string $lastIp 
     * @return null
     */
    public function setLastIp($lastIp) {
        if ($this->lastIp === $lastIp) {
            return;
        }
        
        $this->lastIp = $lastIp;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getLastIp() {
        return $this->lastIp;
    }

    /**
     * @param integer $dateLastLogin 
     * @return null
     */
    public function setDateLastLogin($dateLastLogin) {
        if ($this->dateLastLogin === $dateLastLogin) {
            return;
        }
        
        $this->dateLastLogin = $dateLastLogin;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return integer
     */
    public function getDateLastLogin() {
        return $this->dateLastLogin;
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
