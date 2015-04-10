<?php

namespace ride\application\orm\entry\proxy;

use ride\application\orm\asset\entry\AssetEntry;
use ride\application\orm\entry\AssetLocalizedEntry;
use ride\library\orm\entry\EntryProxy;
use ride\library\orm\model\Model;

/**
 * Generated proxy for an entry of the AssetLocalized model
 * 
 * NOTE: Do not edit this class
 */
class AssetLocalizedEntryProxy extends AssetLocalizedEntry implements EntryProxy {

    /**
     * Instance of the AssetLocalized model
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
     * Construct a new AssetLocalized entry proxy
     * @param \ride\library\orm\model\Model $model Instance of the AssetLocalized model
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
     * Loads the values of the properties of this AssetLocalized entry
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
            $this->loadedFields['entry'] = true;
            $this->loadedFields['locale'] = true;
            $this->loadedFields['name'] = true;
            $this->loadedFields['description'] = true;
            $this->loadedFields['slug'] = true;
        
            $this->entryState = self::STATE_NEW;
        
            return;
        }
        
        if (!isset($this->loadedFields['entry'])) {
            $this->entry = $entry->getEntry();
            $this->loadedValues['entry'] = $entry->loadedValues['entry'];
            $this->loadedFields['entry'] = true;
        }
        if (!isset($this->loadedFields['locale'])) {
            $this->locale = $entry->getLocale();
            $this->loadedValues['locale'] = $entry->loadedValues['locale'];
            $this->loadedFields['locale'] = true;
        }
        if (!isset($this->loadedFields['name'])) {
            $this->name = $entry->getName();
            $this->loadedValues['name'] = $entry->loadedValues['name'];
            $this->loadedFields['name'] = true;
        }
        if (!isset($this->loadedFields['description'])) {
            $this->description = $entry->getDescription();
            $this->loadedValues['description'] = $entry->loadedValues['description'];
            $this->loadedFields['description'] = true;
        }
        if (!isset($this->loadedFields['slug'])) {
            $this->slug = $entry->getSlug();
            $this->loadedValues['slug'] = $entry->loadedValues['slug'];
            $this->loadedFields['slug'] = true;
        }
    }

    /**
     * Loads the value of a relation field of this AssetLocalized entry
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
     * @param \ride\application\orm\asset\entry\AssetEntry $entry 
     * @return null
     */
    public function setEntry(AssetEntry $entry = NULL) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('entry', $this->loadedValues)) {
            $oldValue = $this->loadedValues['entry'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['entry'])) {
            $oldValue = $this->getEntry();
            $hasOldValue = true;
        }
        if ($hasOldValue && ((!$oldValue && !$entry) || ($oldValue && $entry && $oldValue->getId() === $entry->getId())))  {
            return;
        }
        
        $this->loadedFields['entry'] = true;
        
        return parent::setEntry($entry);
    }

    /**
     * @return \ride\application\orm\asset\entry\AssetEntry
     */
    public function getEntry() {
        if (!isset($this->loadedFields['entry'])) {
            $this->loadProperties();
        }
        
        return parent::getEntry();
    }

    /**
     * @param string $locale 
     * @return null
     */
    public function setLocale($locale) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('locale', $this->loadedValues)) {
            $oldValue = $this->loadedValues['locale'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['locale'])) {
            $oldValue = $this->getLocale();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $locale)  {
            return;
        }
        
        $this->loadedFields['locale'] = true;
        
        return parent::setLocale($locale);
    }

    /**
     * @return string
     */
    public function getLocale() {
        if (!isset($this->loadedFields['locale'])) {
            $this->loadProperties();
        }
        
        return parent::getLocale();
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
     * @param string $description 
     * @return null
     */
    public function setDescription($description) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('description', $this->loadedValues)) {
            $oldValue = $this->loadedValues['description'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['description'])) {
            $oldValue = $this->getDescription();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $description)  {
            return;
        }
        
        $this->loadedFields['description'] = true;
        
        return parent::setDescription($description);
    }

    /**
     * @return string
     */
    public function getDescription() {
        if (!isset($this->loadedFields['description'])) {
            $this->loadProperties();
        }
        
        return parent::getDescription();
    }

    /**
     * @param string $slug 
     * @return null
     */
    public function setSlug($slug) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('slug', $this->loadedValues)) {
            $oldValue = $this->loadedValues['slug'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['slug'])) {
            $oldValue = $this->getSlug();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $slug)  {
            return;
        }
        
        $this->loadedFields['slug'] = true;
        
        return parent::setSlug($slug);
    }

    /**
     * @return string
     */
    public function getSlug() {
        if (!isset($this->loadedFields['slug'])) {
            $this->loadProperties();
        }
        
        return parent::getSlug();
    }

}
