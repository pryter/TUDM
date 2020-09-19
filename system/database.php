<?php
class database {
    private $path;

    function __construct($db_path)
    {
        $this->path = realpath($db_path);
    }

    function append($key, $val){
        $f = fopen($this->path,"a");
        $text = $key."|".$val."!";
        $res = fwrite($f,$text);
        fclose($f);
        if($res !== false)
        {
            return true;
        }else{
            return false;
        }
    }

    function eliminate($needle,$needle_type = "key"){
        $data = $this->read_obj();
        $stuff = $this->read_str();
        $resp = false;
        if($needle_type == "key"){
            $val = $data[$needle];
            $final = str_replace($needle."|".$val."!","",$stuff);
            $resp = true;
        }
        if($needle_type == "val"){
            $key = array_search($needle,$data);
            $final = str_replace($key."|".$needle."!","",$stuff);
            $resp = true;
        }
        if($resp = true) {
            $f = fopen($this->path, "w");
            fwrite($f, $final);
            fclose($f);
        }
        return $resp;
    }

    function isin($key,$val){
        $data = $this->read_str();
        $text = $key."|".$val."!";
        if(strpos($data, $text) !== false){
            return true;
        }else{
            return false;
        }
    }

    function read_str(){
        $f = fopen($this->path,"r");
        return fread($f,filesize($this->path));
    }

    function read_obj(){
        $f = fopen($this->path,"r");
        $out = fread($f,filesize($this->path));
        $out = explode("!",$out);
        $obj = array();
        foreach ($out as $item){
            if(strpos($item, "|") !== false) {
                $stuff = explode("|", $item);
                $obj[$stuff[0]] = $stuff[1];
            }
        }
        return $obj;
    }
}