<?php

namespace ride\application\orm\entry\proxy;

use ride\application\orm\entry\GinEntry;
use ride\application\orm\entry\MixSuggestionEntry;
use ride\library\orm\entry\EntryProxy;
use ride\library\orm\model\Model;

/**
 * Generated proxy for an entry of the MixSuggestion model
 * 
 * NOTE: Do not edit this class
 */
class MixSuggestionEntryProxy extends MixSuggestionEntry implements EntryProxy {

    /**
     * Instance of the MixSuggestion model
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
     * Construct a new MixSuggestion entry proxy
     * @param \ride\library\orm\model\Model $model Instance of the MixSuggestion model
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
     * Loads the values of the properties of this MixSuggestion entry
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
            $this->loadedFields['name'] = true;
            $this->loadedFields['email'] = true;
            $this->loadedFields['tonic'] = true;
            $this->loadedFields['garnish'] = true;
            $this->loadedFields['message'] = true;
            $this->loadedFields['version'] = true;
            $this->loadedFields['dateAdded'] = true;
            $this->loadedFields['dateModified'] = true;
        
            $this->entryState = self::STATE_NEW;
        
            return;
        }
        
        if (!isset($this->loadedFields['gin'])) {
            $this->gin = $entry->getGin();
            $this->loadedValues['gin'] = $entry->loadedValues['gin'];
            $this->loadedFields['gin'] = true;
        }
        if (!isset($this->loadedFields['name'])) {
            $this->name = $entry->getName();
            $this->loadedValues['name'] = $entry->loadedValues['name'];
            $this->loadedFields['name'] = true;
        }
        if (!isset($this->loadedFields['email'])) {
            $this->email = $entry->getEmail();
            $this->loadedValues['email'] = $entry->loadedValues['email'];
            $this->loadedFields['email'] = true;
        }
        if (!isset($this->loadedFields['tonic'])) {
            $this->tonic = $entry->getTonic();
            $this->loadedValues['tonic'] = $entry->loadedValues['tonic'];
            $this->loadedFields['tonic'] = true;
        }
        if (!isset($this->loadedFields['garnish'])) {
            $this->garnish = $entry->getGarnish();
            $this->loadedValues['garnish'] = $entry->loadedValues['garnish'];
            $this->loadedFields['garnish'] = true;
        }
        if (!isset($this->loadedFields['message'])) {
            $this->message = $entry->getMessage();
            $this->loadedValues['message'] = $entry->loadedValues['message'];
            $this->loadedFields['message'] = true;
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
     * Loads the value of a relation field of this MixSuggestion entry
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
     * @param string $email 
     * @return null
     */
    public function setEmail($email) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('email', $this->loadedValues)) {
            $oldValue = $this->loadedValues['email'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['email'])) {
            $oldValue = $this->getEmail();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $email)  {
            return;
        }
        
        $this->loadedFields['email'] = true;
        
        return parent::setEmail($email);
    }

    /**
     * @return string
     */
    public function getEmail() {
        if (!isset($this->loadedFields['email'])) {
            $this->loadProperties();
        }
        
        return parent::getEmail();
    }

    /**
     * @param string $tonic 
     * @return null
     */
    public function setTonic($tonic) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('tonic', $this->loadedValues)) {
            $oldValue = $this->loadedValues['tonic'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['tonic'])) {
            $oldValue = $this->getTonic();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $tonic)  {
            return;
        }
        
        $this->loadedFields['tonic'] = true;
        
        return parent::setTonic($tonic);
    }

    /**
     * @return string
     */
    public function getTonic() {
        if (!isset($this->loadedFields['tonic'])) {
            $this->loadProperties();
        }
        
        return parent::getTonic();
    }

    /**
     * @param string $garnish 
     * @return null
     */
    public function setGarnish($garnish) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('garnish', $this->loadedValues)) {
            $oldValue = $this->loadedValues['garnish'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['garnish'])) {
            $oldValue = $this->getGarnish();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $garnish)  {
            return;
        }
        
        $this->loadedFields['garnish'] = true;
        
        return parent::setGarnish($garnish);
    }

    /**
     * @return string
     */
    public function getGarnish() {
        if (!isset($this->loadedFields['garnish'])) {
            $this->loadProperties();
        }
        
        return parent::getGarnish();
    }

    /**
     * @param string $message 
     * @return null
     */
    public function setMessage($message) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('message', $this->loadedValues)) {
            $oldValue = $this->loadedValues['message'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['message'])) {
            $oldValue = $this->getMessage();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $message)  {
            return;
        }
        
        $this->loadedFields['message'] = true;
        
        return parent::setMessage($message);
    }

    /**
     * @return string
     */
    public function getMessage() {
        if (!isset($this->loadedFields['message'])) {
            $this->loadProperties();
        }
        
        return parent::getMessage();
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
