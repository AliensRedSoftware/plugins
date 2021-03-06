$(document).ready(function(){
    /**
     * Лист изменение темы bootstrap
     */
    $('#theme').change(function(){
        var theme=$('#theme').val();
        $('#theme-label').html(theme);
        switch(theme){
            case 'Светло-белая':
                //utility
                document.querySelector("html").style.backgroundColor='#fff';
                document.querySelector("body").style.backgroundColor='#fff';
                //components
                $('.text-'+getTextPreview()).removeClass('text-'+getTextPreview()).toggleClass('text-default');
                $('.panel-'+getPanelPreview()).removeClass('panel-'+getPanelPreview()).toggleClass('panel-default');
                $('.btn-'+getBtnPreview()).removeClass('btn-'+getBtnPreview()).toggleClass('btn-default');
                $('.badge-'+getBadgePreview()).removeClass('badge-'+getBadgePreview()).toggleClass('badge-default');
                //cookie
                Cookies.set("__SKINMANAGER-bootstrap3-THEME", "Светло-белая");
            break;
            case 'Светло-синия':
                //utility
                document.querySelector("html").style.backgroundColor='#cce5ff';
                document.querySelector("body").style.backgroundColor='#cce5ff';
                //components
                $('.text-'+getTextPreview()).removeClass('text-'+getTextPreview()).toggleClass('text-primary');
                $('.panel-'+getPanelPreview()).removeClass('panel-'+getPanelPreview()).toggleClass('panel-primary');
                $('.btn-'+getBtnPreview()).removeClass('btn-'+getBtnPreview()).toggleClass('btn-primary');
                $('.badge-'+getBadgePreview()).removeClass('badge-'+getBadgePreview()).toggleClass('badge-default');
                //cookie
                Cookies.set("__SKINMANAGER-bootstrap3-THEME", "Светло-синия");
            break;
            case 'Светло-зеленная':
                //utility
                document.querySelector("html").style.backgroundColor='#d2ffbe';
                document.querySelector("body").style.backgroundColor='#d2ffbe';
                //components
                $('.text-'+getTextPreview()).removeClass('text-'+getTextPreview()).toggleClass('text-success');
                $('.panel-'+getPanelPreview()).removeClass('panel-'+getPanelPreview()).toggleClass('panel-success');
                $('.btn-'+getBtnPreview()).removeClass('btn-'+getBtnPreview()).toggleClass('btn-success');
                $('.badge-'+getBadgePreview()).removeClass('badge-'+getBadgePreview()).toggleClass('badge-default');
                //cookie
                Cookies.set("__SKINMANAGER-bootstrap3-THEME", "Светло-зеленная");
            break;
            case 'Светло-голубая':
                //utility
                document.querySelector("html").style.backgroundColor='#b1f4ff';
                document.querySelector("body").style.backgroundColor='#b1f4ff';
                //components
                $('.text-'+getTextPreview()).removeClass('text-'+getTextPreview()).toggleClass('text-info');
                $('.panel-'+getPanelPreview()).removeClass('panel-'+getPanelPreview()).toggleClass('panel-info');
                $('.btn-'+getBtnPreview()).removeClass('btn-'+getBtnPreview()).toggleClass('btn-info');
                $('.badge-'+getBadgePreview()).removeClass('badge-'+getBadgePreview()).toggleClass('badge-default');
                //cookie
                Cookies.set("__SKINMANAGER-bootstrap3-THEME", "Светло-голубая");
            break;
            case 'Светло-желтая':
                //utility
                document.querySelector("html").style.backgroundColor='#ffffc8';
                document.querySelector("body").style.backgroundColor='#ffffc8';
                //components
                $('.text-'+getTextPreview()).removeClass('text-'+getTextPreview()).toggleClass('text-warning');
                $('.panel-'+getPanelPreview()).removeClass('panel-'+getPanelPreview()).toggleClass('panel-warning');
                $('.btn-'+getBtnPreview()).removeClass('btn-'+getBtnPreview()).toggleClass('btn-warning');
                $('.badge-'+getBadgePreview()).removeClass('badge-'+getBadgePreview()).toggleClass('badge-default');
                //cookie
                Cookies.set("__SKINMANAGER-bootstrap3-THEME", "Светло-желтая");
            break;
            case 'Светло-красная':
                 //utility
                document.querySelector("html").style.backgroundColor='#ffc8c8';
                document.querySelector("body").style.backgroundColor='#ffc8c8';
                //components
                $('.text-'+getTextPreview()).removeClass('text-'+getTextPreview()).toggleClass('text-danger');
                $('.panel-'+getPanelPreview()).removeClass('panel-'+getPanelPreview()).toggleClass('panel-danger');
                $('.btn-'+getBtnPreview()).removeClass('btn-'+getBtnPreview()).toggleClass('btn-danger');
                $('.badge-'+getBadgePreview()).removeClass('badge-'+getBadgePreview()).toggleClass('badge-default');
                //cookie
                Cookies.set("__SKINMANAGER-bootstrap3-THEME", "Светло-красная");
            break;
            case 'gentoo':
                //utility
                document.querySelector("html").style.backgroundColor='#dddaec';
                document.querySelector("body").style.backgroundColor='#dddaec';
                //components
                $('.text-'+getTextPreview()).removeClass('text-'+getTextPreview()).toggleClass('text-gentoo');
                $('.panel-'+getPanelPreview()).removeClass('panel-'+getPanelPreview()).toggleClass('panel-gentoo');
                $('.btn-'+getBtnPreview()).removeClass('btn-'+getBtnPreview()).toggleClass('btn-gentoo');
                $('.badge-'+getBadgePreview()).removeClass('badge-'+getBadgePreview()).toggleClass('badge-gentoo');
                //cookie
                Cookies.set("__SKINMANAGER-bootstrap3-THEME", "gentoo");
            break;
            default:
                //utility
                document.querySelector("html").style.backgroundColor='#fff';
                document.querySelector("body").style.backgroundColor='#fff';
                //components
                $('.text-'+getTextPreview()).removeClass('text-'+getTextPreview()).toggleClass('text-default');
                $('.panel-'+getPanelPreview()).removeClass('panel-'+getPanelPreview()).toggleClass('panel-default');
                $('.btn-'+getBtnPreview()).removeClass('btn-'+getBtnPreview()).toggleClass('btn-default');
                $('.badge-'+getBadgePreview()).removeClass('badge-'+getBadgePreview()).toggleClass('badge-default');
                //cookie
                Cookies.set("__SKINMANAGER-bootstrap3-THEME", "Светло-белая");
            break;
        }
    });
    if(getNameThemeBootstrap()!=false){
        var selected=getNameThemeBootstrap();
        $('#theme').val(selected);
    }
    $('#theme').change();//Изменить тему
});
/**
 * Возвращает тему выбранную bootstrap
 */
