<?php

namespace ride\application\orm\entry;

use ride\application\orm\entry\GarnishEntry as AliasGarnishEntry;
use ride\application\orm\entry\MixEntry as AliasMixEntry;
use ride\library\orm\entry\GenericEntry;

/**
 * Generated entry for the GarnishMix model
 * 
 * NOTE: Do not edit this class directly, define your own and extend from this one.
 */
class GarnishMixEntry extends GenericEntry {

    /**
     * @var \ride\application\orm\entry\MixEntry
     */
    protected $mix = NULL;

    /**
     * @var \ride\application\orm\entry\GarnishEntry
     */
    protected $garnish = NULL;

    /**
     * @var integer
     */
    protected $mixWeight;

    /**
     * @var integer
     */
    protected $garnishWeight;

    /**
     * @return null
     */
    public function __toString() {
        return 'GarnishMix #' . $this->getId();
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
        
        if ($this->mix && $this->mix->getEntryState() !== self::STATE_CLEAN) {
            return self::STATE_DIRTY;
        }
        
        if ($this->garnish && $this->garnish->getEntryState() !== self::STATE_CLEAN) {
            return self::STATE_DIRTY;
        }
        
        return self::STATE_CLEAN;
    }

    /**
     * @param \ride\application\orm\entry\MixEntry $mix 
     * @return null
     */
    public function setMix(AliasMixEntry $mix = NULL) {
        $isClean = false;
        if ((!$this->mix && !$mix) || ($this->mix && $mix && $this->mix->getId() === $mix->getId())) {
            $isClean = true;
        }
        
        $this->mix = $mix;
        
        if (!$isClean && $this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return \ride\application\orm\entry\MixEntry
     */
    public function getMix() {
        return $this->mix;
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
     * @param integer $mixWeight 
     * @return null
     */
    public function setMixWeight($mixWeight) {
        if ($this->mixWeight === $mixWeight) {
            return;
        }
        
        $this->mixWeight = $mixWeight;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return integer
     */
    public function getMixWeight() {
        return $this->mixWeight;
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
