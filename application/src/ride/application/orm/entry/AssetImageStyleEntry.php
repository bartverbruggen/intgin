<?php

namespace ride\application\orm\entry;

use ride\application\orm\asset\entry\AssetEntry as AliasAssetEntry;
use ride\application\orm\asset\entry\ImageStyleEntry as AliasImageStyleEntry;
use ride\library\orm\entry\DatedEntry;
use ride\library\orm\entry\GenericEntry;
use ride\library\orm\entry\VersionedEntry;

/**
 * Generated entry for the AssetImageStyle model
 * 
 * NOTE: Do not edit this class directly, define your own and extend from this one.
 */
class AssetImageStyleEntry extends GenericEntry implements DatedEntry, VersionedEntry {

    /**
     * @var \ride\application\orm\asset\entry\AssetEntry
     */
    protected $asset = NULL;

    /**
     * @var \ride\application\orm\asset\entry\ImageStyleEntry
     */
    protected $style = NULL;

    /**
     * @var string
     */
    protected $image;

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
        return 'AssetImageStyle #' . $this->getId();
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
        
        if ($this->asset && $this->asset->getEntryState() !== self::STATE_CLEAN) {
            return self::STATE_DIRTY;
        }
        
        if ($this->style && $this->style->getEntryState() !== self::STATE_CLEAN) {
            return self::STATE_DIRTY;
        }
        
        return self::STATE_CLEAN;
    }

    /**
     * @param \ride\application\orm\asset\entry\AssetEntry $asset 
     * @return null
     */
    public function setAsset(AliasAssetEntry $asset = NULL) {
        $isClean = false;
        if ((!$this->asset && !$asset) || ($this->asset && $asset && $this->asset->getId() === $asset->getId())) {
            $isClean = true;
        }
        
        $this->asset = $asset;
        
        if (!$isClean && $this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return \ride\application\orm\asset\entry\AssetEntry
     */
    public function getAsset() {
        return $this->asset;
    }

    /**
     * @param \ride\application\orm\asset\entry\ImageStyleEntry $style 
     * @return null
     */
    public function setStyle(AliasImageStyleEntry $style = NULL) {
        $isClean = false;
        if ((!$this->style && !$style) || ($this->style && $style && $this->style->getId() === $style->getId())) {
            $isClean = true;
        }
        
        $this->style = $style;
        
        if (!$isClean && $this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return \ride\application\orm\asset\entry\ImageStyleEntry
     */
    public function getStyle() {
        return $this->style;
    }

    /**
     * @param string $image 
     * @return null
     */
    public function setImage($image) {
        if ($this->image === $image) {
            return;
        }
        
        $this->image = $image;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getImage() {
        return $this->image;
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
