<?php

namespace ride\application\orm\entry;

use ride\application\orm\entry\GinEntry as AliasGinEntry;
use ride\application\orm\entry\MixEntry as AliasMixEntry;
use ride\library\orm\entry\GenericEntry;

/**
 * Generated entry for the GinMix model
 * 
 * NOTE: Do not edit this class directly, define your own and extend from this one.
 */
class GinMixEntry extends GenericEntry {

    /**
     * @var \ride\application\orm\entry\GinEntry
     */
    protected $gin = NULL;

    /**
     * @var \ride\application\orm\entry\MixEntry
     */
    protected $mix = NULL;

    /**
     * @return null
     */
    public function __toString() {
        return 'GinMix #' . $this->getId();
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
        
        if ($this->mix && $this->mix->getEntryState() !== self::STATE_CLEAN) {
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

}