function getThemeBootstrap(){
    if (Cookies.get('__SKINMANAGER-bootstrap3-THEME')!='undefined'){
        return Cookies.get('__SKINMANAGER-bootstrap3-THEME');
    } else {
        return false;
    }
}
/**
 * Возвращает имя темы bootstrap
 */
function getNameThemeBootstrap(){
    switch(getThemeBootstrap()){
	    case 'Светло-белая':
	        document.querySelector("html").style.backgroundColor='#fff';
	        document.querySelector("body").style.backgroundColor='#fff';
            return 'Светло-белая';
        break;
        case 'Светло-синия':
            document.querySelector("html").style.backgroundColor='#fff';
            document.querySelector("body").style.backgroundColor='#fff';
            return 'Светло-синия';
        break;
        case 'Светло-зеленная':
            document.querySelector("html").style.backgroundColor='#fff';
            document.querySelector("body").style.backgroundColor='#fff';
            return 'Светло-зеленная';
        break;
        case 'Светло-голубая':
            document.querySelector("html").style.backgroundColor='#fff';
            document.querySelector("body").style.backgroundColor='#fff';
            return 'Светло-голубая';
        break;
        case 'Светло-желтая':
            document.querySelector("html").style.backgroundColor='#fff';
            document.querySelector("body").style.backgroundColor='#fff';
            return 'Светло-желтая';
        break;
        case 'Светло-красная':
            document.querySelector("html").style.backgroundColor='#fff';
            document.querySelector("body").style.backgroundColor='#fff';
            return 'Светло-красная';
        break;
        case 'gentoo':
            document.querySelector("html").style.backgroundColor='#dddaec';
            document.querySelector("body").style.backgroundColor='#dddaec';
            return 'gentoo';
        break;
        default:
            return false;
        break;
    }
}

/**
 * Возвращает прошлую тему текста
 */
function getTextPreview(){
    let arr=['light','dark','gentoo'];
    var b=[];
    var i=0;
    arr.forEach(function(e){
        i++;
        var elements=document.querySelectorAll('.text-'+e);
        if(elements.length<=0){
            return;
        }
        b.push(e);
        if(arr.length==i){
            arr=b;
        }
    });
    return b[0];
}

/**
 * Возвращает прошлую тему панели
 */
function getPanelPreview(){
    var arr=['default','primary','success','info','warning','danger','gentoo'];
    var b=[];
    var i=0;
    arr.forEach(e=>{
        i++;
        var elements=document.querySelectorAll('.panel-'+e);
        if(elements.length<=0){
            return;
        }
        b.push(e);
        if(arr.length==i){
            arr=b;
        }
    });
    return b[0];
}
/**
 * Возвращает прошлую тему кнопок
 */
function getBtnPreview(){
    var arr=['default','success','primary','danger','warning','info','gentoo'];
    var b=[];
    var i=0;
    arr.forEach(e=>{
        i++;
        var elements=document.querySelectorAll('.btn-'+e);
        if(elements.length<=0){
            return;
        }
        b.push(e);
        if(arr.length==i){
            arr=b;
        }
    });
    return b[0];
}
/**
 * Возвращает прошлую тему метки
 */
function getBadgePreview(){
    var arr=['default','gentoo'];
    var b=[];
    var i=0;
    arr.forEach(e=>{
        i++;
        var elements=document.querySelectorAll('.badge-'+e);
        if(elements.length<=0){
            return;
        }
        b.push(e);
        if(arr.length==i){
            arr=b;
        }
    });
    return b[0];
}
