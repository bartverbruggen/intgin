<?php

namespace ride\application\orm\entry\proxy;

use ride\application\orm\asset\entry\ImageStyleEntry;
use ride\application\orm\entry\ImageStyleTransformationEntry;
use ride\application\orm\entry\ImageTransformationEntry;
use ride\library\orm\entry\EntryProxy;
use ride\library\orm\model\Model;

/**
 * Generated proxy for an entry of the ImageStyleTransformation model
 * 
 * NOTE: Do not edit this class
 */
class ImageStyleTransformationEntryProxy extends ImageStyleTransformationEntry implements EntryProxy {

    /**
     * Instance of the ImageStyleTransformation model
     * @var \ride\library\orm\model\Model
     */
    protected $_model;

    /**
     * Array with the loaded values of the fields
     * @var array
     */
    private $loadedValues;

    /**
     * Array with the load status of the fields
     * @var array
     */
    private $loadedFields;

    /**
     * Construct a new ImageStyleTransformation entry proxy
     * @param \ride\library\orm\model\Model $model Instance of the ImageStyleTransformation model
     * @param integer $id Id of the entry
     * @param array $properties Values of the known properties
     * @return null
     */
    public function __construct(Model $model, $id, array $properties = array()) {
        $this->_model = $model;
        $this->loadedValues = array();
        $this->loadedFields = array();
        $this->id = $id;
        
        if ($id) {
            $this->entryState = self::STATE_CLEAN;
        } else {
            $this->entryState = self::STATE_NEW;
        }
        
        $this->setLoadedValues($properties);
    }

    /**
     * Removes the link with the ORM
     * @return null
     */
    public function unlink() {
        $this->_model = null;
        
        foreach ($this->loadedFields as $property => $loadState) {
            if ($this->$property instanceof EntryProxy) {
                $this->$property->unlink();
            }
            if (isset($this->loadedValues[$property])) {
                if ($this->loadedValues[$property] instanceof EntryProxy) {
                    $this->loadedValues[$property]->unlink();
                } elseif (is_array($this->loadedValues[$property])) {
                    foreach ($this->loadedValues[$property] as $key => $value) {
                        if ($value instanceof EntryProxy) {
                            $value->unlink();
                        }
                    }
                }
            }
        
            if (is_array($this->$property)) {
                foreach ($this->$property as $key => $value) {
                    if ($value instanceof EntryProxy) {
                        $value->unlink();
                    }
                }
            }
        }
    }

    /**
     * Processes the value for the state, clones all instances
     * @param mixed $value Value to process
     * @return null
     */
    protected function processLoadedValue($value) {
        if (is_object($value)) {
            return clone $value;
        } elseif (is_array($value)) {
            foreach ($value as $i => $iValue) {
                $value[$i] = $this->processLoadedValue($iValue);
            }
        }
        
        return $value;
    }

    /**
     * Sets the loaded value of the data source
     * @param string|array $fieldName Field name of the provided value or an array with values of multiple fields
     * @param mixed $value Value of the provided field
     * @return null
     */
    public function setLoadedValues($fieldName, $value = NULL) {
        if (!is_array($fieldName)) {
            $values = array($fieldName => $value);
        } else {
            $values = $fieldName;
        
            $this->loadedValues = array();
        }
        
        foreach ($values as $fieldName => $value) {
            if (!isset($this->loadedValues[$fieldName])) {
                $this->$fieldName = $value;
            }
        
            $this->loadedValues[$fieldName] = $this->processLoadedValue($value);
            $this->loadedFields[$fieldName] = true;
        }
    }

    /**
     * Sets the loaded value of the data source
     * @param string $fieldName Name of the field
     * @return null
     */
    public function getLoadedValues($fieldName = NULL) {
        if (!$fieldName) {
            return $this->loadedValues;
        } elseif (isset($this->loadedValues[$fieldName])) {
            return $this->loadedValues[$fieldName];
        } else {
            return null;
        }
    }

    /**
     * Checks if a the value of a field is loaded
     * @param string $fieldName Name of the field
     * @return boolean
     */
    public function isValueLoaded($fieldName) {
        return array_key_exists($fieldName, $this->loadedValues);
    }

    /**
     * Checks if a field is set
     * @param string $fieldName Name of the field
     * @return boolean
     */
    public function isFieldSet($fieldName) {
        return isset($this->loadedFields[$fieldName]);
    }

