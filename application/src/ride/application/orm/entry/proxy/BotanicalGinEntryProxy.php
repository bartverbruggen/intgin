<?php

namespace ride\application\orm\entry\proxy;

use ride\application\orm\entry\BotanicalEntry;
use ride\application\orm\entry\BotanicalGinEntry;
use ride\application\orm\entry\GinEntry;
use ride\library\orm\entry\EntryProxy;
use ride\library\orm\model\Model;

/**
 * Generated proxy for an entry of the BotanicalGin model
 * 
 * NOTE: Do not edit this class
 */
class BotanicalGinEntryProxy extends BotanicalGinEntry implements EntryProxy {

    /**
     * Instance of the BotanicalGin model
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
     * Construct a new BotanicalGin entry proxy
     * @param \ride\library\orm\model\Model $model Instance of the BotanicalGin model
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
     * Loads the values of the properties of this BotanicalGin entry
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
            $this->loadedFields['gin'] = true;
            $this->loadedFields['botanical'] = true;
            $this->loadedFields['ginWeight'] = true;
            $this->loadedFields['botanicalWeight'] = true;
        
            $this->entryState = self::STATE_NEW;
        
            return;
        }
        
        if (!isset($this->loadedFields['gin'])) {
            $this->gin = $entry->getGin();
            $this->loadedValues['gin'] = $entry->loadedValues['gin'];
            $this->loadedFields['gin'] = true;
        }
        if (!isset($this->loadedFields['botanical'])) {
            $this->botanical = $entry->getBotanical();
            $this->loadedValues['botanical'] = $entry->loadedValues['botanical'];
            $this->loadedFields['botanical'] = true;
        }
        if (!isset($this->loadedFields['ginWeight'])) {
            $this->ginWeight = $entry->getGinWeight();
            $this->loadedValues['ginWeight'] = $entry->loadedValues['ginWeight'];
            $this->loadedFields['ginWeight'] = true;
        }
        if (!isset($this->loadedFields['botanicalWeight'])) {
            $this->botanicalWeight = $entry->getBotanicalWeight();
            $this->loadedValues['botanicalWeight'] = $entry->loadedValues['botanicalWeight'];
            $this->loadedFields['botanicalWeight'] = true;
        }
    }

    /**
     * Loads the value of a relation field of this BotanicalGin entry
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
     * @param \ride\application\orm\entry\GinEntry $gin 
     * @return null
     */
    public function setGin(GinEntry $gin = NULL) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('gin', $this->loadedValues)) {
            $oldValue = $this->loadedValues['gin'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['gin'])) {
            $oldValue = $this->getGin();
            $hasOldValue = true;
        }
        if ($hasOldValue && ((!$oldValue && !$gin) || ($oldValue && $gin && $oldValue->getId() === $gin->getId())))  {
            return;
        }
        
        $this->loadedFields['gin'] = true;
        
        return parent::setGin($gin);
    }

    /**
     * @return \ride\application\orm\entry\GinEntry
     */
    public function getGin() {
        if (!isset($this->loadedFields['gin'])) {
            $this->loadProperties();
        }
        
        return parent::getGin();
    }

    /**
     * @param \ride\application\orm\entry\BotanicalEntry $botanical 
     * @return null
     */
    public function setBotanical(BotanicalEntry $botanical = NULL) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('botanical', $this->loadedValues)) {
            $oldValue = $this->loadedValues['botanical'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['botanical'])) {
            $oldValue = $this->getBotanical();
            $hasOldValue = true;
        }
        if ($hasOldValue && ((!$oldValue && !$botanical) || ($oldValue && $botanical && $oldValue->getId() === $botanical->getId())))  {
            return;
        }
        
        $this->loadedFields['botanical'] = true;
        
        return parent::setBotanical($botanical);
    }

    /**
     * @return \ride\application\orm\entry\BotanicalEntry
     */
    public function getBotanical() {
        if (!isset($this->loadedFields['botanical'])) {
            $this->loadProperties();
        }
        
        return parent::getBotanical();
    }

    /**
     * @param integer $ginWeight 
     * @return null
     */
    public function setGinWeight($ginWeight) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('ginWeight', $this->loadedValues)) {
            $oldValue = $this->loadedValues['ginWeight'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['ginWeight'])) {
            $oldValue = $this->getGinWeight();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $ginWeight)  {
            return;
        }
        
        $this->loadedFields['ginWeight'] = true;
        
        return parent::setGinWeight($ginWeight);
    }

    /**
     * @return integer
     */
    public function getGinWeight() {
        if (!isset($this->loadedFields['ginWeight'])) {
            $this->loadProperties();
        }
        
        return parent::getGinWeight();
    }

    /**
     * @param integer $botanicalWeight 
     * @return null
     */
    public function setBotanicalWeight($botanicalWeight) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('botanicalWeight', $this->loadedValues)) {
            $oldValue = $this->loadedValues['botanicalWeight'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['botanicalWeight'])) {
            $oldValue = $this->getBotanicalWeight();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $botanicalWeight)  {
            return;
        }
        
        $this->loadedFields['botanicalWeight'] = true;
        
        return parent::setBotanicalWeight($botanicalWeight);
    }

    /**
     * @return integer
     */
    public function getBotanicalWeight() {
        if (!isset($this->loadedFields['botanicalWeight'])) {
            $this->loadProperties();
        }
        
        return parent::getBotanicalWeight();
    }

}
