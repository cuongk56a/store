<?php
namespace App\Components;

class MenuRecusive{

    private $data;
    private $htmlSelect='';
    public function __construct($data){
        $this->data = $data;
    }

    public function menuRecusive($parentId, $id=0, $text=''){
        foreach($this->data as $value){
            if($value->parent_id == $id){
                if(!empty($parentId) && $parentId== $value->id){
                    $this->htmlSelect .= "<option selected value='" . $value->id ."'>". $text . ' ' . $value->name . ' ' . $text ."</option>";
                }else{
                    $this->htmlSelect .= "<option value='" . $value->id ."'>". $text . ' ' . $value->name . ' ' . $text ."</option>";
                }
                $this->menuRecusive($parentId, $value->id, $text. '-');
            }
        }
        return $this->htmlSelect;
    }
}