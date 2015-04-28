<?php

namespace ride\application\orm\entry;

use ride\application\orm\entry\GinEntry as AliasGinEntry;
use ride\library\orm\entry\DatedEntry;
use ride\library\orm\entry\GenericEntry;
use ride\library\orm\entry\VersionedEntry;

/**
 * Generated entry for the MixSuggestion model
 * 
 * NOTE: Do not edit this class directly, define your own and extend from this one.
 */
class MixSuggestionEntry extends GenericEntry implements DatedEntry, VersionedEntry {

    /**
     * @var \ride\application\orm\entry\GinEntry
     */
    protected $gin = NULL;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $tonic;

    /**
     * @var string
     */
    protected $garnish;

    /**
     * @var string
     */
    protected $message;

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
        return 'MixSuggestion #' . $this->getId();
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
        
        if ($this->gin && $this->gin->getEntryState() !== self::STATE_CLEAN) {
            return self::STATE_DIRTY;
        }
        
        return self::STATE_CLEAN;
    }

    /**
     * @param \ride\application\orm\entry\GinEntry $gin 
     * @return null
     */
    public function setGin(AliasGinEntry $gin = NULL) {
        $isClean = false;
        if ((!$this->gin && !$gin) || ($this->gin && $gin && $this->gin->getId() === $gin->getId())) {
            $isClean = true;
        }
        
        $this->gin = $gin;
        
        if (!$isClean && $this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return \ride\application\orm\entry\GinEntry
     */
    public function getGin() {
        return $this->gin;
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
     * @param string $tonic 
     * @return null
     */
    public function setTonic($tonic) {
        if ($this->tonic === $tonic) {
            return;
        }
        
        $this->tonic = $tonic;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getTonic() {
        return $this->tonic;
    }

    /**
     * @param string $garnish 
     * @return null
     */
    public function setGarnish($garnish) {
        if ($this->garnish === $garnish) {
            return;
        }
        
        $this->garnish = $garnish;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getGarnish() {
        return $this->garnish;
    }

    /**
     * @param string $message 
     * @return null
     */
    public function setMessage($message) {
        if ($this->message === $message) {
            return;
        }
        
        $this->message = $message;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getMessage() {
        return $this->message;
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
