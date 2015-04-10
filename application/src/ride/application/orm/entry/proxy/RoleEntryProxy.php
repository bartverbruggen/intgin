<?php

namespace ride\application\orm\entry\proxy;

use ride\library\orm\entry\EntryProxy;
use ride\library\orm\model\Model;
use ride\web\security\model\orm\entry\RoleEntry;

/**
 * Generated proxy for an entry of the Role model
 * 
 * NOTE: Do not edit this class
 */
class RoleEntryProxy extends RoleEntry implements EntryProxy {

    /**
     * Instance of the Role model
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
     * Construct a new Role entry proxy
     * @param \ride\library\orm\model\Model $model Instance of the Role model
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
     * Loads the values of the properties of this Role entry
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
            $this->loadedFields['name'] = true;
            $this->loadedFields['weight'] = true;
            $this->loadedFields['version'] = true;
            $this->loadedFields['dateAdded'] = true;
            $this->loadedFields['dateModified'] = true;
        
            $this->entryState = self::STATE_NEW;
        
            return;
        }
        
        if (!isset($this->loadedFields['name'])) {
            $this->name = $entry->getName();
            $this->loadedValues['name'] = $entry->loadedValues['name'];
            $this->loadedFields['name'] = true;
        }
        if (!isset($this->loadedFields['weight'])) {
            $this->weight = $entry->getWeight();
            $this->loadedValues['weight'] = $entry->loadedValues['weight'];
            $this->loadedFields['weight'] = true;
        }
        if (!isset($this->loadedFields['version'])) {
            $this->version = $entry->getVersion();
            $this->loadedValues['version'] = $entry->loadedValues['version'];
            $this->loadedFields['version'] = true;
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
     * Loads the value of a relation field of this Role entry
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
     * @param integer $weight 
     * @return null
     */
    public function setWeight($weight) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('weight', $this->loadedValues)) {
            $oldValue = $this->loadedValues['weight'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['weight'])) {
            $oldValue = $this->getWeight();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $weight)  {
            return;
        }
        
        $this->loadedFields['weight'] = true;
        
        return parent::setWeight($weight);
    }

    /**
     * @return integer
     */
    public function getWeight() {
        if (!isset($this->loadedFields['weight'])) {
            $this->loadProperties();
        }
        
        return parent::getWeight();
    }

    /**
     * @param array $permissions 
     * @return null
     */
    public function setPermissions(array $permissions = array()) {
        $this->loadedFields['permissions'] = true;
        
        return parent::setPermissions($permissions);
    }

    /**
     * @return array
     */
    public function getPermissions() {
        if (!isset($this->loadedFields['permissions'])) {
            $this->loadRelation('permissions');
        }
        
        return parent::getPermissions();
    }

    /**
     * @param array $rolePaths 
     * @return null
     */
    public function setRolePaths(array $rolePaths = array()) {
        $this->loadedFields['rolePaths'] = true;
        
        return parent::setRolePaths($rolePaths);
    }

    /**
     * @return array
     */
    public function getRolePaths() {
        if (!isset($this->loadedFields['rolePaths'])) {
            $this->loadRelation('rolePaths');
        }
        
        return parent::getRolePaths();
    }

    /**
     * @param integer $version 
     * @return null
     */
    public function setVersion($version) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('version', $this->loadedValues)) {
            $oldValue = $this->loadedValues['version'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['version'])) {
            $oldValue = $this->getVersion();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $version)  {
            return;
        }
        
        $this->loadedFields['version'] = true;
        
        return parent::setVersion($version);
    }

    /**
     * @return integer
     */
    public function getVersion() {
        if (!isset($this->loadedFields['version'])) {
            $this->loadProperties();
        }
        
        return parent::getVersion();
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
