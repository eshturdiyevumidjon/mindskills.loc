<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%districts}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%regions}}`
 */
class m190520_091026_create_districts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%districts}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->comment("Наименование"),
            'region_id' => $this->integer()->comment("Область"),
        ]);

        // creates index for column `region_id`
        $this->createIndex(
            '{{%idx-districts-region_id}}',
            '{{%districts}}',
            'region_id'
        );

        // add foreign key for table `{{%regions}}`
        $this->addForeignKey(
            '{{%fk-districts-region_id}}',
            '{{%districts}}',
            'region_id',
            '{{%regions}}',
            'id',
            'CASCADE'
        );

       //========================================================================================
        //Andijon viloyatidagi tumanlar
        $this->insert('districts',array('id' => '1','name' => 'Andijon shahri','region_id'=>'1'));
        $this->insert('districts',array('id' => '2','name' => 'Asaka tumani','region_id'=>'1'));
        $this->insert('districts',array('id' => '3','name' => 'Bo\'z tumani','region_id'=>'1'));
        $this->insert('districts',array('id' => '4','name' => 'Buloqboshi tumani','region_id'=>'1'));
        $this->insert('districts',array('id' => '5','name' => 'Izboskan tumani','region_id'=>'1'));
        $this->insert('districts',array('id' => '6','name' => 'Jalaquduq tumani','region_id'=>'1'));
        $this->insert('districts',array('id' => '7','name' => 'Marhamat tumani','region_id'=>'1'));
        $this->insert('districts',array('id' => '8','name' => 'Oltinko\'l tumani','region_id'=>'1'));
        $this->insert('districts',array('id' => '9','name' => 'Paxtaobod tumani','region_id'=>'1'));
        $this->insert('districts',array('id' => '10','name' => 'Qo\'rg\'ontepa tumani','region_id'=>'1'));
        $this->insert('districts',array('id' => '11','name' => 'Shahrixon tumani','region_id'=>'1'));
        $this->insert('districts',array('id' => '12','name' => 'Ulug\'nor tumani','region_id'=>'1'));
        $this->insert('districts',array('id' => '13','name' => 'Xo\'jaobod tumani','region_id'=>'1'));
        $this->insert('districts',array('id' => '14','name' => 'Baliqchi tumani','region_id'=>'1'));
        $this->insert('districts',array('id' => '15','name' => 'Andijon tumani','region_id'=>'1'));
        $this->insert('districts',array('id' => '16','name' => 'Xonobod shahri','region_id'=>'1'));
        //Buxoro viloyatidagi tumanlar
        $this->insert('districts',array('id' => '17','name' => 'Olot tumani','region_id'=>'2'));
        $this->insert('districts',array('id' => '18','name' => 'Buxoro tumani','region_id'=>'2'));
        $this->insert('districts',array('id' => '19','name' => 'G\'ijduvon tumani','region_id'=>'2'));
        $this->insert('districts',array('id' => '20','name' => 'Jondor tumani','region_id'=>'2'));
        $this->insert('districts',array('id' => '21','name' => 'Kogon tumani','region_id'=>'2'));
        $this->insert('districts',array('id' => '22','name' => 'Qorako\'l tumani','region_id'=>'2'));
        $this->insert('districts',array('id' => '23','name' => 'Qorovulbozor tumani','region_id'=>'2'));
        $this->insert('districts',array('id' => '24','name' => 'Peshku tumani','region_id'=>'2'));
        $this->insert('districts',array('id' => '25','name' => 'Romitan tumani','region_id'=>'2'));
        $this->insert('districts',array('id' => '26','name' => 'Shofirkon tumani','region_id'=>'2'));
        $this->insert('districts',array('id' => '27','name' => 'Vobkent tumani','region_id'=>'2'));
        $this->insert('districts',array('id' => '28','name' => 'Buxoro shahri','region_id'=>'2'));
        $this->insert('districts',array('id' => '29','name' => 'Kogon shahri','region_id'=>'2'));
        //Farg'ona viloyatidagi tumanlar
        $this->insert('districts',array('id' => '30','name' => 'Oltiariq tumani','region_id'=>'3'));
        $this->insert('districts',array('id' => '31','name' => 'Bog\'dod tumani','region_id'=>'3'));
        $this->insert('districts',array('id' => '32','name' => 'Beshariq tumani','region_id'=>'3'));
        $this->insert('districts',array('id' => '33','name' => 'Buvayda tumani','region_id'=>'3'));
        $this->insert('districts',array('id' => '34','name' => 'Dang\'ara tumani','region_id'=>'3'));
        $this->insert('districts',array('id' => '35','name' => 'Farg\'ona tumani','region_id'=>'3'));
        $this->insert('districts',array('id' => '36','name' => 'Furqat tumani','region_id'=>'3'));
        $this->insert('districts',array('id' => '37','name' => 'Qo\'shtepa tumani','region_id'=>'3'));
        $this->insert('districts',array('id' => '38','name' => 'Quva tumani','region_id'=>'3'));
        $this->insert('districts',array('id' => '39','name' => 'Rishton tumani','region_id'=>'3'));
        $this->insert('districts',array('id' => '40','name' => 'So\'x tumani','region_id'=>'3'));
        $this->insert('districts',array('id' => '41','name' => 'Toshloq tumani','region_id'=>'3'));
        $this->insert('districts',array('id' => '42','name' => 'Uchko\'prik tumani','region_id'=>'3'));
        $this->insert('districts',array('id' => '43','name' => 'O\'zbekiston tumani','region_id'=>'3'));
        $this->insert('districts',array('id' => '44','name' => 'Yozyovon tumani','region_id'=>'3'));
        $this->insert('districts',array('id' => '45','name' => 'Farg\'ona shahri','region_id'=>'3'));
        $this->insert('districts',array('id' => '46','name' => 'Qo\'qon shahri','region_id'=>'3'));
        $this->insert('districts',array('id' => '47','name' => 'Quvasoy shahri','region_id'=>'3'));
        $this->insert('districts',array('id' => '48','name' => 'Marg\'ilon shahri','region_id'=>'3'));
        //Jizzax viloyatidagi tumanlar
        $this->insert('districts',array('id' => '49','name' => 'Arnasoy tumani','region_id'=>'4'));
        $this->insert('districts',array('id' => '50','name' => 'Baxmal tumani','region_id'=>'4'));
        $this->insert('districts',array('id' => '51','name' => 'Do\'stlik tumani','region_id'=>'4'));
        $this->insert('districts',array('id' => '52','name' => 'Forish tumani','region_id'=>'4'));
        $this->insert('districts',array('id' => '53','name' => 'G\'allaorol tumani','region_id'=>'4'));
        $this->insert('districts',array('id' => '54','name' => 'Sharof Rashidov tumani','region_id'=>'4'));
        $this->insert('districts',array('id' => '55','name' => 'Mirzacho\'l tumani','region_id'=>'4'));
        $this->insert('districts',array('id' => '56','name' => 'Paxtakor tumani','region_id'=>'4'));
        $this->insert('districts',array('id' => '57','name' => 'Yangiobod tumani','region_id'=>'4'));
        $this->insert('districts',array('id' => '58','name' => 'Zomin tumani','region_id'=>'4'));
        $this->insert('districts',array('id' => '59','name' => 'Zafarobod tumani','region_id'=>'4'));
        $this->insert('districts',array('id' => '60','name' => 'Zarbdor tumani','region_id'=>'4'));
        $this->insert('districts',array('id' => '61','name' => 'Jizzax shahri','region_id'=>'4'));
        //Xorazm viloyatidagi tumanlar
        $this->insert('districts',array('id' => '62','name' => 'Bog\'ot tumani','region_id'=>'5'));
        $this->insert('districts',array('id' => '63','name' => 'Gurlan tumani','region_id'=>'5'));
        $this->insert('districts',array('id' => '64','name' => 'Qo\'shko\'prik tumani','region_id'=>'5'));
        $this->insert('districts',array('id' => '65','name' => 'Urganch tumani','region_id'=>'5'));
        $this->insert('districts',array('id' => '66','name' => 'Hazorasp tumani','region_id'=>'5'));
        $this->insert('districts',array('id' => '67','name' => 'Xonqa tumani','region_id'=>'5'));
        $this->insert('districts',array('id' => '68','name' => 'Xiva tumani','region_id'=>'5'));
        $this->insert('districts',array('id' => '69','name' => 'Shovot tumani','region_id'=>'5'));
        $this->insert('districts',array('id' => '70','name' => 'Yangiariq tumani','region_id'=>'5'));
        $this->insert('districts',array('id' => '71','name' => 'Yangibozor tumani','region_id'=>'5'));
        $this->insert('districts',array('id' => '72','name' => 'Urganch shahri','region_id'=>'5'));
        $this->insert('districts',array('id' => '73','name' => 'Xiva shahri','region_id'=>'5'));
        //Namangan viloyatidagi tumanlar
        $this->insert('districts',array('id' => '74','name' => 'Mingbuloq tumani','region_id'=>'6'));
        $this->insert('districts',array('id' => '75','name' => 'Kosonsoy tumani','region_id'=>'6'));
        $this->insert('districts',array('id' => '76','name' => 'Namangan tumani','region_id'=>'6'));
        $this->insert('districts',array('id' => '77','name' => 'Norin tumani','region_id'=>'6'));
        $this->insert('districts',array('id' => '78','name' => 'Pop tumani','region_id'=>'6'));
        $this->insert('districts',array('id' => '79','name' => 'To\'raqo\'rg\'on tumani','region_id'=>'6'));
        $this->insert('districts',array('id' => '80','name' => 'Uychi tumani','region_id'=>'6'));
        $this->insert('districts',array('id' => '81','name' => 'Uchqo\'rg\'on tumani','region_id'=>'6'));
        $this->insert('districts',array('id' => '82','name' => 'Chortoq tumani','region_id'=>'6'));
        $this->insert('districts',array('id' => '83','name' => 'Chust tumani','region_id'=>'6'));
        $this->insert('districts',array('id' => '84','name' => 'Yangiqo\'rg\'on tumani','region_id'=>'6'));
        $this->insert('districts',array('id' => '85','name' => 'Namangan shahri','region_id'=>'6'));
        //Navoiy viloyatidagi tumanlar
        $this->insert('districts',array('id' => '86','name' => 'Konimex tumani','region_id'=>'7'));
        $this->insert('districts',array('id' => '87','name' => 'Qiziltepa tumani','region_id'=>'7'));
        $this->insert('districts',array('id' => '88','name' => 'Navbahor tumani','region_id'=>'7'));
        $this->insert('districts',array('id' => '89','name' => 'Karmana tumani','region_id'=>'7'));
        $this->insert('districts',array('id' => '90','name' => 'Nurota tumani','region_id'=>'7'));
        $this->insert('districts',array('id' => '91','name' => 'Tomdi tumani','region_id'=>'7'));
        $this->insert('districts',array('id' => '92','name' => 'Uchquduq tumani','region_id'=>'7'));
        $this->insert('districts',array('id' => '93','name' => 'Xatirchi tumani','region_id'=>'7'));
        $this->insert('districts',array('id' => '94','name' => 'Navoiy shahri','region_id'=>'7'));
        $this->insert('districts',array('id' => '95','name' => 'Zarafshon shahri','region_id'=>'7'));
        //Qashqadaryo viloyatidagi tumanlar
        $this->insert('districts',array('id' => '96','name' => 'G\'uzor tumani','region_id'=>'8'));
        $this->insert('districts',array('id' => '97','name' => 'Dehqanabod tumani','region_id'=>'8'));
        $this->insert('districts',array('id' => '98','name' => 'Qamashi tumani','region_id'=>'8'));
        $this->insert('districts',array('id' => '99','name' => 'Koson tumani','region_id'=>'8'));
        $this->insert('districts',array('id' => '100','name' => 'Kitob tumani','region_id'=>'8'));
        $this->insert('districts',array('id' => '101','name' => 'Mirishkor tumani','region_id'=>'8'));
        $this->insert('districts',array('id' => '102','name' => 'Muborak tumani','region_id'=>'8'));
        $this->insert('districts',array('id' => '103','name' => 'Nishon tumani','region_id'=>'8'));
        $this->insert('districts',array('id' => '104','name' => 'Kasbi tumani','region_id'=>'8'));
        $this->insert('districts',array('id' => '105','name' => 'Chiriqchi tumani','region_id'=>'8'));
        $this->insert('districts',array('id' => '106','name' => 'Shahrisabz tumani','region_id'=>'8'));
        $this->insert('districts',array('id' => '107','name' => 'Yakkabog\' tumani','region_id'=>'8'));
        $this->insert('districts',array('id' => '108','name' => 'Qarshi shahri','region_id'=>'8'));
        $this->insert('districts',array('id' => '109','name' => 'Shahrisabz shahri','region_id'=>'8'));
        //Samarqand viloyatidagi tumanlar
        $this->insert('districts',array('id' => '110','name' => 'Oqdaryo tumani','region_id'=>'9'));
        $this->insert('districts',array('id' => '111','name' => 'Bulung\'ur tumani','region_id'=>'9'));
        $this->insert('districts',array('id' => '112','name' => 'Jomboy tumani','region_id'=>'9'));
        $this->insert('districts',array('id' => '113','name' => 'Ishtixon tumani','region_id'=>'9'));
        $this->insert('districts',array('id' => '114','name' => 'Kattaqo\'rg\'on tumani','region_id'=>'9'));
        $this->insert('districts',array('id' => '115','name' => 'Qo\'shrabot tumani','region_id'=>'9'));
        $this->insert('districts',array('id' => '116','name' => 'Narpay tumani','region_id'=>'9'));
        $this->insert('districts',array('id' => '117','name' => 'Payariq tumani','region_id'=>'9'));
        $this->insert('districts',array('id' => '118','name' => 'Pastdarg\'om tumani','region_id'=>'9'));
        $this->insert('districts',array('id' => '119','name' => 'Paxtachi tumani','region_id'=>'9'));
        $this->insert('districts',array('id' => '120','name' => 'Samarqand tumani','region_id'=>'9'));
        $this->insert('districts',array('id' => '121','name' => 'Nurobot tumani','region_id'=>'9'));
        $this->insert('districts',array('id' => '122','name' => 'Urgut tumani','region_id'=>'9'));
        $this->insert('districts',array('id' => '123','name' => 'Tayloq tumani','region_id'=>'9'));
        $this->insert('districts',array('id' => '124','name' => 'Samarqand shahri','region_id'=>'9'));
        $this->insert('districts',array('id' => '125','name' => 'Kattaqo\'rg\'on shahri','region_id'=>'9'));
        //Sirdaryo viloyatidagi tumanlar
        $this->insert('districts',array('id' => '126','name' => 'Oqoltin tumani','region_id'=>'10'));
        $this->insert('districts',array('id' => '127','name' => 'Boyovut tumani','region_id'=>'10'));
        $this->insert('districts',array('id' => '128','name' => 'Sayxunobod tumani','region_id'=>'10'));
        $this->insert('districts',array('id' => '129','name' => 'Guliston tumani','region_id'=>'10'));
        $this->insert('districts',array('id' => '130','name' => 'Sardoba tumani','region_id'=>'10'));
        $this->insert('districts',array('id' => '131','name' => 'Mirzaobod tumani','region_id'=>'10'));
        $this->insert('districts',array('id' => '132','name' => 'Sirdaryo tumani','region_id'=>'10'));
        $this->insert('districts',array('id' => '133','name' => 'Xovos tumani','region_id'=>'10'));
        $this->insert('districts',array('id' => '134','name' => 'Guliston shahri','region_id'=>'10'));
        $this->insert('districts',array('id' => '135','name' => 'Shirin shahri','region_id'=>'10'));
        $this->insert('districts',array('id' => '136','name' => 'Yangiyer shahri','region_id'=>'10'));
        //Surxondaryo viloyatidagi tumanlar
        $this->insert('districts',array('id' => '137','name' => 'Oltinsoy tumani','region_id'=>'11'));
        $this->insert('districts',array('id' => '138','name' => 'Angor tumani','region_id'=>'11'));
        $this->insert('districts',array('id' => '139','name' => 'Boysun tumani','region_id'=>'11'));
        $this->insert('districts',array('id' => '140','name' => 'Muzrabot tumani','region_id'=>'11'));
        $this->insert('districts',array('id' => '141','name' => 'Denov tumani','region_id'=>'11'));
        $this->insert('districts',array('id' => '142','name' => 'Jarqo\'rg\'on tumani','region_id'=>'11'));
        $this->insert('districts',array('id' => '143','name' => 'Qumqo\'rg\'on tumani','region_id'=>'11'));
        $this->insert('districts',array('id' => '144','name' => 'Qiziriq tumani','region_id'=>'11'));
        $this->insert('districts',array('id' => '145','name' => 'Sariosiyo tumani','region_id'=>'11'));
        $this->insert('districts',array('id' => '146','name' => 'Termiz tumani','region_id'=>'11'));
        $this->insert('districts',array('id' => '147','name' => 'Uzun tumani','region_id'=>'11'));
        $this->insert('districts',array('id' => '148','name' => 'Sherobod tumani','region_id'=>'11'));
        $this->insert('districts',array('id' => '149','name' => 'Sho\'rchi tumani','region_id'=>'11'));
        $this->insert('districts',array('id' => '150','name' => 'Termiz shahri','region_id'=>'11'));
        //Toshkent viloyatidagi tumanlar
        $this->insert('districts',array('id' => '151','name' => 'Bekobod tumani','region_id'=>'12'));
        $this->insert('districts',array('id' => '152','name' => 'Bo\'stonliq tumani','region_id'=>'12'));
        $this->insert('districts',array('id' => '153','name' => 'Bo\'ka tumani','region_id'=>'12'));
        $this->insert('districts',array('id' => '154','name' => 'Quyichirchiq tumani','region_id'=>'12'));
        $this->insert('districts',array('id' => '155','name' => 'Zangiota tumani','region_id'=>'12'));
        $this->insert('districts',array('id' => '156','name' => 'Yuqorichirchiq tumani','region_id'=>'12'));
        $this->insert('districts',array('id' => '157','name' => 'Qibray tumani','region_id'=>'12'));
        $this->insert('districts',array('id' => '158','name' => 'Parkent tumani','region_id'=>'12'));
        $this->insert('districts',array('id' => '159','name' => 'Pskent tumani','region_id'=>'12'));
        $this->insert('districts',array('id' => '160','name' => 'O\'rtachirchiq tumani','region_id'=>'12'));
        $this->insert('districts',array('id' => '161','name' => 'Chinoz tumani','region_id'=>'12'));
        $this->insert('districts',array('id' => '162','name' => 'Yangiyo\'l tumani','region_id'=>'12'));
        $this->insert('districts',array('id' => '163','name' => 'Toshkent tumani','region_id'=>'12'));
        $this->insert('districts',array('id' => '164','name' => 'Nurafshon shahri','region_id'=>'12'));
        $this->insert('districts',array('id' => '165','name' => 'Olmaliq shahri','region_id'=>'12'));
        $this->insert('districts',array('id' => '166','name' => 'Angren shahri','region_id'=>'12'));
        $this->insert('districts',array('id' => '167','name' => 'Bekobod shahri','region_id'=>'12'));
        $this->insert('districts',array('id' => '168','name' => 'Ohangaron shahri','region_id'=>'12'));
        $this->insert('districts',array('id' => '169','name' => 'Chirchiq shahri','region_id'=>'12'));
        $this->insert('districts',array('id' => '170','name' => 'Yangiyo\'l shahri','region_id'=>'12'));
        //Toshkent shaharidagi tumanlar
        $this->insert('districts',array('id' => '171','name' => 'Uchtepa tumani','region_id'=>'13'));
        $this->insert('districts',array('id' => '172','name' => 'Bektemir tumani','region_id'=>'13'));
        $this->insert('districts',array('id' => '173','name' => 'Yunusobod tumani','region_id'=>'13'));
        $this->insert('districts',array('id' => '174','name' => 'Mirzo Ulug\'bek tumani','region_id'=>'13'));
        $this->insert('districts',array('id' => '175','name' => 'Mirobod tumani','region_id'=>'13'));
        $this->insert('districts',array('id' => '176','name' => 'Shayxontohur tumani','region_id'=>'13'));
        $this->insert('districts',array('id' => '177','name' => 'Olmazor tumani','region_id'=>'13'));
        $this->insert('districts',array('id' => '178','name' => 'Sirg\'ali tumani','region_id'=>'13'));
        $this->insert('districts',array('id' => '179','name' => 'Yakkasaroy tumani','region_id'=>'13'));
        $this->insert('districts',array('id' => '180','name' => 'Yashnobod tumani','region_id'=>'13'));
        $this->insert('districts',array('id' => '181','name' => 'Chilonzor tumani','region_id'=>'13'));
        //Qoraqalpog'iston Respublikasi tumanlari
        $this->insert('districts',array('id' => '182','name' => 'Amudaryo tumani','region_id'=>'14'));
        $this->insert('districts',array('id' => '183','name' => 'Beruniy tumani','region_id'=>'14'));
        $this->insert('districts',array('id' => '184','name' => 'Qorao\'zak tumani','region_id'=>'14'));
        $this->insert('districts',array('id' => '185','name' => 'Kegeyli tumani','region_id'=>'14'));
        $this->insert('districts',array('id' => '186','name' => 'Qo\'ng\'irot tumani','region_id'=>'14'));
        $this->insert('districts',array('id' => '187','name' => 'Qanliko\'l tumani','region_id'=>'14'));
        $this->insert('districts',array('id' => '188','name' => 'Mo\'ynoq tumani','region_id'=>'14'));
        $this->insert('districts',array('id' => '189','name' => 'Nukus tumani','region_id'=>'14'));
        $this->insert('districts',array('id' => '190','name' => 'Taxiatosh tumani','region_id'=>'14'));
        $this->insert('districts',array('id' => '191','name' => 'Taxtako\'prik tumani','region_id'=>'14'));
        $this->insert('districts',array('id' => '192','name' => 'To\'rtko\'l tumani','region_id'=>'14'));
        $this->insert('districts',array('id' => '193','name' => 'Xo\'jayli tumani','region_id'=>'14'));
        $this->insert('districts',array('id' => '194','name' => 'Chimboy tumani','region_id'=>'14'));
        $this->insert('districts',array('id' => '195','name' => 'Shumanay tumani','region_id'=>'14'));
        $this->insert('districts',array('id' => '196','name' => 'Ellikkala tumani','region_id'=>'14'));
        $this->insert('districts',array('id' => '197','name' => 'Nukus shahri','region_id'=>'14'));
        //================================================================================================
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%regions}}`
        $this->dropForeignKey(
            '{{%fk-districts-region_id}}',
            '{{%districts}}'
        );

        // drops index for column `region_id`
        $this->dropIndex(
            '{{%idx-districts-region_id}}',
            '{{%districts}}'
        );

        $this->dropTable('{{%districts}}');
    }
}
