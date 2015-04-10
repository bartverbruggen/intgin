<?php

namespace ride\application\orm\entry\proxy;

use ride\application\orm\entry\SecuredPathEntry;
use ride\library\orm\entry\EntryProxy;
use ride\library\orm\model\Model;

/**
 * Generated proxy for an entry of the SecuredPath model
 * 
 * NOTE: Do not edit this class
 */
class SecuredPathEntryProxy extends SecuredPathEntry implements EntryProxy {

    /**
     * Instance of the SecuredPath model
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
     * Construct a new SecuredPath entry proxy
     * @param \ride\library\orm\model\Model $model Instance of the SecuredPath model
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
     * Loads the values of the properties of this SecuredPath entry
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
            $this->loadedFields['path'] = true;
            $this->loadedFields['isSecured'] = true;
        
            $this->entryState = self::STATE_NEW;
        
            return;
        }
        
        if (!isset($this->loadedFields['path'])) {
            $this->path = $entry->getPath();
            $this->loadedValues['path'] = $entry->loadedValues['path'];
            $this->loadedFields['path'] = true;
        }
        if (!isset($this->loadedFields['isSecured'])) {
            $this->isSecured = $entry->isSecured();
            $this->loadedValues['isSecured'] = $entry->loadedValues['isSecured'];
            $this->loadedFields['isSecured'] = true;
        }
    }

    /**
     * Loads the value of a relation field of this SecuredPath entry
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
     * @param string $path 
     * @return null
     */
    public function setPath($path) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('path', $this->loadedValues)) {
            $oldValue = $this->loadedValues['path'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['path'])) {
            $oldValue = $this->getPath();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $path)  {
            return;
        }
        
        $this->loadedFields['path'] = true;
        
        return parent::setPath($path);
    }

    /**
     * @return string
     */
    public function getPath() {
        if (!isset($this->loadedFields['path'])) {
            $this->loadProperties();
        }
        
        return parent::getPath();
    }

    /**
     * @param boolean $isSecured 
     * @return null
     */
    public function setIsSecured($isSecured) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('isSecured', $this->loadedValues)) {
            $oldValue = $this->loadedValues['isSecured'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['isSecured'])) {
            $oldValue = $this->getIsSecured();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $isSecured)  {
            return;
        }
        
        $this->loadedFields['isSecured'] = true;
        
        return parent::setIsSecured($isSecured);
    }

    /**
     * @return boolean
     */
    public function isSecured() {
        if (!isset($this->loadedFields['isSecured'])) {
            $this->loadProperties();
        }
        
        return parent::isSecured();
    }

}
