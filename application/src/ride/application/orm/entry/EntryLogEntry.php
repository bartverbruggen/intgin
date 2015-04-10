<?php

namespace ride\application\orm\entry;

use \InvalidArgumentException;
use ride\application\orm\entry\EntryLogChangeEntry as AliasEntryLogChangeEntry;
use ride\library\orm\entry\DatedEntry;
use ride\library\orm\entry\GenericEntry;

/**
 * Generated entry for the EntryLog model
 * 
 * NOTE: Do not edit this class directly, define your own and extend from this one.
 */
class EntryLogEntry extends GenericEntry implements DatedEntry {

    /**
     * @var string
     */
    protected $model;

    /**
     * @var string
     */
    protected $entry;

    /**
     * @var integer
     */
    protected $version;

    /**
     * @var string
     */
    protected $action;

    /**
     * @var array
     */
    protected $changes = array();

    /**
     * @var string
     */
    protected $user;

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
        return 'EntryLog #' . $this->getId();
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
        
        if ($this->changes) {
            foreach ($this->changes as $value) {
                if ($value->getEntryState() !== self::STATE_CLEAN) {
                    return self::STATE_DIRTY;
                }
            }
        }
        
        return self::STATE_CLEAN;
    }

    /**
     * @param string $model 
     * @return null
     */
    public function setModel($model) {
        if ($this->model === $model) {
            return;
        }
        
        $this->model = $model;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getModel() {
        return $this->model;
    }

    /**
     * @param string $entry 
     * @return null
     */
    public function setEntry($entry) {
        if ($this->entry === $entry) {
            return;
        }
        
        $this->entry = $entry;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getEntry() {
        return $this->entry;
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
     * @param string $action 
     * @return null
     */
    public function setAction($action) {
        if ($this->action === $action) {
            return;
        }
        
        $this->action = $action;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getAction() {
        return $this->action;
    }

    /**
     * @param \ride\application\orm\entry\EntryLogChangeEntry $entry 
     * @return null
     */
    public function addToChanges(AliasEntryLogChangeEntry $entry) {
        $this->getChanges();
        
        $this->changes[] = $entry;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @param \ride\application\orm\entry\EntryLogChangeEntry $entry 
     * @return null
     */
    public function removeFromChanges(AliasEntryLogChangeEntry $entry) {
        $this->getChanges();
        
        $status = false;
        
        foreach ($this->changes as $changesIndex => $changesValue) {
            if ($changesValue === $entry || $changesValue->getId() === $entry->getId()) {
                unset($this->changes[$changesIndex]);
        
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
     * @param array $changes 
     * @return null
     */
    public function setChanges(array $changes = array()) {
        foreach ($changes as $changesIndex => $changesValue) {
            if (!$changesValue instanceof AliasEntryLogChangeEntry) {
                throw new InvalidArgumentException("Could not set changes: value on index $changesIndex is not an instance of ride\\application\\orm\\entry\\EntryLogChangeEntry");
            }
        }
        
        $this->changes = $changes;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return array
     */
    public function getChanges() {
        return $this->changes;
    }

    /**
     * @param string $user 
     * @return null
     */
    public function setUser($user) {
        if ($this->user === $user) {
            return;
        }
        
        $this->user = $user;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getUser() {
        return $this->user;
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
