<?php

namespace ride\application\orm\entry\proxy;

use ride\application\orm\entry\TextCtaEntry;
use ride\library\orm\entry\EntryProxy;
use ride\library\orm\model\Model;
use ride\web\cms\orm\entry\TextEntry;

/**
 * Generated proxy for an entry of the TextCta model
 * 
 * NOTE: Do not edit this class
 */
class TextCtaEntryProxy extends TextCtaEntry implements EntryProxy {

    /**
     * Instance of the TextCta model
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
     * Construct a new TextCta entry proxy
     * @param \ride\library\orm\model\Model $model Instance of the TextCta model
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
     * Loads the values of the properties of this TextCta entry
     * @return null
     */
    private function loadProperties() {
        $id = $this->getId();
        if (!$id) {
            return;
        }
        
        $query = $this->_model->createQuery(parent::getLocale());
        $query->setFetchUnlocalized(true);
        $query->setRecursiveDepth(0);
        $query->addCondition('{id} = %1%', $id);
        $entry = $query->queryFirst();
        
        if (!$entry) {
            $this->loadedFields['text'] = true;
            $this->loadedFields['label'] = true;
            $this->loadedFields['node'] = true;
            $this->loadedFields['url'] = true;
            $this->loadedFields['type'] = true;
            $this->loadedFields['locale'] = true;
        
            $this->entryState = self::STATE_NEW;
        
            return;
        }
        
        if (!isset($this->loadedFields['text'])) {
            $this->text = $entry->getText();
            $this->loadedValues['text'] = $entry->loadedValues['text'];
            $this->loadedFields['text'] = true;
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
        if (!isset($this->loadedFields['type'])) {
            $this->type = $entry->getType();
            $this->loadedValues['type'] = $entry->loadedValues['type'];
            $this->loadedFields['type'] = true;
        }
        
        $this->setLocale($entry->getLocale());
        $this->setIslocalized($entry->isLocalized());
        $this->loadedFields['locale'] = true;
    }

    /**
     * Loads the value of a relation field of this TextCta entry
     * @param string $fieldName Name of the relation field
     * @return null
     */
    private function loadRelation($fieldName) {
        $id = $this->getId();
        if (!$id) {
            return;
        }
        
        $query = $this->_model->createQuery($this->getLocale());
        $query->setFetchUnlocalized(true);
        $entry = $query->queryRelation($this->getId(), $fieldName);
        
        $getterMethodName = 'get' . ucfirst($fieldName);
        $this->$fieldName = $entry->$getterMethodName();
        $this->loadedValues[$fieldName] = $entry->loadedValues[$fieldName];
        $this->loadedFields[$fieldName] = true;
    }

    /**
     * @param \ride\web\cms\orm\entry\TextEntry $text 
     * @return null
     */
    public function setText(TextEntry $text = NULL) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('text', $this->loadedValues)) {
            $oldValue = $this->loadedValues['text'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['text'])) {
            $oldValue = $this->getText();
            $hasOldValue = true;
        }
        if ($hasOldValue && ((!$oldValue && !$text) || ($oldValue && $text && $oldValue->getId() === $text->getId())))  {
            return;
        }
        
        $this->loadedFields['text'] = true;
        
        return parent::setText($text);
    }

    /**
     * @return \ride\web\cms\orm\entry\TextEntry
     */
    public function getText() {
        if (!isset($this->loadedFields['text'])) {
            $this->loadProperties();
        }
        
        return parent::getText();
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

    /**
     * @param string $type 
     * @return null
     */
    public function setType($type) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('type', $this->loadedValues)) {
            $oldValue = $this->loadedValues['type'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['type'])) {
            $oldValue = $this->getType();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $type)  {
            return;
        }
        
        $this->loadedFields['type'] = true;
        
        return parent::setType($type);
    }

    /**
     * @return string
     */
    public function getType() {
        if (!isset($this->loadedFields['type'])) {
            $this->loadProperties();
        }
        
        return parent::getType();
    }

    /**
     * Gets the locale of this entry
     * @return string Code of the locale
     */
    public function getLocale() {
        if (!isset($this->loadedFields['locale'])) {
            $this->loadProperties();
        }
        
        return parent::getLocale();
    }

    /**
     * Gets whether the entry is localized in the requested locale
     * @return boolean Flag to see if the entry is localized in the requested locale
     */
    public function isLocalized() {
        if (!isset($this->loadedFields['locale'])) {
            $this->loadProperties();
        }
        
        return parent::isLocalized();
    }

}
