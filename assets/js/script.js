function confirmClick(src) { 
    if ($(this).attr('title')) {
        var question = 'Are you sure you want to ' + $(this).attr('title').toLowerCase() + '?';
    } else {
        var question = 'Are you sure you want to do this action?';
    }
    if ( confirm( question ) ) {
        document.location = src;
    } else {
        return false;
    }
}