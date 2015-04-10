<?php

namespace ride\application\orm\entry;

use ride\application\orm\asset\entry\AssetEntry as AliasAssetEntry;
use ride\library\orm\entry\DatedEntry;
use ride\library\orm\entry\GenericEntry;
use ride\library\orm\entry\SluggedEntry;
use ride\library\orm\entry\VersionedEntry;

/**
 * Generated entry for the Tonic model
 * 
 * NOTE: Do not edit this class directly, define your own and extend from this one.
 */
class TonicEntry extends GenericEntry implements DatedEntry, SluggedEntry, VersionedEntry {

    /**
     * @var string
     */
    protected $title;

    /**
     * @var \ride\application\orm\asset\entry\AssetEntry
     */
    protected $image = NULL;

    /**
     * @var string
     */
    protected $body;

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
        return 'Tonic #' . $this->getId();
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
        
        if ($this->image && $this->image->getEntryState() !== self::STATE_CLEAN) {
            return self::STATE_DIRTY;
        }
        
        return self::STATE_CLEAN;
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
     * @param \ride\application\orm\asset\entry\AssetEntry $image 
     * @return null
     */
    public function setImage(AliasAssetEntry $image = NULL) {
        $isClean = false;
        if ((!$this->image && !$image) || ($this->image && $image && $this->image->getId() === $image->getId())) {
            $isClean = true;
        }
        
        $this->image = $image;
        
        if (!$isClean && $this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return \ride\application\orm\asset\entry\AssetEntry
     */
    public function getImage() {
        return $this->image;
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
        $slug .= ' ' . $this->getTitle();
        
        return trim($slug);
    }

}
