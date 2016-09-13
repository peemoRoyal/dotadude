<?php
namespace App\Model\Behavior;

use Cake\Event\Event;
use Cake\ORM\Behavior;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\Filesystem\File;
use Cake\Filesystem\Folder;

class UploadBehavior extends Behavior {

    protected $_defaultConfig = [
        'field' => 'data',
        'uploadPath' => 'uploads/'
    ];


    public function uploadFile(Entity $entity)
    {
        $config = $this->config();
        if (!is_array($config['field'])) {
            $field = $entity->get($config['field']);
            $filePath = $this->_moveFile($field);
            $entity->set($config['field'], $filePath);
        } else {
            foreach ($config['field'] AS $value) {
                $field = $entity->get($value);
                $filePath = $this->_moveField($field);
                $entity->set($config['field'], $filePath);
            }
        }
    }

    private function _moveFile($uploadField)
    {
        $uploadPath = $this->config('uploadPath');
        $uploadFolder = new Folder(ROOT.DS.'webroot'.$uploadPath, 0755);

        $upload = "";
        if (isset($uploadField['tmp_name'])) {
            $upload = $uploadPath.DS.$uploadField['name'];
            move_uploaded_file($uploadField['tmp_name'], $uploadPath.DS.$uploadField['name']);
        }

        return $upload;
    }

    public function beforeSave(Event $event, Entity $entity)
    {
        debug('yolo');exit;
        $this->uploadFile($entity);
    }
}