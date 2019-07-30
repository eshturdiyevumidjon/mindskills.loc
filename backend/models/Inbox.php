<?php

namespace backend\models;

use Yii;
use common\models\User;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "inbox".
 *
 * @property int $id
 * @property int $from Создатель
 * @property int $to Получатель
 * @property string $title Заголовок
 * @property string $file Файл
 * @property resource $text Текст
 * @property string $date_cr Дата создания
 * @property int $starred Избранные
 * @property int $reply Ответить
 * @property int $deleted Удалено
 * @property int $is_read Прочитал
 *
 * @property User $from0
 * @property User $to0
 */
class Inbox extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inbox';
    }
    public $files;
    public $users;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['to'],'required'],
            [['from', 'to', 'starred', 'reply', 'deleted', 'is_read'], 'integer'],
            [['text'], 'string'],
            [['date_cr'], 'safe'],
            [['files'], 'file', 'skipOnEmpty' => true,], 
            [['title', 'file'], 'string', 'max' => 255],
            [['from'], 'exist', 'skipOnError' => true, 
            'targetClass' => User::className(), 'targetAttribute' => ['from' => 'id']],
            [['to'], 'exist', 'skipOnError' => true, 
            'targetClass' => User::className(), 'targetAttribute' => ['to' => 'id']],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from' => 'Создатель',
            'to' => 'Получатель',
            'users'=>'Получатели',
            'title' => 'Заголовок',
            'file' => 'Файл',
            'files'=>'Файл',
            'text' => 'Текст',
            'date_cr' => 'Дата создания',
            'starred' => 'Избранные',
            'reply' => 'Ответить',
            'deleted' => 'Удалено',
            'is_read' => 'Прочитал',
        ];
    }
    public function beforeSave($insert)
    {
        if ($this->isNewRecord)
        {
            $this->date_cr = date("Y-m-d H:i:s");
            $this->starred = 0;
            $this->deleted = 0;
            $this->is_read = 0;
            $this->from = Yii::$app->user->identity->id;
        }
        return parent::beforeSave($insert);
    }
    public static function getDate($date=null)
    {
        return ($date!=null)?\Yii::$app->formatter->asDate($date, 'php:H:i d.m.Y'):null;
    }
    public function getUsersList()
    {
        $users = User::find()->where(['!=', 'id', Yii::$app->user->identity->id])->all();
        return ArrayHelper::map($users, 'id', 'fio');
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFrom0()
    {
        return $this->hasOne(User::className(), ['id' => 'from']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTo0()
    {
        return $this->hasOne(User::className(), ['id' => 'to']);
    }
    public function foldersize($path) 
    {
        $total_size = 0;
        $files = scandir($path);
        $cleanPath = rtrim($path, '/'). '/';

        foreach($files as $t) {
            if ($t<>"." && $t<>"..") {
                $currentFile = $cleanPath . $t;
                if (is_dir($currentFile)) {
                    $size = Inbox::foldersize($currentFile);
                    $total_size += $size;
                }
                else {
                    $size = filesize($currentFile);
                    $total_size += $size;
                }
            }   
        }

        return $total_size;
    }

    public function format_size($size) 
    {
        $units = explode(' ', 'B KB MB GB TB PB');
        $mod = 1024;
        for ($i = 0; $size > $mod; $i++) {
            $size /= $mod;
        }
        $endIndex = strpos($size, ".")+3;
        return substr( $size, 0, $endIndex).' '.$units[$i];
    }
}
