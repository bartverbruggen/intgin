<?php

namespace intgin\controller\widget;

use ride\library\cms\node\NodeModel;
use ride\library\mail\transport\Transport;
use ride\library\orm\OrmManager;
use ride\library\validation\exception\ValidationException;
use ride\web\cms\controller\widget\AbstractWidget;
use ride\web\cms\controller\widget\StyleWidget;
use ride\web\form\component\HoneyPotComponent;
use ride\web\form\exception\HoneyPotException;

class MixSuggestionWidget extends AbstractWidget implements StyleWidget{

    /**
     * Machine name for this widget
     * @var string
     */
    const NAME = 'intgin.mix.suggestion';
    /**
     * Path to the resource namespace of the templates
     * @var string
     */
    const TEMPLATE_NAMESPACE = 'cms/widget/suggestion/';

    /**
     * Action for the frontend of the widget
     */
    public function indexAction(OrmManager $orm, HoneyPotComponent $honeyPotComponent, Transport $transport) {
        $recipient = $this->getRecipient();
        if (!$recipient) {
            return;
        }
        $translator = $this->getTranslator();

        // Get the current gin
        $content = $this->getContext('content');
        $gin = $content->data;


        $ginSuggestionModel = $orm->getMixSuggestionModel();
        $ginSuggestion = $ginSuggestionModel->createEntry();

        $form = $this->createFormBuilder($ginSuggestion);
        $form->addRow('name', 'string', array (
            'label' => $translator->translate('label.name'),
            'filters' => array(
                'trim' => array(),
            ),
            'validators' => array (
                'required' => array ()
            )
        ));
        $form->addRow('email', 'string', array (
            'label' => $translator->translate('label.email'),
            'filters' => array(
                'trim' => array(),
            ),
            'validators' => array (
                'required' => array ()
            )
        ));
        $form->addRow('tonic', 'string', array (
            'label' => $translator->translate('title.tonic'),
            'filters' => array(
                'trim' => array(),
            )
        ));
        $form->addRow('garnish', 'string', array (
            'label' => $translator->translate('title.garnish'),
            'filters' => array(
                'trim' => array(),
            )
        ));
        $form->addRow('message', 'text', array (
            'label' => $translator->translate('label.message'),
            'filters' => array(
                'trim' => array(),
            ),
            'validators' => array (
                'required' => array ()
            )
        ));
        $form->addRow('mobile', 'component', array (
            'component' => $honeyPotComponent,
            'embed' => true
        ));
        $form = $form->build();

        if ($form->isSubmitted()) {
            try {
                $form->validate();
                $tmpGinSuggestion = $form->getData();

                $tmpGinSuggestion->setGin($gin);
                $ginSuggestionModel->save($tmpGinSuggestion);

                $this->sendSuggestionMail($tmpGinSuggestion, $transport);
                // $this->sendSuggestorMail($tmpGinSuggestion, $transport);

                $finish = $this->properties->getWidgetProperty('finish.node');
                $url = $this->request->getUrl();
                if ($finish) {
                    $url = $this->getUrl('cms.front.' . $this->properties->getNode()->getRootNodeId() . '.' . $finish . '.' . $this->locale);
                }
                elseif ($this->request->getBodyParameter('new')) {
                    $ginSuggestion = null;
                    $this->response->setRedirect($url);
                }
                else {
                    $this->addSuccess('success.message.sent');
                }
                $this->response->setRedirect($url);

                return;
            } catch (ValidationException $exception) {
                $this->setValidationException($exception, $form);
            } catch (HoneyPotException $exception) {
                $this->addError('error.honeypot');
            }
        }
        $view = $this->setTemplateView($this->getTemplate(self::TEMPLATE_NAMESPACE . '/default'), array (
            'form' => $form->getView(),
            'ginTitle' => $content->data->getTitle()
        ));
        $form->processView($view);
    }


    public function getPropertiesPreview() {
        $translator = $this->getTranslator();

        $preview = '';

        $recipient = $this->getRecipient();
        if ($recipient) {
            $preview .= '<strong>' . $translator->translate('label.recipient') . '</strong>: ' . $recipient . '<br />';
        }

        $subject = $this->getSubject();
        if ($subject) {
            $preview .= '<strong>' . $translator->translate('label.subject') . '</strong>: ' . $subject . '<br />';
        }

        $finish = $this->properties->getWidgetProperty('finish.node');
        if ($finish) {
            $preview .= '<strong>' . $translator->translate('label.node.finish') . '</strong>: ' . $finish . '<br />';
        }

        return $preview;
    }

