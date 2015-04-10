<?php

namespace ride\application\orm\entry;

use ride\application\orm\entry\TextCtaEntry as AliasTextCtaEntry;
use ride\library\orm\entry\GenericEntry;

/**
 * Generated entry for the TextCtaLocalized model
 * 
 * NOTE: Do not edit this class directly, define your own and extend from this one.
 */
class TextCtaLocalizedEntry extends GenericEntry {

    /**
     * @var \ride\application\orm\entry\TextCtaEntry
     */
    protected $entry = NULL;

    /**
     * @var string
     */
    protected $locale;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var string
     */
    protected $node;

    /**
     * @var string
     */
    protected $url;

    /**
     * @return null
     */
    public function __toString() {
        return 'TextCtaLocalized #' . $this->getId();
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
        
        if ($this->entry && $this->entry->getEntryState() !== self::STATE_CLEAN) {
            return self::STATE_DIRTY;
        }
        
        return self::STATE_CLEAN;
    }

    /**
     * @param \ride\application\orm\entry\TextCtaEntry $entry 
     * @return null
     */
    public function setEntry(AliasTextCtaEntry $entry = NULL) {
        $isClean = false;
        if ((!$this->entry && !$entry) || ($this->entry && $entry && $this->entry->getId() === $entry->getId())) {
            $isClean = true;
        }
        
        $this->entry = $entry;
        
        if (!$isClean && $this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return \ride\application\orm\entry\TextCtaEntry
     */
    public function getEntry() {
        return $this->entry;
    }

    /**
     * @param string $locale 
     * @return null
     */
    public function setLocale($locale) {
        if ($this->locale === $locale) {
            return;
        }
        
        $this->locale = $locale;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getLocale() {
        return $this->locale;
    }

    /**
     * @param string $label 
     * @return null
     */
    public function setLabel($label) {
        if ($this->label === $label) {
            return;
        }
        
        $this->label = $label;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getLabel() {
        return $this->label;
    }

    /**
     * @param string $node 
     * @return null
     */
    public function setNode($node) {
        if ($this->node === $node) {
            return;
        }
        
        $this->node = $node;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getNode() {
        return $this->node;
    }

    /**
     * @param string $url 
     * @return null
     */
    public function setUrl($url) {
        if ($this->url === $url) {
            return;
        }
        
        $this->url = $url;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getUrl() {
        return $this->url;
    }

}
