<?php

namespace App\Livewire\Enquiry;

use App\Models\Car;
use App\Models\Enquiry;
use Livewire\Attributes\On;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class EnquiryModal extends Component
{
    public $car_id, $car, $name, $phone_number, $email, $address, $message;
    public $isOpenModal = false;
    public function submit()
    {
        $validatedData = $this->validate([
            'car_id' => 'nullable|exists:cars,id',
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email',
            'address' => 'required|string',
            'message' => 'nullable|string',
        ]);
        try {
            Enquiry::create([
                'car_id' => $validatedData['car_id'],
                'name' => $validatedData['name'],
                'phone_number' => $validatedData['phone_number'],
                'email' => $validatedData['email'],
                'address' => $validatedData['address'],
                'message' => $validatedData['message'],
            ]);
            // Reset the form data
            $this->reset();
            Toaster::success('Your enquiry has been submitted successfully');
        } catch (\Exception $e) {
            Toaster::error('Something went wrong. Please try again.');
        }
    }
    public function closeModal()
    {
        $this->isOpenModal = false;
        $this->reset();
    }
    // listen dispatch event
    #[On('openEnquiryModal')]
    public function setCarId($carId)
    {
        $this->isOpenModal = true;
        $this->car = Car::with('thumbnailImage')->find($carId);
        $this->car_id = $this->car->id;
    }
    public function render()
    {
        return view('livewire.enquiry.enquiry-modal');
    }
}
