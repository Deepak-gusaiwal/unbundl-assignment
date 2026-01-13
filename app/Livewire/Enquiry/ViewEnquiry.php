<?php

namespace App\Livewire\Enquiry;

use App\Models\Enquiry;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class ViewEnquiry extends Component
{
    public $enquiryId;
    public $enquiry;
    public function mount()
    {
        $this->fetchEnquiry(); // to populate richText Value
    }
    public function fetchEnquiry(){
        try {
             $enquiry = Enquiry::find($this->enquiryId);
            if (!$enquiry) {
                return redirect()->route('notFound');
            }
            $this->enquiry = $enquiry;
        } catch (\Exception $e) {
            Toaster::error($e->getMessage());
        }
    }
    public function render()
    {
        
        return view('livewire.enquiry.view-enquiry')->layout('components.layouts.dashboard');
    }
}
