<?php

namespace ride\application\orm\entry\proxy;

use ride\application\orm\entry\GarnishEntry;
use ride\application\orm\entry\GarnishMixEntry;
use ride\application\orm\entry\MixEntry;
use ride\library\orm\entry\EntryProxy;
use ride\library\orm\model\Model;

/**
 * Generated proxy for an entry of the GarnishMix model
 * 
 * NOTE: Do not edit this class
 */
class GarnishMixEntryProxy extends GarnishMixEntry implements EntryProxy {

    /**
     * Instance of the GarnishMix model
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
     * Construct a new GarnishMix entry proxy
     * @param \ride\library\orm\model\Model $model Instance of the GarnishMix model
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
     * Loads the values of the properties of this GarnishMix entry
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
            $this->loadedFields['mix'] = true;
            $this->loadedFields['garnish'] = true;
            $this->loadedFields['mixWeight'] = true;
            $this->loadedFields['garnishWeight'] = true;
        
            $this->entryState = self::STATE_NEW;
        
            return;
        }
        
        if (!isset($this->loadedFields['mix'])) {
            $this->mix = $entry->getMix();
            $this->loadedValues['mix'] = $entry->loadedValues['mix'];
            $this->loadedFields['mix'] = true;
        }
        if (!isset($this->loadedFields['garnish'])) {
            $this->garnish = $entry->getGarnish();
            $this->loadedValues['garnish'] = $entry->loadedValues['garnish'];
            $this->loadedFields['garnish'] = true;
        }
        if (!isset($this->loadedFields['mixWeight'])) {
            $this->mixWeight = $entry->getMixWeight();
            $this->loadedValues['mixWeight'] = $entry->loadedValues['mixWeight'];
            $this->loadedFields['mixWeight'] = true;
        }
        if (!isset($this->loadedFields['garnishWeight'])) {
            $this->garnishWeight = $entry->getGarnishWeight();
            $this->loadedValues['garnishWeight'] = $entry->loadedValues['garnishWeight'];
            $this->loadedFields['garnishWeight'] = true;
        }
    }

    /**
     * Loads the value of a relation field of this GarnishMix entry
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
     * @param \ride\application\orm\entry\MixEntry $mix 
     * @return null
     */
    public function setMix(MixEntry $mix = NULL) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('mix', $this->loadedValues)) {
            $oldValue = $this->loadedValues['mix'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['mix'])) {
            $oldValue = $this->getMix();
            $hasOldValue = true;
        }
        if ($hasOldValue && ((!$oldValue && !$mix) || ($oldValue && $mix && $oldValue->getId() === $mix->getId())))  {
            return;
        }
        
        $this->loadedFields['mix'] = true;
        
        return parent::setMix($mix);
    }

    /**
     * @return \ride\application\orm\entry\MixEntry
     */
    public function getMix() {
        if (!isset($this->loadedFields['mix'])) {
            $this->loadProperties();
        }
        
        return parent::getMix();
    }

    /**
     * @param \ride\application\orm\entry\GarnishEntry $garnish 
     * @return null
     */
    public function setGarnish(GarnishEntry $garnish = NULL) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('garnish', $this->loadedValues)) {
            $oldValue = $this->loadedValues['garnish'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['garnish'])) {
            $oldValue = $this->getGarnish();
            $hasOldValue = true;
        }
        if ($hasOldValue && ((!$oldValue && !$garnish) || ($oldValue && $garnish && $oldValue->getId() === $garnish->getId())))  {
            return;
        }
        
        $this->loadedFields['garnish'] = true;
        
        return parent::setGarnish($garnish);
    }

    /**
     * @return \ride\application\orm\entry\GarnishEntry
     */
    public function getGarnish() {
        if (!isset($this->loadedFields['garnish'])) {
            $this->loadProperties();
        }
        
        return parent::getGarnish();
    }

    /**
     * @param integer $mixWeight 
     * @return null
     */
    public function setMixWeight($mixWeight) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('mixWeight', $this->loadedValues)) {
            $oldValue = $this->loadedValues['mixWeight'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['mixWeight'])) {
            $oldValue = $this->getMixWeight();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $mixWeight)  {
            return;
        }
        
        $this->loadedFields['mixWeight'] = true;
        
        return parent::setMixWeight($mixWeight);
    }

    /**
     * @return integer
     */
    public function getMixWeight() {
        if (!isset($this->loadedFields['mixWeight'])) {
            $this->loadProperties();
        }
        
        return parent::getMixWeight();
    }

    /**
     * @param integer $garnishWeight 
     * @return null
     */
    public function setGarnishWeight($garnishWeight) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('garnishWeight', $this->loadedValues)) {
            $oldValue = $this->loadedValues['garnishWeight'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['garnishWeight'])) {
            $oldValue = $this->getGarnishWeight();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $garnishWeight)  {
            return;
        }
        
        $this->loadedFields['garnishWeight'] = true;
        
        return parent::setGarnishWeight($garnishWeight);
    }

    /**
     * @return integer
     */
    public function getGarnishWeight() {
        if (!isset($this->loadedFields['garnishWeight'])) {
            $this->loadProperties();
        }
        
        return parent::getGarnishWeight();
    }

}
