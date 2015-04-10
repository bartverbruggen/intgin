<?php

namespace ride\application\orm\entry;

use \InvalidArgumentException;
use ride\application\orm\entry\ImageTransformationOptionEntry as AliasImageTransformationOptionEntry;
use ride\library\orm\entry\DatedEntry;
use ride\library\orm\entry\GenericEntry;
use ride\library\orm\entry\VersionedEntry;

/**
 * Generated entry for the ImageTransformation model
 * 
 * NOTE: Do not edit this class directly, define your own and extend from this one.
 */
class ImageTransformationEntry extends GenericEntry implements DatedEntry, VersionedEntry {

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $transformation;

    /**
     * @var array
     */
    protected $options = array();

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
        return 'ImageTransformation #' . $this->getId();
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
        
        if ($this->options) {
            foreach ($this->options as $value) {
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
     * @param string $transformation 
     * @return null
     */
    public function setTransformation($transformation) {
        if ($this->transformation === $transformation) {
            return;
        }
        
        $this->transformation = $transformation;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getTransformation() {
        return $this->transformation;
    }

    /**
     * @param \ride\application\orm\entry\ImageTransformationOptionEntry $entry 
     * @return null
     */
    public function addToOptions(AliasImageTransformationOptionEntry $entry) {
        $this->getOptions();
        
        $this->options[] = $entry;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @param \ride\application\orm\entry\ImageTransformationOptionEntry $entry 
     * @return null
     */
    public function removeFromOptions(AliasImageTransformationOptionEntry $entry) {
        $this->getOptions();
        
        $status = false;
        
        foreach ($this->options as $optionsIndex => $optionsValue) {
            if ($optionsValue === $entry || $optionsValue->getId() === $entry->getId()) {
                unset($this->options[$optionsIndex]);
        
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
     * @param array $options 
     * @return null
     */
    public function setOptions(array $options = array()) {
        foreach ($options as $optionsIndex => $optionsValue) {
            if (!$optionsValue instanceof AliasImageTransformationOptionEntry) {
                throw new InvalidArgumentException("Could not set options: value on index $optionsIndex is not an instance of ride\\application\\orm\\entry\\ImageTransformationOptionEntry");
            }
        }
        
        $this->options = $options;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return array
     */
    public function getOptions() {
        return $this->options;
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
