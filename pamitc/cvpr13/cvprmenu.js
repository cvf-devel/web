var timeout      = 500;
var closetimer   = 0;
var cvprmenuitem = 0;

function cvprmenu_open()
{
    cvprmenu_canceltimer();
    cvprmenu_close();
    cvprmenuitem = $(this).find('ul').css('visibility','visible');
}

function cvprmenu_close()
{
    if (cvprmenuitem) cvprmenuitem.css('visibility','hidden');
}

function cvprmenu_timer()
{
    closetimer = window.setTimeout(cvprmenu_close, timeout);
}

function cvprmenu_canceltimer()
{
    if (closetimer)
    {
        window.clearTimeout(closetimer);
        closetimer = null;
    }
}