    /**
     * Loads the values of the properties of this ImageStyleTransformation entry
     * @return null
     */
    private function loadProperties() {
        $id = $this->getId();
        if (!$id) {
            return;
        }
        
        $query = $this->_model->createQuery();
        $query->setRecursiveDepth(0);
        $query->addCondition('{id} = %1%', $id);
        $entry = $query->queryFirst();
        
        if (!$entry) {
            $this->loadedFields['imageStyle'] = true;
            $this->loadedFields['imageTransformation'] = true;
            $this->loadedFields['imageStyleWeight'] = true;
            $this->loadedFields['imageTransformationWeight'] = true;
        
            $this->entryState = self::STATE_NEW;
        
            return;
        }
        
        if (!isset($this->loadedFields['imageStyle'])) {
            $this->imageStyle = $entry->getImageStyle();
            $this->loadedValues['imageStyle'] = $entry->loadedValues['imageStyle'];
            $this->loadedFields['imageStyle'] = true;
        }
        if (!isset($this->loadedFields['imageTransformation'])) {
            $this->imageTransformation = $entry->getImageTransformation();
            $this->loadedValues['imageTransformation'] = $entry->loadedValues['imageTransformation'];
            $this->loadedFields['imageTransformation'] = true;
        }
        if (!isset($this->loadedFields['imageStyleWeight'])) {
            $this->imageStyleWeight = $entry->getImageStyleWeight();
            $this->loadedValues['imageStyleWeight'] = $entry->loadedValues['imageStyleWeight'];
            $this->loadedFields['imageStyleWeight'] = true;
        }
        if (!isset($this->loadedFields['imageTransformationWeight'])) {
            $this->imageTransformationWeight = $entry->getImageTransformationWeight();
            $this->loadedValues['imageTransformationWeight'] = $entry->loadedValues['imageTransformationWeight'];
            $this->loadedFields['imageTransformationWeight'] = true;
        }
    }

    /**
     * Loads the value of a relation field of this ImageStyleTransformation entry
     * @param string $fieldName Name of the relation field
     * @return null
     */
    private function loadRelation($fieldName) {
        $id = $this->getId();
        if (!$id) {
            return;
        }
        
        $query = $this->_model->createQuery();
        $entry = $query->queryRelation($this->getId(), $fieldName);
        
        $getterMethodName = 'get' . ucfirst($fieldName);
        $this->$fieldName = $entry->$getterMethodName();
        $this->loadedValues[$fieldName] = $entry->loadedValues[$fieldName];
        $this->loadedFields[$fieldName] = true;
    }

    /**
     * @param \ride\application\orm\asset\entry\ImageStyleEntry $imageStyle 
     * @return null
     */
    public function setImageStyle(ImageStyleEntry $imageStyle = NULL) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('imageStyle', $this->loadedValues)) {
            $oldValue = $this->loadedValues['imageStyle'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['imageStyle'])) {
            $oldValue = $this->getImageStyle();
            $hasOldValue = true;
        }
        if ($hasOldValue && ((!$oldValue && !$imageStyle) || ($oldValue && $imageStyle && $oldValue->getId() === $imageStyle->getId())))  {
            return;
        }
        
        $this->loadedFields['imageStyle'] = true;
        
        return parent::setImageStyle($imageStyle);
    }

    /**
     * @return \ride\application\orm\asset\entry\ImageStyleEntry
     */
    public function getImageStyle() {
        if (!isset($this->loadedFields['imageStyle'])) {
            $this->loadProperties();
        }
        
        return parent::getImageStyle();
    }

    /**
     * @param \ride\application\orm\entry\ImageTransformationEntry $imageTransformation 
     * @return null
     */
    public function setImageTransformation(ImageTransformationEntry $imageTransformation = NULL) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('imageTransformation', $this->loadedValues)) {
            $oldValue = $this->loadedValues['imageTransformation'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['imageTransformation'])) {
            $oldValue = $this->getImageTransformation();
            $hasOldValue = true;
        }
        if ($hasOldValue && ((!$oldValue && !$imageTransformation) || ($oldValue && $imageTransformation && $oldValue->getId() === $imageTransformation->getId())))  {
            return;
        }
        
        $this->loadedFields['imageTransformation'] = true;
        
        return parent::setImageTransformation($imageTransformation);
    }

    /**
     * @return \ride\application\orm\entry\ImageTransformationEntry
     */
    public function getImageTransformation() {
        if (!isset($this->loadedFields['imageTransformation'])) {
            $this->loadProperties();
        }
        
        return parent::getImageTransformation();
    }

    /**
     * @param integer $imageStyleWeight 
     * @return null
     */
    public function setImageStyleWeight($imageStyleWeight) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('imageStyleWeight', $this->loadedValues)) {
            $oldValue = $this->loadedValues['imageStyleWeight'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['imageStyleWeight'])) {
            $oldValue = $this->getImageStyleWeight();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $imageStyleWeight)  {
            return;
        }
        
        $this->loadedFields['imageStyleWeight'] = true;
        
        return parent::setImageStyleWeight($imageStyleWeight);
    }

    /**
     * @return integer
     */
    public function getImageStyleWeight() {
        if (!isset($this->loadedFields['imageStyleWeight'])) {
            $this->loadProperties();
        }
        
        return parent::getImageStyleWeight();
    }

    /**
     * @param integer $imageTransformationWeight 
     * @return null
     */
    public function setImageTransformationWeight($imageTransformationWeight) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('imageTransformationWeight', $this->loadedValues)) {
            $oldValue = $this->loadedValues['imageTransformationWeight'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['imageTransformationWeight'])) {
            $oldValue = $this->getImageTransformationWeight();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $imageTransformationWeight)  {
            return;
        }
        
        $this->loadedFields['imageTransformationWeight'] = true;
        
        return parent::setImageTransformationWeight($imageTransformationWeight);
    }

    /**
     * @return integer
     */
    public function getImageTransformationWeight() {
        if (!isset($this->loadedFields['imageTransformationWeight'])) {
            $this->loadProperties();
        }
        
        return parent::getImageTransformationWeight();
    }

}
