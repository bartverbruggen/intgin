<?php

namespace ride\application\orm\entry;

use ride\application\orm\asset\entry\AssetEntry as AliasAssetEntry;
use ride\library\orm\entry\GenericEntry;

/**
 * Generated entry for the AssetLocalized model
 * 
 * NOTE: Do not edit this class directly, define your own and extend from this one.
 */
class AssetLocalizedEntry extends GenericEntry {

    /**
     * @var \ride\application\orm\asset\entry\AssetEntry
     */
    protected $entry = NULL;

    /**
     * @var string
     */
    protected $locale;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $slug;

    /**
     * @return null
     */
    public function __toString() {
        return 'AssetLocalized #' . $this->getId();
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
     * @param \ride\application\orm\asset\entry\AssetEntry $entry 
     * @return null
     */
    public function setEntry(AliasAssetEntry $entry = NULL) {
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
     * @return \ride\application\orm\asset\entry\AssetEntry
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
     * @param string $description 
     * @return null
     */
    public function setDescription($description) {
        if ($this->description === $description) {
            return;
        }
        
        $this->description = $description;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param string $slug 
     * @return null
     */
    public function setSlug($slug) {
        if ($this->slug === $slug) {
            return;
        }
        
        $this->slug = $slug;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getSlug() {
        return $this->slug;
    }

}
