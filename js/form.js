var validateEmail = function(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
};

var formSend = function(form,url){
    
    var formData = {},
        labelData = {};
    
    form.find('label').each(function(){
        var k = $(this).attr('for'),
            v = $(this).html();
            
        labelData[k] = v;
    });
    
    form.find('input').each(function(){
        var k = $(this).attr('name'),
            v = $(this).val();
            
        formData[k] = v;
    });
    
    postData = {
        'keys' : labelData,
        'values' : formData,
    }
    
    
    $.ajax({
        url : url,
        type : 'POST',
        data : {'data' : postData},
        dataType : 'json',
        success : function(response){
            handleResponse(response,form);
        },
    });
};

var cloneFields = function(e,t,cOpt,c,v){
    
    v ++;
    var clone = $('.clone[data-clone="'+cOpt+'"][data-clone-v="0"]').clone(),
        buttonset = t.parent('.buttonset'),
        spacer = $('<div class="spacer"></div>');
    
    clone.attr('data-clone-v',v).insertBefore(buttonset);
    spacer.insertBefore(clone);
    
    buttonset.attr('data-clone-v',v);
    
    clone.find('input').each(function(){
        var n = $(this).attr('name') + '-' + v;
        $(this).attr('name',n).val('').removeClass('valid invalid');
    });
    
    clone.find('label').each(function(){
        var f = $(this).attr('for') + '-' + v;
            $(this).attr('for',f).removeClass('small valid invalid');
    });
    
    clone.find('.clone-hide').each(function(){
        $(this).addClass('hidden');
    });
    
    var clonedButtons = clone.find('.buttonset');
        clonedButtons.removeClass('hidden').attr('data-clone-v',v);
    
    buttonset.find('a.clone-remove').removeClass('hidden');
    buttonset.find('.clone-show-hidden').removeClass('hidden');
    $container.masonry();
    addFormEventListeners();
}

var removeClone = function(e,t){
    
    var buttonset = t.parent('.buttonset'),
        c = buttonset.attr('data-clone'),
        v = buttonset.attr('data-clone-v');
    
    if(v > 0){
        
        $('.clone[data-clone="'+c+'"][data-clone-v="'+v+'"]').prev('.spacer').remove();
        $('.clone[data-clone="'+c+'"][data-clone-v="'+v+'"]').remove().prev('.spacer').remove();
        
        v--;
        
        if(v == 0){
            t.addClass('hidden');
            buttonset.find('.clone-show-hidden').addClass('hidden');
        }
        
        $container.masonry();
        
        addFormEventListeners();
    }
}

var showHiddenClone = function(e,t){

    var buttonset = t.parent('.buttonset'),
        c = buttonset.attr('data-clone'),
        v = buttonset.attr('data-clone-v');
    
    $('.clone[data-clone="'+c+'"][data-clone-v="'+v+'"]').children('.clone-hide').each(function(){
        $(this).removeClass('hidden');
    });
    t.addClass('hidden');
    
    $container.masonry();

}


var handleResponse = function(response,form){
    form.removeClass('loading');
    if(response.success_msg){
        form.replaceWith(response.success_msg);
    }
};



var addFormEventListeners = function(){
    
    // ved fokus
    $('form input, form a').off().on('focus',function(e){
        var t = $(e.target),
            l = $('label[for="'+t.attr('name')+'"]');
            l.addClass('small');
        
        t.removeClass('invalid valid');
        l.removeClass('invalid');
        
        
    // ved blur
    }).on('blur',function(e){
        var t = $(e.target),
            c = t.val(),
            l = $('label[for="'+t.attr('name')+'"]');
        
            if(!c.length){
                
                l.removeClass('small');
            }
        
            else if(t.is('input[type="email"]') && !validateEmail(c)){
                
                l.addClass('invalid');
                t.addClass('invalid');
            }
        
            else{
                t.addClass('valid');
            }
    
    }).on('click',function(e){
        var t = $(e.target);
       
        if(t.is('input[type="submit"]')){
            e.preventDefault();
            
            var form = t.parents('form'),
                url = form.attr('action'),
                invalid = form.find('.invalid').length,
                required = form.find('[required]').not('.valid').not('.hidden').length;
            
            if(url !== '' && required === 0 && invalid === 0){
                if(!form.hasClass('loading')){
                    form.addClass('loading');
                    formSend(form,url);
                }
            }
            else{
                
                form.find('[required]').not('.valid').each(function(){
                    if(!$(this).hasClass('hidden')){
                        var name = $(this).attr('name');
                        $('label[for="'+name+'"]').addClass('invalid');
                        $(this).addClass('invalid');
                    }
                });
                
            }
            
        }
        
        else if(t.is('a.clone-add')){
            
            e.preventDefault();
            
            var buttonset = t.parent('.buttonset'),
                cOpt = buttonset.attr('data-clone'),
                v = buttonset.attr('data-clone-v'),
                c = $('.clone[data-clone="'+cOpt+'"][data-clone-v="'+v+'"]'); 
            
            cloneFields(e,t,cOpt,c,v);
        }
        
        
        else if (t.is('a.clone-remove')){
            e.preventDefault();
            removeClone(e,t);
        }
        
        else if (t.is('a.clone-show-hidden')){
            e.preventDefault();
            showHiddenClone(e,t);
        }
    
    }).on('keyup',function(e){
    
        var t = $(e.target);
        
        if(t.is('input[type="number"]')){
        
            var c = t.val().replace(/[^0-9]/g, '');
            
            t.val(c);
        
        }
        
    });
    
}

$(function(){
    
    addFormEventListeners();
    
    $('form input').each(function(){
        
        if(!$(this).val() == ''){
            $(this).prev('label').addClass('small');
        }
    
    });
    
});