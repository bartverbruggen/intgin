<?php

namespace ride\application\orm\entry\proxy;

use ride\application\orm\entry\TextCtaEntry;
use ride\application\orm\entry\TextCtaLocalizedEntry;
use ride\library\orm\entry\EntryProxy;
use ride\library\orm\model\Model;

/**
 * Generated proxy for an entry of the TextCtaLocalized model
 * 
 * NOTE: Do not edit this class
 */
class TextCtaLocalizedEntryProxy extends TextCtaLocalizedEntry implements EntryProxy {

    /**
     * Instance of the TextCtaLocalized model
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
     * Construct a new TextCtaLocalized entry proxy
     * @param \ride\library\orm\model\Model $model Instance of the TextCtaLocalized model
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
     * Loads the values of the properties of this TextCtaLocalized entry
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
            $this->loadedFields['label'] = true;
            $this->loadedFields['node'] = true;
            $this->loadedFields['url'] = true;
        
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
        if (!isset($this->loadedFields['label'])) {
            $this->label = $entry->getLabel();
            $this->loadedValues['label'] = $entry->loadedValues['label'];
            $this->loadedFields['label'] = true;
        }
        if (!isset($this->loadedFields['node'])) {
            $this->node = $entry->getNode();
            $this->loadedValues['node'] = $entry->loadedValues['node'];
            $this->loadedFields['node'] = true;
        }
        if (!isset($this->loadedFields['url'])) {
            $this->url = $entry->getUrl();
            $this->loadedValues['url'] = $entry->loadedValues['url'];
            $this->loadedFields['url'] = true;
        }
    }

    /**
     * Loads the value of a relation field of this TextCtaLocalized entry
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
     * @param \ride\application\orm\entry\TextCtaEntry $entry 
     * @return null
     */
    public function setEntry(TextCtaEntry $entry = NULL) {
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
     * @return \ride\application\orm\entry\TextCtaEntry
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
     * @param string $label 
     * @return null
     */
    public function setLabel($label) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('label', $this->loadedValues)) {
            $oldValue = $this->loadedValues['label'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['label'])) {
            $oldValue = $this->getLabel();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $label)  {
            return;
        }
        
        $this->loadedFields['label'] = true;
        
        return parent::setLabel($label);
    }

    /**
     * @return string
     */
    public function getLabel() {
        if (!isset($this->loadedFields['label'])) {
            $this->loadProperties();
        }
        
        return parent::getLabel();
    }

    /**
     * @param string $node 
     * @return null
     */
    public function setNode($node) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('node', $this->loadedValues)) {
            $oldValue = $this->loadedValues['node'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['node'])) {
            $oldValue = $this->getNode();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $node)  {
            return;
        }
        
        $this->loadedFields['node'] = true;
        
        return parent::setNode($node);
    }

    /**
     * @return string
     */
    public function getNode() {
        if (!isset($this->loadedFields['node'])) {
            $this->loadProperties();
        }
        
        return parent::getNode();
    }

    /**
     * @param string $url 
     * @return null
     */
    public function setUrl($url) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('url', $this->loadedValues)) {
            $oldValue = $this->loadedValues['url'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['url'])) {
            $oldValue = $this->getUrl();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $url)  {
            return;
        }
        
        $this->loadedFields['url'] = true;
        
        return parent::setUrl($url);
    }

    /**
     * @return string
     */
    public function getUrl() {
        if (!isset($this->loadedFields['url'])) {
            $this->loadProperties();
        }
        
        return parent::getUrl();
    }

}
