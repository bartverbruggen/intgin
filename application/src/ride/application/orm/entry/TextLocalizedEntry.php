<?php

namespace ride\application\orm\entry;

use ride\library\orm\entry\GenericEntry;
use ride\web\cms\orm\entry\TextEntry as AliasTextEntry;

/**
 * Generated entry for the TextLocalized model
 * 
 * NOTE: Do not edit this class directly, define your own and extend from this one.
 */
class TextLocalizedEntry extends GenericEntry {

    /**
     * @var \ride\web\cms\orm\entry\TextEntry
     */
    protected $entry = NULL;

    /**
     * @var string
     */
    protected $locale;

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
     * @return null
     */
    public function __toString() {
        return 'TextLocalized #' . $this->getId();
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
        
        if ($this->entry && $this->entry->getEntryState() !== self::STATE_CLEAN) {
            return self::STATE_DIRTY;
        }
        
        return self::STATE_CLEAN;
    }

    /**
     * @param \ride\web\cms\orm\entry\TextEntry $entry 
     * @return null
     */
    public function setEntry(AliasTextEntry $entry = NULL) {
        $isClean = false;
        if ((!$this->entry && !$entry) || ($this->entry && $entry && $this->entry->getId() === $entry->getId())) {
            $isClean = true;
        }
        
        $this->entry = $entry;
        
        if (!$isClean && $this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return \ride\web\cms\orm\entry\TextEntry
     */
    public function getEntry() {
        return $this->entry;
    }

    /**
     * @param string $locale 
     * @return null
     */
    public function setLocale($locale) {
        if ($this->locale === $locale) {
            return;
        }
        
        $this->locale = $locale;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return string
     */
    public function getLocale() {
        return $this->locale;
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

}
