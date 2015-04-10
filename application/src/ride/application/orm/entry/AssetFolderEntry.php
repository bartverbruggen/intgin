<?php

namespace ride\application\orm\entry;

use \InvalidArgumentException;
use ride\application\orm\asset\entry\AssetEntry as AliasAssetEntry;
use ride\library\orm\entry\DatedEntry;
use ride\library\orm\entry\GenericEntry;
use ride\library\orm\entry\LocalizedEntry;
use ride\library\orm\entry\SluggedEntry;
use ride\library\orm\entry\VersionedEntry;

/**
 * Generated entry for the AssetFolder model
 * 
 * NOTE: Do not edit this class directly, define your own and extend from this one.
 */
class AssetFolderEntry extends GenericEntry implements DatedEntry, SluggedEntry, VersionedEntry, LocalizedEntry {

    /**
     * @var string
     */
    protected $parent;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var array
     */
    protected $assets = array();

    /**
     * @var integer
     */
    protected $orderIndex;

    /**
     * @var string
     */
    protected $slug;

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
        return 'AssetFolder #' . $this->getId();
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
        
        if ($this->assets) {
            foreach ($this->assets as $value) {
                if ($value->getEntryState() !== self::STATE_CLEAN) {
                    return self::STATE_DIRTY;
                }
            }
        }
        
        return self::STATE_CLEAN;
    }

    /**
     * @param string $parent 
     * @return null
     */
    public function setParent($parent) {
        if ($this->parent === $parent) {
            return;
        }
        
        $this->parent = $parent;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getParent() {
        return $this->parent;
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
     * @param \ride\application\orm\asset\entry\AssetEntry $entry 
     * @return null
     */
    public function addToAssets(AliasAssetEntry $entry) {
        $this->getAssets();
        
        $this->assets[] = $entry;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @param \ride\application\orm\asset\entry\AssetEntry $entry 
     * @return null
     */
    public function removeFromAssets(AliasAssetEntry $entry) {
        $this->getAssets();
        
        $status = false;
        
        foreach ($this->assets as $assetsIndex => $assetsValue) {
            if ($assetsValue === $entry || $assetsValue->getId() === $entry->getId()) {
                unset($this->assets[$assetsIndex]);
        
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
     * @param array $assets 
     * @return null
     */
    public function setAssets(array $assets = array()) {
        foreach ($assets as $assetsIndex => $assetsValue) {
            if (!$assetsValue instanceof AliasAssetEntry) {
                throw new InvalidArgumentException("Could not set assets: value on index $assetsIndex is not an instance of ride\\application\\orm\\asset\\entry\\AssetEntry");
            }
        }
        
        $this->assets = $assets;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return array
     */
    public function getAssets() {
        return $this->assets;
    }

    /**
     * @param integer $orderIndex 
     * @return null
     */
    public function setOrderIndex($orderIndex) {
        if ($this->orderIndex === $orderIndex) {
            return;
        }
        
        $this->orderIndex = $orderIndex;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return integer
     */
    public function getOrderIndex() {
        return $this->orderIndex;
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

    /**
     * Gets the desired slug based on properties of the entry
     * @return string
     */
    public function getSlugBase() {
        $slug = '';
        $slug .= ' ' . $this->getName();
        
        return trim($slug);
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
