<?php

$data = [
  'title' => $page->title()->value(),
  'children' => array_values($page->children()->listed()->map(function ($album) {
    return [
      'id' => $album->id(),
      'title' => $album->title()->value(),
      'cover' => $album->cover() === null ? null : [
        'url' => $album->cover()->crop(800, 1000)->url(),
        'urlHome' => $album->cover()->resize(1024, 1024)->url(),
        'alt' => $album->cover()->alt()->value()
      ]
    ];
  })->data())
];

kirby()->response()->json();
echo json_encode($data);
