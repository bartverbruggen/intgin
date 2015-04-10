<?php

namespace ride\application\orm\entry;

use ride\application\orm\asset\entry\ImageStyleEntry as AliasImageStyleEntry;
use ride\application\orm\entry\ImageTransformationEntry as AliasImageTransformationEntry;
use ride\library\orm\entry\GenericEntry;

/**
 * Generated entry for the ImageStyleTransformation model
 * 
 * NOTE: Do not edit this class directly, define your own and extend from this one.
 */
class ImageStyleTransformationEntry extends GenericEntry {

    /**
     * @var \ride\application\orm\asset\entry\ImageStyleEntry
     */
    protected $imageStyle = NULL;

    /**
     * @var \ride\application\orm\entry\ImageTransformationEntry
     */
    protected $imageTransformation = NULL;

    /**
     * @var integer
     */
    protected $imageStyleWeight;

    /**
     * @var integer
     */
    protected $imageTransformationWeight;

    /**
     * @return null
     */
    public function __toString() {
        return 'ImageStyleTransformation #' . $this->getId();
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
        
        if ($this->imageStyle && $this->imageStyle->getEntryState() !== self::STATE_CLEAN) {
            return self::STATE_DIRTY;
        }
        
        if ($this->imageTransformation && $this->imageTransformation->getEntryState() !== self::STATE_CLEAN) {
            return self::STATE_DIRTY;
        }
        
        return self::STATE_CLEAN;
    }

    /**
     * @param \ride\application\orm\asset\entry\ImageStyleEntry $imageStyle 
     * @return null
     */
    public function setImageStyle(AliasImageStyleEntry $imageStyle = NULL) {
        $isClean = false;
        if ((!$this->imageStyle && !$imageStyle) || ($this->imageStyle && $imageStyle && $this->imageStyle->getId() === $imageStyle->getId())) {
            $isClean = true;
        }
        
        $this->imageStyle = $imageStyle;
        
        if (!$isClean && $this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return \ride\application\orm\asset\entry\ImageStyleEntry
     */
    public function getImageStyle() {
        return $this->imageStyle;
    }

    /**
     * @param \ride\application\orm\entry\ImageTransformationEntry $imageTransformation 
     * @return null
     */
    public function setImageTransformation(AliasImageTransformationEntry $imageTransformation = NULL) {
        $isClean = false;
        if ((!$this->imageTransformation && !$imageTransformation) || ($this->imageTransformation && $imageTransformation && $this->imageTransformation->getId() === $imageTransformation->getId())) {
            $isClean = true;
        }
        
        $this->imageTransformation = $imageTransformation;
        
        if (!$isClean && $this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return \ride\application\orm\entry\ImageTransformationEntry
     */
    public function getImageTransformation() {
        return $this->imageTransformation;
    }

    /**
     * @param integer $imageStyleWeight 
     * @return null
     */
    public function setImageStyleWeight($imageStyleWeight) {
        if ($this->imageStyleWeight === $imageStyleWeight) {
            return;
        }
        
        $this->imageStyleWeight = $imageStyleWeight;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return integer
     */
    public function getImageStyleWeight() {
        return $this->imageStyleWeight;
    }

    /**
     * @param integer $imageTransformationWeight 
     * @return null
     */
    public function setImageTransformationWeight($imageTransformationWeight) {
        if ($this->imageTransformationWeight === $imageTransformationWeight) {
            return;
        }
        
        $this->imageTransformationWeight = $imageTransformationWeight;
        
        if ($this->entryState === self::STATE_CLEAN) {
            $this->entryState = self::STATE_DIRTY;
        }
    }

    /**
     * @return integer
     */
    public function getImageTransformationWeight() {
        return $this->imageTransformationWeight;
    }

}
