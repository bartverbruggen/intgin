<?php

namespace ride\application\orm\entry;

use \InvalidArgumentException;
use ride\application\orm\entry\GarnishEntry as AliasGarnishEntry;
use ride\application\orm\entry\TonicEntry as AliasTonicEntry;
use ride\library\orm\entry\GenericEntry;

/**
 * Generated entry for the Mix model
 * 
 * NOTE: Do not edit this class directly, define your own and extend from this one.
 */
class MixEntry extends GenericEntry {

    /**
     * @var \ride\application\orm\entry\TonicEntry
     */
    protected $tonic = NULL;

    /**
     * @var array
     */
    protected $garnish = array();

    /**
     * @return null
     */
    public function __toString() {
        return 'Mix #' . $this->getId();
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
        
        if ($this->tonic && $this->tonic->getEntryState() !== self::STATE_CLEAN) {
            return self::STATE_DIRTY;
        }
        
        if ($this->garnish) {
            foreach ($this->garnish as $value) {
                if ($value->getEntryState() !== self::STATE_CLEAN) {
                    return self::STATE_DIRTY;
                }
            }
        }
        
        return self::STATE_CLEAN;
    }

    /**
     * @param \ride\application\orm\entry\TonicEntry $tonic 
     * @return null
     */
    public function setTonic(AliasTonicEntry $tonic = NULL) {
        $isClean = false;
        if ((!$this->tonic && !$tonic) || ($this->tonic && $tonic && $this->tonic->getId() === $tonic->getId())) {
            $isClean = true;
        }
        
        $this->tonic = $tonic;
        
        if (!$isClean && $this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return \ride\application\orm\entry\TonicEntry
     */
    public function getTonic() {
        return $this->tonic;
    }

    /**
     * @param \ride\application\orm\entry\GarnishEntry $entry 
     * @return null
     */
    public function addToGarnish(AliasGarnishEntry $entry) {
        $this->getGarnish();
        
        $this->garnish[] = $entry;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @param \ride\application\orm\entry\GarnishEntry $entry 
     * @return null
     */
    public function removeFromGarnish(AliasGarnishEntry $entry) {
        $this->getGarnish();
        
        $status = false;
        
        foreach ($this->garnish as $garnishIndex => $garnishValue) {
            if ($garnishValue === $entry || $garnishValue->getId() === $entry->getId()) {
                unset($this->garnish[$garnishIndex]);
        
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
     * @param array $garnish 
     * @return null
     */
    public function setGarnish(array $garnish = array()) {
        foreach ($garnish as $garnishIndex => $garnishValue) {
            if (!$garnishValue instanceof AliasGarnishEntry) {
                throw new InvalidArgumentException("Could not set garnish: value on index $garnishIndex is not an instance of ride\\application\\orm\\entry\\GarnishEntry");
            }
        }
        
        $this->garnish = $garnish;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return array
     */
    public function getGarnish() {
        return $this->garnish;
    }

}
