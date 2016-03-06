


$.fn.openModal = function($page, $css, $titel){

    //initialize variables
        $head  = $('head');
        $body = $('body');

    //create link for css file
        $link  = document.createElement('link');
        $link.id = 'cssModal';
        $link.rel  = 'stylesheet';
        $link.type = 'text/css';
        $link.href = $css;
        $link.media = 'all';
        $head.append($link);

    /*create link for html file
        $htmlLink = document.createElement('link');
        $htmlLink.href = $page;
        $htmlLink.id =
        $head.append($htmlLink);*/


    //creëer de omringende html
        $modal = $('<div id="modal">'+
            '<div class="modalBox">' +
            '<button onclick="$(this).closeModal()" style="font-family:Tahoma;">Close</button>' +
            '<div class="content">'+
            '</div>' +
            '</div>'+
            '</div>').appendTo($body);

            //verberg modal omringende html
                $modal.hide();

    // plaats content van de gekozen file in content
    $content = $modal.children('.modalBox').children('.content');
    $content.load($page);
    $content.append('<div> hello </div>');

    //fade in de modalbox
    $modal.fadeIn(2000);
}

$.fn.closeModal = function(){
    //fade out de model
    $('#modal').fadeOut(1000, function(){
        //remove link nadat fadeout gedaan is
        $('#modal').remove();
        $('#cssModal').remove();
    })

}