<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class ProductCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
        'name'=> $this->name,
        'discount'=> $this->discount,
        'totalPrice' => round(((1-($this->discount/100)) * $this->price), 2),
        'rating'=> $this->reviews->count() > 0 ?
        round($this->reviews->sum('star')/$this->reviews->count(), 2)
        : 'No rating yet',
        'href' => [
            'link' => route('products.show', $this->id)
        ]

        ];
    }
}