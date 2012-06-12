<?php
class UploadForm extends CFormModel {
    public $video;
 
    public function rules() {
        return array(
            array('video', 'file', 'types' => 'jpg, gif, png, mp4, m4v, mpeg, mpg, avi, pdf'),
        );
    }
}
?>