<?php

namespace ride\application\orm\entry\proxy;

use ride\application\orm\entry\PermissionRoleEntry;
use ride\library\orm\entry\EntryProxy;
use ride\library\orm\model\Model;
use ride\web\security\model\orm\entry\PermissionEntry;
use ride\web\security\model\orm\entry\RoleEntry;

/**
 * Generated proxy for an entry of the PermissionRole model
 * 
 * NOTE: Do not edit this class
 */
class PermissionRoleEntryProxy extends PermissionRoleEntry implements EntryProxy {

    /**
     * Instance of the PermissionRole model
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
     * Construct a new PermissionRole entry proxy
     * @param \ride\library\orm\model\Model $model Instance of the PermissionRole model
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
     * Loads the values of the properties of this PermissionRole entry
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
            $this->loadedFields['role'] = true;
            $this->loadedFields['permission'] = true;
        
            $this->entryState = self::STATE_NEW;
        
            return;
        }
        
        if (!isset($this->loadedFields['role'])) {
            $this->role = $entry->getRole();
            $this->loadedValues['role'] = $entry->loadedValues['role'];
            $this->loadedFields['role'] = true;
        }
        if (!isset($this->loadedFields['permission'])) {
            $this->permission = $entry->getPermission();
            $this->loadedValues['permission'] = $entry->loadedValues['permission'];
            $this->loadedFields['permission'] = true;
        }
    }

    /**
     * Loads the value of a relation field of this PermissionRole entry
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
     * @param \ride\web\security\model\orm\entry\RoleEntry $role 
     * @return null
     */
    public function setRole(RoleEntry $role = NULL) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('role', $this->loadedValues)) {
            $oldValue = $this->loadedValues['role'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['role'])) {
            $oldValue = $this->getRole();
            $hasOldValue = true;
        }
        if ($hasOldValue && ((!$oldValue && !$role) || ($oldValue && $role && $oldValue->getId() === $role->getId())))  {
            return;
        }
        
        $this->loadedFields['role'] = true;
        
        return parent::setRole($role);
    }

    /**
     * @return \ride\web\security\model\orm\entry\RoleEntry
     */
    public function getRole() {
        if (!isset($this->loadedFields['role'])) {
            $this->loadProperties();
        }
        
        return parent::getRole();
    }

    /**
     * @param \ride\web\security\model\orm\entry\PermissionEntry $permission 
     * @return null
     */
    public function setPermission(PermissionEntry $permission = NULL) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('permission', $this->loadedValues)) {
            $oldValue = $this->loadedValues['permission'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['permission'])) {
            $oldValue = $this->getPermission();
            $hasOldValue = true;
        }
        if ($hasOldValue && ((!$oldValue && !$permission) || ($oldValue && $permission && $oldValue->getId() === $permission->getId())))  {
            return;
        }
        
        $this->loadedFields['permission'] = true;
        
        return parent::setPermission($permission);
    }

    /**
     * @return \ride\web\security\model\orm\entry\PermissionEntry
     */
    public function getPermission() {
        if (!isset($this->loadedFields['permission'])) {
            $this->loadProperties();
        }
        
        return parent::getPermission();
    }

}
