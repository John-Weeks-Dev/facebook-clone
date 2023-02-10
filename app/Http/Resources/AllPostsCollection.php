<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AllPostsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function($item) {
            return [
                'id' => $item->id,
                'text' => $item->text,
                'image' => $item->image,
                'created_at' => $item->created_at->format(' M D Y'),
                'comments' => $item->comments->map(function ($comment) {
                    return [
                        'id' => $comment->id,
                        'text' => $comment->text,
                        'user' => [
                            'id' => $comment->user->id,
                            'name' => $comment->user->name,
                            'image' => $comment->user->image
                        ],
                    ];
                }),
                'user' => [
                    'id' => $item->user->id,
                    'name' => $item->user->name,
                    'image' => $item->user->image
                ],
            ];
        });
    }
}
