<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PaymentMethodForm extends Form
{
    #[Validate('required|numberic|digits:16')]
    public $cardNumber = '';

    #[Validate('required|regex:/^[A-Za-z\s]+$/')]
    public $cardHolderName = '';

    #[Validate('required|numeric|between:1,12')]
    public $expMonth = '';

    #[Validate('required|numeric')]
    public $expYear = '';

    #[Validate('required|numeric|digits_between:3,4')]
    public $cvc = '';

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function validatePaymentDetails($field)
    {
        $this->validateOnly($field);
    }

    public function submitForm()
    {
        $this->validate();

        // Add your logic here to handle the payment form submission
        // For example, you might want to store the payment details in the database

        // After successful submission, you can redirect or perform other actions
    }

    public function render()
    {
        return view('livewire.payment-form');
    }
}
