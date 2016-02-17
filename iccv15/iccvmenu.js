var timeout      = 500;
var closetimer   = 0;
var iccvmenuitem = 0;

function iccvmenu_open()
{
    iccvmenu_canceltimer();
    iccvmenu_close();
    iccvmenuitem = $(this).find('ul').css('visibility','visible');
}

function iccvmenu_close()
{
    if (iccvmenuitem) iccvmenuitem.css('visibility','hidden');
}

function iccvmenu_timer()
{
    closetimer = window.setTimeout(iccvmenu_close, timeout);
}

function iccvmenu_canceltimer()
{
    if (closetimer)
    {
        window.clearTimeout(closetimer);
        closetimer = null;
    }
}

