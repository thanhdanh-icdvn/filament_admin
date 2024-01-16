<?php

namespace App\Traits;

/**
 * Trait FlashMessages
 */
trait FlashMessages
{
    /**
     * @var array
     */
    protected $errorMessages = [];

    /**
     * @var array
     */
    protected $infoMessages = [];

    /**
     * @var array
     */
    protected $successMessages = [];

    /**
     * @var array
     */
    protected $warningMessages = [];

    /**
     * The function sets flash messages of different types (info, error, success, warning) in their
     * respective model arrays.
     *
     * @param 'message'
     * The message parameter is the actual message that you want to set as a flash message.
     * It can be a string or an array of strings if you want to set multiple flash messages at once.
     * @param 'type'
     * The "type" parameter is used to determine the type of flash message. It can have one of
     * the following values: "info", "error", "success", or "warning".
     */
    protected function setFlashMessage($message, $type)
    {
        $model = 'infoMessages';

        switch ($type) {
            case 'info':
                $model = 'infoMessages';

                break;
            case 'error':
                $model = 'errorMessages';

                break;
            case 'success':
                $model = 'successMessages';

                break;
            case 'warning':
                $model = 'warningMessages';

                break;
        }

        if (is_array($message)) {
            foreach ($message as $value) {
                array_push($this->$model, $value);
            }
        } else {
            array_push($this->$model, $message);
        }
    }

    /**
     * The function returns an array containing different types of flash messages.
     *
     * @return array
     */
    protected function getFlashMessage()
    {
        return [
            'error' => $this->errorMessages,
            'info' => $this->infoMessages,
            'success' => $this->successMessages,
            'warning' => $this->warningMessages,
        ];
    }

    /**
     * The function "showFlashMessages" stores error, info, success, and warning messages in the session.
     */
    protected function showFlashMessages()
    {
        session()->flash('error', $this->errorMessages);
        session()->flash('info', $this->infoMessages);
        session()->flash('success', $this->successMessages);
        session()->flash('warning', $this->warningMessages);
    }
}
