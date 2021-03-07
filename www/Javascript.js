function getHeightByTagName(elmID) {
    var elmHeight, elmMargin, elm = document.getElementsByTagName(elmID)[0];
    if(document.all) {// IE
        elmHeight = elm.currentStyle.height;
        elmMargin = parseInt(elm.currentStyle.marginTop, 10) + parseInt(elm.currentStyle.marginBottom, 10);
    } else {// Mozilla
        elmHeight = parseInt(document.defaultView.getComputedStyle(elm, '').getPropertyValue('height'),10);
        elmMargin = parseInt(document.defaultView.getComputedStyle(elm, '').getPropertyValue('margin-top')) + parseInt(document.defaultView.getComputedStyle(elm, '').getPropertyValue('margin-bottom'));
    }
    return (elmHeight+elmMargin);
}
function getHeightById(elmID) {
    var elmHeight, elmMargin, elm = document.getElementById(elmID);
    if(document.all) {// IE
        elmHeight = elm.currentStyle.height;
        elmMargin = parseInt(elm.currentStyle.marginTop, 10) + parseInt(elm.currentStyle.marginBottom, 10);
    } else {// Mozilla
        elmHeight = parseInt(document.defaultView.getComputedStyle(elm, '').getPropertyValue('height'),10);
        elmMargin = parseInt(document.defaultView.getComputedStyle(elm, '').getPropertyValue('margin-top')) + parseInt(document.defaultView.getComputedStyle(elm, '').getPropertyValue('margin-bottom'));
    }
    return (elmHeight+elmMargin);
}
