<?php

namespace ride\application\orm\entry;

use \InvalidArgumentException;
use ride\application\orm\entry\ImageTransformationEntry as AliasImageTransformationEntry;
use ride\library\orm\entry\DatedEntry;
use ride\library\orm\entry\GenericEntry;
use ride\library\orm\entry\SluggedEntry;
use ride\library\orm\entry\VersionedEntry;

/**
 * Generated entry for the ImageStyle model
 * 
 * NOTE: Do not edit this class directly, define your own and extend from this one.
 */
class ImageStyleEntry extends GenericEntry implements DatedEntry, SluggedEntry, VersionedEntry {

    /**
     * @var string
     */
    protected $name;

    /**
     * @var array
     */
    protected $transformations = array();

    /**
     * @var integer
     */
    protected $version;

    /**
     * @var string
     */
    protected $slug;

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
        return 'ImageStyle #' . $this->getId();
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
        
        if ($this->transformations) {
            foreach ($this->transformations as $value) {
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
     * @param \ride\application\orm\entry\ImageTransformationEntry $entry 
     * @return null
     */
    public function addToTransformations(AliasImageTransformationEntry $entry) {
        $this->getTransformations();
        
        $this->transformations[] = $entry;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @param \ride\application\orm\entry\ImageTransformationEntry $entry 
     * @return null
     */
    public function removeFromTransformations(AliasImageTransformationEntry $entry) {
        $this->getTransformations();
        
        $status = false;
        
        foreach ($this->transformations as $transformationsIndex => $transformationsValue) {
            if ($transformationsValue === $entry || $transformationsValue->getId() === $entry->getId()) {
                unset($this->transformations[$transformationsIndex]);
        
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
     * @param array $transformations 
     * @return null
     */
    public function setTransformations(array $transformations = array()) {
        foreach ($transformations as $transformationsIndex => $transformationsValue) {
            if (!$transformationsValue instanceof AliasImageTransformationEntry) {
                throw new InvalidArgumentException("Could not set transformations: value on index $transformationsIndex is not an instance of ride\\application\\orm\\entry\\ImageTransformationEntry");
            }
        }
        
        $this->transformations = $transformations;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return array
     */
    public function getTransformations() {
        return $this->transformations;
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

}
