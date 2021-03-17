<?php

/**
 * This is the model class for table "bms.quarterly_financial_report".
 *
 * The followings are the available columns in table 'bms.quarterly_financial_report':
 * @property integer $id
 * @property string $implementing_unit
 * @property string $mfo_ppas
 * @property string $continuing_appropriation
 * @property string $current_appropriation
 * @property string $total_appropriation
 * @property string $previous_quarter_allotment_released
 * @property string $this_quarter_allotment_released
 * @property string $total_allotment_released
 * @property string $balance_of_appropriation
 * @property string $previous_quarter_obligation_incurred
 * @property string $this_quarter_obligation_incurred
 * @property string $total_obligation_incurred
 * @property string $unobligated_allotment
 * @property string $remarks
 * @property string $next_year_appropriation
 */
class QuarterlyFinancialReport extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bms.quarterly_financial_report';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('implementing_unit, mfo_ppas', 'length', 'max'=>100),
			array('continuing_appropriation, current_appropriation, total_appropriation, previous_quarter_allotment_released, this_quarter_allotment_released, total_allotment_released, balance_of_appropriation, previous_quarter_obligation_incurred, this_quarter_obligation_incurred, total_obligation_incurred, unobligated_allotment, next_year_appropriation', 'length', 'max'=>15),
			array('remarks', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, implementing_unit, mfo_ppas, continuing_appropriation, current_appropriation, total_appropriation, previous_quarter_allotment_released, this_quarter_allotment_released, total_allotment_released, balance_of_appropriation, previous_quarter_obligation_incurred, this_quarter_obligation_incurred, total_obligation_incurred, unobligated_allotment, remarks, next_year_appropriation', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'implementing_unit' => 'Implementing Unit',
			'mfo_ppas' => 'Mfo Ppas',
			'continuing_appropriation' => 'Continuing Appropriation',
			'current_appropriation' => 'Current Appropriation',
			'total_appropriation' => 'Total Appropriation',
			'previous_quarter_allotment_released' => 'Previous Quarter Allotment Released',
			'this_quarter_allotment_released' => 'This Quarter Allotment Released',
			'total_allotment_released' => 'Total Allotment Released',
			'balance_of_appropriation' => 'Balance Of Appropriation',
			'previous_quarter_obligation_incurred' => 'Previous Quarter Obligation Incurred',
			'this_quarter_obligation_incurred' => 'This Quarter Obligation Incurred',
			'total_obligation_incurred' => 'Total Obligation Incurred',
			'unobligated_allotment' => 'Unobligated Allotment',
			'remarks' => 'Remarks',
			'next_year_appropriation' => 'Next Year Appropriation',
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
		$criteria->compare('implementing_unit',$this->implementing_unit,true);
		$criteria->compare('mfo_ppas',$this->mfo_ppas,true);
		$criteria->compare('continuing_appropriation',$this->continuing_appropriation,true);
		$criteria->compare('current_appropriation',$this->current_appropriation,true);
		$criteria->compare('total_appropriation',$this->total_appropriation,true);
		$criteria->compare('previous_quarter_allotment_released',$this->previous_quarter_allotment_released,true);
		$criteria->compare('this_quarter_allotment_released',$this->this_quarter_allotment_released,true);
		$criteria->compare('total_allotment_released',$this->total_allotment_released,true);
		$criteria->compare('balance_of_appropriation',$this->balance_of_appropriation,true);
		$criteria->compare('previous_quarter_obligation_incurred',$this->previous_quarter_obligation_incurred,true);
		$criteria->compare('this_quarter_obligation_incurred',$this->this_quarter_obligation_incurred,true);
		$criteria->compare('total_obligation_incurred',$this->total_obligation_incurred,true);
		$criteria->compare('unobligated_allotment',$this->unobligated_allotment,true);
		$criteria->compare('remarks',$this->remarks,true);
		$criteria->compare('next_year_appropriation',$this->next_year_appropriation,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return QuarterlyFinancialReport the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
