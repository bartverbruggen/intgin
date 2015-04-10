<?php

namespace ride\application\orm\entry;

use ride\application\orm\entry\EntryLogEntry as AliasEntryLogEntry;
use ride\library\orm\entry\GenericEntry;

/**
 * Generated entry for the EntryLogChange model
 * 
 * NOTE: Do not edit this class directly, define your own and extend from this one.
 */
class EntryLogChangeEntry extends GenericEntry {

    /**
     * @var \ride\application\orm\entry\EntryLogEntry
     */
    protected $entryLog = NULL;

    /**
     * @var string
     */
    protected $fieldName;

    /**
     * @var string
     */
    protected $oldValue;

    /**
     * @var string
     */
    protected $newValue;

    /**
     * @return null
     */
    public function __toString() {
        return 'EntryLogChange #' . $this->getId();
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
        
        if ($this->entryLog && $this->entryLog->getEntryState() !== self::STATE_CLEAN) {
            return self::STATE_DIRTY;
        }
        
        return self::STATE_CLEAN;
    }

    /**
     * @param \ride\application\orm\entry\EntryLogEntry $entryLog 
     * @return null
     */
    public function setEntryLog(AliasEntryLogEntry $entryLog = NULL) {
        $isClean = false;
        if ((!$this->entryLog && !$entryLog) || ($this->entryLog && $entryLog && $this->entryLog->getId() === $entryLog->getId())) {
            $isClean = true;
        }
        
        $this->entryLog = $entryLog;
        
        if (!$isClean && $this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return \ride\application\orm\entry\EntryLogEntry
     */
    public function getEntryLog() {
        return $this->entryLog;
    }

    /**
     * @param string $fieldName 
     * @return null
     */
    public function setFieldName($fieldName) {
        if ($this->fieldName === $fieldName) {
            return;
        }
        
        $this->fieldName = $fieldName;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getFieldName() {
        return $this->fieldName;
    }

    /**
     * @param string $oldValue 
     * @return null
     */
    public function setOldValue($oldValue) {
        if ($this->oldValue === $oldValue) {
            return;
        }
        
        $this->oldValue = $oldValue;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getOldValue() {
        return $this->oldValue;
    }

    /**
     * @param string $newValue 
     * @return null
     */
    public function setNewValue($newValue) {
        if ($this->newValue === $newValue) {
            return;
        }
        
        $this->newValue = $newValue;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getNewValue() {
        return $this->newValue;
    }

}
