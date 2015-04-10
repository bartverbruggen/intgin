<?php

namespace ride\application\orm\entry;

use ride\library\orm\entry\GenericEntry;
use ride\web\security\model\orm\entry\UserEntry as AliasUserEntry;

/**
 * Generated entry for the UserPreference model
 * 
 * NOTE: Do not edit this class directly, define your own and extend from this one.
 */
class UserPreferenceEntry extends GenericEntry {

    /**
     * @var \ride\web\security\model\orm\entry\UserEntry
     */
    protected $user = NULL;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $value;

    /**
     * @return null
     */
    public function __toString() {
        return 'UserPreference #' . $this->getId();
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
     * @param string $value 
     * @return null
     */
    public function setValue($value) {
        if ($this->value === $value) {
            return;
        }
        
        $this->value = $value;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getValue() {
        return $this->value;
    }

}
