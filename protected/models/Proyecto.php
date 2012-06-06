<?php

/**
 * This is the model class for table "Proyecto".
 *
 * The followings are the available columns in table 'Proyecto':
 * @property integer $id
 * @property string $nombre
 * @property integer $cliente_id
 * @property string $imagen
 * @property integer $estatus_id
 *
 * The followings are the available model relations:
 * @property Cliente $cliente
 * @property Estatus $estatus
 * @property VideosPorProyecto $videosPorProyecto
 */
class Proyecto extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Proyecto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Proyecto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, cliente_id, imagen, estatus_id', 'required'),
			array('cliente_id, estatus_id', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>90),
			array('imagen', 'length', 'max'=>182),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, cliente_id, imagen, estatus_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'cliente' => array(self::BELONGS_TO, 'Cliente', 'cliente_id'),
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_id'),
			'videosPorProyecto' => array(self::HAS_ONE, 'VideosPorProyecto', 'proyecto_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'cliente_id' => 'Cliente',
			'imagen' => 'Imagen',
			'estatus_id' => 'Estatus',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('cliente_id',$this->cliente_id);
		$criteria->compare('imagen',$this->imagen,true);
		$criteria->compare('estatus_id',$this->estatus_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}