<?php

/**
 * This is the model class for table "Cliente".
 *
 * The followings are the available columns in table 'Cliente':
 * @property integer $id
 * @property string $nombre_empresa
 * @property string $nombre_contacto
 * @property string $telefono
 * @property string $email
 * @property integer $usuario_id
 *
 * The followings are the available model relations:
 * @property Usuario $usuario
 * @property Proyecto $proyecto
 */
class Cliente extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cliente the static model class
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
		return 'Cliente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_empresa, usuario_id', 'required'),
			array('usuario_id', 'numerical', 'integerOnly'=>true),
			array('nombre_empresa', 'length', 'max'=>180),
			array('nombre_contacto, email', 'length', 'max'=>90),
			array('telefono', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre_empresa, nombre_contacto, telefono, email, usuario_id', 'safe', 'on'=>'search'),
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
			'usuario' => array(self::BELONGS_TO, 'Usuario', 'usuario_id'),
			'proyecto' => array(self::HAS_ONE, 'Proyecto', 'cliente_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre_empresa' => 'Empresa',
			'nombre_contacto' => 'Contacto',
			'telefono' => 'Telefono',
			'email' => 'Email',
			'usuario_id' => 'Usuario',
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
		$criteria->compare('nombre_empresa',$this->nombre_empresa,true);
		$criteria->compare('nombre_contacto',$this->nombre_contacto,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('usuario_id',$this->usuario_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}