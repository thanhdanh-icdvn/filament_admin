<?php

namespace App\Livewire;

use App\Livewire\Forms\PaymentMethodForm;
use Livewire\Component;

class PaymentMethod extends Component
{
    public PaymentMethodForm $form;

    public function render()
    {

        return view('livewire.payment-method');
    }

    public function save()
    {
        $this->form->validate();

    }
}
