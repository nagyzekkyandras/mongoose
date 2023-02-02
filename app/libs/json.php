<?php

class Json
{
    public function nexusJson(string $data)
    {
        $decoded = json_decode($data, true);
        $name = $decoded['name'];
        $tags = $decoded['tags'];
        foreach ($tags as $tag) {
            echo $name.':'.$tag.'<br/>';
        }
    }
}