    public function propertiesAction(NodeModel $nodeModel) {
        $translator = $this->getTranslator();

        $data = array (
            'recipient'             => $this->getRecipient(),
            'subject'               => $this->getSubject(),
            'finishNode'            => $this->properties->getWidgetProperty('finish.node'),
            self::PROPERTY_TEMPLATE => $this->getTemplate(self::TEMPLATE_NAMESPACE . '/workshop.inquiry')
        );

        $form = $this->createFormBuilder($data);
        $form->addRow('recipient', 'email', array (
            'label' => $translator->translate('label.recipient'),
            'filters' => array (
                'trim' => array (),
            ),
            'validators' => array (
                'required' => array (),
            )
        ));
        $form->addRow('subject', 'string', array (
            'label'   => $translator->translate('label.subject'),
            'filters' => array (
                'trim' => array (),
            ),
        ));
        $form->addRow('finishNode', 'select', array (
            'label'       => $translator->translate('label.node.finish'),
            'description' => $translator->translate('label.node.finish.description'),
            'options'     => $this->getNodeList($nodeModel),
        ));
        $form->addRow(self::PROPERTY_TEMPLATE, 'select', array (
            'label'      => $translator->translate('label.template'),
            'options'    => $this->getAvailableTemplates(self::TEMPLATE_NAMESPACE),
            'validators' => array (
                'required' => array (),
            ),
        ));
        $form = $form->build();

        if ($form->isSubmitted()) {
            try {
                $form->validate();
                $data = $form->getData();

                $this->properties->setWidgetProperty('recipient.' . $this->locale, $data['recipient']);
                $this->properties->setWidgetProperty('subject.' . $this->locale, $data['subject']);
                $this->properties->setWidgetProperty('finish.node', $data['finishNode']);
                $this->setTemplate($data[self::PROPERTY_TEMPLATE]);

                return true;
            } catch (ValidationException $exception) {
                $this->setValidationException($exception, $form);
            }
        }

        $this->setTemplateView(static::TEMPLATE_NAMESPACE . '/properties', array (
            'form' => $form->getView(),
        ));

        return false;
    }

    /**
     * Gets the recipient for the message
     * @return string
     */
    protected function getRecipient() {
        $recipient = $this->properties->getWidgetProperty('recipient.' . $this->locale);
        if (!$recipient) {
            $recipient = $this->properties->getWidgetProperty('recipient');
        }

        return $recipient;
    }

    /**
     * Gets the subject for the message
     * @param boolean $useDefault Set to true to return a default subject
     * @return string
     */
    protected function getSubject($useDefault = false) {
        $subject = $this->properties->getWidgetProperty('subject.' . $this->locale);
        if (!$subject) {
            $subject = $this->properties->getWidgetProperty('subject');
        }
        if (!$subject && $useDefault) {
            $subject = 'Message from ' . $this->properties->getNode()->getRootNode()->getName($this->locale);
        }

        return $subject;
    }

    /**
     * function to send mail
     * @param $entry
     */
    protected function sendSuggestionMail($entry, $transport) {
        $message = $transport->createMessage();
        $message->setFrom($entry->name . ' <' . $entry->email . '>');
        $message->setTo($this->getRecipient());

        $message->setSubject($this->getSubject() . ' ' . $entry->getGin()->getTitle());
        $message->setIsHtmlMessage(true);
        $message->setMessage($this->createMessage($entry));

        var_dump($message);

        $transport->send($message);
    }

    protected function createMessage($entry) {
        $translator = $this->getTranslator();
        $output = '<h2>' . $translator->translate('title.gin.mix.suggestion') . ' ' . $entry->getGin()->getTitle() . '</h2>';

        $output .= '<strong>' . $translator->translate('label.name') . '</strong> : ' . $entry->name . '<br/>';
        $output .= '<strong>' . $translator->translate('label.email') . '</strong> : ' . $entry->email . '<br/>';
        $output .= '<strong>' . $translator->translate('title.gin') . '</strong> : ' . $entry->getGin()->getTitle() . '<br/>';
        $output .= '<strong>' . $translator->translate('title.tonic') . '</strong> : ' . $entry->tonic . '<br/>';
        $output .= '<strong>' . $translator->translate('title.garnish') . '</strong> : ' . $entry->garnish . '<br/>';
        $output .= '<strong>' . $translator->translate('label.message') . '</strong> : ' . $entry->message . '<br/>';

        return $output;
    }
    /**
     * Gets the options for the styles
     * @return array Array with the name of the option as key and the
     * translation key as value
     */
    public function getWidgetStyleOptions() {
        // TODO: Implement getWidgetStyleOptions() method.
    }
}
