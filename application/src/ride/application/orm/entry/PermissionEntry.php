<?php

namespace ride\application\orm\entry;

use ride\library\orm\entry\GenericEntry;

/**
 * Generated entry for the Permission model
 * 
 * NOTE: Do not edit this class directly, define your own and extend from this one.
 */
class PermissionEntry extends GenericEntry {

    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $description;

    /**
     * @return null
     */
    public function __toString() {
        return 'Permission #' . $this->getId();
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
        
        return self::STATE_CLEAN;
    }

    /**
     * @param string $code 
     * @return null
     */
    public function setCode($code) {
        if ($this->code === $code) {
            return;
        }
        
        $this->code = $code;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getCode() {
        return $this->code;
    }

    /**
     * @param string $description 
     * @return null
     */
    public function setDescription($description) {
        if ($this->description === $description) {
            return;
        }
        
        $this->description = $description;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

}
