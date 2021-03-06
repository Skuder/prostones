<?php

/**
 * This is the model class for table "ehp_tipos".
 *
 * The followings are the available columns in table 'ehp_tipos':
 * @property integer $id
 * @property string $nombre
 * @property integer $id_material
 * @property integer $id_tono
 *
 * The followings are the available model relations:
 * @property Materiales $idMaterial
 * @property Tonos $idTono
 * @property Valorpiezas[] $valorpiezases
 */
class Tipo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ehp_tipos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, id_material, id_tono', 'required'),
			array('id_material, id_tono', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>256),
			array('textura', 'length', 'max'=>512),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, id_material, id_tono', 'safe', 'on'=>'search'),
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
			'idMaterial' => array(self::BELONGS_TO, 'Materiales', 'id_material'),
			'idTono' => array(self::BELONGS_TO, 'Tonos', 'id_tono'),
			'valorpiezases' => array(self::HAS_MANY, 'Valorpiezas', 'id_tipo'),
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
			'id_material' => 'Id Material',
			'id_tono' => 'Id Tono',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('id_material',$this->id_material);
		$criteria->compare('id_tono',$this->id_tono);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tipo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
