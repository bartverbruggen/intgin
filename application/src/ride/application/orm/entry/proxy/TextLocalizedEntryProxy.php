<?php

namespace ride\application\orm\entry\proxy;

use ride\application\orm\entry\TextLocalizedEntry;
use ride\library\orm\entry\EntryProxy;
use ride\library\orm\model\Model;
use ride\web\cms\orm\entry\TextEntry;

/**
 * Generated proxy for an entry of the TextLocalized model
 * 
 * NOTE: Do not edit this class
 */
class TextLocalizedEntryProxy extends TextLocalizedEntry implements EntryProxy {

    /**
     * Instance of the TextLocalized model
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
     * Construct a new TextLocalized entry proxy
     * @param \ride\library\orm\model\Model $model Instance of the TextLocalized model
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
     * Loads the values of the properties of this TextLocalized entry
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
            $this->loadedFields['title'] = true;
            $this->loadedFields['subtitle'] = true;
            $this->loadedFields['body'] = true;
            $this->loadedFields['image'] = true;
            $this->loadedFields['imageAlignment'] = true;
            $this->loadedFields['format'] = true;
        
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
        if (!isset($this->loadedFields['title'])) {
            $this->title = $entry->getTitle();
            $this->loadedValues['title'] = $entry->loadedValues['title'];
            $this->loadedFields['title'] = true;
        }
        if (!isset($this->loadedFields['subtitle'])) {
            $this->subtitle = $entry->getSubtitle();
            $this->loadedValues['subtitle'] = $entry->loadedValues['subtitle'];
            $this->loadedFields['subtitle'] = true;
        }
        if (!isset($this->loadedFields['body'])) {
            $this->body = $entry->getBody();
            $this->loadedValues['body'] = $entry->loadedValues['body'];
            $this->loadedFields['body'] = true;
        }
        if (!isset($this->loadedFields['image'])) {
            $this->image = $entry->getImage();
            $this->loadedValues['image'] = $entry->loadedValues['image'];
            $this->loadedFields['image'] = true;
        }
        if (!isset($this->loadedFields['imageAlignment'])) {
            $this->imageAlignment = $entry->getImageAlignment();
            $this->loadedValues['imageAlignment'] = $entry->loadedValues['imageAlignment'];
            $this->loadedFields['imageAlignment'] = true;
        }
        if (!isset($this->loadedFields['format'])) {
            $this->format = $entry->getFormat();
            $this->loadedValues['format'] = $entry->loadedValues['format'];
            $this->loadedFields['format'] = true;
        }
    }

    /**
     * Loads the value of a relation field of this TextLocalized entry
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
     * @param \ride\web\cms\orm\entry\TextEntry $entry 
     * @return null
     */
    public function setEntry(TextEntry $entry = NULL) {
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
     * @return \ride\web\cms\orm\entry\TextEntry
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
     * @param string $title 
     * @return null
     */
    public function setTitle($title) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('title', $this->loadedValues)) {
            $oldValue = $this->loadedValues['title'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['title'])) {
            $oldValue = $this->getTitle();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $title)  {
            return;
        }
        
        $this->loadedFields['title'] = true;
        
        return parent::setTitle($title);
    }

    /**
     * @return string
     */
    public function getTitle() {
        if (!isset($this->loadedFields['title'])) {
            $this->loadProperties();
        }
        
        return parent::getTitle();
    }

    /**
     * @param string $subtitle 
     * @return null
     */
    public function setSubtitle($subtitle) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('subtitle', $this->loadedValues)) {
            $oldValue = $this->loadedValues['subtitle'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['subtitle'])) {
            $oldValue = $this->getSubtitle();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $subtitle)  {
            return;
        }
        
        $this->loadedFields['subtitle'] = true;
        
        return parent::setSubtitle($subtitle);
    }

    /**
     * @return string
     */
    public function getSubtitle() {
        if (!isset($this->loadedFields['subtitle'])) {
            $this->loadProperties();
        }
        
        return parent::getSubtitle();
    }

    /**
     * @param string $body 
     * @return null
     */
    public function setBody($body) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('body', $this->loadedValues)) {
            $oldValue = $this->loadedValues['body'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['body'])) {
            $oldValue = $this->getBody();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $body)  {
            return;
        }
        
        $this->loadedFields['body'] = true;
        
        return parent::setBody($body);
    }

    /**
     * @return string
     */
    public function getBody() {
        if (!isset($this->loadedFields['body'])) {
            $this->loadProperties();
        }
        
        return parent::getBody();
    }

    /**
     * @param string $image 
     * @return null
     */
    public function setImage($image) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('image', $this->loadedValues)) {
            $oldValue = $this->loadedValues['image'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['image'])) {
            $oldValue = $this->getImage();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $image)  {
            return;
        }
        
        $this->loadedFields['image'] = true;
        
        return parent::setImage($image);
    }

    /**
     * @return string
     */
    public function getImage() {
        if (!isset($this->loadedFields['image'])) {
            $this->loadProperties();
        }
        
        return parent::getImage();
    }

    /**
     * @param string $imageAlignment 
     * @return null
     */
    public function setImageAlignment($imageAlignment) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('imageAlignment', $this->loadedValues)) {
            $oldValue = $this->loadedValues['imageAlignment'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['imageAlignment'])) {
            $oldValue = $this->getImageAlignment();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $imageAlignment)  {
            return;
        }
        
        $this->loadedFields['imageAlignment'] = true;
        
        return parent::setImageAlignment($imageAlignment);
    }

    /**
     * @return string
     */
    public function getImageAlignment() {
        if (!isset($this->loadedFields['imageAlignment'])) {
            $this->loadProperties();
        }
        
        return parent::getImageAlignment();
    }

    /**
     * @param string $format 
     * @return null
     */
    public function setFormat($format = 'wysiwyg') {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('format', $this->loadedValues)) {
            $oldValue = $this->loadedValues['format'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['format'])) {
            $oldValue = $this->getFormat();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $format)  {
            return;
        }
        
        $this->loadedFields['format'] = true;
        
        return parent::setFormat($format);
    }

    /**
     * @return string
     */
    public function getFormat() {
        if (!isset($this->loadedFields['format'])) {
            $this->loadProperties();
        }
        
        return parent::getFormat();
    }

}
