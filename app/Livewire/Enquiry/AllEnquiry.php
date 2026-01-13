<?php

namespace App\Livewire\Enquiry;

use App\Models\Enquiry;
use Livewire\Component;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class AllEnquiry extends Component
{
    use WithPagination;
    public function deleteEnquiry($id)
    {
        try {
            $enquiry = Enquiry::find($id);
            if ($enquiry) {
                $enquiry->delete();
                Toaster::success('Enquiry deleted successfully.');
            } else {
                Toaster::error('Enquiry not found.');
            }
        } catch (\Exception $e) {
            Toaster::error($e->getMessage());
        }
    }
    public function render()
    {
        $enquires = Enquiry::latest()->paginate(6);

        return view('livewire.enquiry.all-enquiry', ['enquires' => $enquires])->layout('components.layouts.dashboard');
    }
}
