<?php

namespace ride\application\orm\entry;

use ride\application\orm\entry\ImageTransformationEntry as AliasImageTransformationEntry;
use ride\library\orm\entry\DatedEntry;
use ride\library\orm\entry\GenericEntry;

/**
 * Generated entry for the ImageTransformationOption model
 * 
 * NOTE: Do not edit this class directly, define your own and extend from this one.
 */
class ImageTransformationOptionEntry extends GenericEntry implements DatedEntry {

    /**
     * @var \ride\application\orm\entry\ImageTransformationEntry
     */
    protected $transformation = NULL;

    /**
     * @var string
     */
    protected $key;

    /**
     * @var string
     */
    protected $value;

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
        return 'ImageTransformationOption #' . $this->getId();
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
        
        if ($this->transformation && $this->transformation->getEntryState() !== self::STATE_CLEAN) {
            return self::STATE_DIRTY;
        }
        
        return self::STATE_CLEAN;
    }

    /**
     * @param \ride\application\orm\entry\ImageTransformationEntry $transformation 
     * @return null
     */
    public function setTransformation(AliasImageTransformationEntry $transformation = NULL) {
        $isClean = false;
        if ((!$this->transformation && !$transformation) || ($this->transformation && $transformation && $this->transformation->getId() === $transformation->getId())) {
            $isClean = true;
        }
        
        $this->transformation = $transformation;
        
        if (!$isClean && $this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return \ride\application\orm\entry\ImageTransformationEntry
     */
    public function getTransformation() {
        return $this->transformation;
    }

    /**
     * @param string $key 
     * @return null
     */
    public function setKey($key) {
        if ($this->key === $key) {
            return;
        }
        
        $this->key = $key;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getKey() {
        return $this->key;
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
