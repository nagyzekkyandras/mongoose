<?php

class Json
{
    public function nexusJson(string $data)
    {
        $decoded_json = json_decode($data, true);
        $name = $decoded_json['name'];
        $tags = $decoded_json['tags'];
        foreach($tags as $tag) {
            echo $name.':'.$tag.'<br/>';
        }
    }
}