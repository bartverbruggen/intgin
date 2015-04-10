<?php

namespace ride\application\orm\entry;

use \InvalidArgumentException;
use ride\application\orm\asset\entry\AssetFolderEntry as AliasAssetFolderEntry;
use ride\application\orm\entry\AssetImageStyleEntry as AliasAssetImageStyleEntry;
use ride\library\orm\entry\DatedEntry;
use ride\library\orm\entry\GenericEntry;
use ride\library\orm\entry\LocalizedEntry;
use ride\library\orm\entry\SluggedEntry;
use ride\library\orm\entry\VersionedEntry;
use ride\web\security\model\orm\entry\UserEntry as AliasUserEntry;

/**
 * Generated entry for the Asset model
 * 
 * NOTE: Do not edit this class directly, define your own and extend from this one.
 */
class AssetEntry extends GenericEntry implements DatedEntry, OwnedEntry, SluggedEntry, VersionedEntry, LocalizedEntry {

    /**
     * @var \ride\application\orm\asset\entry\AssetFolderEntry
     */
    protected $folder = NULL;

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
    protected $type;

    /**
     * @var string
     */
    protected $source;

    /**
     * @var string
     */
    protected $value;

    /**
     * @var string
     */
    protected $thumbnail;

    /**
     * @var array
     */
    protected $styles = array();

    /**
     * @var string
     */
    protected $embedUrl;

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
     * @var \ride\web\security\model\orm\entry\UserEntry
     */
    protected $owner = NULL;

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
        return 'Asset #' . $this->getId();
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
        
        if ($this->folder && $this->folder->getEntryState() !== self::STATE_CLEAN) {
            return self::STATE_DIRTY;
        }
        
        if ($this->styles) {
            foreach ($this->styles as $value) {
                if ($value->getEntryState() !== self::STATE_CLEAN) {
                    return self::STATE_DIRTY;
                }
            }
        }
        
        if ($this->owner && $this->owner->getEntryState() !== self::STATE_CLEAN) {
            return self::STATE_DIRTY;
        }
        
        return self::STATE_CLEAN;
    }

    /**
     * @param \ride\application\orm\asset\entry\AssetFolderEntry $folder 
     * @return null
     */
    public function setFolder(AliasAssetFolderEntry $folder = NULL) {
        $isClean = false;
        if ((!$this->folder && !$folder) || ($this->folder && $folder && $this->folder->getId() === $folder->getId())) {
            $isClean = true;
        }
        
        $this->folder = $folder;
        
        if (!$isClean && $this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return \ride\application\orm\asset\entry\AssetFolderEntry
     */
    public function getFolder() {
        return $this->folder;
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
     * @param string $source 
     * @return null
     */
    public function setSource($source) {
        if ($this->source === $source) {
            return;
        }
        
        $this->source = $source;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getSource() {
        return $this->source;
    }

    /**
     * @param string $value 
     * @return null
     */
    public function setValue($value) {
        if ($this->value === $value) {
            return;
        }
        
        $this->value = $value;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * @param string $thumbnail 
     * @return null
     */
    public function setThumbnail($thumbnail) {
        if ($this->thumbnail === $thumbnail) {
            return;
        }
        
        $this->thumbnail = $thumbnail;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getThumbnail() {
        return $this->thumbnail;
    }

    /**
     * @param \ride\application\orm\entry\AssetImageStyleEntry $entry 
     * @return null
     */
    public function addToStyles(AliasAssetImageStyleEntry $entry) {
        $this->getStyles();
        
        $this->styles[] = $entry;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @param \ride\application\orm\entry\AssetImageStyleEntry $entry 
     * @return null
     */
    public function removeFromStyles(AliasAssetImageStyleEntry $entry) {
        $this->getStyles();
        
        $status = false;
        
        foreach ($this->styles as $stylesIndex => $stylesValue) {
            if ($stylesValue === $entry || $stylesValue->getId() === $entry->getId()) {
                unset($this->styles[$stylesIndex]);
        
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
     * @param array $styles 
     * @return null
     */
    public function setStyles(array $styles = array()) {
        foreach ($styles as $stylesIndex => $stylesValue) {
            if (!$stylesValue instanceof AliasAssetImageStyleEntry) {
                throw new InvalidArgumentException("Could not set styles: value on index $stylesIndex is not an instance of ride\\application\\orm\\entry\\AssetImageStyleEntry");
            }
        }
        
        $this->styles = $styles;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return array
     */
    public function getStyles() {
        return $this->styles;
    }

    /**
     * @param string $embedUrl 
     * @return null
     */
    public function setEmbedUrl($embedUrl) {
        if ($this->embedUrl === $embedUrl) {
            return;
        }
        
        $this->embedUrl = $embedUrl;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getEmbedUrl() {
        return $this->embedUrl;
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
     * @param \ride\web\security\model\orm\entry\UserEntry $owner 
     * @return null
     */
    public function setOwner(AliasUserEntry $owner = NULL) {
        $isClean = false;
        if ((!$this->owner && !$owner) || ($this->owner && $owner && $this->owner->getId() === $owner->getId())) {
            $isClean = true;
        }
        
        $this->owner = $owner;
        
        if (!$isClean && $this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return \ride\web\security\model\orm\entry\UserEntry
     */
    public function getOwner() {
        return $this->owner;
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
