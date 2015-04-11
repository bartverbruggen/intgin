<?php

namespace ride\application\orm\entry;

use ride\application\orm\entry\GarnishEntry as AliasGarnishEntry;
use ride\application\orm\entry\GinEntry as AliasGinEntry;
use ride\library\orm\entry\GenericEntry;

/**
 * Generated entry for the GarnishGin model
 * 
 * NOTE: Do not edit this class directly, define your own and extend from this one.
 */
class GarnishGinEntry extends GenericEntry {

    /**
     * @var \ride\application\orm\entry\GinEntry
     */
    protected $gin = NULL;

    /**
     * @var \ride\application\orm\entry\GarnishEntry
     */
    protected $garnish = NULL;

    /**
     * @var integer
     */
    protected $ginWeight;

    /**
     * @var integer
     */
    protected $garnishWeight;

    /**
     * @return null
     */
    public function __toString() {
        return 'GarnishGin #' . $this->getId();
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
        
        if ($this->garnish && $this->garnish->getEntryState() !== self::STATE_CLEAN) {
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
     * @param \ride\application\orm\entry\GarnishEntry $garnish 
     * @return null
     */
    public function setGarnish(AliasGarnishEntry $garnish = NULL) {
        $isClean = false;
        if ((!$this->garnish && !$garnish) || ($this->garnish && $garnish && $this->garnish->getId() === $garnish->getId())) {
            $isClean = true;
        }
        
        $this->garnish = $garnish;
        
        if (!$isClean && $this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return \ride\application\orm\entry\GarnishEntry
     */
    public function getGarnish() {
        return $this->garnish;
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
     * @param integer $garnishWeight 
     * @return null
     */
    public function setGarnishWeight($garnishWeight) {
        if ($this->garnishWeight === $garnishWeight) {
            return;
        }
        
        $this->garnishWeight = $garnishWeight;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return integer
     */
    public function getGarnishWeight() {
        return $this->garnishWeight;
    }

}
