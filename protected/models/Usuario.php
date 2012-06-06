<?php

/**
 * This is the model class for table "Usuario".
 *
 * The followings are the available columns in table 'Usuario':
 * @property integer $id
 * @property string $usuario
 * @property string $password
 * @property integer $tipousuario_id
 * @property integer $estatus_id
 *
 * The followings are the available model relations:
 * @property Cliente $cliente
 * @property TipoUsuario $tipousuario
 * @property Estatus $estatus
 */
class Usuario extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Usuario the static model class
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
		return 'Usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuario, password, tipousuario_id, estatus_id', 'required'),
			array('tipousuario_id, estatus_id', 'numerical', 'integerOnly'=>true),
			array('usuario, password', 'length', 'max'=>90),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, usuario, password, tipousuario_id, estatus_id', 'safe', 'on'=>'search'),
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
			'cliente' => array(self::HAS_ONE, 'Cliente', 'usuario_id'),
			'tipousuario' => array(self::BELONGS_TO, 'TipoUsuario', 'tipousuario_id'),
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'usuario' => 'Usuario',
			'password' => 'Password',
			'tipousuario_id' => 'Tipousuario',
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
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('tipousuario_id',$this->tipousuario_id);
		$criteria->compare('estatus_id',$this->estatus_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}