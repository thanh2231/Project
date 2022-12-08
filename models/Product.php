<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $typeid
 * @property int $companyid
 * @property int $price
 * @property string $image
 * @property string $configuration
 * @property string $screen
 * @property string $operatingsystem
 * @property string $camera
 * @property string $batteries
 * @property string $ngaysx
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'description', 'typeid', 'companyid', 'price', 'image', 'configuration', 'screen', 'operatingsystem', 'camera', 'batteries', 'ngaysx'], 'required'],
            [['id', 'typeid', 'companyid', 'price'], 'integer'],
            [['description'], 'string'],
            [['ngaysx'], 'safe'],
            [['name', 'image', 'configuration', 'screen', 'operatingsystem', 'camera', 'batteries'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'typeid' => 'Typeid',
            'companyid' => 'Companyid',
            'price' => 'Price',
            'image' => 'Image',
            'configuration' => 'Configuration',
            'screen' => 'Screen',
            'operatingsystem' => 'Operatingsystem',
            'camera' => 'Camera',
            'batteries' => 'Batteries',
            'ngaysx' => 'Ngaysx',
        ];
    }
}
