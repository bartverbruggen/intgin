<?php

namespace ride\application\orm\entry;

use ride\application\orm\entry\GinEntry as AliasGinEntry;
use ride\application\orm\entry\TonicEntry as AliasTonicEntry;
use ride\library\orm\entry\GenericEntry;

/**
 * Generated entry for the GinTonic model
 * 
 * NOTE: Do not edit this class directly, define your own and extend from this one.
 */
class GinTonicEntry extends GenericEntry {

    /**
     * @var \ride\application\orm\entry\GinEntry
     */
    protected $gin = NULL;

    /**
     * @var \ride\application\orm\entry\TonicEntry
     */
    protected $tonic = NULL;

    /**
     * @var integer
     */
    protected $ginWeight;

    /**
     * @var integer
     */
    protected $tonicWeight;

    /**
     * @return null
     */
    public function __toString() {
        return 'GinTonic #' . $this->getId();
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
        
        if ($this->tonic && $this->tonic->getEntryState() !== self::STATE_CLEAN) {
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
     * @param integer $ginWeight 
     * @return null
     */
    public function setGinWeight($ginWeight) {
        if ($this->ginWeight === $ginWeight) {
            return;
        }
        
        $this->ginWeight = $ginWeight;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return integer
     */
    public function getGinWeight() {
        return $this->ginWeight;
    }

    /**
     * @param integer $tonicWeight 
     * @return null
     */
    public function setTonicWeight($tonicWeight) {
        if ($this->tonicWeight === $tonicWeight) {
            return;
        }
        
        $this->tonicWeight = $tonicWeight;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return integer
     */
    public function getTonicWeight() {
        return $this->tonicWeight;
    }

}
