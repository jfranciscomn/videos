<?php
class UploadForm extends CFormModel {
    public $video;
 
    public function rules() {
        return array(
			array('video', 'required'),
            array('video', 'file', 'types' => 'mp4, m4v, mpeg, mpg, avi'),
        );
    }
}
?>