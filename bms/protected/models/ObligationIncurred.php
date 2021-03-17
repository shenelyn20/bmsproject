<?php

/**
 * This is the model class for table "bms.obligation_incurred".
 *
 * The followings are the available columns in table 'bms.obligation_incurred':
 * @property integer $oi_id
 * @property string $implementing_unit
 * @property string $mfo_ppas
 * @property string $description
 * @property string $release_date
 * @property string $amount
 */
class ObligationIncurred extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bms.obligation_incurred';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('implementing_unit, mfo_ppas, release_date', 'length', 'max'=>100),
			array('description', 'length', 'max'=>200),
			array('amount', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('oi_id, implementing_unit, mfo_ppas, description, release_date, amount', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'oi_id' => 'Oi',
			'implementing_unit' => 'Implementing Unit',
			'mfo_ppas' => 'Mfo Ppas',
			'description' => 'Description',
			'release_date' => 'Release Date',
			'amount' => 'Amount',
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

		$criteria->compare('oi_id',$this->oi_id);
		$criteria->compare('implementing_unit',$this->implementing_unit,true);
		$criteria->compare('mfo_ppas',$this->mfo_ppas,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('release_date',$this->release_date,true);
		$criteria->compare('amount',$this->amount,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ObligationIncurred the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
