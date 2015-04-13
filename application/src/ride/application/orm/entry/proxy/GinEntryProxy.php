<?php

namespace ride\application\orm\entry\proxy;

use ride\application\orm\asset\entry\AssetEntry;
use ride\application\orm\entry\GinEntry;
use ride\library\orm\entry\EntryProxy;
use ride\library\orm\model\Model;

/**
 * Generated proxy for an entry of the Gin model
 * 
 * NOTE: Do not edit this class
 */
class GinEntryProxy extends GinEntry implements EntryProxy {

    /**
     * Instance of the Gin model
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
     * Construct a new Gin entry proxy
     * @param \ride\library\orm\model\Model $model Instance of the Gin model
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
     * Loads the values of the properties of this Gin entry
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
            $this->loadedFields['title'] = true;
            $this->loadedFields['image'] = true;
            $this->loadedFields['body'] = true;
            $this->loadedFields['version'] = true;
            $this->loadedFields['slug'] = true;
            $this->loadedFields['dateAdded'] = true;
            $this->loadedFields['dateModified'] = true;
        
            $this->entryState = self::STATE_NEW;
        
            return;
        }
        
        if (!isset($this->loadedFields['title'])) {
            $this->title = $entry->getTitle();
            $this->loadedValues['title'] = $entry->loadedValues['title'];
            $this->loadedFields['title'] = true;
        }
        if (!isset($this->loadedFields['image'])) {
            $this->image = $entry->getImage();
            $this->loadedValues['image'] = $entry->loadedValues['image'];
            $this->loadedFields['image'] = true;
        }
        if (!isset($this->loadedFields['body'])) {
            $this->body = $entry->getBody();
            $this->loadedValues['body'] = $entry->loadedValues['body'];
            $this->loadedFields['body'] = true;
        }
        if (!isset($this->loadedFields['version'])) {
            $this->version = $entry->getVersion();
            $this->loadedValues['version'] = $entry->loadedValues['version'];
            $this->loadedFields['version'] = true;
        }
        if (!isset($this->loadedFields['slug'])) {
            $this->slug = $entry->getSlug();
            $this->loadedValues['slug'] = $entry->loadedValues['slug'];
            $this->loadedFields['slug'] = true;
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
     * Loads the value of a relation field of this Gin entry
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
     * @param \ride\application\orm\asset\entry\AssetEntry $image 
     * @return null
     */
    public function setImage(AssetEntry $image = NULL) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('image', $this->loadedValues)) {
            $oldValue = $this->loadedValues['image'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['image'])) {
            $oldValue = $this->getImage();
            $hasOldValue = true;
        }
        if ($hasOldValue && ((!$oldValue && !$image) || ($oldValue && $image && $oldValue->getId() === $image->getId())))  {
            return;
        }
        
        $this->loadedFields['image'] = true;
        
        return parent::setImage($image);
    }

    /**
     * @return \ride\application\orm\asset\entry\AssetEntry
     */
    public function getImage() {
        if (!isset($this->loadedFields['image'])) {
            $this->loadProperties();
        }
        
        return parent::getImage();
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
     * @param array $mixes 
     * @return null
     */
    public function setMixes(array $mixes = array()) {
        $this->loadedFields['mixes'] = true;
        
        return parent::setMixes($mixes);
    }

    /**
     * @return array
     */
    public function getMixes() {
        if (!isset($this->loadedFields['mixes'])) {
            $this->loadRelation('mixes');
        }
        
        return parent::getMixes();
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
