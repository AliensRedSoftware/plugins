<?php

/*
 * Дизайн сайта сетка комплект
 */
class xlayout{
	protected $xHead, $xleft_aside, $xfooter;
	/**
	 * Устанавливает голову
	 */
	public function setHead($height = '150',$content = null) {
		$height.='px';
	    xlib::style(".xheader{height: $height;word-wrap:break-word;}");
		$this->xHead="<header class=\"xheader\">$content</header>";
	}
	/**
	 * Устанавливает левый-сайдбар
	 */
	public function setLeft_aside($width = '270',$content = null) {
		$width .= 'px';
	    xlib::style(".xlayout{border-left: $width solid transparent;}");
		xlib::style(".left-sidebar{width: $width;position: relative;left: -$width;word-wrap:anywhere;display:grid;}");
		$this->xleft_aside="<div class=\"left-sidebar\">$content</div>";
	}
	/*
	 * Устанавливает подвал
	 */
	public function setfooter($height='100',$content=null){
		$height .= 'px';
	    xlib::style(".footer {height: $height;word-wrap:break-word;}");
		$this->xfooter = "<footer class=\"footer\">$content</footer>";
	}
	/**
	 * Возвращает итоговую разметки
	 */
	public function get($content='test'){
		$xhead=$this->xHead;
		$xleft_aside=$this->xleft_aside;
		$xfooter=$this->xfooter;
		if($xleft_aside){
			xlib::style(".xcontainer{float: left;margin-right:-100%;width:100%;word-wrap:break-word;}");
		}
		if($xfooter){
			xlib::style(".xlayout:after{display:table;clear:both;content: '';}");
		}
		return "<div class=\"xlayout\">$xhead<div class=\"xcontainer\"><div class=\"xcontent\">$content</div></div>$xleft_aside</div>$xfooter";
	}
}
