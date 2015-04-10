<?php

namespace ride\application\orm\entry;

use ride\application\orm\model\TaxonomyTerm as AliasTaxonomyTerm;
use ride\application\orm\model\TaxonomyVocabulary as AliasTaxonomyVocabulary;
use ride\library\orm\entry\GenericEntry;
use ride\library\orm\entry\LocalizedEntry;
use ride\library\orm\entry\SluggedEntry;

/**
 * Generated entry for the TaxonomyTerm model
 * 
 * NOTE: Do not edit this class directly, define your own and extend from this one.
 */
class TaxonomyTermEntry extends GenericEntry implements SluggedEntry, LocalizedEntry {

    /**
     * @var \ride\application\orm\model\TaxonomyVocabulary
     */
    protected $vocabulary = NULL;

    /**
     * @var \ride\application\orm\model\TaxonomyTerm
     */
    protected $parent = NULL;

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
    protected $image;

    /**
     * @var integer
     */
    protected $weight;

    /**
     * @var string
     */
    protected $slug;

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
        return 'TaxonomyTerm #' . $this->getId();
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
        
        if ($this->vocabulary && $this->vocabulary->getEntryState() !== self::STATE_CLEAN) {
            return self::STATE_DIRTY;
        }
        
        if ($this->parent && $this->parent->getEntryState() !== self::STATE_CLEAN) {
            return self::STATE_DIRTY;
        }
        
        return self::STATE_CLEAN;
    }

    /**
     * @param \ride\application\orm\model\TaxonomyVocabulary $vocabulary 
     * @return null
     */
    public function setVocabulary(AliasTaxonomyVocabulary $vocabulary = NULL) {
        $isClean = false;
        if ((!$this->vocabulary && !$vocabulary) || ($this->vocabulary && $vocabulary && $this->vocabulary->getId() === $vocabulary->getId())) {
            $isClean = true;
        }
        
        $this->vocabulary = $vocabulary;
        
        if (!$isClean && $this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return \ride\application\orm\model\TaxonomyVocabulary
     */
    public function getVocabulary() {
        return $this->vocabulary;
    }

    /**
     * @param \ride\application\orm\model\TaxonomyTerm $parent 
     * @return null
     */
    public function setParent(AliasTaxonomyTerm $parent = NULL) {
        $isClean = false;
        if ((!$this->parent && !$parent) || ($this->parent && $parent && $this->parent->getId() === $parent->getId())) {
            $isClean = true;
        }
        
        $this->parent = $parent;
        
        if (!$isClean && $this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return \ride\application\orm\model\TaxonomyTerm
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
     * @param integer $weight 
     * @return null
     */
    public function setWeight($weight) {
        if ($this->weight === $weight) {
            return;
        }
        
        $this->weight = $weight;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return integer
     */
    public function getWeight() {
        return $this->weight;
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
