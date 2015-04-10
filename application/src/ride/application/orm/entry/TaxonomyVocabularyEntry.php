<?php

namespace ride\application\orm\entry;

use ride\library\orm\entry\GenericEntry;
use ride\library\orm\entry\SluggedEntry;

/**
 * Generated entry for the TaxonomyVocabulary model
 * 
 * NOTE: Do not edit this class directly, define your own and extend from this one.
 */
class TaxonomyVocabularyEntry extends GenericEntry implements SluggedEntry {

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $slug;

    /**
     * @return null
     */
    public function __toString() {
        return 'TaxonomyVocabulary #' . $this->getId();
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

}
