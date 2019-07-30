<?php
namespace backend\models;

use Yii;

use yii\base\Model;

use backend\models\Companies;
use backend\models\Filials;
use common\models\User;

class Register extends Model
{
    public $filial_name;
    public $Companies_fio;
    public $Companies_phone;
    public $Companiesname;
    public $password;
    public $name;
    
    public function rules()
    {
        return [
            [['name','filial_name','Companiesname','Companies_phone','password','Companies_fio'],'required'],
            [['name','filial_name','Companiesname','Companies_phone','password','Companies_fio'],'string', 'max' => 255],
            [['Companiesname'],'email'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'name' => 'Наименование',
            'filial_name' => 'Наименование филиала',
            'Companies_fio' => 'ФИО',
            'Companiesname' => 'Логин',
            'password' => 'Пароль',
            'Companiesphone'=>'Телефон',
        ];
    }
    public function register()
    {
    	$company=new Companies();
        $company->name=$this->name; 
        $company->filial_name=$this->filial_name; 
        $company->Companiesname=$this->Companiesname;
        $company->Companies_phone=$this->Companies_phone;
        $company->password=$this->password;
        $company->Companies_fio=$this->Companies_fio;
        $company->tarif_id=1;

        $t=$company->save();

        $filial=new Filials();
        $filial->filial_name=$this->filial_name;
        $t=$t&&$filial->save();

        Yii::$app->db->createCommand()->update('filials', ['company_id' => $company->id], [ 'id' => $filial->id ])->execute();

        $user=new User();
        $user->fio=$this->Companies_fio;
        $user->username=$this->Companiesname;
        $user->auth_key=$this->password;
        $user->phone=$this->Companies_phone;
        $user->type=1;
        $user->status=0;
        $user->filial_id=$filial->id;
        
        $t=$t&&$user->save();
       
        Yii::$app->db->createCommand()->update('user', ['company_id' => $company->id,'filial_id'=>$filial->id ], [ 'id' => $user->id ])->execute();
        return $t;
    }   
}