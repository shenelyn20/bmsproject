<?php

/**
 * This is the model class for table "bms.quarterly_allotment_obligation".
 *
 * The followings are the available columns in table 'bms.quarterly_allotment_obligation':
 * @property integer $qao_id
 * @property integer $id
 * @property string $implementing_unit
 * @property string $mfo_ppas
 * @property string $first_quarter_ar
 * @property string $second_quarter_ar
 * @property string $third_quarter_ar
 * @property string $fourth_quarter_ar
 * @property string $total_ar
 * @property string $first_quarter_oi
 * @property string $second_quarter_oi
 * @property string $third_quarter_oi
 * @property string $fourth_quarter_oi
 * @property string $total_oi
 * @property integer $year
 * @property string $continuing_appropriation
 * @property string $current_appropriation
 * @property string $first_quarter_remarks
 * @property string $second_quarter_remarks
 * @property string $third_quarter_remarks
 * @property string $fourth_quarter_remarks
 */
class QuarterlyAllotmentObligation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bms.quarterly_allotment_obligation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, year', 'numerical', 'integerOnly'=>true),
			array('implementing_unit, mfo_ppas', 'length', 'max'=>100),
			array('first_quarter_ar, second_quarter_ar, third_quarter_ar, fourth_quarter_ar, total_ar, first_quarter_oi, second_quarter_oi, third_quarter_oi, fourth_quarter_oi, total_oi, continuing_appropriation, current_appropriation', 'length', 'max'=>15),
			array('first_quarter_remarks, second_quarter_remarks, third_quarter_remarks, fourth_quarter_remarks', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('qao_id, id, implementing_unit, mfo_ppas, first_quarter_ar, second_quarter_ar, third_quarter_ar, fourth_quarter_ar, total_ar, first_quarter_oi, second_quarter_oi, third_quarter_oi, fourth_quarter_oi, total_oi, year, continuing_appropriation, current_appropriation, first_quarter_remarks, second_quarter_remarks, third_quarter_remarks, fourth_quarter_remarks', 'safe', 'on'=>'search'),
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
			'qao_id' => 'Qao',
			'id' => 'ID',
			'implementing_unit' => 'Implementing Unit',
			'mfo_ppas' => 'Mfo Ppas',
			'first_quarter_ar' => 'First Quarter Ar',
			'second_quarter_ar' => 'Second Quarter Ar',
			'third_quarter_ar' => 'Third Quarter Ar',
			'fourth_quarter_ar' => 'Fourth Quarter Ar',
			'total_ar' => 'Total Ar',
			'first_quarter_oi' => 'First Quarter Oi',
			'second_quarter_oi' => 'Second Quarter Oi',
			'third_quarter_oi' => 'Third Quarter Oi',
			'fourth_quarter_oi' => 'Fourth Quarter Oi',
			'total_oi' => 'Total Oi',
			'year' => 'Year',
			'continuing_appropriation' => 'Continuing Appropriation',
			'current_appropriation' => 'Current Appropriation',
			'first_quarter_remarks' => 'First Quarter Remarks',
			'second_quarter_remarks' => 'Second Quarter Remarks',
			'third_quarter_remarks' => 'Third Quarter Remarks',
			'fourth_quarter_remarks' => 'Fourth Quarter Remarks',
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

		$criteria->compare('qao_id',$this->qao_id);
		$criteria->compare('id',$this->id);
		$criteria->compare('implementing_unit',$this->implementing_unit,true);
		$criteria->compare('mfo_ppas',$this->mfo_ppas,true);
		$criteria->compare('first_quarter_ar',$this->first_quarter_ar,true);
		$criteria->compare('second_quarter_ar',$this->second_quarter_ar,true);
		$criteria->compare('third_quarter_ar',$this->third_quarter_ar,true);
		$criteria->compare('fourth_quarter_ar',$this->fourth_quarter_ar,true);
		$criteria->compare('total_ar',$this->total_ar,true);
		$criteria->compare('first_quarter_oi',$this->first_quarter_oi,true);
		$criteria->compare('second_quarter_oi',$this->second_quarter_oi,true);
		$criteria->compare('third_quarter_oi',$this->third_quarter_oi,true);
		$criteria->compare('fourth_quarter_oi',$this->fourth_quarter_oi,true);
		$criteria->compare('total_oi',$this->total_oi,true);
		$criteria->compare('year',$this->year);
		$criteria->compare('continuing_appropriation',$this->continuing_appropriation,true);
		$criteria->compare('current_appropriation',$this->current_appropriation,true);
		$criteria->compare('first_quarter_remarks',$this->first_quarter_remarks,true);
		$criteria->compare('second_quarter_remarks',$this->second_quarter_remarks,true);
		$criteria->compare('third_quarter_remarks',$this->third_quarter_remarks,true);
		$criteria->compare('fourth_quarter_remarks',$this->fourth_quarter_remarks,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return QuarterlyAllotmentObligation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
