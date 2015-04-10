<?php

namespace ride\application\orm\entry;

use ride\library\orm\entry\GenericEntry;
use ride\library\orm\entry\LocalizedEntry;
use ride\web\cms\orm\entry\TextEntry as AliasTextEntry;

/**
 * Generated entry for the TextCta model
 * 
 * NOTE: Do not edit this class directly, define your own and extend from this one.
 */
class TextCtaEntry extends GenericEntry implements LocalizedEntry {

    /**
     * @var \ride\web\cms\orm\entry\TextEntry
     */
    protected $text = NULL;

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
     * @var string
     */
    protected $type;

    /**
     * Code of the locale
     * @var string
     */
    protected $locale;

    /**
     * Flag to see if the entry is localized
     * @var boolean
     */
    protected $isLocalized;

    /**
     * @return null
     */
    public function __toString() {
        return 'TextCta #' . $this->getId();
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
        
        if ($this->text && $this->text->getEntryState() !== self::STATE_CLEAN) {
            return self::STATE_DIRTY;
        }
        
        return self::STATE_CLEAN;
    }

    /**
     * @param \ride\web\cms\orm\entry\TextEntry $text 
     * @return null
     */
    public function setText(AliasTextEntry $text = NULL) {
        $isClean = false;
        if ((!$this->text && !$text) || ($this->text && $text && $this->text->getId() === $text->getId())) {
            $isClean = true;
        }
        
        $this->text = $text;
        
        if (!$isClean && $this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return \ride\web\cms\orm\entry\TextEntry
     */
    public function getText() {
        return $this->text;
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

    /**
     * @param string $type 
     * @return null
     */
    public function setType($type) {
        if ($this->type === $type) {
            return;
        }
        
        $this->type = $type;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getType() {
        return $this->type;
    }

    /**
     * Sets the locale of the localized entry fields
     * @param string $locale Code of the locale
     * @return null
     */
    public function setLocale($locale) {
        $this->locale = $locale;
    }

    /**
     * Gets the locale of the localized entry fields
     * @return string Code of the locale
     */
    public function getLocale() {
        return $this->locale;
    }

    /**
     * Sets whether the entry is localized in the requested locale
     * @param boolean $isLocalized Flag to see if the entry is localized
     * @return null
     */
    public function setIsLocalized($isLocalized) {
        $this->isLocalized = $isLocalized;
    }

    /**
     * Gets whether the entry is localized in the requested locale
     * @return boolean Flag to see if the entry is localized
     */
    public function isLocalized() {
        return $this->isLocalized;
    }

}
