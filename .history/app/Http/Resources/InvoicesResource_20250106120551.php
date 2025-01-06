<?php

namespace App\Http\Resources;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoicesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id,
            "date"=> $this->date,
            "due_date"=> $this->due_date,
            "customer_name" => Customer::find($this->customer_id)->name,
            "status" => $this->status,


        ] ;

    }
}
