<?php

namespace ride\application\orm\entry;

use ride\library\orm\entry\GenericEntry;

/**
 * Generated entry for the SecuredPath model
 * 
 * NOTE: Do not edit this class directly, define your own and extend from this one.
 */
class SecuredPathEntry extends GenericEntry {

    /**
     * @var string
     */
    protected $path;

    /**
     * @var boolean
     */
    protected $isSecured;

    /**
     * @return null
     */
    public function __toString() {
        return 'SecuredPath #' . $this->getId();
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
     * @param string $path 
     * @return null
     */
    public function setPath($path) {
        if ($this->path === $path) {
            return;
        }
        
        $this->path = $path;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getPath() {
        return $this->path;
    }

    /**
     * @param boolean $isSecured 
     * @return null
     */
    public function setIsSecured($isSecured) {
        if ($this->isSecured === $isSecured) {
            return;
        }
        
        $this->isSecured = $isSecured;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return boolean
     */
    public function isSecured() {
        return $this->isSecured;
    }

}
