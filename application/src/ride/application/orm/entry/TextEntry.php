<?php

namespace ride\application\orm\entry;

use \InvalidArgumentException;
use ride\application\orm\entry\TextCtaEntry as AliasTextCtaEntry;
use ride\library\orm\entry\DatedEntry;
use ride\library\orm\entry\GenericEntry;
use ride\library\orm\entry\LocalizedEntry;
use ride\library\orm\entry\VersionedEntry;

/**
 * Generated entry for the Text model
 * 
 * NOTE: Do not edit this class directly, define your own and extend from this one.
 */
class TextEntry extends GenericEntry implements DatedEntry, VersionedEntry, LocalizedEntry {

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $subtitle;

    /**
     * @var string
     */
    protected $body;

    /**
     * @var string
     */
    protected $image;

    /**
     * @var string
     */
    protected $imageAlignment;

    /**
     * @var string
     */
    protected $format = 'wysiwyg';

    /**
     * @var array
     */
    protected $callToActions = array();

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
        return 'Text #' . $this->getId();
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
        
        if ($this->callToActions) {
            foreach ($this->callToActions as $value) {
                if ($value->getEntryState() !== self::STATE_CLEAN) {
                    return self::STATE_DIRTY;
                }
            }
        }
        
        return self::STATE_CLEAN;
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
     * @param string $title 
     * @return null
     */
    public function setTitle($title) {
        if ($this->title === $title) {
            return;
        }
        
        $this->title = $title;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param string $subtitle 
     * @return null
     */
    public function setSubtitle($subtitle) {
        if ($this->subtitle === $subtitle) {
            return;
        }
        
        $this->subtitle = $subtitle;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getSubtitle() {
        return $this->subtitle;
    }

    /**
     * @param string $body 
     * @return null
     */
    public function setBody($body) {
        if ($this->body === $body) {
            return;
        }
        
        $this->body = $body;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getBody() {
        return $this->body;
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
     * @param string $imageAlignment 
     * @return null
     */
    public function setImageAlignment($imageAlignment) {
        if ($this->imageAlignment === $imageAlignment) {
            return;
        }
        
        $this->imageAlignment = $imageAlignment;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getImageAlignment() {
        return $this->imageAlignment;
    }

    /**
     * @param string $format 
     * @return null
     */
    public function setFormat($format = 'wysiwyg') {
        if ($this->format === $format) {
            return;
        }
        
        $this->format = $format;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getFormat() {
        return $this->format;
    }

    /**
     * @param \ride\application\orm\entry\TextCtaEntry $entry 
     * @return null
     */
    public function addToCallToActions(AliasTextCtaEntry $entry) {
        $this->getCallToActions();
        
        $this->callToActions[] = $entry;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @param \ride\application\orm\entry\TextCtaEntry $entry 
     * @return null
     */
    public function removeFromCallToActions(AliasTextCtaEntry $entry) {
        $this->getCallToActions();
        
        $status = false;
        
        foreach ($this->callToActions as $callToActionsIndex => $callToActionsValue) {
            if ($callToActionsValue === $entry || $callToActionsValue->getId() === $entry->getId()) {
                unset($this->callToActions[$callToActionsIndex]);
        
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
     * @param array $callToActions 
     * @return null
     */
    public function setCallToActions(array $callToActions = array()) {
        foreach ($callToActions as $callToActionsIndex => $callToActionsValue) {
            if (!$callToActionsValue instanceof AliasTextCtaEntry) {
                throw new InvalidArgumentException("Could not set callToActions: value on index $callToActionsIndex is not an instance of ride\\application\\orm\\entry\\TextCtaEntry");
            }
        }
        
        $this->callToActions = $callToActions;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return array
     */
    public function getCallToActions() {
        return $this->callToActions;
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
