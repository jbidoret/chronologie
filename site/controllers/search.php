<?php

return function ($site) {

  
  $tag = param("tag");
  if($tag){
    $query = null;
    $tag = urldecode($tag);
    $results = $site->index()->listed()->filterBy('lecturers',  $tag, ',');
  } else {
    $tag = null;
    $query = get('q');
    $results = $site->search($query, 'text')->template('session');

  }

  return [
    'query'   => $query,
    'tag'   => $tag,
    'results' => $results,
  ];

};