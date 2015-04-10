<?php

namespace ride\application\orm\entry\proxy;

use ride\application\orm\entry\ImageTransformationEntry;
use ride\application\orm\entry\ImageTransformationOptionEntry;
use ride\library\orm\entry\EntryProxy;
use ride\library\orm\model\Model;

/**
 * Generated proxy for an entry of the ImageTransformationOption model
 * 
 * NOTE: Do not edit this class
 */
class ImageTransformationOptionEntryProxy extends ImageTransformationOptionEntry implements EntryProxy {

    /**
     * Instance of the ImageTransformationOption model
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
     * Construct a new ImageTransformationOption entry proxy
     * @param \ride\library\orm\model\Model $model Instance of the ImageTransformationOption model
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
     * Loads the values of the properties of this ImageTransformationOption entry
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
            $this->loadedFields['transformation'] = true;
            $this->loadedFields['key'] = true;
            $this->loadedFields['value'] = true;
            $this->loadedFields['dateAdded'] = true;
            $this->loadedFields['dateModified'] = true;
        
            $this->entryState = self::STATE_NEW;
        
            return;
        }
        
        if (!isset($this->loadedFields['transformation'])) {
            $this->transformation = $entry->getTransformation();
            $this->loadedValues['transformation'] = $entry->loadedValues['transformation'];
            $this->loadedFields['transformation'] = true;
        }
        if (!isset($this->loadedFields['key'])) {
            $this->key = $entry->getKey();
            $this->loadedValues['key'] = $entry->loadedValues['key'];
            $this->loadedFields['key'] = true;
        }
        if (!isset($this->loadedFields['value'])) {
            $this->value = $entry->getValue();
            $this->loadedValues['value'] = $entry->loadedValues['value'];
            $this->loadedFields['value'] = true;
        }
        if (!isset($this->loadedFields['dateAdded'])) {
            $this->dateAdded = $entry->getDateAdded();
            $this->loadedValues['dateAdded'] = $entry->loadedValues['dateAdded'];
            $this->loadedFields['dateAdded'] = true;
        }
        if (!isset($this->loadedFields['dateModified'])) {
            $this->dateModified = $entry->getDateModified();
            $this->loadedValues['dateModified'] = $entry->loadedValues['dateModified'];
            $this->loadedFields['dateModified'] = true;
        }
    }

    /**
     * Loads the value of a relation field of this ImageTransformationOption entry
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
     * @param \ride\application\orm\entry\ImageTransformationEntry $transformation 
     * @return null
     */
    public function setTransformation(ImageTransformationEntry $transformation = NULL) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('transformation', $this->loadedValues)) {
            $oldValue = $this->loadedValues['transformation'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['transformation'])) {
            $oldValue = $this->getTransformation();
            $hasOldValue = true;
        }
        if ($hasOldValue && ((!$oldValue && !$transformation) || ($oldValue && $transformation && $oldValue->getId() === $transformation->getId())))  {
            return;
        }
        
        $this->loadedFields['transformation'] = true;
        
        return parent::setTransformation($transformation);
    }

    /**
     * @return \ride\application\orm\entry\ImageTransformationEntry
     */
    public function getTransformation() {
        if (!isset($this->loadedFields['transformation'])) {
            $this->loadProperties();
        }
        
        return parent::getTransformation();
    }

    /**
     * @param string $key 
     * @return null
     */
    public function setKey($key) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('key', $this->loadedValues)) {
            $oldValue = $this->loadedValues['key'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['key'])) {
            $oldValue = $this->getKey();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $key)  {
            return;
        }
        
        $this->loadedFields['key'] = true;
        
        return parent::setKey($key);
    }

    /**
     * @return string
     */
    public function getKey() {
        if (!isset($this->loadedFields['key'])) {
            $this->loadProperties();
        }
        
        return parent::getKey();
    }

    /**
     * @param string $value 
     * @return null
     */
    public function setValue($value) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('value', $this->loadedValues)) {
            $oldValue = $this->loadedValues['value'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['value'])) {
            $oldValue = $this->getValue();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $value)  {
            return;
        }
        
        $this->loadedFields['value'] = true;
        
        return parent::setValue($value);
    }

    /**
     * @return string
     */
    public function getValue() {
        if (!isset($this->loadedFields['value'])) {
            $this->loadProperties();
        }
        
        return parent::getValue();
    }

    /**
     * @param integer $dateAdded 
     * @return null
     */
    public function setDateAdded($dateAdded) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('dateAdded', $this->loadedValues)) {
            $oldValue = $this->loadedValues['dateAdded'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['dateAdded'])) {
            $oldValue = $this->getDateAdded();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $dateAdded)  {
            return;
        }
        
        $this->loadedFields['dateAdded'] = true;
        
        return parent::setDateAdded($dateAdded);
    }

    /**
     * @return integer
     */
    public function getDateAdded() {
        if (!isset($this->loadedFields['dateAdded'])) {
            $this->loadProperties();
        }
        
        return parent::getDateAdded();
    }

    /**
     * @param integer $dateModified 
     * @return null
     */
    public function setDateModified($dateModified) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('dateModified', $this->loadedValues)) {
            $oldValue = $this->loadedValues['dateModified'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['dateModified'])) {
            $oldValue = $this->getDateModified();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $dateModified)  {
            return;
        }
        
        $this->loadedFields['dateModified'] = true;
        
        return parent::setDateModified($dateModified);
    }

    /**
     * @return integer
     */
    public function getDateModified() {
        if (!isset($this->loadedFields['dateModified'])) {
            $this->loadProperties();
        }
        
        return parent::getDateModified();
    }

}
