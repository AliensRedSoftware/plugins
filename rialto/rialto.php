<?php
use xlib as x;
use xprivate as xp;
use skinmanager as sm;
class rialto{
	function execute(){
		
	}
	/**
	 * Возвращаем конфигурация бирже
	 * @return string
	 */
	public function getCfgRialto(){
		$data=xp::getData();
		foreach(self::getWallets() as $wallet){
			$about=self::getAbout($wallet);
			$change=self::getChangeWallet($wallet);
		    $cfg=sm::a(['title'=>'Изменить','modal'=>$change,'href'=>"#$change"]);
			$HTR=sm::text(['text'=>'Баланс кошелька:'.sm::badge(['txt'=>$wallet['name']])]);
			$wallets.=$HTR.sm::p(['content'=>sm::input(['value'=>$data[$wallet['name']],'type'=>'number','step'=>'0.001','readonly'=>1])." $cfg $about"]);
			
		}
		$logo=sm::p(['content'=>sm::img(['css'=>['width'=>'200px','pointer-events'=>'none','border-radius'=>'100px'],'src'=>x::getPathModules(__CLASS__.DIRECTORY_SEPARATOR.'ico'.DIRECTORY_SEPARATOR.'logo.png')])]);
		$return=sm::a(['title'=>'Вернуться','href'=>'#xprivate','modal'=>'xprivate']);
		return sm::modal(['id'=>'cfgRialto','title'=>'Конфигурация rialto','content'=>$logo.$wallets.$return]);
	}
    /**
	 * Возвращаем об кошелке инфу
	 * wallet-Кошелек
	 */
    public function getAbout($wallet){
		$desc=sm::text(['text'=>$wallet['desc']]);
		$return=sm::p(['content'=>sm::a(['title'=>'Вернуться','modal'=>'cfgRialto','href'=>'#cfgRialto'])]);
		sm::modal(['id'=>'aboutRialto','title'=>'ЧИВО '.sm::badge(['txt'=>$wallet['name']]),'content'=>$desc.$return]);
		return sm::a(['title'=>'ЧИВО','modal'=>'aboutRialto','href'=>'#aboutRialto']);
    }
	/**
	 * Возвращаем форму для изменение конфигурация баланса
	 * wallet-Кошелек
	 */
	public function getChangeWallet($wallet){
		//Формы
		$buy=self::getBuy($wallet);
		//Конфигурация
		$badge=sm::badge(['txt'=>$wallet['name']]);
		$OUT=sm::p(['content'=>sm::a(['title'=>'Вывести'])]);
		$history=sm::p(['content'=>sm::a(['title'=>'История'])]);
		$return=sm::p(['content'=>sm::a(['title'=>'Вернуться','modal'=>'cfgRialto','href'=>'#cfgRialto'])]);
		return sm::modal(['id'=>'cfg'.$wallet['name'],'title'=>"Конфигурация кошелька $badge",'content'=>$buy.$OUT.$history.$return]);
	}
	/**
	 * Возвращаем форму для пополнение баланса кошелька
	 * wallet-Кошелек
	 */
	public function getBuy($wallet){
		$name=$wallet['name'];
		$i=0;
		if($wallet['buyCard']){
			$i++;
			//-->Банковская карта
			$card=self::getBuyCard($wallet);
		}
		$return=sm::p(['content'=>sm::a(['title'=>'Вернуться','modal'=>"cfg$name",'href'=>"#cfg$name"])]);
		$modal=sm::modal(['id'=>"$name-Buy",'title'=>'Изменение личного баланса','content'=>$card.$return]);
		if($i>0){
			return sm::p(['content'=>sm::a(['title'=>"Пополнить $badge",'modal'=>$modal,'href'=>"#$modal"])]);
		}
	}
	/**
	 * Возвращаем форму для пополнение баланса
	 * wallet-Кошелек
	 */
	public function getBuyCard($wallet){
		$name=sm::badge(['txt'=>$wallet['name']]);
		$action=x::getPathModules(__CLASS__.DIRECTORY_SEPARATOR.'execute'.DIRECTORY_SEPARATOR.'buyCard.php');
		$desc=sm::text(['text'=>'Внимание: пополнение кошелька возможно только 3 раза в 1 день']);
		$logo=sm::img(['src'=>x::getPathModules(__CLASS__.DIRECTORY_SEPARATOR."ico/card"),'css'=>['width'=>'320px','pointer-events'=>'none']]);
		$security=x::div(['content'=>'100% безопасная оплата с ']).sm::img(['src'=>x::getPathModules(__CLASS__.'/ico/security'),'css'=>['width'=>'200px',
'pointer-events'=>'none']]);
		//Номер карты
		$c1=sm::input(['placeholder'=>'0000','type'=>'tel','name'=>'c1','size'=>4,'max'=>4,'min'=>4,'pattern'=>'[0-9]{4}','value'=>$_POST['c1'],'required'=>true]);
		$c2='-'.sm::input(['placeholder'=>'0000','type'=>'tel','name'=>'c2','size'=>4,'max'=>4,'min'=>4,'pattern'=>'[0-9]{4}','value'=>$_POST['c2'],'required'=>true]);
		$c3='-'.sm::input(['placeholder'=>'0000','type'=>'tel','name'=>'c3','size'=>4,'max'=>4,'min'=>4,'pattern'=>'[0-9]{4}','value'=>$_POST['c3'],'required'=>true]);
		$c4='-'.sm::input(['placeholder'=>'0000','type'=>'tel','name'=>'c4','size'=>4,'max'=>4,'min'=>4,'pattern'=>'[0-9]{4}','value'=>$_POST['c4'],'required'=>true]);
		$c5='-'.sm::input(['placeholder'=>'000','type'=>'tel','name'=>'c5','size'=>3,'max'=>3,'min'=>3,'value'=>$_POST['c5'],'pattern'=>'[0-9]{3}']);
		$card=sm::p(['content'=>'Номер карты:','css'=>['margin'=>'0','text-align'=>'left']]).$c1.$c2.$c3.$c4.$c5;
		$cvv=sm::p(['content'=>'CVV/CVC:','css'=>['margin'=>'0','text-align'=>'left']]).sm::input(['placeholder'=>'000','type'=>'tel','value'=>$_POST['cvv'],'name'=>'cvv','size'=>3,'max'=>3,'min'=>3,'pattern'=>'[0-9]{3}','required'=>true]);
		//Месяц
		$month=[];
		$month+=['01'=>[]];
		$month+=['02'=>[]];
		$month+=['03'=>[]];
		$month+=['04'=>[]];
		$month+=['05'=>[]];
		$month+=['06'=>[]];
		$month+=['07'=>[]];
		$month+=['08'=>[]];
		$month+=['09'=>[]];
		$month+=['10'=>[]];
		$month+=['11'=>[]];
		$month+=['12'=>[]];
		if(!$_POST['month']){
			$_POST['month']=array_keys($month)[rand(0,count($month)-1)];
		}
		$month=sm::combobox(['name'=>'month','selected'=>$_POST['month'],$month]);
		//ГОД
		$year=[];
		$year+=['20'=>[]];
		$year+=['21'=>[]];
		$year+=['22'=>[]];
		$year+=['23'=>[]];
		$year+=['24'=>[]];
		$year+=['25'=>[]];
		$year+=['26'=>[]];
		$year+=['27'=>[]];
		$year+=['28'=>[]];
		$year+=['29'=>[]];
		$year+=['30'=>[]];
		if(!$_POST['year']){
			$_POST['year']=array_keys($year)[rand(0,count($year)-1)];
		}
		$year=sm::combobox(['name'=>'year','selected'=>$_POST['year'],$year]);
		$valid=sm::p(['content'=>'Срок действия:','css'=>['margin'=>'0','text-align'=>'left']]).$month.'/'.$year;
		//-->Выбранный кошелек
		$SelectedWallet=sm::p(['content'=>"Выбранный кошелек $name"]).sm::input(['min'=>10,'name'=>$wallet['name'],'max'=>999999999999999,'value'=>10,'type'=>'number']).sm::input(['name'=>'wallet','type'=>'hidden','value'=>$wallet['name']]);
		//-->Выполнение
		$submit=sm::p(['content'=>sm::input(['type'=>'submit'])]);
		//-->Защитай сессий
		$key=x::generateSession(x::uuidv4());
		//-->Форма
		$buy=sm::panel(['title'=>"Новое пополнение кошелька $name",'content'=>sm::form(['method'=>'post','id'=>x::RedirectUpdate(),'action'=>$action,'content'=>$key.$card.$cvv.$valid.$SelectedWallet.$security.$submit.$desc])]);
		//-->Вернуться
		$return=sm::p(['content'=>sm::a(['title'=>'Вернуться','modal'=>$wallet['name'].'-Buy','href'=>'#'.$wallet['name'].'-Buy'])]);
		//-->Модальная форма
		$modal=sm::modal(['id'=>$wallet['name'].'-BuyCard','title'=>'Изменение личного баланса при помощи банковской картой','content'=>$logo.$buy.$return]);
		return sm::p(['content'=>sm::a(['title'=>'Банковская карта','modal'=>$modal,'href'=>"#$modal"])]);
	}
	/**
     * Возвратить объекты валюты ввиде объекта
     * data-данные пользователя
     * @return object
     */
	public function getWalletObject($data){
     	foreach(self::getWallets() as $wallet){
     		$change=self::getCfgWalletObject($data,$wallet);
     		$cfg=sm::a(['title'=>'Изменить','modal'=>$change,'href'=>"#$change"]);
			$HTR=sm::text(['text'=>'Баланс кошелька:'.sm::badge(['txt'=>$wallet['name']])]);
			$wallets.=$HTR.sm::p(['content'=>sm::input(['value'=>$data[$wallet['name']],'type'=>'number','step'=>'0.001','readonly'=>1])." $cfg"]);
		}
     	return $wallets;
	}
	/**
	 * Возвращаем форму для конфигурация друга баланса
	 * data-Аккаунт
	 * wallet-Кошелек
	 */
	public function getCfgWalletObject($data,$wallet){
		$name=$data['name'];
		$id=substr($data['id'],0,12);
		$HTR=sm::text(['text'=>'Баланс кошелька:'.sm::badge(['txt'=>$wallet['name']])]);
		$HTR=$HTR.sm::p(['content'=>sm::input(['value'=>$data[$wallet['name']],'type'=>'number','step'=>'0.001','readonly'=>1])]);
		$SendWallet=self::getSendWalletObject($data,$wallet);
		$BUY=sm::p(['content'=>sm::a(['title'=>'Пополнить '.sm::badge(['txt'=>$wallet['name']])])]);
		$OUT=sm::p(['content'=>sm::a(['title'=>'Вывести '.sm::badge(['txt'=>$wallet['name']])])]);
		$history=sm::p(['content'=>sm::a(['title'=>'История'])]);
		$return=sm::p(['content'=>sm::a(['title'=>'Вернуться','modal'=>"$id-private",'href'=>"#$id-private"])]);
		return sm::modal(['id'=>"$id-cfg".$wallet['name'],'title'=>"Конфигурация баланса пользователя '$name'",'content'=>$HTR.$SendWallet.$BUY.$OUT.$SND.$history.$return]);
	}
	/**
	 * Возвращаем форму для передачи валюты другому пользователю
	 * data-Аккаунт
	 * wallet-Кошелек
	 */
	public function getSendWalletObject($data,$wallet){
		$action=x::getPathModules(__CLASS__.DIRECTORY_SEPARATOR.'execute'.DIRECTORY_SEPARATOR.'sendWallet.php');
		$myData=xp::getData();
		$name=$data['name'];
		$id=substr($data['id'],0,12);
		$idUser=sm::input(['type'=>'hidden','name'=>'id','value'=>$id]);
		$MYHTR=sm::text(['text'=>'Баланс кошелька:'.sm::badge(['txt'=>$wallet['name']]).' - Баланс:'.sm::badge(['txt'=>'Ваш'])]);
		$MYHTR=$MYHTR.sm::p(['content'=>sm::input(['value'=>$myData[$wallet['name']],'type'=>'number','step'=>'0.001','readonly'=>1])]);
		$logo=sm::p(['content'=>sm::img(['css'=>['width'=>'128px',
'pointer-events'=>'none'],'src'=>x::getPathModules(__CLASS__.DIRECTORY_SEPARATOR.'ico'.DIRECTORY_SEPARATOR.'repeat')])]);
		$HTR=sm::text(['text'=>'Баланс кошелька:'.sm::badge(['txt'=>$wallet['name']]).' - Баланс:'.sm::badge(['txt'=>'Друга'])]);
		$HTR=$HTR.sm::p(['content'=>sm::input(['name'=>'balance','type'=>'number','value'=>0.001,'min'=>0.001,'max'=>$myData[$wallet['name']],'step'=>'0.0001'])]);
		$history=sm::p(['content'=>sm::a(['title'=>'История'])]);
		$submit=sm::input(['value'=>'Перевести','type'=>'submit']);
		$return=sm::a(['title'=>'Вернуться','modal'=>"$id-cfg".$wallet['name'],'href'=>"#$id-cfg".$wallet['name']]);
		$modal=sm::modal(['id'=>"$id-sendBuy".$wallet['name'],'title'=>"Перевод баланса пользователя '$name'",'content'=>sm::form(['content'=>$idUser.$MYHTR.$logo.$HTR.$SND.$history.$submit.' '.$return,'method'=>'post','action'=>$action])]);
		return sm::p(['content'=>sm::a(['title'=>'Перевести '.sm::badge(['txt'=>'Пополнение кошелька '.$wallet['name']]),'modal'=>$modal,'href'=>"#$modal"])]);
	}
    /**
     * Возвратить валюты ввиде массива
     * @return array
     */
    public function getWallets(){
    	$wallets=scandir(__DIR__.DIRECTORY_SEPARATOR.'wallet');
    	$arr=[];
    	foreach($wallets as $wallet){
    		if($wallet!='.'&&$wallet!='..'){
    			require_once __DIR__.DIRECTORY_SEPARATOR.'wallet'.DIRECTORY_SEPARATOR.$wallet.DIRECTORY_SEPARATOR."$wallet.php";
    			$cfg=call_user_func(array($wallet,'execute'));
    			$arr[$wallet]=[
    			 	'name'=>$cfg['name'],
    			 	'desc'=>$cfg['desc'],
    			 	'buyCard'=>$cfg['buyCard']
    			];
    		}
    	}
    	return $arr;
	}
}
