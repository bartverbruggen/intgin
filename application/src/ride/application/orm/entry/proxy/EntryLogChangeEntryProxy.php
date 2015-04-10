<?php

namespace ride\application\orm\entry\proxy;

use ride\application\orm\entry\EntryLogChangeEntry;
use ride\application\orm\entry\EntryLogEntry;
use ride\library\orm\entry\EntryProxy;
use ride\library\orm\model\Model;

/**
 * Generated proxy for an entry of the EntryLogChange model
 * 
 * NOTE: Do not edit this class
 */
class EntryLogChangeEntryProxy extends EntryLogChangeEntry implements EntryProxy {

    /**
     * Instance of the EntryLogChange model
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
     * Construct a new EntryLogChange entry proxy
     * @param \ride\library\orm\model\Model $model Instance of the EntryLogChange model
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
     * Loads the values of the properties of this EntryLogChange entry
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
            $this->loadedFields['entryLog'] = true;
            $this->loadedFields['fieldName'] = true;
            $this->loadedFields['oldValue'] = true;
            $this->loadedFields['newValue'] = true;
        
            $this->entryState = self::STATE_NEW;
        
            return;
        }
        
        if (!isset($this->loadedFields['entryLog'])) {
            $this->entryLog = $entry->getEntryLog();
            $this->loadedValues['entryLog'] = $entry->loadedValues['entryLog'];
            $this->loadedFields['entryLog'] = true;
        }
        if (!isset($this->loadedFields['fieldName'])) {
            $this->fieldName = $entry->getFieldName();
            $this->loadedValues['fieldName'] = $entry->loadedValues['fieldName'];
            $this->loadedFields['fieldName'] = true;
        }
        if (!isset($this->loadedFields['oldValue'])) {
            $this->oldValue = $entry->getOldValue();
            $this->loadedValues['oldValue'] = $entry->loadedValues['oldValue'];
            $this->loadedFields['oldValue'] = true;
        }
        if (!isset($this->loadedFields['newValue'])) {
            $this->newValue = $entry->getNewValue();
            $this->loadedValues['newValue'] = $entry->loadedValues['newValue'];
            $this->loadedFields['newValue'] = true;
        }
    }

    /**
     * Loads the value of a relation field of this EntryLogChange entry
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
     * @param \ride\application\orm\entry\EntryLogEntry $entryLog 
     * @return null
     */
    public function setEntryLog(EntryLogEntry $entryLog = NULL) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('entryLog', $this->loadedValues)) {
            $oldValue = $this->loadedValues['entryLog'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['entryLog'])) {
            $oldValue = $this->getEntryLog();
            $hasOldValue = true;
        }
        if ($hasOldValue && ((!$oldValue && !$entryLog) || ($oldValue && $entryLog && $oldValue->getId() === $entryLog->getId())))  {
            return;
        }
        
        $this->loadedFields['entryLog'] = true;
        
        return parent::setEntryLog($entryLog);
    }

    /**
     * @return \ride\application\orm\entry\EntryLogEntry
     */
    public function getEntryLog() {
        if (!isset($this->loadedFields['entryLog'])) {
            $this->loadProperties();
        }
        
        return parent::getEntryLog();
    }

    /**
     * @param string $fieldName 
     * @return null
     */
    public function setFieldName($fieldName) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('fieldName', $this->loadedValues)) {
            $oldValue = $this->loadedValues['fieldName'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['fieldName'])) {
            $oldValue = $this->getFieldName();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $fieldName)  {
            return;
        }
        
        $this->loadedFields['fieldName'] = true;
        
        return parent::setFieldName($fieldName);
    }

    /**
     * @return string
     */
    public function getFieldName() {
        if (!isset($this->loadedFields['fieldName'])) {
            $this->loadProperties();
        }
        
        return parent::getFieldName();
    }

    /**
     * @param string $oldValue 
     * @return null
     */
    public function setOldValue($oldValue) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('oldValue', $this->loadedValues)) {
            $oldValue = $this->loadedValues['oldValue'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['oldValue'])) {
            $oldValue = $this->getOldValue();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $oldValue)  {
            return;
        }
        
        $this->loadedFields['oldValue'] = true;
        
        return parent::setOldValue($oldValue);
    }

    /**
     * @return string
     */
    public function getOldValue() {
        if (!isset($this->loadedFields['oldValue'])) {
            $this->loadProperties();
        }
        
        return parent::getOldValue();
    }

    /**
     * @param string $newValue 
     * @return null
     */
    public function setNewValue($newValue) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('newValue', $this->loadedValues)) {
            $oldValue = $this->loadedValues['newValue'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['newValue'])) {
            $oldValue = $this->getNewValue();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $newValue)  {
            return;
        }
        
        $this->loadedFields['newValue'] = true;
        
        return parent::setNewValue($newValue);
    }

    /**
     * @return string
     */
    public function getNewValue() {
        if (!isset($this->loadedFields['newValue'])) {
            $this->loadProperties();
        }
        
        return parent::getNewValue();
    }

}
