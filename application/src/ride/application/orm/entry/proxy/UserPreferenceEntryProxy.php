<?php

namespace ride\application\orm\entry\proxy;

use ride\application\orm\entry\UserPreferenceEntry;
use ride\library\orm\entry\EntryProxy;
use ride\library\orm\model\Model;
use ride\web\security\model\orm\entry\UserEntry;

/**
 * Generated proxy for an entry of the UserPreference model
 * 
 * NOTE: Do not edit this class
 */
class UserPreferenceEntryProxy extends UserPreferenceEntry implements EntryProxy {

    /**
     * Instance of the UserPreference model
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
     * Construct a new UserPreference entry proxy
     * @param \ride\library\orm\model\Model $model Instance of the UserPreference model
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
     * Loads the values of the properties of this UserPreference entry
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
            $this->loadedFields['user'] = true;
            $this->loadedFields['name'] = true;
            $this->loadedFields['value'] = true;
        
            $this->entryState = self::STATE_NEW;
        
            return;
        }
        
        if (!isset($this->loadedFields['user'])) {
            $this->user = $entry->getUser();
            $this->loadedValues['user'] = $entry->loadedValues['user'];
            $this->loadedFields['user'] = true;
        }
        if (!isset($this->loadedFields['name'])) {
            $this->name = $entry->getName();
            $this->loadedValues['name'] = $entry->loadedValues['name'];
            $this->loadedFields['name'] = true;
        }
        if (!isset($this->loadedFields['value'])) {
            $this->value = $entry->getValue();
            $this->loadedValues['value'] = $entry->loadedValues['value'];
            $this->loadedFields['value'] = true;
        }
    }

    /**
     * Loads the value of a relation field of this UserPreference entry
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
     * @param \ride\web\security\model\orm\entry\UserEntry $user 
     * @return null
     */
    public function setUser(UserEntry $user = NULL) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('user', $this->loadedValues)) {
            $oldValue = $this->loadedValues['user'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['user'])) {
            $oldValue = $this->getUser();
            $hasOldValue = true;
        }
        if ($hasOldValue && ((!$oldValue && !$user) || ($oldValue && $user && $oldValue->getId() === $user->getId())))  {
            return;
        }
        
        $this->loadedFields['user'] = true;
        
        return parent::setUser($user);
    }

    /**
     * @return \ride\web\security\model\orm\entry\UserEntry
     */
    public function getUser() {
        if (!isset($this->loadedFields['user'])) {
            $this->loadProperties();
        }
        
        return parent::getUser();
    }

    /**
     * @param string $name 
     * @return null
     */
    public function setName($name) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('name', $this->loadedValues)) {
            $oldValue = $this->loadedValues['name'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['name'])) {
            $oldValue = $this->getName();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $name)  {
            return;
        }
        
        $this->loadedFields['name'] = true;
        
        return parent::setName($name);
    }

    /**
     * @return string
     */
    public function getName() {
        if (!isset($this->loadedFields['name'])) {
            $this->loadProperties();
        }
        
        return parent::getName();
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

}
