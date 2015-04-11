<?php

namespace ride\application\orm\entry;

use ride\application\orm\entry\BotanicalEntry as AliasBotanicalEntry;
use ride\application\orm\entry\GinEntry as AliasGinEntry;
use ride\library\orm\entry\GenericEntry;

/**
 * Generated entry for the BotanicalGin model
 * 
 * NOTE: Do not edit this class directly, define your own and extend from this one.
 */
class BotanicalGinEntry extends GenericEntry {

    /**
     * @var \ride\application\orm\entry\GinEntry
     */
    protected $gin = NULL;

    /**
     * @var \ride\application\orm\entry\BotanicalEntry
     */
    protected $botanical = NULL;

    /**
     * @var integer
     */
    protected $ginWeight;

    /**
     * @var integer
     */
    protected $botanicalWeight;

    /**
     * @return null
     */
    public function __toString() {
        return 'BotanicalGin #' . $this->getId();
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
        
        if ($this->botanical && $this->botanical->getEntryState() !== self::STATE_CLEAN) {
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
     * @param \ride\application\orm\entry\BotanicalEntry $botanical 
     * @return null
     */
    public function setBotanical(AliasBotanicalEntry $botanical = NULL) {
        $isClean = false;
        if ((!$this->botanical && !$botanical) || ($this->botanical && $botanical && $this->botanical->getId() === $botanical->getId())) {
            $isClean = true;
        }
        
        $this->botanical = $botanical;
        
        if (!$isClean && $this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return \ride\application\orm\entry\BotanicalEntry
     */
    public function getBotanical() {
        return $this->botanical;
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
     * @param integer $botanicalWeight 
     * @return null
     */
    public function setBotanicalWeight($botanicalWeight) {
        if ($this->botanicalWeight === $botanicalWeight) {
            return;
        }
        
        $this->botanicalWeight = $botanicalWeight;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return integer
     */
    public function getBotanicalWeight() {
        return $this->botanicalWeight;
    }

}
