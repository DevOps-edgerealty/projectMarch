/**
*  Ajax Autocomplete for jQuery, version 1.2.7
*  (c) 2013 Tomas Kirda
*
*  Ajax Autocomplete for jQuery is freely distributable under the terms of an MIT-style license.
*  For details, see the web site: http://www.devbridge.com/projects/autocomplete/jquery/
*
*/
(function(e){"function"===typeof define&&define.amd?define(["jquery"],e):e(jQuery)})(function(e){function g(a,b){var c=function(){},c={autoSelectFirst:!1,appendTo:"body",serviceUrl:null,lookup:null,onSelect:null,width:"auto",minChars:1,maxHeight:300,deferRequestBy:0,params:{},formatResult:g.formatResult,delimiter:null,zIndex:9999,type:"GET",noCache:!1,onSearchStart:c,onSearchComplete:c,containerClass:"autocomplete-suggestions",tabDisabled:!1,dataType:"text",lookupFilter:function(a,b,c){return-1!==
    a.value.toLowerCase().indexOf(c)},paramName:"query",transformResult:function(a){return"string"===typeof a?e.parseJSON(a):a}};this.element=a;this.el=e(a);this.suggestions=[];this.badQueries=[];this.selectedIndex=-1;this.currentValue=this.element.value;this.intervalId=0;this.cachedResponse=[];this.onChange=this.onChangeInterval=null;this.isLocal=this.ignoreValueChange=!1;this.suggestionsContainer=null;this.options=e.extend({},c,b);this.classes={selected:"autocomplete-selected",suggestion:"autocomplete-suggestion"};
    this.initialize();this.setOptions(b)}var h={extend:function(a,b){return e.extend(a,b)},createNode:function(a){var b=document.createElement("div");b.innerHTML=a;return b.firstChild}};g.utils=h;e.Autocomplete=g;g.formatResult=function(a,b){var c="("+b.replace(RegExp("(\\/|\\.|\\*|\\+|\\?|\\||\\(|\\)|\\[|\\]|\\{|\\}|\\\\)","g"),"\\$1")+")";return a.value.replace(RegExp(c,"gi"),"<strong>$1</strong>")};g.prototype={killerFn:null,initialize:function(){var a=this,b="."+a.classes.suggestion,c=a.classes.selected,
    d=a.options,f;a.element.setAttribute("autocomplete","off");a.killerFn=function(b){0===e(b.target).closest("."+a.options.containerClass).length&&(a.killSuggestions(),a.disableKillerFn())};if(!d.width||"auto"===d.width)d.width=a.el.outerWidth();a.suggestionsContainer=g.utils.createNode('<div class="'+d.containerClass+'" style="position: absolute; display: none;"></div>');f=e(a.suggestionsContainer);f.appendTo(d.appendTo).width(d.width);f.on("mouseover.autocomplete",b,function(){a.activate(e(this).data("index"))});
    f.on("mouseout.autocomplete",function(){a.selectedIndex=-1;f.children("."+c).removeClass(c)});f.on("click.autocomplete",b,function(){a.select(e(this).data("index"),!1)});a.fixPosition();if(window.opera)a.el.on("keypress.autocomplete",function(b){a.onKeyPress(b)});else a.el.on("keydown.autocomplete",function(b){a.onKeyPress(b)});a.el.on("keyup.autocomplete",function(b){a.onKeyUp(b)});a.el.on("blur.autocomplete",function(){a.onBlur()});a.el.on("focus.autocomplete",function(){a.fixPosition()})},onBlur:function(){this.enableKillerFn()},
    setOptions:function(a){var b=this.options;h.extend(b,a);if(this.isLocal=e.isArray(b.lookup))b.lookup=this.verifySuggestionsFormat(b.lookup);e(this.suggestionsContainer).css({"max-height":b.maxHeight+"px",width:b.width+"px","z-index":b.zIndex})},clearCache:function(){this.cachedResponse=[];this.badQueries=[]},clear:function(){this.clearCache();this.currentValue=null;this.suggestions=[]},disable:function(){this.disabled=!0},enable:function(){this.disabled=!1},fixPosition:function(){var a;"body"===this.options.appendTo&&
    (a=this.el.offset(),e(this.suggestionsContainer).css({top:a.top+this.el.outerHeight()+"px",left:a.left+"px"}))},enableKillerFn:function(){e(document).on("click.autocomplete",this.killerFn)},disableKillerFn:function(){e(document).off("click.autocomplete",this.killerFn)},killSuggestions:function(){var a=this;a.stopKillSuggestions();a.intervalId=window.setInterval(function(){a.hide();a.stopKillSuggestions()},300)},stopKillSuggestions:function(){window.clearInterval(this.intervalId)},onKeyPress:function(a){if(!this.disabled&&
    !this.visible&&40===a.keyCode&&this.currentValue)this.suggest();else if(!this.disabled&&this.visible){switch(a.keyCode){case 27:this.el.val(this.currentValue);this.hide();break;case 9:case 13:if(-1===this.selectedIndex){this.hide();return}this.select(this.selectedIndex,13===a.keyCode);if(9===a.keyCode&&!1===this.options.tabDisabled)return;break;case 38:this.moveUp();break;case 40:this.moveDown();break;default:return}a.stopImmediatePropagation();a.preventDefault()}},onKeyUp:function(a){var b=this;
    if(!b.disabled){switch(a.keyCode){case 38:case 40:return}clearInterval(b.onChangeInterval);if(b.currentValue!==b.el.val())if(0<b.options.deferRequestBy)b.onChangeInterval=setInterval(function(){b.onValueChange()},b.options.deferRequestBy);else b.onValueChange()}},onValueChange:function(){var a;clearInterval(this.onChangeInterval);this.currentValue=this.element.value;a=this.getQuery(this.currentValue);this.selectedIndex=-1;this.ignoreValueChange?this.ignoreValueChange=!1:a.length<this.options.minChars?
    this.hide():this.getSuggestions(a)},getQuery:function(a){var b=this.options.delimiter;if(!b)return e.trim(a);a=a.split(b);return e.trim(a[a.length-1])},getSuggestionsLocal:function(a){var b=a.toLowerCase(),c=this.options.lookupFilter;return{suggestions:e.grep(this.options.lookup,function(d){return c(d,a,b)})}},getSuggestions:function(a){var b,c=this,d=c.options,f=d.serviceUrl;(b=c.isLocal?c.getSuggestionsLocal(a):c.cachedResponse[a])&&e.isArray(b.suggestions)?(c.suggestions=b.suggestions,c.suggest()):
    c.isBadQuery(a)||(d.params[d.paramName]=a,!1!==d.onSearchStart.call(c.element,d.params)&&(e.isFunction(d.serviceUrl)&&(f=d.serviceUrl.call(c.element,a)),e.ajax({url:f,data:d.ignoreParams?null:d.params,type:d.type,dataType:d.dataType}).done(function(b){c.processResponse(b,a);d.onSearchComplete.call(c.element,a)})))},isBadQuery:function(a){for(var b=this.badQueries,c=b.length;c--;)if(0===a.indexOf(b[c]))return!0;return!1},hide:function(){this.visible=!1;this.selectedIndex=-1;e(this.suggestionsContainer).hide()},
    suggest:function(){if(0===this.suggestions.length)this.hide();else{var a=this.options.formatResult,b=this.getQuery(this.currentValue),c=this.classes.suggestion,d=this.classes.selected,f=e(this.suggestionsContainer),g="";e.each(this.suggestions,function(d,e){g+='<div class="'+c+'" data-index="'+d+'">'+a(e,b)+"</div>"});f.html(g).show();this.visible=!0;this.options.autoSelectFirst&&(this.selectedIndex=0,f.children().first().addClass(d))}},verifySuggestionsFormat:function(a){return a.length&&"string"===
    typeof a[0]?e.map(a,function(a){return{value:a,data:null}}):a},processResponse:function(a,b){var c=this.options,d=c.transformResult(a,b);d.suggestions=this.verifySuggestionsFormat(d.suggestions);c.noCache||(this.cachedResponse[d[c.paramName]]=d,0===d.suggestions.length&&this.badQueries.push(d[c.paramName]));b===this.getQuery(this.currentValue)&&(this.suggestions=d.suggestions,this.suggest())},activate:function(a){var b=this.classes.selected,c=e(this.suggestionsContainer),d=c.children();c.children("."+
    b).removeClass(b);this.selectedIndex=a;return-1!==this.selectedIndex&&d.length>this.selectedIndex?(a=d.get(this.selectedIndex),e(a).addClass(b),a):null},select:function(a,b){var c=this.suggestions[a];c&&(this.el.val(c),this.ignoreValueChange=b,this.hide(),this.onSelect(a))},moveUp:function(){-1!==this.selectedIndex&&(0===this.selectedIndex?(e(this.suggestionsContainer).children().first().removeClass(this.classes.selected),this.selectedIndex=-1,this.el.val(this.currentValue)):this.adjustScroll(this.selectedIndex-
    1))},moveDown:function(){this.selectedIndex!==this.suggestions.length-1&&this.adjustScroll(this.selectedIndex+1)},adjustScroll:function(a){var b=this.activate(a),c,d;b&&(b=b.offsetTop,c=e(this.suggestionsContainer).scrollTop(),d=c+this.options.maxHeight-25,b<c?e(this.suggestionsContainer).scrollTop(b):b>d&&e(this.suggestionsContainer).scrollTop(b-this.options.maxHeight+25),this.el.val(this.getValue(this.suggestions[a].value)))},onSelect:function(a){var b=this.options.onSelect;a=this.suggestions[a];
    this.el.val(this.getValue(a.value));e.isFunction(b)&&b.call(this.element,a)},getValue:function(a){var b=this.options.delimiter,c;if(!b)return a;c=this.currentValue;b=c.split(b);return 1===b.length?a:c.substr(0,c.length-b[b.length-1].length)+a},dispose:function(){this.el.off(".autocomplete").removeData("autocomplete");this.disableKillerFn();e(this.suggestionsContainer).remove()}};e.fn.autocomplete=function(a,b){return 0===arguments.length?this.first().data("autocomplete"):this.each(function(){var c=
    e(this),d=c.data("autocomplete");if("string"===typeof a){if(d&&"function"===typeof d[a])d[a](b)}else d&&d.dispose&&d.dispose(),d=new g(this,a),c.data("autocomplete",d)})}});

    $(function(){

        $.getJSON
      var currencies = [
        {
        "value" : "City Walk"
        },
        {
        "value" : "Mankhool"
        },
        {
        "value" : "Al Hudaiba"
        },
        {
        "value" : "Oud Metha"
        },
        {
        "value" : "Lehbab"
        },
        {
        "value" : "Jabal Ali"
        },
        {
        "value" : "Al Lusaily"
        },
        {
        "value" : "Al Bada"
        },
        {
        "value" : "Al Karama"
        },
        {
        "value" : "Shandagha East"
        },
        {
        "value" : "Al Raffa"
        },
        {
        "value" : "Al Suq Al Kabeer"
        },
        {
        "value" : "Al Hamriya"
        },
        {
        "value" : "Al Satwa"
        },
        {
        "value" : "Nad Al Shiba"
        },
        {
        "value" : "Margham"
        },
        {
        "value" : "Nad Al Hamar"
        },
        {
        "value" : "Al Mamzer"
        },
        {
        "value" : "Shandagha West"
        },
        {
        "value" : "Mirdif"
        },
        {
        "value" : "Um Ramool"
        },
        {
        "value" : "Al Garhoud"
        },
        {
        "value" : "Al-Aweer"
        },
        {
        "value" : "Hor Al Anz East"
        },
        {
        "value" : "Abu Hail"
        },
        {
        "value" : "Port Saeed"
        },
        {
        "value" : "Al Baraha"
        },
        {
        "value" : "Al Buteen"
        },
        {
        "value" : "Eyal Nasser"
        },
        {
        "value" : "Al Ras"
        },
        {
        "value" : "Hor Al Anz"
        },
        {
        "value" : "Al Dhagaya"
        },
        {
        "value" : "Al Murqabat"
        },
        {
        "value" : "Al Muteena"
        },
        {
        "value" : "Rega Al Buteen"
        },
        {
        "value" : "Al Sabkha"
        },
        {
        "value" : "Al Khabeesi"
        },
        {
        "value" : "Al Warqa Third"
        },
        {
        "value" : "Al Nahda Second"
        },
        {
        "value" : "Al Ruwayyah"
        },
        {
        "value" : "Al Barsha Third"
        },
        {
        "value" : "Al Warqa Second"
        },
        {
        "value" : "Um Suqaim First"
        },
        {
        "value" : "Al Safouh First"
        },
        {
        "value" : "Al Qusais First"
        },
        {
        "value" : "Al Saffa First"
        },
        {
        "value" : "Um Suqaim Third"
        },
        {
        "value" : "Al Twar First"
        },
        {
        "value" : "Al Barsha Second"
        },
        {
        "value" : "Al Mezhar First"
        },
        {
        "value" : "Naif"
        },
        {
        "value" : "Jumeirah Third"
        },
        {
        "value" : "Jumeirah First"
        },
        {
        "value" : "Muhaisanah First"
        },
        {
        "value" : "Um Suqaim Second"
        },
        {
        "value" : "Um Al Sheif"
        },
        {
        "value" : "Jumeirah Second"
        },
        {
        "value" : "Al Mezhar Second"
        },
        {
        "value" : "Al Jafliya"
        },
        {
        "value" : "Al Rashidiya"
        },
        {
        "value" : "Al Waheda"
        },
        {
        "value" : "Trade Center First"
        },
        {
        "value" : "Al Goze Industrial First"
        },
        {
        "value" : "Al Twar Third"
        },
        {
        "value" : "Al Saffa Second"
        },
        {
        "value" : "Al Qusais Second"
        },
        {
        "value" : "Al Manara"
        },
        {
        "value" : "Al Qusais Industrial Second"
        },
        {
        "value" : "Trade Center Second"
        },
        {
        "value" : "Al Twar Second"
        },
        {
        "value" : "Al Barsha First"
        },
        {
        "value" : "Al Qusais Third"
        },
        {
        "value" : "Muhaisanah Third"
        },
        {
        "value" : "Dubai Marina"
        },
        {
        "value" : "Nad Shamma"
        },
        {
        "value" : "Al Goze Industrial Fourth"
        },
        {
        "value" : "Al Qusais Industrial First"
        },
        {
        "value" : "Al Goze Industrial Second"
        },
        {
        "value" : "Al Goze First"
        },
        {
        "value" : "Al Mararr"
        },
        {
        "value" : "Al Rega"
        },
        {
        "value" : "Al Goze Second"
        },
        {
        "value" : "Al Warqa First"
        },
        {
        "value" : "Um Hurair First"
        },
        {
        "value" : "Al Qusais Industrial Fourth"
        },
        {
        "value" : "Ras Al Khor Industrial First"
        },
        {
        "value" : "Nad Al Shiba Second"
        },
        {
        "value" : "Ras Al Khor Industrial Second"
        },
        {
        "value" : "Al Goze Industrial Third"
        },
        {
        "value" : "Al Nahda First"
        },
        {
        "value" : "Downtown"
        },
        
        {
        "value" : "Muhaisanah Fourth"
        },
        {
        "value" : "Al Goze Third"
        },
        {
        "value" : "Um Hurair Second"
        },
        {
        "value" : "Al Thanayah Fourth"
        },
        {
        "value" : "Al Warqa Fourth"
        },
        {
        "value" : "Al Safouh Second"
        },
        {
        "value" : "Zaabeel Second"
        },
        {
        "value" : "Nad Al Shiba Third"
        },
        {
        "value" : "Muhaisanah Second"
        },
        {
        "value" : "Al Qusais Industrial Third"
        },
        {
        "value" : "Nad Al Shiba First"
        },
        {
        "value" : "Madinat Dubai Almelaheyah"
        },
        {
        "value" : "Tawi Al Muraqqab"
        },
        {
        "value" : "Nad Al Shiba Fourth"
        },
        {
        "value" : "Jabal Ali Industrial First"
        },
        {
        "value" : "Al Qusais Industrial Fifth"
        },
        {
        "value" : "Al Khawaneej First"
        },
        {
        "value" : "Wadi Al Amardi"
        },
        {
        "value" : "Al Khawaneej Second"
        },
        {
        "value" : "Al Eyas"
        },
        {
        "value" : "Al Aweer Second"
        },
        {
        "value" : "Al Aweer First"
        },
        {
        "value" : "Oud Al Muteena Second"
        },
        {
        "value" : "Al Jadaf"
        },
        {
        "value" : "Oud Al Muteena First"
        },
        {
        "value" : "JLT"
        },
        {
        "value" : "Al Thanyah Third"
        },
        {
        "value" : "Palm Jumeirah"
        },
        {
        "value" : "Al Goze Fourth"
        },
        {
        "value" : "Al Warsan First"
        },
        {
        "value" : "Al Barshaa South Third"
        },
        {
        "value" : "Al Barshaa South First"
        },
        {
        "value" : "Dubai International Airport"
        },
        {
        "value" : "Al Barshaa South Second"
        },
        {
        "value" : "Ras Al Khor"
        },
        {
        "value" : "World Islands"
        },
        {
        "value" : "Arabian Ranches 1"
        },
        {
        "value" : "Dubai Sports City"
        },
        {
        "value" : "Al Warsan Second"
        },
        {
        "value" : "Festival City First"
        },
        {
        "value" : "Al Kheeran"
        },
        {
        "value" : "Palm Deira"
        },
        {
        "value" : "Palm Jabal Ali"
        },
        {
        "value" : "Al Ttay"
        },
        {
        "value" : "Al Kifaf"
        },
        {
        "value" : "Ras Al Khor Industrial Third"
        },
        {
        "value" : "Jumeirah Village Circle - Jvc"
        },
        {
        "value" : "Jumeirah Village Triangle"
        },
        {
        "value" : "Barsha Heights (Tecom)"
        },
        {
        "value" : "Motor City"
        },
        {
        "value" : "Bukadra"
        },
        {
        "value" : "Jabal Ali First"
        },
        {
        "value" : "Al Khairan  Second"
        },
        {
        "value" : "Dubai Creek Harbour"
        },
        {
        "value" : "Al Hebiah Second"
        },
        {
        "value" : "Saih Shuaib 2"
        },
        {
        "value" : "Saih Shuaib 3"
        },
        {
        "value" : "Dubai Investment Park Second"
        },
        {
        "value" : "Al Warsan Third"
        },
        {
        "value" : "Dubai Investment Park First"
        },
        {
        "value" : "Al Yufrah 2"
        },
        {
        "value" : "Wadi Al Safa 7"
        },
        {
        "value" : "Wadi Al Safa 3"
        },
        {
        "value" : "Wadi Al Safa 2"
        },
        {
        "value" : "Nadd Hessa"
        },
        {
        "value" : "Wadi Al Safa 5"
        },
        {
        "value" : "Lehbab First"
        },
        {
        "value" : "Wadi Al Safa 4"
        },
        {
        "value" : "Al Rowaiyah First"
        },
        {
        "value" : "Jabal Ali Industrial Third"
        },
        {
        "value" : "Me'Aisem First"
        },
        {
        "value" : "Dubai South"
        },
        {
        "value" : "Al Hebiah Fifth"
        },
        {
        "value" : "Jabal Ali Industrial Second"
        },
        {
        "value" : "Warsan Fourth"
        },
        {
        "value" : "Esalal"
        },
        {
        "value" : "Hessyan Second"
        },
        {
        "value" : "Muragab"
        },
        {
        "value" : "Lehbab Second"
        },
        {
        "value" : "Saih Shuaib 4"
        },
        {
        "value" : "Al Maha"
        },
        {
        "value" : "Hessyan First"
        },
        {
        "value" : "Al Rowaiyah Third"
        },
        {
        "value" : "Al Yelayiss 4"
        },
        {
        "value" : "Al Yelayiss 2"
        },
        {
        "value" : "Um Nahad First"
        },
        {
        "value" : "Grayteesah"
        },
        {
        "value" : "District One - Mbr City"
        },
        {
        "value" : "Dubai Hills Estate"
        },
        {
        "value" : "Saih Shuaib 1"
        },
        {
        "value" : "Mena Jabal Ali"
        },
        {
        "value" : "Al Yelayiss 3"
        },
        {
        "value" : "Al Yufrah 1"
        },
        {
        "value" : "Mira"
        },
        {
        "value" : "Al Hebiah Third"
        },
        {
        "value" : "Business Bay"
        },
        {
        "value" : "Island 2"
        },
        {
        "value" : "Al Marmoom"
        },
        {
        "value" : "Le Hemaira"
        },
        {
        "value" : "Al Yufrah 3"
        },
        {
        "value" : "Um Nahad Second"
        },
        {
        "value" : "Um Esalay"
        },
        {
        "value" : "Saih Aldahal"
        },
        {
        "value" : "Umm Addamin"
        },
        {
        "value" : "Um Nahad Third"
        },
        {
        "value" : "Zaabeel First"
        },
        {
        "value" : "Nazwah"
        },
        {
        "value" : "AL HEBIAH SIXTH"
        },
        {
        "value" : "Wadi Alshabak"
        },
        {
        "value" : "Mushrif"
        },
        {
        "value" : ""
        },
        {
        "value" : "Al Barsha"
        },
        {
        "value" : ""
        },
        {
        "value" : "AL SIDIR 2"
        },
        {
        "value" : "ALGHAF 1"
        },
        {
        "value" : "ALGHAF 2"
        },
        {
        "value" : "VIEWS 1"
        },
        {
        "value" : "VIEWS 2"
        },
        {
        "value" : "MARINA SAIL"
        },
        {
        "value" : "ALJAZ4"
        },
        {
        "value" : "ALJAZ3"
        },
        {
        "value" : "ALSIDIR 4"
        },
        {
        "value" : "ALSIDIR 3"
        },
        {
        "value" : "ALGHAF 3"
        },
        {
        "value" : "ALGHAF 4"
        },
        {
        "value" : "Le Reve"
        },
        {
        "value" : "ALMASS"
        },
        {
        "value" : "ALJAZ 1"
        },
        {
        "value" : "ALJAZ 2"
        },
        {
        "value" : "ALNAKHEEL 1"
        },
        {
        "value" : "ALSIDIR 1"
        },
        {
        "value" : "MARINA HEIGHTS 1"
        },
        {
        "value" : "MARINA VIEW"
        },
        {
        "value" : "AL ARTA2"
        },
        {
        "value" : "NAKHEEL 2"
        },
        {
        "value" : "ALNAKHEEL 3"
        },
        {
        "value" : "Murjan 1"
        },
        {
        "value" : "ALNAKHEEL 4"
        },
        {
        "value" : "AL ARTA1"
        },
        {
        "value" : "AL ARTA 3"
        },
        {
        "value" : "AL Murjan"
        },
        {
        "value" : "AL GHOZLAN 3"
        },
        {
        "value" : "Shams 2"
        },
        {
        "value" : "AL GHOZLAN 1"
        },
        {
        "value" : "AL GHOZLAN 2"
        },
        {
        "value" : "AL ARTA 4"
        },
        {
        "value" : "SAMAR 1"
        },
        {
        "value" : "AL Alka-3"
        },
        {
        "value" : "SAMAR 4"
        },
        {
        "value" : "AL GHOZLAN 4"
        },
        {
        "value" : "Rimal 5"
        },
        {
        "value" : "F15"
        },
        {
        "value" : "SAMAR 2"
        },
        {
        "value" : "SAMAR 3"
        },
        {
        "value" : "AL Dhafrah-4"
        },
        {
        "value" : "AL THAYYAL-1"
        },
        {
        "value" : "AL Dhafrah-3"
        },
        {
        "value" : "Al Dhafrah-1"
        },
        {
        "value" : "AL Dhafrah-2"
        },
        {
        "value" : "AL THAYYAL-4"
        },
        {
        "value" : "AL THAYYAL-2"
        },
        {
        "value" : "AL THAYYAL-3"
        },
        {
        "value" : "Murjan 4"
        },
        {
        "value" : "Murjan 5"
        },
        {
        "value" : "Rimal 4"
        },
        {
        "value" : "Murjan 6"
        },
        {
        "value" : "Rimal 2"
        },
        {
        "value" : "Murjan 3"
        },
        {
        "value" : "Rimal 3"
        },
        {
        "value" : "Rimal 1"
        },
        {
        "value" : "GR Turia"
        },
        {
        "value" : "MARINA CROWN TOWER"
        },
        {
        "value" : "Sadaf 8"
        },
        {
        "value" : "SAHAB-1"
        },
        {
        "value" : "SAHAB-2"
        },
        {
        "value" : "Rimal 6"
        },
        {
        "value" : "Bahar 1"
        },
        {
        "value" : "Amwaj 4"
        },
        {
        "value" : "MARINA HOMES"
        },
        {
        "value" : "AL BASHRI - B1"
        },
        {
        "value" : "Sadaf 2"
        },
        {
        "value" : "Sadaf 6"
        },
        {
        "value" : "Sadaf 5"
        },
        {
        "value" : "Sadaf 1"
        },
        {
        "value" : "THE WAVES A"
        },
        {
        "value" : "Sadaf 4"
        },
        {
        "value" : "Bahar 6"
        },
        {
        "value" : "Bahar 5"
        },
        {
        "value" : "Sadaf 7"
        },
        {
        "value" : "Al Majara 2"
        },
        {
        "value" : "Shams 4"
        },
        {
        "value" : "Fairooz"
        },
        {
        "value" : "Murjan 2"
        },
        {
        "value" : "Horizon Tower"
        },
        {
        "value" : "AL SEEF 2"
        },
        {
        "value" : "MARINA DIAMOND - B"
        },
        {
        "value" : "E05"
        },
        {
        "value" : "Bahar 4"
        },
        {
        "value" : "GR Arno"
        },
        {
        "value" : "Residences_E1"
        },
        {
        "value" : "Residences_E2"
        },
        {
        "value" : "EMERALD RESIDENCE"
        },
        {
        "value" : "DM MESK"
        },
        {
        "value" : "BELVEDERE"
        },
        {
        "value" : "DM Yass"
        },
        {
        "value" : "Al Majara 1"
        },
        {
        "value" : "H04"
        },
        {
        "value" : "Al Majara 3"
        },
        {
        "value" : "H03"
        },
        {
        "value" : "MARINA TERRACE"
        },
        {
        "value" : "AL ANBER"
        },
        {
        "value" : "Shams 1"
        },
        {
        "value" : "MARINA DIAMOND - A"
        },
        {
        "value" : "Al Majara 5"
        },
        {
        "value" : "ICE006"
        },
        {
        "value" : "Residences_E3"
        },
        {
        "value" : "Residences_W1"
        },
        {
        "value" : "Residences_W3"
        },
        {
        "value" : "Y23"
        },
        {
        "value" : "Y22"
        },
        {
        "value" : "Y17"
        },
        {
        "value" : "Y24"
        },
        {
        "value" : "S22"
        },
        {
        "value" : "Y21"
        },
        {
        "value" : "Y20"
        },
        {
        "value" : "Y10"
        },
        {
        "value" : "Y19"
        },
        {
        "value" : "X24"
        },
        {
        "value" : "X26"
        },
        {
        "value" : "Y03"
        },
        {
        "value" : "Y01"
        },
        {
        "value" : "Y2"
        },
        {
        "value" : "Y18"
        },
        {
        "value" : "MARINA DIAMOND-2"
        },
        {
        "value" : "Y16"
        },
        {
        "value" : "Y15"
        },
        {
        "value" : "ICD007"
        },
        {
        "value" : "Y09"
        },
        {
        "value" : "N11"
        },
        {
        "value" : "P22"
        },
        {
        "value" : "P04"
        },
        {
        "value" : "X22"
        },
        {
        "value" : "Z02"
        },
        {
        "value" : "T10"
        },
        {
        "value" : "P03"
        },
        {
        "value" : "Y07"
        },
        {
        "value" : "Y4"
        },
        {
        "value" : "Z01"
        },
        {
        "value" : "P07"
        },
        {
        "value" : "P12"
        },
        {
        "value" : "Y11"
        },
        {
        "value" : "JashFalqa"
        },
        {
        "value" : "Y12"
        },
        {
        "value" : "X10"
        },
        {
        "value" : "P15"
        },
        {
        "value" : "X08"
        },
        {
        "value" : "X07"
        },
        {
        "value" : "X06"
        },
        {
        "value" : "WATERFRONT"
        },
        {
        "value" : "X05"
        },
        {
        "value" : "Y08"
        },
        {
        "value" : "Y13"
        },
        {
        "value" : "X04"
        },
        {
        "value" : "S12"
        },
        {
        "value" : "MARINA MANSIONS"
        },
        {
        "value" : "X21"
        },
        {
        "value" : "X20"
        },
        {
        "value" : "X14"
        },
        {
        "value" : "X18"
        },
        {
        "value" : "X16"
        },
        {
        "value" : "THE WAVES B"
        },
        {
        "value" : "GR Una"
        },
        {
        "value" : "Residences_West Poduim"
        },
        {
        "value" : "X01"
        },
        {
        "value" : "X11"
        },
        {
        "value" : "X12"
        },
        {
        "value" : "Residences_East Poduim"
        },
        {
        "value" : "U24"
        },
        {
        "value" : "U20"
        },
        {
        "value" : "U19"
        },
        {
        "value" : "U18"
        },
        {
        "value" : "U09"
        },
        {
        "value" : "X03"
        },
        {
        "value" : "X02"
        },
        {
        "value" : "U17"
        },
        {
        "value" : "Marina Apartments 3"
        },
        {
        "value" : "U13"
        },
        {
        "value" : "U12"
        },
        {
        "value" : "U11"
        },
        {
        "value" : "U07"
        },
        {
        "value" : "U10"
        },
        {
        "value" : "U08"
        },
        {
        "value" : "U04"
        },
        {
        "value" : "V19"
        },
        {
        "value" : "L08"
        },
        {
        "value" : "L06"
        },
        {
        "value" : "U02"
        },
        {
        "value" : "L03"
        },
        {
        "value" : "L04"
        },
        {
        "value" : "L13"
        },
        {
        "value" : "K10"
        },
        {
        "value" : "MARINA DIAMOND-3"
        },
        {
        "value" : "I13"
        },
        {
        "value" : "L05"
        },
        {
        "value" : "J03"
        },
        {
        "value" : "K01"
        },
        {
        "value" : "L12"
        },
        {
        "value" : "K16"
        },
        {
        "value" : "YACHT BAY"
        },
        {
        "value" : "U15"
        },
        {
        "value" : "U06"
        },
        {
        "value" : "U14"
        },
        {
        "value" : "I15"
        },
        {
        "value" : "I14"
        },
        {
        "value" : "K08"
        },
        {
        "value" : "K06"
        },
        {
        "value" : "K05"
        },
        {
        "value" : "J07"
        },
        {
        "value" : "K07"
        },
        {
        "value" : "J06"
        },
        {
        "value" : "F08"
        },
        {
        "value" : "I10"
        },
        {
        "value" : "I11"
        },
        {
        "value" : "J02"
        },
        {
        "value" : "D08"
        },
        {
        "value" : "I09"
        },
        {
        "value" : "L11"
        },
        {
        "value" : "E07"
        },
        {
        "value" : "I12"
        },
        {
        "value" : "I03"
        },
        {
        "value" : "I02"
        },
        {
        "value" : "I01"
        },
        {
        "value" : "K13"
        },
        {
        "value" : "K04"
        },
        {
        "value" : "K12"
        },
        {
        "value" : "K03"
        },
        {
        "value" : "D06"
        },
        {
        "value" : "K02"
        },
        {
        "value" : "D02"
        },
        {
        "value" : "I08"
        },
        {
        "value" : "C16"
        },
        {
        "value" : "I6"
        },
        {
        "value" : "I7"
        },
        {
        "value" : "F16"
        },
        {
        "value" : "Q09"
        },
        {
        "value" : "Q06"
        },
        {
        "value" : "O04"
        },
        {
        "value" : "P01"
        },
        {
        "value" : "O01"
        },
        {
        "value" : "O03"
        },
        {
        "value" : "N10"
        },
        {
        "value" : "C15"
        },
        {
        "value" : "WORLD TRADE CENTRE RESIDENCES"
        },
        {
        "value" : "N-09"
        },
        {
        "value" : "N12"
        },
        {
        "value" : "1 Lake Plaza"
        },
        {
        "value" : "N03"
        },
        {
        "value" : "N02"
        },
        {
        "value" : "N01"
        },
        {
        "value" : "N08"
        },
        {
        "value" : "M03"
        },
        {
        "value" : "M-02"
        },
        {
        "value" : "MISKA 1"
        },
        {
        "value" : "M07"
        },
        {
        "value" : "M06"
        },
        {
        "value" : "M05"
        },
        {
        "value" : "MARINA DIAMOND 4"
        },
        {
        "value" : "M04"
        },
        {
        "value" : "Q01"
        },
        {
        "value" : "MARINA DIAMOND 6 (A)"
        },
        {
        "value" : "Q05"
        },
        {
        "value" : "P02"
        },
        {
        "value" : "O06"
        },
        {
        "value" : "P05"
        },
        {
        "value" : "LA RESIDENCIA DEL MAR"
        },
        {
        "value" : "AURORA W1"
        },
        {
        "value" : "YANSOON 4"
        },
        {
        "value" : "YANSOON 6"
        },
        {
        "value" : "MANCHESTER"
        },
        {
        "value" : "P08"
        },
        {
        "value" : "IT PLAZA"
        },
        {
        "value" : "Y26"
        },
        {
        "value" : "MARINA DIAMOND 5 (A)"
        },
        {
        "value" : "GR GT CANAL VILLAS T2"
        },
        {
        "value" : "KAMOON 4"
        },
        {
        "value" : "GOLF TOWERS T1"
        },
        {
        "value" : "N15"
        },
        {
        "value" : "Residences - T3"
        },
        {
        "value" : "SUPREME RESIDENCY"
        },
        {
        "value" : "YANSOON 8"
        },
        {
        "value" : "O07"
        },
        {
        "value" : "N13"
        },
        {
        "value" : "N14"
        },
        {
        "value" : "LA RIVIERA TOWER"
        },
        {
        "value" : "MAG 214"
        },
        {
        "value" : "S18"
        },
        {
        "value" : "THE RESIDENCES II T1"
        },
        {
        "value" : "MISKA 2"
        },
        {
        "value" : "BLVD CENTRAL 1"
        },
        {
        "value" : "N04"
        },
        {
        "value" : "LIWA HEIGHTS 1"
        },
        {
        "value" : "YANSOON 3"
        },
        {
        "value" : "RIVIERA LAKE VIEW"
        },
        {
        "value" : "KAMOON 1"
        },
        {
        "value" : "ALTAJER"
        },
        {
        "value" : "ATTAREEN"
        },
        {
        "value" : "ALBAHAR"
        },
        {
        "value" : "YANSOON 2"
        },
        {
        "value" : "N 06"
        },
        {
        "value" : "KAMOON 2"
        },
        {
        "value" : "YANSOON 1"
        },
        {
        "value" : "YANSOON 7"
        },
        {
        "value" : "MARINA DIAMOND 5 (B)"
        },
        {
        "value" : "Westside Marina"
        },
        {
        "value" : "AL TAMR - B15"
        },
        {
        "value" : "LE SOLARIUM"
        },
        {
        "value" : "Al Khushkar"
        },
        {
        "value" : "REEHAN 8"
        },
        {
        "value" : "AZURE"
        },
        {
        "value" : "THE RESIDENCES II T3"
        },
        {
        "value" : "ZAAFARAN 2"
        },
        {
        "value" : "Al Hamri"
        },
        {
        "value" : "THE RESIDENCES II T2"
        },
        {
        "value" : "ROYAL RESIDENCES"
        },
        {
        "value" : "YANSOON 9"
        },
        {
        "value" : "REEHAN 7"
        },
        {
        "value" : "REEHAN 6"
        },
        {
        "value" : "MARINA RESIDENCE A"
        },
        {
        "value" : "AL HABOOL - B11"
        },
        {
        "value" : "Al Khudrawi"
        },
        {
        "value" : "ZAAFARAN 5"
        },
        {
        "value" : "Al Anbara"
        },
        {
        "value" : "LAKE CITY TOWER"
        },
        {
        "value" : "YANSOON 5"
        },
        {
        "value" : "GOLF TOWERS T3"
        },
        {
        "value" : "GOLF VILLAS"
        },
        {
        "value" : "MARINA RESIDENCE B"
        },
        {
        "value" : "REEHAN 1"
        },
        {
        "value" : "AL SARROOD - B13"
        },
        {
        "value" : "Al Sultana"
        },
        {
        "value" : "JASH HAMAD - B18"
        },
        {
        "value" : "Al Dabas"
        },
        {
        "value" : "GREEN LAKES S1"
        },
        {
        "value" : "K G TOWER"
        },
        {
        "value" : "Al Hallawi"
        },
        {
        "value" : "REEHAN 5"
        },
        {
        "value" : "REEHAN 3"
        },
        {
        "value" : "KAMOON 3"
        },
        {
        "value" : "AL NABAT B8"
        },
        {
        "value" : "SABA 1"
        },
        {
        "value" : "L09"
        },
        {
        "value" : "Y05"
        },
        {
        "value" : "Y06"
        },
        {
        "value" : "Al Msalli"
        },
        {
        "value" : "P20"
        },
        {
        "value" : "P10"
        },
        {
        "value" : "SABA 2"
        },
        {
        "value" : "Y14"
        },
        {
        "value" : "V16"
        },
        {
        "value" : "MADINA TOWER"
        },
        {
        "value" : "AL HASEER B7"
        },
        {
        "value" : "ZAAFARAN 1"
        },
        {
        "value" : "T08"
        },
        {
        "value" : "REEHAN 2"
        },
        {
        "value" : "GREEN LAKES S2"
        },
        {
        "value" : "AL DAS - B10"
        },
        {
        "value" : "Al Hatimi"
        },
        {
        "value" : "Al Shahla"
        },
        {
        "value" : "Universal Apartment"
        },
        {
        "value" : "MARINA VIEW TOWER A"
        },
        {
        "value" : "SABA 3"
        },
        {
        "value" : "S23"
        },
        {
        "value" : "ZAAFARAN 3"
        },
        {
        "value" : "REEHAN 4"
        },
        {
        "value" : "ZAAFARAN 4"
        },
        {
        "value" : "MARINASCAPE"
        },
        {
        "value" : "S04"
        },
        {
        "value" : "S15"
        },
        {
        "value" : "P17"
        },
        {
        "value" : "P18"
        },
        {
        "value" : "Y25"
        },
        {
        "value" : "S05"
        },
        {
        "value" : "L14"
        },
        {
        "value" : "South Ridge 1"
        },
        {
        "value" : "X15"
        },
        {
        "value" : "S01"
        },
        {
        "value" : "S06"
        },
        {
        "value" : "T03"
        },
        {
        "value" : "X13"
        },
        {
        "value" : "Grosvenor Business Tower"
        },
        {
        "value" : "T02"
        },
        {
        "value" : "X17"
        },
        {
        "value" : "P11"
        },
        {
        "value" : "P14"
        },
        {
        "value" : "GREEN LAKES S3"
        },
        {
        "value" : "S10"
        },
        {
        "value" : "Z04"
        },
        {
        "value" : "Z05"
        },
        {
        "value" : "S21"
        },
        {
        "value" : "S09"
        },
        {
        "value" : "S02"
        },
        {
        "value" : "S08"
        },
        {
        "value" : "S14"
        },
        {
        "value" : "S07"
        },
        {
        "value" : "P9"
        },
        {
        "value" : "South Ridge 3"
        },
        {
        "value" : "MARINA VIEW TOWERS B"
        },
        {
        "value" : "Burj Views Tower B"
        },
        {
        "value" : "S16"
        },
        {
        "value" : "The Jewels T1"
        },
        {
        "value" : "L07"
        },
        {
        "value" : "Burj Views Podium"
        },
        {
        "value" : "S11"
        },
        {
        "value" : "T07"
        },
        {
        "value" : "T04"
        },
        {
        "value" : "T01"
        },
        {
        "value" : "The Jewels T2"
        },
        {
        "value" : "T09"
        },
        {
        "value" : "T05"
        },
        {
        "value" : "T06"
        },
        {
        "value" : "South Ridge 2"
        },
        {
        "value" : "S19"
        },
        {
        "value" : "Burj ViewsTower A"
        },
        {
        "value" : "U01"
        },
        {
        "value" : "South Ridge 5"
        },
        {
        "value" : "South Ridge 6"
        },
        {
        "value" : "S17"
        },
        {
        "value" : "P19"
        },
        {
        "value" : "MED 52"
        },
        {
        "value" : "MED 53"
        },
        {
        "value" : "MED 38"
        },
        {
        "value" : "MED 39"
        },
        {
        "value" : "MED 48"
        },
        {
        "value" : "MED 54"
        },
        {
        "value" : "MED 51"
        },
        {
        "value" : "MED 49"
        },
        {
        "value" : "MED 50"
        },
        {
        "value" : "MED 67"
        },
        {
        "value" : "MED 69"
        },
        {
        "value" : "MED 70"
        },
        {
        "value" : "MED 71"
        },
        {
        "value" : "South Ridge 4"
        },
        {
        "value" : "MED 56"
        },
        {
        "value" : "MED 72"
        },
        {
        "value" : "Burj Views Tower C"
        },
        {
        "value" : "MED 65"
        },
        {
        "value" : "MED 66"
        },
        {
        "value" : "MED 68"
        },
        {
        "value" : "MED 85"
        },
        {
        "value" : "MED 80"
        },
        {
        "value" : "MED 88"
        },
        {
        "value" : "MED 81"
        },
        {
        "value" : "MED 83"
        },
        {
        "value" : "MED 91"
        },
        {
        "value" : "MED 94"
        },
        {
        "value" : "G R TRAVO A"
        },
        {
        "value" : "MED 41"
        },
        {
        "value" : "MED 93"
        },
        {
        "value" : "MED 46"
        },
        {
        "value" : "MED 47"
        },
        {
        "value" : "MED 79"
        },
        {
        "value" : "MOG 190"
        },
        {
        "value" : "MED 42"
        },
        {
        "value" : "MED 45"
        },
        {
        "value" : "MED 61"
        },
        {
        "value" : "MED 62"
        },
        {
        "value" : "MED 58"
        },
        {
        "value" : "MOG 193"
        },
        {
        "value" : "MOG 194"
        },
        {
        "value" : "MED 73"
        },
        {
        "value" : "MOG 195"
        },
        {
        "value" : "MED 74"
        },
        {
        "value" : "MOG 197"
        },
        {
        "value" : "MED 60"
        },
        {
        "value" : "MED 89"
        },
        {
        "value" : "MED 90"
        },
        {
        "value" : "MED 75"
        },
        {
        "value" : "MED 76"
        },
        {
        "value" : "MED 77"
        },
        {
        "value" : "MED 103"
        },
        {
        "value" : "MED 64"
        },
        {
        "value" : "MED 106"
        },
        {
        "value" : "MED 78"
        },
        {
        "value" : "MOG 198"
        },
        {
        "value" : "MED 92"
        },
        {
        "value" : "29 BLVD T1"
        },
        {
        "value" : "MOG 184"
        },
        {
        "value" : "MOG 202"
        },
        {
        "value" : "MOG 188"
        },
        {
        "value" : "MED 99"
        },
        {
        "value" : "MOG 189"
        },
        {
        "value" : "MED 101"
        },
        {
        "value" : "MED 100"
        },
        {
        "value" : "MED 102"
        },
        {
        "value" : "Burj Khalifa Zone 4"
        },
        {
        "value" : "Burj Khalifa Zone 3"
        },
        {
        "value" : "LOFTS"
        },
        {
        "value" : "LOFTS T CENT"
        },
        {
        "value" : "MOG 207"
        },
        {
        "value" : "Burj Khalifa Zone 2B"
        },
        {
        "value" : "LOFTS T EAST"
        },
        {
        "value" : "MOG 226"
        },
        {
        "value" : "LOFTS T WEST"
        },
        {
        "value" : "MOG 204"
        },
        {
        "value" : "G R TRAVO B"
        },
        {
        "value" : "DANA 1"
        },
        {
        "value" : "LINKS WEST T1"
        },
        {
        "value" : "ZANZEBEEL 3"
        },
        {
        "value" : "8 BLVD WALK"
        },
        {
        "value" : "BENNETT HOUSE 1"
        },
        {
        "value" : "BENNETT HOUSE 2"
        },
        {
        "value" : "NORTON COURT 1"
        },
        {
        "value" : "ZANZEBEEL 1"
        },
        {
        "value" : "LINKS EAST T2"
        },
        {
        "value" : "LINKS GOLF"
        },
        {
        "value" : "SILICON ARCH"
        },
        {
        "value" : "ZANZEBEEL 2"
        },
        {
        "value" : "SEEF 3"
        },
        {
        "value" : "Abu Keibal"
        },
        {
        "value" : "MISKA 3"
        },
        {
        "value" : "DUBAI ARCH TOWER"
        },
        {
        "value" : "CASCADES"
        },
        {
        "value" : "LINKS CANAL"
        },
        {
        "value" : "ZANZEBEEL 4"
        },
        {
        "value" : "FOX HILL 1"
        },
        {
        "value" : "SHERLOCK HOUSE 1"
        },
        {
        "value" : "LAKE TERRACE"
        },
        {
        "value" : "MISKA 4"
        },
        {
        "value" : "PANORAMIC"
        },
        {
        "value" : "SHAKESPEARE SIRCUS 2"
        },
        {
        "value" : "X23"
        },
        {
        "value" : "FOX HILL 5"
        },
        {
        "value" : "WIDCOMBE HOUSE 3"
        },
        {
        "value" : "NORTON COURT 3"
        },
        {
        "value" : "DICKENS CIRCUS 1"
        },
        {
        "value" : "NORTON COURT 2"
        },
        {
        "value" : "WIDCOMBE HOUSE 1"
        },
        {
        "value" : "BARTON HOUSE 1"
        },
        {
        "value" : "WIDCOMBE HOUSE 4"
        },
        {
        "value" : "REGENT HOUSE 2"
        },
        {
        "value" : "BLVD CENTRAL 2"
        },
        {
        "value" : "BARTON HOUSE 2"
        },
        {
        "value" : "DICKENS CIRCUS 2"
        },
        {
        "value" : "LAKE VIEW"
        },
        {
        "value" : "RESIDENCE 2 VILLAS"
        },
        {
        "value" : "SHERLOCK CIRCUS 1"
        },
        {
        "value" : "MARLOWE HOUSE 1"
        },
        {
        "value" : "SHAKESPEARE SIRCUS 3"
        },
        {
        "value" : "MISKA 5"
        },
        {
        "value" : "WIDCOMBE HOUSE 2"
        },
        {
        "value" : "FOX HILL 3"
        },
        {
        "value" : "DEC TOWERS T2"
        },
        {
        "value" : "TERRACE APARTMENT 2"
        },
        {
        "value" : "EMIRATES CROWN  R"
        },
        {
        "value" : "ARMADA  3"
        },
        {
        "value" : "SHERLOCK HOUSE 2"
        },
        {
        "value" : "CLAVERTON HOUSE 1"
        },
        {
        "value" : "NORTON COURT 4"
        },
        {
        "value" : "Q10"
        },
        {
        "value" : "NEWBRIDGE HILL 2"
        },
        {
        "value" : "FOX HILL 8"
        },
        {
        "value" : "DEC TOWERS T1"
        },
        {
        "value" : "TERRACE APARTMENT 3"
        },
        {
        "value" : "FOX HILL 7"
        },
        {
        "value" : "CLAVERTON HOUSE 2"
        },
        {
        "value" : "NEWBRIDGE HILL 3"
        },
        {
        "value" : "DICKENS CIRCUS 3"
        },
        {
        "value" : "EMIRATES CROWN TOWER"
        },
        {
        "value" : "SHAKESPEARE SIRCUS 1"
        },
        {
        "value" : "SHERLOCK CIRCUS 2"
        },
        {
        "value" : "FOX HILL 9"
        },
        {
        "value" : "RIVIERA DREAMS"
        },
        {
        "value" : "DANA 2"
        },
        {
        "value" : "NEWBRIDGE HILL 1"
        },
        {
        "value" : "ATTESSA X2"
        },
        {
        "value" : "REGENT HOUSE 1"
        },
        {
        "value" : "FOX HILL 4"
        },
        {
        "value" : "MARLOWE HOUSE 2"
        },
        {
        "value" : "FOX HILL 2"
        },
        {
        "value" : "EASTON COURT"
        },
        {
        "value" : "AL SEEF 1"
        },
        {
        "value" : "fairways lofts"
        },
        {
        "value" : "X09"
        },
        {
        "value" : "WESTON COURT 1"
        },
        {
        "value" : "ABBEY CRESCENT 2"
        },
        {
        "value" : "FOX HILL 6"
        },
        {
        "value" : "LIWA HEIGHTS"
        },
        {
        "value" : "SHERLOCK CIRCUS 3"
        },
        {
        "value" : "P27"
        },
        {
        "value" : "WESTON COURT 2"
        },
        {
        "value" : "TRAFALGAR"
        },
        {
        "value" : "Q02"
        },
        {
        "value" : "Tamweel Tower"
        },
        {
        "value" : "Q04"
        },
        {
        "value" : "ARMADA 1"
        },
        {
        "value" : "Avant"
        },
        {
        "value" : "THE ZEN TOWER"
        },
        {
        "value" : "ARMADA 2"
        },
        {
        "value" : "UNIVERSITY VIEW  B"
        },
        {
        "value" : "Q8"
        },
        {
        "value" : "F01"
        },
        {
        "value" : "MARINA PARK"
        },
        {
        "value" : "Oceanic"
        },
        {
        "value" : "TERRACE APARTMENT 1"
        },
        {
        "value" : "UNIVERSITY VIEW  C"
        },
        {
        "value" : "DORRA BAY"
        },
        {
        "value" : "TERRACE APARTMENT 4"
        },
        {
        "value" : "DEC TOWERS T3"
        },
        {
        "value" : "Burj Lake Hotel - The Address DownTown"
        },
        {
        "value" : "Spring"
        },
        {
        "value" : "Beauport X1"
        },
        {
        "value" : "Lakepoint N2"
        },
        {
        "value" : "AL SHERA"
        },
        {
        "value" : "Al Waleed Paradise"
        },
        {
        "value" : "SILICON STAR 1"
        },
        {
        "value" : "FORTUNE TOWER"
        },
        {
        "value" : "Paloma x3"
        },
        {
        "value" : "TIME PLACE TOWER"
        },
        {
        "value" : "UNIVERSITY VIEW - A"
        },
        {
        "value" : "HDS Tower"
        },
        {
        "value" : "Delphine W3"
        },
        {
        "value" : "CAYAN Business Center"
        },
        {
        "value" : "THE CRESCENT C"
        },
        {
        "value" : "Q03"
        },
        {
        "value" : "DIAMOND VIEWS 1"
        },
        {
        "value" : "THE CRESCENT  B"
        },
        {
        "value" : "DUBAI GATE ONE"
        },
        {
        "value" : "MED 105"
        },
        {
        "value" : "THE CRESCENT A"
        },
        {
        "value" : "Bonnington"
        },
        {
        "value" : "V3 TOWER"
        },
        {
        "value" : "P24"
        },
        {
        "value" : "EXECUTIVE HEIGHTS"
        },
        {
        "value" : "Q07"
        },
        {
        "value" : "GLOBAL GREEN VIEW"
        },
        {
        "value" : "SHEMARA W2"
        },
        {
        "value" : "Indigo Tower"
        },
        {
        "value" : "MED 59"
        },
        {
        "value" : "X19"
        },
        {
        "value" : "The Fairways West Tower"
        },
        {
        "value" : "Hub Canal 2"
        },
        {
        "value" : "The Fairways East Tower"
        },
        {
        "value" : "Ice Hockey Tower"
        },
        {
        "value" : "APRICOT"
        },
        {
        "value" : "Hub Canal 1"
        },
        {
        "value" : "Cricket Tower"
        },
        {
        "value" : "Riviera Residence"
        },
        {
        "value" : "OPAL TOWER"
        },
        {
        "value" : "The Fairways Loft Apts"
        },
        {
        "value" : "The Fairways North Tower"
        },
        {
        "value" : "canceled building"
        },
        {
        "value" : "DUNES"
        },
        {
        "value" : "Marina Apartments 2"
        },
        {
        "value" : "Tennis Tower"
        },
        {
        "value" : "Golf Tower"
        },
        {
        "value" : "Marina Apartments 1"
        },
        {
        "value" : "Marina Apartments 5"
        },
        {
        "value" : "PALACE TOWERS T1"
        },
        {
        "value" : "Indigo Icon"
        },
        {
        "value" : "Emaar Square Bldg 3"
        },
        {
        "value" : "WEST HEIGHTS 1"
        },
        {
        "value" : "WEST HEIGHTS 3"
        },
        {
        "value" : "PALACE TOWER T2"
        },
        {
        "value" : "REEF TOWER"
        },
        {
        "value" : "AL SAAHA"
        },
        {
        "value" : "EAST HEIGHTS 2"
        },
        {
        "value" : "WEST HEIGHTS 5"
        },
        {
        "value" : "Marina Apartments 6"
        },
        {
        "value" : "ASPECT TOWER"
        },
        {
        "value" : "MARINA PEARL"
        },
        {
        "value" : "Marina Apartments 4"
        },
        {
        "value" : "C14"
        },
        {
        "value" : "ICON TOWER"
        },
        {
        "value" : "DIAMOND VIEWS 2"
        },
        {
        "value" : "CANCELLED-Emaar Business Park Building 3"
        },
        {
        "value" : "Emaar Square Bldg 1"
        },
        {
        "value" : "Emaar Square Bldg 2"
        },
        {
        "value" : "Emaar Square Bldg 4"
        },
        {
        "value" : "LADY RATAN MANOR"
        },
        {
        "value" : "EMAAR TOWER 2"
        },
        {
        "value" : "EMAAR TOWER 1"
        },
        {
        "value" : "Z03"
        },
        {
        "value" : "Emaar Square Bldg 5"
        },
        {
        "value" : "Fortune Executive Tower"
        },
        {
        "value" : "ZUMURUD"
        },
        {
        "value" : "EAST HEIGHTS 4"
        },
        {
        "value" : "Marina Quay West"
        },
        {
        "value" : "Madison Residency"
        },
        {
        "value" : "Lakeshore Tower 1"
        },
        {
        "value" : "WEST HEIGHTS 4"
        },
        {
        "value" : "Marina Quay East"
        },
        {
        "value" : "ZEN2-020"
        },
        {
        "value" : "SOUTHERN"
        },
        {
        "value" : "Sapphire Residence"
        },
        {
        "value" : "PARK AVENUE"
        },
        {
        "value" : "PARK TERRACE"
        },
        {
        "value" : "GOLF VIEW RESIDENCE"
        },
        {
        "value" : "The Diamond"
        },
        {
        "value" : "DREAM TOWER"
        },
        {
        "value" : "AEGEAN"
        },
        {
        "value" : "BALTIC"
        },
        {
        "value" : "ADRIATIC"
        },
        {
        "value" : "ATLANTIC"
        },
        {
        "value" : "PACIFIC"
        },
        {
        "value" : "CARIBBEAN"
        },
        {
        "value" : "CRYSTAL TOWER"
        },
        {
        "value" : "Emirates Gardens 1 - G1"
        },
        {
        "value" : "Emirates Gardens 1 - G2"
        },
        {
        "value" : "Emirates Gardens 1 - R1"
        },
        {
        "value" : "Emirates Gardens 1 - R2"
        },
        {
        "value" : "Emirates Gardens 1-L1"
        },
        {
        "value" : "Emirates Gardens1 1 - L2"
        },
        {
        "value" : "Marina Quay North"
        },
        {
        "value" : "SILICON AVENUE"
        },
        {
        "value" : "ROYAL OCEANIC-1"
        },
        {
        "value" : "THE POINT TOWER"
        },
        {
        "value" : "THE PRISM"
        },
        {
        "value" : "LE GRAND CHATEAU"
        },
        {
        "value" : "EAST HEIGHTS 1"
        },
        {
        "value" : "PLAZA BOUTIQUE - 1"
        },
        {
        "value" : "PLAZA BOUTIQUE - 2"
        },
        {
        "value" : "PLAZA BOUTIQUE - 3"
        },
        {
        "value" : "PLAZA BOUTIQUE - 4"
        },
        {
        "value" : "PLAZA BOUTIQUE - 5"
        },
        {
        "value" : "PLAZA BOUTIQUE - 7"
        },
        {
        "value" : "PLAZA BOUTIQUE - 8"
        },
        {
        "value" : "PLAZA BOUTIQUE - 9"
        },
        {
        "value" : "PLAZA BOUTIQUE - 10"
        },
        {
        "value" : "PLAZA BOUTIQUE - 11"
        },
        {
        "value" : "PLAZA BOUTIQUE - 12"
        },
        {
        "value" : "PLAZA BOUTIQUE - 13"
        },
        {
        "value" : "PLAZA BOUTIQUE - 14"
        },
        {
        "value" : "PLAZA BOUTIQUE - 15"
        },
        {
        "value" : "PLAZA BOUTIQUE - 16"
        },
        {
        "value" : "PLAZA BOUTIQUE - 6"
        },
        {
        "value" : "Citadel Tower"
        },
        {
        "value" : "PALACE TOWERS T3"
        },
        {
        "value" : "THE IMPERIAL"
        },
        {
        "value" : "O14 Tower"
        },
        {
        "value" : "AQUAMARINE"
        },
        {
        "value" : "DIAMOND"
        },
        {
        "value" : "RUBY"
        },
        {
        "value" : "EMERALD"
        },
        {
        "value" : "TANZANITE"
        },
        {
        "value" : "CONCORDE TOWER 1"
        },
        {
        "value" : "BAYSIDE"
        },
        {
        "value" : "JUMAIRAH BAY TOWER-X2"
        },
        {
        "value" : "S.P.OASIS"
        },
        {
        "value" : "Goldcrest Views"
        },
        {
        "value" : "EMAAR BUSINESS PARK BLDG-2"
        },
        {
        "value" : "Bay Square - 01"
        },
        {
        "value" : "EMMAR BUSINESS PARK BLDG-4"
        },
        {
        "value" : "Bay Square - 03"
        },
        {
        "value" : "Tiffany Towers"
        },
        {
        "value" : "Bay Square - 04"
        },
        {
        "value" : "Bay Square - 08"
        },
        {
        "value" : "Bay Square - 09"
        },
        {
        "value" : "Bay Square - 10"
        },
        {
        "value" : "VISION TOWER - 1"
        },
        {
        "value" : "Armada Retail 5"
        },
        {
        "value" : "ARMADA RETAIL 6"
        },
        {
        "value" : "Dubai Marina Mall Hotel"
        },
        {
        "value" : "CLASSIC APARTMENT"
        },
        {
        "value" : "MAG218"
        },
        {
        "value" : "PALLADIUM"
        },
        {
        "value" : "Bay Square - 07"
        },
        {
        "value" : "MOSELA"
        },
        {
        "value" : "Sulafa Tower"
        },
        {
        "value" : "Lakeside"
        },
        {
        "value" : "Lakeside Retail"
        },
        {
        "value" : "PARK ISLAND BLAKELY"
        },
        {
        "value" : "Park Island Fairfield"
        },
        {
        "value" : "PARK ISLAND BONAIRE"
        },
        {
        "value" : "OCEAN HEIGHTS"
        },
        {
        "value" : "TWO TOWERS A"
        },
        {
        "value" : "TWO TOWERS B"
        },
        {
        "value" : "TNARO"
        },
        {
        "value" : "JUMAIRAH BAY TOWER-X1-1"
        },
        {
        "value" : "SOBHA DAFFODIL"
        },
        {
        "value" : "PARK ISLAND SANIBEL"
        },
        {
        "value" : "PARK ISLAND VILLAS 1"
        },
        {
        "value" : "PARK ISLAND VILLAS 2"
        },
        {
        "value" : "THE SCALA TOWER"
        },
        {
        "value" : "C1"
        },
        {
        "value" : "C2"
        },
        {
        "value" : "C3"
        },
        {
        "value" : "C4"
        },
        {
        "value" : "C5"
        },
        {
        "value" : "C6"
        },
        {
        "value" : "C7"
        },
        {
        "value" : "C8"
        },
        {
        "value" : "C9"
        },
        {
        "value" : "C10"
        },
        {
        "value" : "C11"
        },
        {
        "value" : "C12"
        },
        {
        "value" : "C13"
        },
        {
        "value" : "C17"
        },
        {
        "value" : "C18"
        },
        {
        "value" : "C19"
        },
        {
        "value" : "C20"
        },
        {
        "value" : "C21"
        },
        {
        "value" : "C22"
        },
        {
        "value" : "C23"
        },
        {
        "value" : "C24"
        },
        {
        "value" : "C25"
        },
        {
        "value" : "C26"
        },
        {
        "value" : "C27"
        },
        {
        "value" : "C28"
        },
        {
        "value" : "C30"
        },
        {
        "value" : "C31"
        },
        {
        "value" : "ICON 2"
        },
        {
        "value" : "JUMEIRA Business Center 2"
        },
        {
        "value" : "ICON 1"
        },
        {
        "value" : "SUNTECH TOWER"
        },
        {
        "value" : "SOBHA IVORY 1"
        },
        {
        "value" : "SOBHA IVORY 2"
        },
        {
        "value" : "BAYSWATER BAY BY OMNIYAT"
        },
        {
        "value" : "C32"
        },
        {
        "value" : "C33"
        },
        {
        "value" : "Silver Tower"
        },
        {
        "value" : "Gold Tower"
        },
        {
        "value" : "Smart Heights"
        },
        {
        "value" : "Three Towers A-1"
        },
        {
        "value" : "Three Towers B-2"
        },
        {
        "value" : "Three Towers C-3"
        },
        {
        "value" : "HAMILTON  RESIDENCY"
        },
        {
        "value" : "IRIS BLUE"
        },
        {
        "value" : "XL Tower"
        },
        {
        "value" : "C36"
        },
        {
        "value" : "Bay Square - 13"
        },
        {
        "value" : "Bay Square - 02"
        },
        {
        "value" : "Bay Square - 12"
        },
        {
        "value" : "Bay Square - 06"
        },
        {
        "value" : "Bay Square - 11"
        },
        {
        "value" : "WEST HEIGHTS 2"
        },
        {
        "value" : "OLYMPIC PARK 1"
        },
        {
        "value" : "OLYMPIC PARK 4"
        },
        {
        "value" : "Business Tower"
        },
        {
        "value" : "LAGO VISTA-A"
        },
        {
        "value" : "LAGO VISTA-C"
        },
        {
        "value" : "LAGO VISTA-B"
        },
        {
        "value" : "ONTARIO TOWER"
        },
        {
        "value" : "C34"
        },
        {
        "value" : "C35"
        },
        {
        "value" : "C37"
        },
        {
        "value" : "C38"
        },
        {
        "value" : "C39"
        },
        {
        "value" : "C40"
        },
        {
        "value" : "C41"
        },
        {
        "value" : "C42"
        },
        {
        "value" : "C43"
        },
        {
        "value" : "C44"
        },
        {
        "value" : "C45"
        },
        {
        "value" : "C46"
        },
        {
        "value" : "C47"
        },
        {
        "value" : "C48"
        },
        {
        "value" : "C49"
        },
        {
        "value" : "C50"
        },
        {
        "value" : "C51"
        },
        {
        "value" : "C52"
        },
        {
        "value" : "C53"
        },
        {
        "value" : "C54"
        },
        {
        "value" : "C55"
        },
        {
        "value" : "C56"
        },
        {
        "value" : "C57"
        },
        {
        "value" : "C58"
        },
        {
        "value" : "C59"
        },
        {
        "value" : "C60"
        },
        {
        "value" : "C61"
        },
        {
        "value" : "C62"
        },
        {
        "value" : "C63"
        },
        {
        "value" : "C64"
        },
        {
        "value" : "C65"
        },
        {
        "value" : "C66"
        },
        {
        "value" : "C67"
        },
        {
        "value" : "C68"
        },
        {
        "value" : "C69"
        },
        {
        "value" : "C70"
        },
        {
        "value" : "C71"
        },
        {
        "value" : "C72"
        },
        {
        "value" : "C73"
        },
        {
        "value" : "C74"
        },
        {
        "value" : "AL JAWZAA- B"
        },
        {
        "value" : "C75"
        },
        {
        "value" : "C76"
        },
        {
        "value" : "C77"
        },
        {
        "value" : "C78"
        },
        {
        "value" : "C79"
        },
        {
        "value" : "C80"
        },
        {
        "value" : "C29"
        },
        {
        "value" : "AL JAWZAA- A"
        },
        {
        "value" : "Burj khalifa Corporate Suites"
        },
        {
        "value" : "Al NOUJOUM TOWER"
        },
        {
        "value" : "Skycourts Tower A"
        },
        {
        "value" : "Skycourts Tower B"
        },
        {
        "value" : "Skycourts Tower C"
        },
        {
        "value" : "Skycourts Tower D"
        },
        {
        "value" : "Skycourts Tower E"
        },
        {
        "value" : "Skycourts Tower F"
        },
        {
        "value" : "MAYFAIR TOWER"
        },
        {
        "value" : "GROSVENOR BUSINESS BAY TOWER"
        },
        {
        "value" : "MAYFAIR  RESIDENCY"
        },
        {
        "value" : "Marina Wharf 1"
        },
        {
        "value" : "AXIS RESIDENCES 8"
        },
        {
        "value" : "AXIS RESIDENCES 3"
        },
        {
        "value" : "AXIS RESIDENCES 4"
        },
        {
        "value" : "AXIS RESIDENCES 5"
        },
        {
        "value" : "PRIME BUSINESS CENTER A"
        },
        {
        "value" : "PRIME BUSINESS CENTER B"
        },
        {
        "value" : "APEX ATRIUM"
        },
        {
        "value" : "WINDSOR MANOR"
        },
        {
        "value" : "Dubai Marina Quays Villas3"
        },
        {
        "value" : "Dubai Marina Quays Villas2"
        },
        {
        "value" : "Dubai Marina Quays Villas1"
        },
        {
        "value" : "CLAYTON RESIDENCY"
        },
        {
        "value" : "U-BORA TOWER 1"
        },
        {
        "value" : "Swiss Tower"
        },
        {
        "value" : "J & G  BUILDING 1"
        },
        {
        "value" : "J & G  BUILDING 2"
        },
        {
        "value" : "J & G  BUILDING 3"
        },
        {
        "value" : "Jumeirah Business Center 5"
        },
        {
        "value" : "JUMAIRAH BAY TOWER-X3"
        },
        {
        "value" : "AL BADIA RESIDENCES BUILDINGS 3"
        },
        {
        "value" : "GLOBAL LAKE VIEW"
        },
        {
        "value" : "THE METROPOLIS"
        },
        {
        "value" : "AL BADIA RESIDENCES BUILDINGS 11"
        },
        {
        "value" : "AL BADIA RESIDENCES BUILDINGS 8"
        },
        {
        "value" : "AL BADIA RESIDENCES BUILDINGS 10"
        },
        {
        "value" : "SEVANAM CROWN"
        },
        {
        "value" : "WEST HEIGHTS 6"
        },
        {
        "value" : "RITZ RESIDENCE"
        },
        {
        "value" : "Torch Tower"
        },
        {
        "value" : "RITAJ H"
        },
        {
        "value" : "RITAJ G"
        },
        {
        "value" : "RITAJ  F"
        },
        {
        "value" : "RITAJ  A"
        },
        {
        "value" : "THE DUBAI MALL"
        },
        {
        "value" : "Silicon Heights"
        },
        {
        "value" : "TUSCAN RESIDENCES1-AREZZO 1"
        },
        {
        "value" : "TUSCAN RESIDENCES1-AREZZO 2"
        },
        {
        "value" : "TUSCAN RESIDENCES 1 - FLORENCE 1"
        },
        {
        "value" : "TUSCAN RESIDENCES1-FLORENCE 2"
        },
        {
        "value" : "TUSCAN RESIDENCES1 -Siena 1"
        },
        {
        "value" : "TUSCAN RESIDENCES1- Siena 2"
        },
        {
        "value" : "REGAL TOWER"
        },
        {
        "value" : "Elite Residence 1"
        },
        {
        "value" : "AXIS RESIDENCES ONE 1"
        },
        {
        "value" : "AXIS RESIDENCES ONE  2"
        },
        {
        "value" : "AXIS RESIDENCES ONE 3"
        },
        {
        "value" : "AXIS RESIDENCES ONE 4"
        },
        {
        "value" : "Al Badia Hillside 1"
        },
        {
        "value" : "Al Badia Hillside 2"
        },
        {
        "value" : "Al Badia Hillside 3"
        },
        {
        "value" : "Al Badia Hillside 4"
        },
        {
        "value" : "Al Badia Hillside 5"
        },
        {
        "value" : "Al Badia Hillside 6"
        },
        {
        "value" : "Al Badia Hillside 7"
        },
        {
        "value" : "Clover Bay"
        },
        {
        "value" : "GoldCrest Executive"
        },
        {
        "value" : "Prime Residence 1"
        },
        {
        "value" : "Prime Residence 2"
        },
        {
        "value" : "Diamond Business Center 1 -A"
        },
        {
        "value" : "KEMPINSKI RESIDENCES"
        },
        {
        "value" : "Diamond Business Center 1 -B"
        },
        {
        "value" : "Diamond Business Center 1 -C"
        },
        {
        "value" : "Churchill Tower 1-Commercial"
        },
        {
        "value" : "Churchill Tower 2-Residential"
        },
        {
        "value" : "AL THAMAM 1"
        },
        {
        "value" : "AL THAMAM  2"
        },
        {
        "value" : "AL THAMAM 63"
        },
        {
        "value" : "AL THAMAM 61"
        },
        {
        "value" : "AL THAMAM  4"
        },
        {
        "value" : "ONE BUSINESS BAY BY OMNIYAT"
        },
        {
        "value" : "SOBHA SAPPHIRE"
        },
        {
        "value" : "Marsa Plaza"
        },
        {
        "value" : "Emirates Garden II - Mulberry 1"
        },
        {
        "value" : "JADE RESIDENCE"
        },
        {
        "value" : "GOLDCREST VIEWS 2"
        },
        {
        "value" : "Port Saeed A-1"
        },
        {
        "value" : "Port Saeed B-2"
        },
        {
        "value" : "Massakin Block A"
        },
        {
        "value" : "Massakin Block B"
        },
        {
        "value" : "Massakin Block E"
        },
        {
        "value" : "Massakin Block C"
        },
        {
        "value" : "Massakin Block D"
        },
        {
        "value" : "Massakin Block F"
        },
        {
        "value" : "Massakin Block G"
        },
        {
        "value" : "Emirates Garden II - Maple 2"
        },
        {
        "value" : "Emirates Garden II - Magnolia 2"
        },
        {
        "value" : "Emirates Garden II - Magnolia 1"
        },
        {
        "value" : "Emirates Garden II - Mulberry 2"
        },
        {
        "value" : "CORAL RESIDENCE"
        },
        {
        "value" : "Emirates Garden II - Maple 1"
        },
        {
        "value" : "Orra Marina"
        },
        {
        "value" : "AL ALKA 1"
        },
        {
        "value" : "La Fontana Di Trevi"
        },
        {
        "value" : "ALMAS TOWER"
        },
        {
        "value" : "AL THAMAM 5"
        },
        {
        "value" : "AL THAMAM 7"
        },
        {
        "value" : "AL THAMAM 9"
        },
        {
        "value" : "AL THAMAM 11"
        },
        {
        "value" : "AL THAMAM 30"
        },
        {
        "value" : "AL THAMAM 41"
        },
        {
        "value" : "AL THAMAM 43"
        },
        {
        "value" : "AL THAMAM 45"
        },
        {
        "value" : "AL THAMAM 59"
        },
        {
        "value" : "MAZAYA BUSINESS AVENUE AA1"
        },
        {
        "value" : "MAZAYA BUSINESS AVENUE BB2"
        },
        {
        "value" : "LATIFA TOWER"
        },
        {
        "value" : "MAZAYA BUSINESS AVENUE BB1"
        },
        {
        "value" : "THE DUBAI MALL RESIDENCES"
        },
        {
        "value" : "51 @ Business Bay"
        },
        {
        "value" : "AL RAMTH 53"
        },
        {
        "value" : "AL RAMTH 55"
        },
        {
        "value" : "AL RAMTH 59"
        },
        {
        "value" : "AL RAMTH 57"
        },
        {
        "value" : "AL RAMTH 3,"
        },
        {
        "value" : "AL RAMTH 33"
        },
        {
        "value" : "AL RAMTH 1"
        },
        {
        "value" : "AL RAMTH 35"
        },
        {
        "value" : "AL THAMAM 10"
        },
        {
        "value" : "OASIS STAR"
        },
        {
        "value" : "AL THAMAM 16"
        },
        {
        "value" : "AL RAMTH 47"
        },
        {
        "value" : "AL THAMAM 12"
        },
        {
        "value" : "BOTANICA TOWER-1"
        },
        {
        "value" : "OASIS HIGH PARK"
        },
        {
        "value" : "ALRAMTH 21"
        },
        {
        "value" : "ALRAMTH 23"
        },
        {
        "value" : "ALRAMTH 67"
        },
        {
        "value" : "ALRAMTH 65"
        },
        {
        "value" : "ALRAMTH 45"
        },
        {
        "value" : "ALRAMTH 43"
        },
        {
        "value" : "ALRAMTH 41"
        },
        {
        "value" : "ALRAMTH 39"
        },
        {
        "value" : "ALRAMTH 37"
        },
        {
        "value" : "ALRAMTH 26"
        },
        {
        "value" : "ALRAMTH 28"
        },
        {
        "value" : "PRINCESS TOWER"
        },
        {
        "value" : "DIC-HQ-Bldg-1"
        },
        {
        "value" : "Marina Pinnacle"
        },
        {
        "value" : "CONTROL TOWER"
        },
        {
        "value" : "ELITE RESIDENCE"
        },
        {
        "value" : "TRIDENT GRAND RESIDENCE"
        },
        {
        "value" : "GRANDSTAND RETAIL"
        },
        {
        "value" : "The Manhattan"
        },
        {
        "value" : "HAMZA TOWER"
        },
        {
        "value" : "AL THAMAM 13"
        },
        {
        "value" : "AL THAMAM 15"
        },
        {
        "value" : "AL THAMAM 8"
        },
        {
        "value" : "AL THAMAM 57"
        },
        {
        "value" : "AL THAMAM 55"
        },
        {
        "value" : "AL THAMAM 53"
        },
        {
        "value" : "AL THAMAM 51"
        },
        {
        "value" : "AL THAMAM 49"
        },
        {
        "value" : "AL THAMAM 47"
        },
        {
        "value" : "AL THAMAM 18"
        },
        {
        "value" : "AL THAMAM 20"
        },
        {
        "value" : "AL THAMAM 22"
        },
        {
        "value" : "AL THAMAM 24"
        },
        {
        "value" : "AL THAMAM 26"
        },
        {
        "value" : "AL THAMAM 28"
        },
        {
        "value" : "AL THAMAM 32"
        },
        {
        "value" : "AL THAMAM 14"
        },
        {
        "value" : "RITAJ E"
        },
        {
        "value" : "S.I.T Tower"
        },
        {
        "value" : "AL THAMAM 6"
        },
        {
        "value" : "SANDOVAL GARDEN APARTMENTS 1"
        },
        {
        "value" : "Bahar 2"
        },
        {
        "value" : "DUNES 13"
        },
        {
        "value" : "HDS SUNSTAR"
        },
        {
        "value" : "Silverene Towers A"
        },
        {
        "value" : "Silverene Towers B"
        },
        {
        "value" : "AXIS RESIDENCE 2"
        },
        {
        "value" : "JHCWA"
        },
        {
        "value" : "JHCWB"
        },
        {
        "value" : "JHCWC"
        },
        {
        "value" : "Cordoba Palace"
        },
        {
        "value" : "IC1-EMR-19"
        },
        {
        "value" : "O2 Residences"
        },
        {
        "value" : "INTERNATIONAL BUSINESS TOWER"
        },
        {
        "value" : "IC1-EMR-01"
        },
        {
        "value" : "IC1-EMR-02"
        },
        {
        "value" : "IC1-EMR-03"
        },
        {
        "value" : "IC1-EMR-04"
        },
        {
        "value" : "IC1-EMR-05"
        },
        {
        "value" : "IC1-EMR-06"
        },
        {
        "value" : "IC1-EMR-07"
        },
        {
        "value" : "IC1-EMR-25"
        },
        {
        "value" : "IC1-EMR-13"
        },
        {
        "value" : "IC1-EMR-16"
        },
        {
        "value" : "23 MARINA"
        },
        {
        "value" : "IC1-EMR-08"
        },
        {
        "value" : "IC1-EMR-09"
        },
        {
        "value" : "IC1-EMR-10"
        },
        {
        "value" : "IC1-EMR-11"
        },
        {
        "value" : "IC1-EMR-12"
        },
        {
        "value" : "IC1-EMR-14"
        },
        {
        "value" : "IC1-EMR-15"
        },
        {
        "value" : "IC1-EMR-17"
        },
        {
        "value" : "IC1-EMR-20"
        },
        {
        "value" : "IC1-EMR-21"
        },
        {
        "value" : "IC1-EMR-22"
        },
        {
        "value" : "IC1-EMR-23"
        },
        {
        "value" : "IC1-EMR-24"
        },
        {
        "value" : "IC1-EMR-26"
        },
        {
        "value" : "IC1-EMR-18"
        },
        {
        "value" : "HDS BUSINESS CENTRE"
        },
        {
        "value" : "AMBER"
        },
        {
        "value" : "SAPPHIRE"
        },
        {
        "value" : "JHCED"
        },
        {
        "value" : "JHCEE"
        },
        {
        "value" : "JHCEF"
        },
        {
        "value" : "BAY CENTRAL 1"
        },
        {
        "value" : "BAY CENTRAL 2"
        },
        {
        "value" : "BAY CENTRAL 3"
        },
        {
        "value" : "AXIS RESIDENCES 6"
        },
        {
        "value" : "SANDOVAL GARDEN APARTMENTS 2"
        },
        {
        "value" : "AL THAMAM 3"
        },
        {
        "value" : "Lake Central"
        },
        {
        "value" : "3 Jumeirah Business Center"
        },
        {
        "value" : "ELITE RESIDENCES 2"
        },
        {
        "value" : "ZENITH TOWER"
        },
        {
        "value" : "MARINA TOWER"
        },
        {
        "value" : "AL MANARA"
        },
        {
        "value" : "Oakwood Residency"
        },
        {
        "value" : "CONTROL TOWER - RETAIL"
        },
        {
        "value" : "MARINA PROMENADE RETAIL"
        },
        {
        "value" : "W-PODIUM"
        },
        {
        "value" : "SOUTH RIDGE - PODIUM VILLAS EAST"
        },
        {
        "value" : "SOUTH RIDGE - PODIUM VILLAS WEST"
        },
        {
        "value" : "SOUTH WEST APARTMENTS 1"
        },
        {
        "value" : "SOUTH WEST APARTMENTS 2"
        },
        {
        "value" : "SOUTH WEST APARTMENTS 3"
        },
        {
        "value" : "SOUTH WEST APARTMENTS 4"
        },
        {
        "value" : "SOUTH WEST APARTMENTS 5"
        },
        {
        "value" : "SOUTH WEST APARTMENTS 6"
        },
        {
        "value" : "SOUTH WEST APARTMENTS 7"
        },
        {
        "value" : "SOUTH WEST APARTMENTS 8"
        },
        {
        "value" : "GARDEN APARTMENTS WEST I"
        },
        {
        "value" : "GARDEN APARTMENTS WEST A"
        },
        {
        "value" : "GARDEN APARTMENTS WEST B"
        },
        {
        "value" : "GARDEN APARTMENTS WEST C"
        },
        {
        "value" : "GARDEN APARTMENTS WEST D"
        },
        {
        "value" : "GARDEN APARTMENTS WEST E"
        },
        {
        "value" : "GARDEN APARTMENTS WEST G"
        },
        {
        "value" : "GARDEN APARTMENTS WEST H"
        },
        {
        "value" : "GARDEN APARTMENTS WEST J"
        },
        {
        "value" : "GARDEN APARTMENTS WEST F"
        },
        {
        "value" : "GARDEN APARTMENTS EAST A"
        },
        {
        "value" : "THE RESIDENCES NORTH"
        },
        {
        "value" : "THE RESIDENCES SOUTH"
        },
        {
        "value" : "EAST HEIGHTS 3"
        },
        {
        "value" : "OLYMPIC PARK 2"
        },
        {
        "value" : "MARINA PROMENAD-X PODIUM"
        },
        {
        "value" : "Armani Residences"
        },
        {
        "value" : "GREEN COMMUNITY RETAIL"
        },
        {
        "value" : "I RISE TOWER"
        },
        {
        "value" : "DETROIT HOUSE"
        },
        {
        "value" : "PLATINUM TOWER"
        },
        {
        "value" : "THE OBEROI HOTEL"
        },
        {
        "value" : "THE OBEROI CENTRE"
        },
        {
        "value" : "GARDEN APARTMENTS EAST B"
        },
        {
        "value" : "GARDEN APARTMENTS EAST C"
        },
        {
        "value" : "GARDEN APARTMENTS EAST D"
        },
        {
        "value" : "GARDEN APARTMENTS EAST E"
        },
        {
        "value" : "GARDEN APARTMENTS EAST F"
        },
        {
        "value" : "GARDEN APARTMENTS EAST G"
        },
        {
        "value" : "GARDEN APARTMENTS EAST H"
        },
        {
        "value" : "GARDEN APARTMENTS EAST I"
        },
        {
        "value" : "NORTH WEST APARTMENTS 1"
        },
        {
        "value" : "NORTH WEST APARTMENTS 2"
        },
        {
        "value" : "NORTH WEST APARTMENTS 3"
        },
        {
        "value" : "NORTH WEST APARTMENTS 4"
        },
        {
        "value" : "NORTH WEST APARTMENTS 5"
        },
        {
        "value" : "NORTH WEST APARTMENTS 6"
        },
        {
        "value" : "NORTH WEST APARTMENTS 7"
        },
        {
        "value" : "NORTH WEST APARTMENTS 8"
        },
        {
        "value" : "LAKE APARTMENT"
        },
        {
        "value" : "Marina Plaza"
        },
        {
        "value" : "BLVD PLAZA T1"
        },
        {
        "value" : "U-BORA TOWER 3"
        },
        {
        "value" : "U-BORA TOWER 4"
        },
        {
        "value" : "Dream Palm Residence"
        },
        {
        "value" : "DUNES 16"
        },
        {
        "value" : "Park Corner"
        },
        {
        "value" : "Elite Residences 4"
        },
        {
        "value" : "THE RESIDENCES AT BUSINESS CENTRAL"
        },
        {
        "value" : "Trafalgar Central"
        },
        {
        "value" : "Trafalgar Executive"
        },
        {
        "value" : "GRAND CENTRAL"
        },
        {
        "value" : "The Spirit"
        },
        {
        "value" : "AL BATEEN RESIDENCES AT JBR"
        },
        {
        "value" : "WAREHOUSE  A"
        },
        {
        "value" : "MEDITERRANEAN"
        },
        {
        "value" : "WAREHOUSE  B"
        },
        {
        "value" : "WAREHOUSE  C"
        },
        {
        "value" : "WAREHOUSE  D"
        },
        {
        "value" : "WAREHOUSE E"
        },
        {
        "value" : "WAREHOUSE  F"
        },
        {
        "value" : "WAREHOUSE  G"
        },
        {
        "value" : "WAREHOUSE  H"
        },
        {
        "value" : "WAREHOUSE  I"
        },
        {
        "value" : "WAREHOUSE  J"
        },
        {
        "value" : "WAREHOUSE  K"
        },
        {
        "value" : "EUROPEAN"
        },
        {
        "value" : "VENETIAN"
        },
        {
        "value" : "FAIRMONT THE PALM"
        },
        {
        "value" : "Ruby Residence"
        },
        {
        "value" : "BLVD CENTRAL PODIUM"
        },
        {
        "value" : "The Dome"
        },
        {
        "value" : "JBC4"
        },
        {
        "value" : "GRANDUER RESIDENCES-MAURYA"
        },
        {
        "value" : "GRANDUER RESIDENCES-MUGHAL"
        },
        {
        "value" : "CLAREN TOWER 1"
        },
        {
        "value" : "CLAREN TOWER 2"
        },
        {
        "value" : "Claren PD"
        },
        {
        "value" : "OLYMPIC PARK 3"
        },
        {
        "value" : "SUMMER 1"
        },
        {
        "value" : "Axis Residences 7"
        },
        {
        "value" : "SUMMER 2"
        },
        {
        "value" : "AUTUMN 2"
        },
        {
        "value" : "ROYAL AMWAJ RESIDENCES NORTH"
        },
        {
        "value" : "ROYAL AMWAJ RESIDENCES SOUTH"
        },
        {
        "value" : "JUMEIRAH BUSINESS CENTRE 1"
        },
        {
        "value" : "BD Standpoint B"
        },
        {
        "value" : "BD Standpoint A"
        },
        {
        "value" : "HDS SUNSTAR 2"
        },
        {
        "value" : "Elite Residences 6"
        },
        {
        "value" : "EMPIRE HEIGHTS B"
        },
        {
        "value" : "La Vista 2"
        },
        {
        "value" : "BD 29 BLVD T2"
        },
        {
        "value" : "BD 29 BLVD PODIUM"
        },
        {
        "value" : "THE SIGNATURE"
        },
        {
        "value" : "SUBURBIA A"
        },
        {
        "value" : "SUBURBIA B"
        },
        {
        "value" : "SUBURBIA Podium"
        },
        {
        "value" : "CAYAN TOWER"
        },
        {
        "value" : "Metro Central"
        },
        {
        "value" : "BD BLVD Plaza T2"
        },
        {
        "value" : "Oxford Tower"
        },
        {
        "value" : "EMPIRE HEIGHTS A"
        },
        {
        "value" : "EMPIRE HEIGHTS PODIUM"
        },
        {
        "value" : "TALA 1"
        },
        {
        "value" : "MADISON COLUMBUS"
        },
        {
        "value" : "MADISON ASTOR"
        },
        {
        "value" : "BURLINGTON TOWER"
        },
        {
        "value" : "Elite Residences 3"
        },
        {
        "value" : "AUTUMN 1"
        },
        {
        "value" : "DURAR 1A"
        },
        {
        "value" : "Dana Tower"
        },
        {
        "value" : "THE BRIDGE"
        },
        {
        "value" : "Park Central"
        },
        {
        "value" : "Green Park"
        },
        {
        "value" : "Plaza Residences 1"
        },
        {
        "value" : "DUNES 10"
        },
        {
        "value" : "Mazaya 23"
        },
        {
        "value" : "CAPPADOCIA"
        },
        {
        "value" : "MAZAYA 25"
        },
        {
        "value" : "SHAMS"
        },
        {
        "value" : "Courtyard Residence 1"
        },
        {
        "value" : "COURTYARD RESIDENCE 2"
        },
        {
        "value" : "GATE APARTMENTS"
        },
        {
        "value" : "TERRACED APARTMENTS"
        },
        {
        "value" : "GARDEN APARTMENTS"
        },
        {
        "value" : "Elite 5 Sports Residence"
        },
        {
        "value" : "UPTOWN MIRDIF RETAIL"
        },
        {
        "value" : "ATLANTIC TOWER 1"
        },
        {
        "value" : "ATLANTIC TOWER 2"
        },
        {
        "value" : "SILICON GATE 3"
        },
        {
        "value" : "Mazaya 20"
        },
        {
        "value" : "MAZAYA 13"
        },
        {
        "value" : "MAZAYA 30"
        },
        {
        "value" : "MAZAYA 27"
        },
        {
        "value" : "MAZAYA 28"
        },
        {
        "value" : "MAZAYA 29"
        },
        {
        "value" : "RITAJ K"
        },
        {
        "value" : "Mazaya 12"
        },
        {
        "value" : "MAZAYA 31"
        },
        {
        "value" : "TALA 2"
        },
        {
        "value" : "Mazaya 1"
        },
        {
        "value" : "DIAMOND VIEWS 4"
        },
        {
        "value" : "Mazaya 4"
        },
        {
        "value" : "WATER'S EDGE"
        },
        {
        "value" : "Mazaya 10 - A"
        },
        {
        "value" : "Mazaya 10 - B"
        },
        {
        "value" : "GHANIMA"
        },
        {
        "value" : "THE MEDALIST"
        },
        {
        "value" : "PHOENIX TOWER"
        },
        {
        "value" : "Executive Bay-A"
        },
        {
        "value" : "Executive Bay-B"
        },
        {
        "value" : "Executive Bay-P"
        },
        {
        "value" : "Elite Residences 7"
        },
        {
        "value" : "La Vista 1"
        },
        {
        "value" : "FAIRVIEW"
        },
        {
        "value" : "AL MURAD TOWERS"
        },
        {
        "value" : "Monaco Residency"
        },
        {
        "value" : "Choithrams"
        },
        {
        "value" : "La Vista 6"
        },
        {
        "value" : "SILICON GATES 1"
        },
        {
        "value" : "GOLDEN MILE 1"
        },
        {
        "value" : "GOLDEN MILE 2"
        },
        {
        "value" : "GOLDEN MILE 3"
        },
        {
        "value" : "GOLDEN MILE 4"
        },
        {
        "value" : "GOLDEN MILE 5"
        },
        {
        "value" : "GOLDEN MILE 6"
        },
        {
        "value" : "Mazaya 24"
        },
        {
        "value" : "DIAMOND BUSINESS CENTER 2"
        },
        {
        "value" : "Bahia 2"
        },
        {
        "value" : "IMPERIAL RESIDENCE 1"
        },
        {
        "value" : "IMPERIAL RESIDENCE 2"
        },
        {
        "value" : "IMPERIAL RESIDENCE PODIUM"
        },
        {
        "value" : "Avenue Residence 1"
        },
        {
        "value" : "SOLITAIRE CASCADES"
        },
        {
        "value" : "Mazaya 15"
        },
        {
        "value" : "Farah tower 1"
        },
        {
        "value" : "Mazaya 22"
        },
        {
        "value" : "THE VOGUE"
        },
        {
        "value" : "The Cosmopolitan"
        },
        {
        "value" : "Lincoln Park- Sheffield"
        },
        {
        "value" : "Lincoln Park B"
        },
        {
        "value" : "Lincoln Park -West Side"
        },
        {
        "value" : "Lincoln Park A"
        },
        {
        "value" : "WEST AVENUE"
        },
        {
        "value" : "LARIVIERA  ESTATE-A"
        },
        {
        "value" : "LARIVIERA  ESTATE-B"
        },
        {
        "value" : "Lincoln Park-North Side"
        },
        {
        "value" : "Platinum One"
        },
        {
        "value" : "The Matrix"
        },
        {
        "value" : "NOORA RESIDENCE"
        },
        {
        "value" : "Capital Bay A"
        },
        {
        "value" : "Capital Bay B"
        },
        {
        "value" : "Capital Bay Podium"
        },
        {
        "value" : "RUFI GARDENS"
        },
        {
        "value" : "AMNA"
        },
        {
        "value" : "Light Industrial Units-7"
        },
        {
        "value" : "Al Yarmouk"
        },
        {
        "value" : "DIAMOND VIEWS 3"
        },
        {
        "value" : "8WD"
        },
        {
        "value" : "CENTRIUM TOWER 1"
        },
        {
        "value" : "CENTRIUM TOWER 2"
        },
        {
        "value" : "CENTRIUM TOWER 3"
        },
        {
        "value" : "CENTRIUM TOWER 4"
        },
        {
        "value" : "West Wharf"
        },
        {
        "value" : "Fortunato 1"
        },
        {
        "value" : "LAKESIDE A"
        },
        {
        "value" : "LAKESIDE B"
        },
        {
        "value" : "LAKESIDE C"
        },
        {
        "value" : "LAKESIDE D"
        },
        {
        "value" : "LAKESIDE P"
        },
        {
        "value" : "Daytona House"
        },
        {
        "value" : "LAGUNA TOWER"
        },
        {
        "value" : "MASAAR RESIDENCES"
        },
        {
        "value" : "GR PANORAMA"
        },
        {
        "value" : "The Light 1"
        },
        {
        "value" : "SILVER STALLIONS TOWER 2"
        },
        {
        "value" : "SILVER STALLIONS TOWER 1"
        },
        {
        "value" : "UNIVERSAL TOWER"
        },
        {
        "value" : "Desert Rose B"
        },
        {
        "value" : "Desert Rose A"
        },
        {
        "value" : "Iris Mist"
        },
        {
        "value" : "D25"
        },
        {
        "value" : "D26"
        },
        {
        "value" : "E24"
        },
        {
        "value" : "E27"
        },
        {
        "value" : "THE EXCHANGE TOWER"
        },
        {
        "value" : "OLYMPIC PARK 6"
        },
        {
        "value" : "KENSINGTON ROYALE"
        },
        {
        "value" : "CHAMPIONS TOWER 1"
        },
        {
        "value" : "Judi Palace 2"
        },
        {
        "value" : "Judi Palace 1"
        },
        {
        "value" : "JOURI-2 Block A"
        },
        {
        "value" : "Jouri-2 Block B"
        },
        {
        "value" : "Jouri-2 Block C"
        },
        {
        "value" : "VIDA RESIDENCE DOWNTOWN"
        },
        {
        "value" : "BLVD CRESCENT Tower 1"
        },
        {
        "value" : "BLVD CRESCENT Tower 2"
        },
        {
        "value" : "DONNA TOWER"
        },
        {
        "value" : "Donna Towers OFICCES"
        },
        {
        "value" : "SANALI BUSINESS TOWER"
        },
        {
        "value" : "TOWER A3"
        },
        {
        "value" : "Golf Promenade 2 - A"
        },
        {
        "value" : "Golf Promenade 2 - B"
        },
        {
        "value" : "Golf Promenade 3 - B"
        },
        {
        "value" : "Golf Promenade 3 - A"
        },
        {
        "value" : "VILLA PERA"
        },
        {
        "value" : "REEF RESIDENCE"
        },
        {
        "value" : "AZURE RESIDENCES"
        },
        {
        "value" : "DAMAC HEIGHTS"
        },
        {
        "value" : "Burj Al Fara'a"
        },
        {
        "value" : "BORIS BEEKER"
        },
        {
        "value" : "SAMI Q TOWER"
        },
        {
        "value" : "SHAMAL RESIDENCES 2"
        },
        {
        "value" : "IVORY TOWER"
        },
        {
        "value" : "Muraba Residences Palm Jumeirah"
        },
        {
        "value" : "VANCOUVER"
        },
        {
        "value" : "SANALI BUSINESS HIGHT"
        },
        {
        "value" : "CORPORATE TOWER"
        },
        {
        "value" : "UNIESTATE MILLENNIUM TOWER"
        },
        {
        "value" : "GLOBAL GREEN VIEW-3"
        },
        {
        "value" : "MOON TOWER 2"
        },
        {
        "value" : "CHAMPIONS TOWER 4"
        },
        {
        "value" : "BAYS EDGE"
        },
        {
        "value" : "EDEN GARDEN"
        },
        {
        "value" : "MAJESTINE"
        },
        {
        "value" : "MAZAYA 6"
        },
        {
        "value" : "THE ANWA BY OMNIYAT"
        },
        {
        "value" : "cambridge business centre"
        },
        {
        "value" : "THE CONCOURSE 1 B"
        },
        {
        "value" : "MON REVE"
        },
        {
        "value" : "CORPORATE BAY"
        },
        {
        "value" : "EDEN BLUE"
        },
        {
        "value" : "DAMAC HILLS - JASMINE A"
        },
        {
        "value" : "DAMAC HILLS - JASMINE B"
        },
        {
        "value" : "The K Hotel"
        },
        {
        "value" : "ESCAN TOWER"
        },
        {
        "value" : "RUFI PRIME VIEW"
        },
        {
        "value" : "PHOENIX WINGS"
        },
        {
        "value" : "VUE DU LAC"
        },
        {
        "value" : "PENTOMINIUM TOWER A"
        },
        {
        "value" : "PENTOMINIUM TOWER B"
        },
        {
        "value" : "RUFI GOLF GREEN"
        },
        {
        "value" : "VENETIAN ARABIA"
        },
        {
        "value" : "LES VERTES"
        },
        {
        "value" : "LE PRESIDIUM TOWER 2"
        },
        {
        "value" : "PLATINUM RESIDENCE 2"
        },
        {
        "value" : "TENORA"
        },
        {
        "value" : "Boulevard Point"
        },
        {
        "value" : "RUFI GRAND APARTMENTS"
        },
        {
        "value" : "M S GREENS"
        },
        {
        "value" : "Wave Residence 2"
        },
        {
        "value" : "INDIGO OPTIMA 2"
        },
        {
        "value" : "Al Qurashi"
        },
        {
        "value" : "GREEN COURT A"
        },
        {
        "value" : "GREEN COURT B"
        },
        {
        "value" : "Azizi.Iris"
        },
        {
        "value" : "MAYFIELD GARDENS"
        },
        {
        "value" : "PISA RESIDENCE TOWER"
        },
        {
        "value" : "Hilliana Tower"
        },
        {
        "value" : "Reliance 2"
        },
        {
        "value" : "VILLA CARIA A"
        },
        {
        "value" : "VILLA CARIA B"
        },
        {
        "value" : "VILLA CARIA C"
        },
        {
        "value" : "VILLA CARIA D"
        },
        {
        "value" : "KENSINGTON KRYSTAL"
        },
        {
        "value" : "AZIZI FREESIA"
        },
        {
        "value" : "VILLA MYRA"
        },
        {
        "value" : "AL DUAA RESIDENCE"
        },
        {
        "value" : "MAZAYA 18"
        },
        {
        "value" : "BUCEPHALUS"
        },
        {
        "value" : "SHARMLAND TOWER"
        },
        {
        "value" : "Wadi Walk Z3.6"
        },
        {
        "value" : "Wadi Walk Z4.6"
        },
        {
        "value" : "Wadi Walk Z4.7"
        },
        {
        "value" : "Wadi Walk Z5.9"
        },
        {
        "value" : "Wadi Walk Z1.15"
        },
        {
        "value" : "Wadi Walk Z1.18"
        },
        {
        "value" : "Wadi Walk Z1.31"
        },
        {
        "value" : "Wadi Walk Z1.32"
        },
        {
        "value" : "Wadi Walk Z3.3"
        },
        {
        "value" : "Wadi Walk Z3.10"
        },
        {
        "value" : "Wadi Walk Z4.2"
        },
        {
        "value" : "Wadi Walk Z5.8"
        },
        {
        "value" : "Wadi Walk Z1.11"
        },
        {
        "value" : "Wadi Walk Z1.12"
        },
        {
        "value" : "Wadi Walk Z1.19"
        },
        {
        "value" : "Wadi Walk Z1.24"
        },
        {
        "value" : "Wadi Walk Z1.28"
        },
        {
        "value" : "Wadi Walk Z1.30"
        },
        {
        "value" : "Wadi Walk Z4.5"
        },
        {
        "value" : "Wadi Walk Z5.3"
        },
        {
        "value" : "Wadi Walk Z1.2"
        },
        {
        "value" : "Wadi Walk Z1.7"
        },
        {
        "value" : "Wadi Walk Z1.4"
        },
        {
        "value" : "Wadi Walk Z1.3"
        },
        {
        "value" : "Wadi Walk Z1.8"
        },
        {
        "value" : "Wadi Walk Z1.13"
        },
        {
        "value" : "Wadi Walk Z1.14"
        },
        {
        "value" : "Wadi Walk Z1.20"
        },
        {
        "value" : "Wadi Walk Z1.21"
        },
        {
        "value" : "Wadi Walk Z1.26"
        },
        {
        "value" : "Wadi Walk Z1.27"
        },
        {
        "value" : "Wadi Walk Z1.29"
        },
        {
        "value" : "Wadi Walk Z3.4"
        },
        {
        "value" : "Wadi Walk Z3.5"
        },
        {
        "value" : "THE BINARY BY OMNIYAT"
        },
        {
        "value" : "BURJ PARK V"
        },
        {
        "value" : "BD Grand Boulevard T1"
        },
        {
        "value" : "BD Grand Boulevard T2"
        },
        {
        "value" : "Azizi.Orchid"
        },
        {
        "value" : "VISTA DEL LAGO"
        },
        {
        "value" : "TOWN CENTRAL B"
        },
        {
        "value" : "GOLDEN MILE 8"
        },
        {
        "value" : "GOLDEN MILE 9"
        },
        {
        "value" : "GOLDEN MILE 10"
        },
        {
        "value" : "GOLDEN MILE 7"
        },
        {
        "value" : "BANGASH RESIDENCE"
        },
        {
        "value" : "THE ATRIUM 1"
        },
        {
        "value" : "SILICON HEIGHTS2"
        },
        {
        "value" : "SCHON RESIDENCES"
        },
        {
        "value" : "ROYALE RESIDENCE 1"
        },
        {
        "value" : "WORLD WIDE TOWER"
        },
        {
        "value" : "CADI4"
        },
        {
        "value" : "DEYAAR PARK A2"
        },
        {
        "value" : "DEYAAR PARK A3"
        },
        {
        "value" : "DEYAAR PARK B3"
        },
        {
        "value" : "DEYAAR PARK B1"
        },
        {
        "value" : "DEYAAR PARK A1"
        },
        {
        "value" : "DEYAAR PARK B4"
        },
        {
        "value" : "DEYAAR PARK A4"
        },
        {
        "value" : "DEYAAR PARK B2"
        },
        {
        "value" : "The Opus By Omniyat"
        },
        {
        "value" : "OASIS HEIGHTS"
        },
        {
        "value" : "Park Lane"
        },
        {
        "value" : "TFG MARINA"
        },
        {
        "value" : "Rufi Twin Tower A"
        },
        {
        "value" : "RUFI TWIN TOWER B"
        },
        {
        "value" : "iDubai"
        },
        {
        "value" : "SUBERBIA C"
        },
        {
        "value" : "THE PLAZA A"
        },
        {
        "value" : "THE PLAZA B"
        },
        {
        "value" : "Building 8"
        },
        {
        "value" : "Building 9"
        },
        {
        "value" : "Building 4"
        },
        {
        "value" : "Building 5"
        },
        {
        "value" : "Building 6"
        },
        {
        "value" : "Building 10B"
        },
        {
        "value" : "Building 7"
        },
        {
        "value" : "Building 2"
        },
        {
        "value" : "Building 1"
        },
        {
        "value" : "Building 3"
        },
        {
        "value" : "RELIANCE 7"
        },
        {
        "value" : "DAMAC TOWERS BY PARAMOUNT (B)"
        },
        {
        "value" : "DAMAC TOWERS BY PARAMOUNT (A)"
        },
        {
        "value" : "DAMAC TOWERS BY PARAMOUNT (C)"
        },
        {
        "value" : "DAMAC TOWERS BY PARAMOUNT (D)"
        },
        {
        "value" : "DUBAI GATE 2"
        },
        {
        "value" : "MANAZEL AL KHOR"
        },
        {
        "value" : "Blvd Heights T1"
        },
        {
        "value" : "Blvd Heights T2"
        },
        {
        "value" : "DAMAC HILLS - GOLF PANORAMA - TOWER B"
        },
        {
        "value" : "DAMAC HILLS - GOLF PANORAMA - TOWER A"
        },
        {
        "value" : "Dunes Lilac"
        },
        {
        "value" : "The Address - The BLVD"
        },
        {
        "value" : "Emerald Palace Kempinski Hotel"
        },
        {
        "value" : "SHEFFIELD CLASSIQUE"
        },
        {
        "value" : "Reliance 10"
        },
        {
        "value" : "GERMAN SPORTS TOWER 2"
        },
        {
        "value" : "SEVENTH HEAVEN"
        },
        {
        "value" : "GARDENIA 1&2"
        },
        {
        "value" : "THE WIND TOWER II"
        },
        {
        "value" : "BERLIN BUSINESS TOWER"
        },
        {
        "value" : "OCTAGON TOWER"
        },
        {
        "value" : "ALDUAA MARINA TOWER"
        },
        {
        "value" : "SHAKESPARE"
        },
        {
        "value" : "QUEEN SHEBA"
        },
        {
        "value" : "RAPUNZEL"
        },
        {
        "value" : "PRODIGY 6"
        },
        {
        "value" : "SOL BAY"
        },
        {
        "value" : "Profile Residence"
        },
        {
        "value" : "PARAMOUNT HOTEL-JUMERAH WATERFRONT"
        },
        {
        "value" : "Lawns II"
        },
        {
        "value" : "INDIGO SPECTRUM 1"
        },
        {
        "value" : "R081"
        },
        {
        "value" : "Reliance 4"
        },
        {
        "value" : "CHESS TOWER"
        },
        {
        "value" : "ECLIPSE TOWER"
        },
        {
        "value" : "NASTARAN TOWER"
        },
        {
        "value" : "RUFI PARK VIEW"
        },
        {
        "value" : "HAMPSTEAD RESIDENCES"
        },
        {
        "value" : "CADI-1"
        },
        {
        "value" : "MARINA STAR"
        },
        {
        "value" : "GLOBAL BAY VIEW-1"
        },
        {
        "value" : "SAFEER TOWER 1"
        },
        {
        "value" : "Celestica"
        },
        {
        "value" : "Dream Square"
        },
        {
        "value" : "LA VISTA 5"
        },
        {
        "value" : "THE DOMAIN"
        },
        {
        "value" : "Lawns V"
        },
        {
        "value" : "MONARCH RESIDENCY"
        },
        {
        "value" : "DAMAC HILLS - GOLF VISTA - TOWER B"
        },
        {
        "value" : "DAMAC HILLS - GOLF VISTA - TOWER A"
        },
        {
        "value" : "CAMBRIDGE"
        },
        {
        "value" : "MAZAYA 17"
        },
        {
        "value" : "MAZAYA 32"
        },
        {
        "value" : "Mazaya 9"
        },
        {
        "value" : "APEX SUITES"
        },
        {
        "value" : "GORDION"
        },
        {
        "value" : "INFINITY TOWER"
        },
        {
        "value" : "The Palm Hotel and Resort"
        },
        {
        "value" : "ARABIAN CROWNE"
        },
        {
        "value" : "Moon Tower"
        },
        {
        "value" : "SPARK BUILDING"
        },
        {
        "value" : "LDD003"
        },
        {
        "value" : "LDB009"
        },
        {
        "value" : "LDB011"
        },
        {
        "value" : "LDB003"
        },
        {
        "value" : "LDB017"
        },
        {
        "value" : "LDB007"
        },
        {
        "value" : "LDB012"
        },
        {
        "value" : "LDB016"
        },
        {
        "value" : "LDB001"
        },
        {
        "value" : "LDB010"
        },
        {
        "value" : "LDB006"
        },
        {
        "value" : "LDB005"
        },
        {
        "value" : "LDD001"
        },
        {
        "value" : "LDE002"
        },
        {
        "value" : "LDB013"
        },
        {
        "value" : "LDB015"
        },
        {
        "value" : "LDB008"
        },
        {
        "value" : "LDB014"
        },
        {
        "value" : "Reliance 8"
        },
        {
        "value" : "H11"
        },
        {
        "value" : "FIVE at Jumeirah Village Circle Dubai"
        },
        {
        "value" : "MANARA 8"
        },
        {
        "value" : "AB MANARA 33_03"
        },
        {
        "value" : "MANARA 6"
        },
        {
        "value" : "AB MANARA 33_02"
        },
        {
        "value" : "AB MANARA 25_01"
        },
        {
        "value" : "AB MANARA 31_05"
        },
        {
        "value" : "AB MANARA 31_06"
        },
        {
        "value" : "AB MANARA 31_04"
        },
        {
        "value" : "AB Manara 31_3"
        },
        {
        "value" : "MANARA 5"
        },
        {
        "value" : "AB MANARA 33_01"
        },
        {
        "value" : "AB Manara 31_1"
        },
        {
        "value" : "MANARA 7"
        },
        {
        "value" : "MANARA 3"
        },
        {
        "value" : "AB MANARA 25_05"
        },
        {
        "value" : "AB MANARA 25_04"
        },
        {
        "value" : "AB Manara 25_8"
        },
        {
        "value" : "MANARA 2"
        },
        {
        "value" : "MANARA 1"
        },
        {
        "value" : "AB Manara 31_2"
        },
        {
        "value" : "AB MANARA 25_03"
        },
        {
        "value" : "AB Manara 30_2"
        },
        {
        "value" : "AB MANARA 25_02"
        },
        {
        "value" : "AB MANARA 25_06"
        },
        {
        "value" : "AB Manara 30_1"
        },
        {
        "value" : "AB MANARA 25_07"
        },
        {
        "value" : "AB Manara 30_3"
        },
        {
        "value" : "MANARA 4"
        },
        {
        "value" : "GLITZ RESIDENCE 2"
        },
        {
        "value" : "BEACH FRONT LIVING B"
        },
        {
        "value" : "BEACH FRONT LIVING A"
        },
        {
        "value" : "Tropez Suites france cluster 5"
        },
        {
        "value" : "METRO TOWER"
        },
        {
        "value" : "MULBERRY at PARK HEIGHTS Building A1"
        },
        {
        "value" : "MULBERRY at PARK HEIGHTS Building A2"
        },
        {
        "value" : "MULBERRY at PARK HEIGHTS Building B2"
        },
        {
        "value" : "MULBERRY at PARK HEIGHTS Building B1"
        },
        {
        "value" : "MULBERRY II at PARK HEIGHTS Building A2"
        },
        {
        "value" : "MULBERRY II at PARK HEIGHTS Building A1"
        },
        {
        "value" : "MULBERRY II at PARK HEIGHTS Building B1"
        },
        {
        "value" : "MULBERRY II at PARK HEIGHTS Building B2"
        },
        {
        "value" : "GLOBAL ELAHI RESIDENCE"
        },
        {
        "value" : "WINDSOR RESIDENCE"
        },
        {
        "value" : "D1"
        },
        {
        "value" : "RED RESIDENCE"
        },
        {
        "value" : "DUNES RESIDENCE"
        },
        {
        "value" : "AL MADAR SIRAJ TOWER"
        },
        {
        "value" : "PIER 8"
        },
        {
        "value" : "Prodigy2"
        },
        {
        "value" : "AVANTI TOWER"
        },
        {
        "value" : "AJMAL SARAH"
        },
        {
        "value" : "CENTER COURT"
        },
        {
        "value" : "I SUITES SMART RESIDENCE (O+)"
        },
        {
        "value" : "I SUITES SMART RESIDENCE (O4)"
        },
        {
        "value" : "I SUITES SMART RESIDENCE (O3)"
        },
        {
        "value" : "I SUITES SMART RESIDENCE (O8)"
        },
        {
        "value" : "I SUITES SMART RESIDENCE (O5)"
        },
        {
        "value" : "THE STERLING EAST HOUSE"
        },
        {
        "value" : "MYSTICA"
        },
        {
        "value" : "Azizi Liatris"
        },
        {
        "value" : "Mira Palace"
        },
        {
        "value" : "I & M TOWER"
        },
        {
        "value" : "DANA ROYALE TOWER 1"
        },
        {
        "value" : "THE GEMINI"
        },
        {
        "value" : "WIND ONE"
        },
        {
        "value" : "Sunset B"
        },
        {
        "value" : "Mazaya 8"
        },
        {
        "value" : "ATRIA RA"
        },
        {
        "value" : "ATRIA SA"
        },
        {
        "value" : "Sienna Square Residential"
        },
        {
        "value" : "Sienna Square Commercial"
        },
        {
        "value" : "Sunset A"
        },
        {
        "value" : "KENSINGTON"
        },
        {
        "value" : "CLUB VISTA MARE"
        },
        {
        "value" : "THE SKYSCRAPER"
        },
        {
        "value" : "CANAL RESIDENCE WEST -SPANISH"
        },
        {
        "value" : "AZIZI DAISY"
        },
        {
        "value" : "HYDRA TOWERS 1"
        },
        {
        "value" : "HYDRA TOWERS 4"
        },
        {
        "value" : "HYDRA TOWERS 2"
        },
        {
        "value" : "HYDRA TOWERS 3"
        },
        {
        "value" : "HYDRA TOWERS 5"
        },
        {
        "value" : "CASCADE MANOR"
        },
        {
        "value" : "LAWNS I"
        },
        {
        "value" : "DAMAC HILLS - GOLF TERRACE (B)"
        },
        {
        "value" : "DAMAC HILLS - GOLF TERRACE (A)"
        },
        {
        "value" : "Iris Amber"
        },
        {
        "value" : "FRANKFURT TOWER"
        },
        {
        "value" : "THE ONE TOWER"
        },
        {
        "value" : "Hampstead & Mayfair Boutique Residences"
        },
        {
        "value" : "10 Tower"
        },
        {
        "value" : "Reliance 3"
        },
        {
        "value" : "PRODIGY 3"
        },
        {
        "value" : "CAESAR"
        },
        {
        "value" : "MARCO POLO"
        },
        {
        "value" : "CINDERELLA"
        },
        {
        "value" : "GATEWAY EAST 2"
        },
        {
        "value" : "WEST GATE 2"
        },
        {
        "value" : "EAST GATE 3"
        },
        {
        "value" : "PARKVIEW EAST"
        },
        {
        "value" : "WEST GATE 3"
        },
        {
        "value" : "GATEWAY WEST 1"
        },
        {
        "value" : "GATEWAY WEST 2"
        },
        {
        "value" : "EAST GATE 4"
        },
        {
        "value" : "EAST GATE 1"
        },
        {
        "value" : "GATEWAY EAST 1"
        },
        {
        "value" : "EAST GATE 2"
        },
        {
        "value" : "WEST GATE 4"
        },
        {
        "value" : "Frond/JHFTA"
        },
        {
        "value" : "Frond/JHFTD"
        },
        {
        "value" : "MENA TOWER"
        },
        {
        "value" : "WADI TOWER"
        },
        {
        "value" : "THE POLO RESIDENCE - A3"
        },
        {
        "value" : "THE POLO RESIDENCE - B2"
        },
        {
        "value" : "THE POLO RESIDENCE - C3"
        },
        {
        "value" : "THE POLO RESIDENCE - E2"
        },
        {
        "value" : "THE POLO RESIDENCE - C9"
        },
        {
        "value" : "THE POLO RESIDENCE - C1"
        },
        {
        "value" : "THE POLO RESIDENCE - C2"
        },
        {
        "value" : "THE POLO RESIDENCE - C6"
        },
        {
        "value" : "THE POLO RESIDENCE - A1"
        },
        {
        "value" : "THE POLO RESIDENCE - B1"
        },
        {
        "value" : "THE POLO RESIDENCE - E5"
        },
        {
        "value" : "THE POLO RESIDENCE - D6"
        },
        {
        "value" : "THE POLO RESIDENCE - D5"
        },
        {
        "value" : "THE POLO RESIDENCE - A2"
        },
        {
        "value" : "THE POLO RESIDENCE - C4"
        },
        {
        "value" : "THE POLO RESIDENCE - B3"
        },
        {
        "value" : "THE POLO RESIDENCE - B4"
        },
        {
        "value" : "THE POLO RESIDENCE - D3"
        },
        {
        "value" : "THE POLO RESIDENCE - C7"
        },
        {
        "value" : "THE POLO RESIDENCE - D4"
        },
        {
        "value" : "THE POLO RESIDENCE - B5"
        },
        {
        "value" : "THE POLO RESIDENCE - A4"
        },
        {
        "value" : "THE POLO RESIDENCE - D2"
        },
        {
        "value" : "THE POLO RESIDENCE - C5"
        },
        {
        "value" : "THE POLO RESIDENCE - E4"
        },
        {
        "value" : "THE POLO RESIDENCE - E1"
        },
        {
        "value" : "THE POLO RESIDENCE - E3"
        },
        {
        "value" : "THE POLO RESIDENCE - D1"
        },
        {
        "value" : "Mazaya 3"
        },
        {
        "value" : "Jouri-5 Block C"
        },
        {
        "value" : "Jouri-5 Block A"
        },
        {
        "value" : "Jouri-5 Block B"
        },
        {
        "value" : "Address Fountain Views Residences - Tower 1"
        },
        {
        "value" : "MONTI TOWER"
        },
        {
        "value" : "RAMADA RESIDENCE"
        },
        {
        "value" : "OASIS TOWER 2"
        },
        {
        "value" : "STALLION TOWER"
        },
        {
        "value" : "THE ONYX - TOWER 1"
        },
        {
        "value" : "THE ONYX - TOWER 2"
        },
        {
        "value" : "BUILDING V"
        },
        {
        "value" : "BUILDING N"
        },
        {
        "value" : "BUILDING L"
        },
        {
        "value" : "BUILDING A"
        },
        {
        "value" : "BUILDING R"
        },
        {
        "value" : "BUILDING G"
        },
        {
        "value" : "BUILDING K"
        },
        {
        "value" : "BUILDING J"
        },
        {
        "value" : "BUILDING B"
        },
        {
        "value" : "BUILDING Q"
        },
        {
        "value" : "BUILDING M"
        },
        {
        "value" : "BD Claren 2 T1"
        },
        {
        "value" : "FORUM"
        },
        {
        "value" : "GLOBAL GOLF RESIDENCE 2"
        },
        {
        "value" : "A23"
        },
        {
        "value" : "D20"
        },
        {
        "value" : "D22"
        },
        {
        "value" : "A19"
        },
        {
        "value" : "D21"
        },
        {
        "value" : "THE PEARL"
        },
        {
        "value" : "AL SAQRAN TOWER"
        },
        {
        "value" : "CANADA BUSINESS CENTER"
        },
        {
        "value" : "BURJ AL ALAM"
        },
        {
        "value" : "TOWER 108"
        },
        {
        "value" : "FAHAD 2"
        },
        {
        "value" : "KNIGHTSBRIDGE COURT"
        },
        {
        "value" : "KENSINGTON MANOR"
        },
        {
        "value" : "B2B"
        },
        {
        "value" : "YUVI RESIDENCES"
        },
        {
        "value" : "CHAMPION TOWER 3"
        },
        {
        "value" : "QASR SABAH 3"
        },
        {
        "value" : "QASR SABAH I"
        },
        {
        "value" : "QASR SABAH 2"
        },
        {
        "value" : "BD The Mansion"
        },
        {
        "value" : "Aquarius Gate Residence"
        },
        {
        "value" : "Aquarius Gate Business"
        },
        {
        "value" : "DREAM HARBOUR"
        },
        {
        "value" : "GLOBAL GOLF RESIDENCE"
        },
        {
        "value" : "METROPOLIS LOFTS 1"
        },
        {
        "value" : "METROPOLIS LOFTS 2"
        },
        {
        "value" : "Reliance 15"
        },
        {
        "value" : "OLGANA"
        },
        {
        "value" : "RUFI WATER FRONT RESIDENCY"
        },
        {
        "value" : "Uniestate Prime Tower"
        },
        {
        "value" : "Frankfurt Sports Tower"
        },
        {
        "value" : "CELESTIA A"
        },
        {
        "value" : "CELESTIA B"
        },
        {
        "value" : "PALM VIEWS EAST"
        },
        {
        "value" : "THE 8"
        },
        {
        "value" : "SERENITY LAKES 5-OLD"
        },
        {
        "value" : "OXFORD"
        },
        {
        "value" : "Niloofar Tower"
        },
        {
        "value" : "BRISTOL TOWER RESIDENCE 1"
        },
        {
        "value" : "MAYFAIR"
        },
        {
        "value" : "Royale Residence 2"
        },
        {
        "value" : "Prodigy 4"
        },
        {
        "value" : "DIAMOND ARCH 2"
        },
        {
        "value" : "NATALIE TOWER"
        },
        {
        "value" : "The K Suites"
        },
        {
        "value" : "POSH LIFESTYLES"
        },
        {
        "value" : "PALAZZA ARABIA"
        },
        {
        "value" : "AZIZI TULIP"
        },
        {
        "value" : "Sky View Tower"
        },
        {
        "value" : "AL MASA-II"
        },
        {
        "value" : "DOWEN TOWN TOWER"
        },
        {
        "value" : "SHAMI TOWER"
        },
        {
        "value" : "SUNSHINE RESIDENCE"
        },
        {
        "value" : "DUNES DAHLIA"
        },
        {
        "value" : "Sharm Land Tower"
        },
        {
        "value" : "Mazaya 19"
        },
        {
        "value" : "MONTE CARLO RESIDENCE"
        },
        {
        "value" : "OVAL TOWER"
        },
        {
        "value" : "PARK SQUARE"
        },
        {
        "value" : "THE DUBAI CREEK RESIDENCES - SOUTH TOWER 3"
        },
        {
        "value" : "THE DUBAI CREEK RESIDENCES - NORTH TOWER 1"
        },
        {
        "value" : "THE DUBAI CREEK RESIDENCES - SOUTH TOWER 1"
        },
        {
        "value" : "THE DUBAI CREEK RESIDENCES - NORTH TOWER 2"
        },
        {
        "value" : "THE DUBAI CREEK RESIDENCES - NORTH TOWER 3"
        },
        {
        "value" : "THE DUBAI CREEK RESIDENCES - SOUTH TOWER 2"
        },
        {
        "value" : "The Prime Tower"
        },
        {
        "value" : "KPM TOWER"
        },
        {
        "value" : "SKY CENTRAL"
        },
        {
        "value" : "ESCAN MARINA TOWER"
        },
        {
        "value" : "DAMAC HILLS - CARSON (A)"
        },
        {
        "value" : "DAMAC HILLS - CARSON (B)"
        },
        {
        "value" : "DAMAC HILLS - CARSON (C)"
        },
        {
        "value" : "BELLATORA RESIDENCES"
        },
        {
        "value" : "Prodigy 5"
        },
        {
        "value" : "Maysan Tower 1"
        },
        {
        "value" : "Maysan Tower 2"
        },
        {
        "value" : "Maysan Tower 3"
        },
        {
        "value" : "Maysan Podium"
        },
        {
        "value" : "MICHAEL SCHUMACHER"
        },
        {
        "value" : "The First Central"
        },
        {
        "value" : "E18"
        },
        {
        "value" : "D16"
        },
        {
        "value" : "D17"
        },
        {
        "value" : "E15"
        },
        {
        "value" : "MARINA 101"
        },
        {
        "value" : "NUR"
        },
        {
        "value" : "HANOVER SQUARE"
        },
        {
        "value" : "BURJ VISTA Tower 2"
        },
        {
        "value" : "BURJ VISTA Tower 1"
        },
        {
        "value" : "ASTON TOWERS"
        },
        {
        "value" : "Opera Grand"
        },
        {
        "value" : "YORK"
        },
        {
        "value" : "GERMAN DESIGN TOWER 1"
        },
        {
        "value" : "VERDE RESIDENCES"
        },
        {
        "value" : "Plaza Residences 2"
        },
        {
        "value" : "ROSE"
        },
        {
        "value" : "Image Residences Block-A"
        },
        {
        "value" : "Image Residences Block-B"
        },
        {
        "value" : "55TIME DUBAI"
        },
        {
        "value" : "Jouri-1 Block B"
        },
        {
        "value" : "Jouri-1 Block C"
        },
        {
        "value" : "JOURI-1 Block A"
        },
        {
        "value" : "HERCULES TOWER"
        },
        {
        "value" : "CLEOPATRA TOWER"
        },
        {
        "value" : "ALLADIN TOWER"
        },
        {
        "value" : "CLASSIC SOCCER TOWER"
        },
        {
        "value" : "GERMAN SUPREME TOWER 2"
        },
        {
        "value" : "DREAM BAY"
        },
        {
        "value" : "G-TOWER"
        },
        {
        "value" : "Jouri 4 Block A"
        },
        {
        "value" : "Jouri 4 Block B"
        },
        {
        "value" : "ONE AT PALM JUMEIRAH"
        },
        {
        "value" : "NIKI LAUDA B"
        },
        {
        "value" : "NIKI LAUDA A"
        },
        {
        "value" : "SAFEER TOWER 2"
        },
        {
        "value" : "BERMUDA VIEWS"
        },
        {
        "value" : "OLD-SERENITY LAKES 2"
        },
        {
        "value" : "EDEN 1"
        },
        {
        "value" : "PARK VIEW TOWER"
        },
        {
        "value" : "SHAMI SPORTS TOWER"
        },
        {
        "value" : "LAYAI"
        },
        {
        "value" : "THALU"
        },
        {
        "value" : "SAPHIL"
        },
        {
        "value" : "SAMAESAN"
        },
        {
        "value" : "SANTI"
        },
        {
        "value" : "RAET"
        },
        {
        "value" : "NUI"
        },
        {
        "value" : "PHAI"
        },
        {
        "value" : "KHAM"
        },
        {
        "value" : "MEDITATION COURT"
        },
        {
        "value" : "YANG"
        },
        {
        "value" : "MEDITATION GARDEN"
        },
        {
        "value" : "SINGTAO"
        },
        {
        "value" : "No.9"
        },
        {
        "value" : "SEBCO RESIDENCE"
        },
        {
        "value" : "Giovanni Boutique Suites"
        },
        {
        "value" : "LOLENA"
        },
        {
        "value" : "Address Fountain Views Residences - Tower 2"
        },
        {
        "value" : "AXIS SILVER"
        },
        {
        "value" : "Azizi Yasamine"
        },
        {
        "value" : "OASIS TOWER ONE"
        },
        {
        "value" : "ELETTRA RESIDENCE"
        },
        {
        "value" : "ARABIAN T"
        },
        {
        "value" : "STERNON TOWER 1"
        },
        {
        "value" : "DEC Buisness"
        },
        {
        "value" : "GARDENIA 3"
        },
        {
        "value" : "THE ESTATE"
        },
        {
        "value" : "PALAZZO VERSACE"
        },
        {
        "value" : "AZIZI FEIROUZ II"
        },
        {
        "value" : "MAZAYA 11"
        },
        {
        "value" : "SERENA RESIDENCE"
        },
        {
        "value" : "ASTORIA RESIDENCE"
        },
        {
        "value" : "MARINA SUITES"
        },
        {
        "value" : "Beit Al Funoon"
        },
        {
        "value" : "PRIVE BY DAMAC (A)"
        },
        {
        "value" : "PRIVE BY DAMAC (B)"
        },
        {
        "value" : "Mazaya 7"
        },
        {
        "value" : "MIRAR RESIDENCES A"
        },
        {
        "value" : "MIRAR RESIDENCES B"
        },
        {
        "value" : "MIRAR RESIDENCES C"
        },
        {
        "value" : "THE SUMMIT"
        },
        {
        "value" : "WESTBURRY TOWER 1"
        },
        {
        "value" : "THE STERLING WEST HOUSE"
        },
        {
        "value" : "DURAR 1 BLDG 1"
        },
        {
        "value" : "DURAR 1 BLDG 2"
        },
        {
        "value" : "Dubai Pearl Baccarat"
        },
        {
        "value" : "Dubai Pearl West Tower"
        },
        {
        "value" : "Dubai Pearl North Tower"
        },
        {
        "value" : "Dubai Pearl South Tower"
        },
        {
        "value" : "Dubai Pearl East"
        },
        {
        "value" : "EYE PARK 1"
        },
        {
        "value" : "EYE PARK 2A"
        },
        {
        "value" : "Mazaya 2"
        },
        {
        "value" : "COURT"
        },
        {
        "value" : "SPRING CLUSTER G+4 - Without Retail"
        },
        {
        "value" : "SPRING CLUSTER G+4 With Retail"
        },
        {
        "value" : "GHALIA"
        },
        {
        "value" : "DOLCE VITA"
        },
        {
        "value" : "DAMAC HILLS - ARTESIA TOWER A"
        },
        {
        "value" : "DAMAC HILLS - ARTESIA TOWER D"
        },
        {
        "value" : "DAMAC HILLS - ARTESIA TOWER B"
        },
        {
        "value" : "DAMAC HILLS - ARTESIA TOWER C"
        },
        {
        "value" : "SPICA"
        },
        {
        "value" : "GRAND HORIZON 1"
        },
        {
        "value" : "Iris Bay"
        },
        {
        "value" : "CHAPAL THE DESTINY A"
        },
        {
        "value" : "CHAPAL THE DESTINY B"
        },
        {
        "value" : "CHAPAL EMIRATES POINT"
        },
        {
        "value" : "POLARIS"
        },
        {
        "value" : "FIVE AT PALM JUMEIRAH DUBAI"
        },
        {
        "value" : "PERSHING LUXURY BEACH RESIDENCE"
        },
        {
        "value" : "JOURI-3 BLOCK A"
        },
        {
        "value" : "JOURI 3 BLOCK B"
        },
        {
        "value" : "JOURI 3 BLOCK C"
        },
        {
        "value" : "PALIMIRO 1"
        },
        {
        "value" : "VICTORY BAY TOWER"
        },
        {
        "value" : "DUBAI WHARF TOWER 3"
        },
        {
        "value" : "DUBAI WHARF TOWER 2"
        },
        {
        "value" : "Reliance 1"
        },
        {
        "value" : "The Signet"
        },
        {
        "value" : "GREEN PARK B"
        },
        {
        "value" : "ORRA HARBOUR TOWER 1"
        },
        {
        "value" : "ORRA HARBOUR TOWER 2"
        },
        {
        "value" : "4DIRECTION RESIDENCE 1"
        },
        {
        "value" : "INDIGO OPTIMA 1"
        },
        {
        "value" : "BD BURJ PLACE SA T2"
        },
        {
        "value" : "BD BURJ PLACE SA T1"
        },
        {
        "value" : "DESERT SUN TOWER"
        },
        {
        "value" : "Global Royal Tower"
        },
        {
        "value" : "FARAH TOWER 5"
        },
        {
        "value" : "RUFI CENTURY TOWER"
        },
        {
        "value" : "Sobha Hartland Greens ? Phase 1-2"
        },
        {
        "value" : "ZENITH TOWER A2"
        },
        {
        "value" : "THE DISTINCTION"
        },
        {
        "value" : "CROWN AVENUE"
        },
        {
        "value" : "Reliance 9"
        },
        {
        "value" : "CASSIA PARK"
        },
        {
        "value" : "BEIRUT TOWERS"
        },
        {
        "value" : "MIRDIF TULIP"
        },
        {
        "value" : "THE VORTEX TOWER"
        },
        {
        "value" : "ARYENE GREENS"
        },
        {
        "value" : "CHAMPIONS TOWER2"
        },
        {
        "value" : "GLITZ RESIDENCE 1"
        },
        {
        "value" : "HERA TOWER"
        },
        {
        "value" : "PANGKOR LAUT LUXURY RESIDENCE  C"
        },
        {
        "value" : "PANGKOR LAUT LUXURY RESIDENCE  B"
        },
        {
        "value" : "PANGKOR LAUT LUXURY RESIDENCE  A"
        },
        {
        "value" : "EDMONTON ELM"
        },
        {
        "value" : "BURJ PACIFIC"
        },
        {
        "value" : "SILICON GATE 2"
        },
        {
        "value" : "PRODIGY"
        },
        {
        "value" : "PARADISE ONE"
        },
        {
        "value" : "LIVORNO 1"
        },
        {
        "value" : "LIVORNO 2"
        },
        {
        "value" : "CENTURION RESIDENCE - TOWER 2"
        },
        {
        "value" : "CENTURION RESIDENCE - TOWER 1"
        },
        {
        "value" : "SILVERENE TOWER 1"
        },
        {
        "value" : "FORTUNE SERENE 1"
        },
        {
        "value" : "FORTUNE SERENE 2"
        },
        {
        "value" : "S4-21D6"
        },
        {
        "value" : "S3-23B5"
        },
        {
        "value" : "S4-06B6"
        },
        {
        "value" : "S3-06B6"
        },
        {
        "value" : "S4-12B7"
        },
        {
        "value" : "S5-13B7"
        },
        {
        "value" : "S4-03A5"
        },
        {
        "value" : "Al Ramth 24"
        },
        {
        "value" : "S3-02D4"
        },
        {
        "value" : "S4-02D5"
        },
        {
        "value" : "S4-07D5"
        },
        {
        "value" : "S4-08D7"
        },
        {
        "value" : "S4-01D5"
        },
        {
        "value" : "S4-04A5"
        },
        {
        "value" : "S4-10A5"
        },
        {
        "value" : "S4-26A5"
        },
        {
        "value" : "Al Ramth 7"
        },
        {
        "value" : "Al Ramth 15"
        },
        {
        "value" : "S8-04A5"
        },
        {
        "value" : "S4-25A6"
        },
        {
        "value" : "Al Ramth 5"
        },
        {
        "value" : "S8-03A5"
        },
        {
        "value" : "S3-04A5"
        },
        {
        "value" : "Al Ramth 13"
        },
        {
        "value" : "S3-07A6"
        },
        {
        "value" : "S4-09A7"
        },
        {
        "value" : "S5-02D5"
        },
        {
        "value" : "S4-11B5"
        },
        {
        "value" : "S3-20D5"
        },
        {
        "value" : "Al Ramth 9"
        },
        {
        "value" : "Al Ramth 11"
        },
        {
        "value" : "S1-10B6"
        },
        {
        "value" : "S4-23C5"
        },
        {
        "value" : "S4-20C6"
        },
        {
        "value" : "Al Ramth 20"
        },
        {
        "value" : "Al Ramth 22"
        },
        {
        "value" : "S3-03A4"
        },
        {
        "value" : "S3-08A4"
        },
        {
        "value" : "S4-05B5"
        },
        {
        "value" : "S3-22C4"
        },
        {
        "value" : "S3-21C5"
        },
        {
        "value" : "S4-24C6"
        },
        {
        "value" : "S4-19C5"
        },
        {
        "value" : "Al Ramth 18"
        },
        {
        "value" : "S4-22D5"
        },
        {
        "value" : "Damac Hills - LORETO 3 - A"
        },
        {
        "value" : "Damac Hills - LORETO 3 - B"
        },
        {
        "value" : "Damac Hills - LORETO 1 - B"
        },
        {
        "value" : "Damac Hills - LORETO 1 - A"
        },
        {
        "value" : "Damac Hills - LORETO 2 - B"
        },
        {
        "value" : "Damac Hills - LORETO 2 - A"
        },
        {
        "value" : "PALM SPRING"
        },
        {
        "value" : "AL KHAIL HEIGHTS 6A-6B"
        },
        {
        "value" : "AL KHAIL HEIGHTS 7A-7B"
        },
        {
        "value" : "AL KHAIL HEIGHTS 8A-8B"
        },
        {
        "value" : "AL KHAIL HEIGHTS 1A-1B"
        },
        {
        "value" : "AL KHAIL HEIGHTS 10A-10B"
        },
        {
        "value" : "AL KHAIL HEIGHTS 11A-11B"
        },
        {
        "value" : "AL KHAIL HEIGHTS 2A-2B"
        },
        {
        "value" : "AL KHAIL HEIGHTS 3A-3B"
        },
        {
        "value" : "AL KHAIL HEIGHTS 9A-9B"
        },
        {
        "value" : "AL KHAIL HEIGHTS 4A-4B"
        },
        {
        "value" : "AL KHAIL HEIGHTS 5A-5B"
        },
        {
        "value" : "MY TOWER"
        },
        {
        "value" : "THE RESIDENCE AT MARINA GATE 2"
        },
        {
        "value" : "KPM 2"
        },
        {
        "value" : "ALI BABA"
        },
        {
        "value" : "SINDBAD"
        },
        {
        "value" : "NAPOLEON"
        },
        {
        "value" : "GLOBAL POINT"
        },
        {
        "value" : "MONTROSE RESIDENCE B"
        },
        {
        "value" : "MONTROSE RESIDENCE A"
        },
        {
        "value" : "SILVER STAR"
        },
        {
        "value" : "BERLIN CITY CENTER"
        },
        {
        "value" : "ABJAR TOWER"
        },
        {
        "value" : "FAIRWAY HEIGHTS A"
        },
        {
        "value" : "P28"
        },
        {
        "value" : "P29"
        },
        {
        "value" : "H31"
        },
        {
        "value" : "RUFI ROYALE RESIDENCY A"
        },
        {
        "value" : "RUFI ROYALE RESIDENCY B"
        },
        {
        "value" : "DUPLEX AND PENTHOUSE"
        },
        {
        "value" : "CONDOMINIUM"
        },
        {
        "value" : "ASHAI TOWER 5"
        },
        {
        "value" : "SPORT ONE"
        },
        {
        "value" : "ANGELICA RESIDENCE 1"
        },
        {
        "value" : "SOL AVENUE"
        },
        {
        "value" : "RIGEL"
        },
        {
        "value" : "BAY CENTRAL WEST"
        },
        {
        "value" : "SANALI CAPITAL AVENUE"
        },
        {
        "value" : "DAMAC HILLS - GOLF HORIZON - TOWER A"
        },
        {
        "value" : "DAMAC HILLS - GOLF HORIZON - TOWER B"
        },
        {
        "value" : "FERRETTI LUXURY BEACH RESIDENCE B"
        },
        {
        "value" : "FERRETTI LUXURY BEACH RESIDENCE A"
        },
        {
        "value" : "ELITE 8 SPORTS RESIDENCE"
        },
        {
        "value" : "The Cube"
        },
        {
        "value" : "Fakhruddin Hotel Apartments"
        },
        {
        "value" : "ELITE DOWNTOWN RESIDENCE"
        },
        {
        "value" : "Address Fountain Views Hotel"
        },
        {
        "value" : "LA VISTA 3"
        },
        {
        "value" : "GLOBAL GREEN VIEW - II"
        },
        {
        "value" : "THE PAD"
        },
        {
        "value" : "LYNX BUSINESS"
        },
        {
        "value" : "LYNX RESIDENCE"
        },
        {
        "value" : "Rufi Luxury Heights"
        },
        {
        "value" : "CADI-3"
        },
        {
        "value" : "SUNRISE 2"
        },
        {
        "value" : "Celestial Heights Polaris"
        },
        {
        "value" : "AUSTIN"
        },
        {
        "value" : "Artistic Heights"
        },
        {
        "value" : "Azizi feirouz"
        },
        {
        "value" : "The H.Q"
        },
        {
        "value" : "DAMAC HILLS - ORCHID B"
        },
        {
        "value" : "DAMAC HILLS - ORCHID A"
        },
        {
        "value" : "Pixel Tower"
        },
        {
        "value" : "INDIGO SPECTRUM 2"
        },
        {
        "value" : "MAK STAR"
        },
        {
        "value" : "Turquoise"
        },
        {
        "value" : "CASCADE VILLE"
        },
        {
        "value" : "SERENITY HEIGHTS"
        },
        {
        "value" : "Point Residencia"
        },
        {
        "value" : "BINGHATTI APARTMENTS"
        },
        {
        "value" : "PLATINUM RESIDENCE 1"
        },
        {
        "value" : "LA MER"
        },
        {
        "value" : "Farah tower 2"
        },
        {
        "value" : "ART XVIII"
        },
        {
        "value" : "CADI5"
        },
        {
        "value" : "DIAMOND ARCH 1"
        },
        {
        "value" : "THE RESIDENCE"
        },
        {
        "value" : "ACES CHATEAU"
        },
        {
        "value" : "CADI-2"
        },
        {
        "value" : "SYANN PARK 1"
        },
        {
        "value" : "MAISON RESIDENCE COLLECTION"
        },
        {
        "value" : "EDEN 2"
        },
        {
        "value" : "SEAVIEW CLUB"
        },
        {
        "value" : "PKS RESIDENCES"
        },
        {
        "value" : "CONRAD PALM JUMEIRAH"
        },
        {
        "value" : "Dubai Star"
        },
        {
        "value" : "RESCOM TOWER (OFFICES)"
        },
        {
        "value" : "EAGLE HEIGHTS"
        },
        {
        "value" : "Silicon Gates 4"
        },
        {
        "value" : "PLATINUM 2"
        },
        {
        "value" : "Soraya Tower"
        },
        {
        "value" : "ELEGANT TOWER"
        },
        {
        "value" : "BD BURJ PARK III"
        },
        {
        "value" : "ELITE 10 SPORTS RESIDENCE - 1"
        },
        {
        "value" : "ELITE 10 SPORTS RESIDENCE - 2"
        },
        {
        "value" : "B2"
        },
        {
        "value" : "B36"
        },
        {
        "value" : "B35"
        },
        {
        "value" : "B6"
        },
        {
        "value" : "B37"
        },
        {
        "value" : "B1"
        },
        {
        "value" : "B40"
        },
        {
        "value" : "B5"
        },
        {
        "value" : "PARKSIDE P"
        },
        {
        "value" : "PARKSIDE A"
        },
        {
        "value" : "BUSINESS PLACE"
        },
        {
        "value" : "SCHON BUSINESS PARK"
        },
        {
        "value" : "J5"
        },
        {
        "value" : "BALQIS RESIDENCE 3"
        },
        {
        "value" : "BALQIS RESIDENCE 1"
        },
        {
        "value" : "BALQIS RESIDENCE 2"
        },
        {
        "value" : "Park Residence"
        },
        {
        "value" : "F1"
        },
        {
        "value" : "E2"
        },
        {
        "value" : "E3"
        },
        {
        "value" : "D2"
        },
        {
        "value" : "F2"
        },
        {
        "value" : "G2"
        },
        {
        "value" : "E1"
        },
        {
        "value" : "G1"
        },
        {
        "value" : "SANTEVIEW 2"
        },
        {
        "value" : "SANTEVIEW 1"
        },
        {
        "value" : "SHARED PODIUM (retail)"
        },
        {
        "value" : "Elite 9 Sports Residence"
        },
        {
        "value" : "THE RESIDENCES AT MARINA GATE 1"
        },
        {
        "value" : "Tamani Arts Office"
        },
        {
        "value" : "GERMAN SUPREME RESIDENCES 1"
        },
        {
        "value" : "MAGNOLIA"
        },
        {
        "value" : "Reliance 6"
        },
        {
        "value" : "AURORA TOWER"
        },
        {
        "value" : "Vida Residences 3 & 4 - The Hills"
        },
        {
        "value" : "Vida Residences 1 & 2 - The Hills"
        },
        {
        "value" : "Vida B - The Hills"
        },
        {
        "value" : "Vida A - The Hills"
        },
        {
        "value" : "Reliance 12"
        },
        {
        "value" : "WAVE RESIDENCE"
        },
        {
        "value" : "Jouri 6 Block A"
        },
        {
        "value" : "Jouri-6 Block B"
        },
        {
        "value" : "Jouri-6 Block C"
        },
        {
        "value" : "Address Residences Sky View"
        },
        {
        "value" : "Address Residences Sky View 2"
        },
        {
        "value" : "BRIDGE SKY"
        },
        {
        "value" : "VERDE(OFFICES)"
        },
        {
        "value" : "ORCHID RESIDENCE"
        },
        {
        "value" : "STADUIM POINT"
        },
        {
        "value" : "PALME COUTURE RESIDENCES"
        },
        {
        "value" : "O2"
        },
        {
        "value" : "GARDENIA 4"
        },
        {
        "value" : "BD M Burj Dubai T2"
        },
        {
        "value" : "BD M Burj Dubai T1"
        },
        {
        "value" : "Sparkle Tower 1"
        },
        {
        "value" : "Sparkle Tower 2"
        },
        {
        "value" : "Sparkle Tower 3"
        },
        {
        "value" : "PARK AVENUE 2"
        },
        {
        "value" : "PARK AVENUE 1"
        },
        {
        "value" : "TORONTO"
        },
        {
        "value" : "UNIESTATE SPORTS TOWER"
        },
        {
        "value" : "FARAS 2"
        },
        {
        "value" : "UPPER CREST"
        },
        {
        "value" : "Avenue Residence 2"
        },
        {
        "value" : "DAMAC HILLS - GOLF VEDUTA (A)"
        },
        {
        "value" : "DAMAC HILLS - GOLF VEDUTA (B)"
        },
        {
        "value" : "MARINA ARCADE"
        },
        {
        "value" : "SANTEVILL"
        },
        {
        "value" : "ETON"
        },
        {
        "value" : "Celestial Heights Orion"
        },
        {
        "value" : "TOWER 88"
        },
        {
        "value" : "MARINA WHARF II"
        },
        {
        "value" : "WEAV RESIDENSE"
        },
        {
        "value" : "MAG226"
        },
        {
        "value" : "CONTINENTAL TOWER"
        },
        {
        "value" : "Mazaya 21"
        },
        {
        "value" : "GARDEN HEIGHTS"
        },
        {
        "value" : "LAWNS IV"
        },
        {
        "value" : "Celestial Heights Capella"
        },
        {
        "value" : "PALM VIEWS WEST"
        },
        {
        "value" : "Reliance 5"
        },
        {
        "value" : "TOPAZ RESIDENCES 1"
        },
        {
        "value" : "SHERENA RESIDENCE"
        },
        {
        "value" : "THE 118"
        },
        {
        "value" : "CREEK HEIGHTS"
        },
        {
        "value" : "DRAGON VIEW"
        },
        {
        "value" : "SERENIA RESIDENCES BUILDING A"
        },
        {
        "value" : "SERENIA RESIDENCES BUILDING B"
        },
        {
        "value" : "SERENIA RESIDENCES BUILDING C"
        },
        {
        "value" : "OCEANA HOTEL AND APARTMENTS"
        },
        {
        "value" : "DOWNTOWN VIEWS"
        },
        {
        "value" : "BV RESIDENCES 1"
        },
        {
        "value" : "BV RESIDENCES 2"
        },
        {
        "value" : "BV RESIDENCES 3"
        },
        {
        "value" : "BV RESIDENCES 4"
        },
        {
        "value" : "BV RESIDENCES 5"
        },
        {
        "value" : "BV RESIDENCES 6"
        },
        {
        "value" : "PRUDENTIAL TOWER-1"
        },
        {
        "value" : "PRUDENTIAL TOWER-2"
        },
        {
        "value" : "TOPAZ RESIDENCES 3"
        },
        {
        "value" : "GLITZ RESIDENCE 3 -TOWER 1"
        },
        {
        "value" : "GLITZ RESIDENCE 3 -TOWER 2"
        },
        {
        "value" : "BOTANICA"
        },
        {
        "value" : "ACACIA AT PARK HEIGHTS BUILDING A"
        },
        {
        "value" : "ACACIA AT PARK HEIGHTS BUILDING C"
        },
        {
        "value" : "ACACIA AT PARK HEIGHTS BUILDING B"
        },
        {
        "value" : "THE PALM TOWER"
        },
        {
        "value" : "BUILDING T"
        },
        {
        "value" : "TOWN SQUARE SAFI 1A"
        },
        {
        "value" : "TOWN SQUARE SAFI 1B"
        },
        {
        "value" : "TOWN SQUARE SAFI 2A"
        },
        {
        "value" : "TOWN SQUARE SAFI 2B"
        },
        {
        "value" : "Town Square Zahra 1A"
        },
        {
        "value" : "Town Square Zahra 1B"
        },
        {
        "value" : "Town Square Zahra 2A"
        },
        {
        "value" : "RP HEIGHTS"
        },
        {
        "value" : "Town Square Zahra 2B"
        },
        {
        "value" : "LE PRESIDIUM TOWER 1"
        },
        {
        "value" : "Forte T1"
        },
        {
        "value" : "PARAMOUNT TOWER HOTEL & RESIDENCES"
        },
        {
        "value" : "THE ONE"
        },
        {
        "value" : "CAYAN CANTARA - RA"
        },
        {
        "value" : "RIAH TOWERS"
        },
        {
        "value" : "ARENA APARTMENTS"
        },
        {
        "value" : "AFNAN 1"
        },
        {
        "value" : "AFNAN 2"
        },
        {
        "value" : "AFNAN 3"
        },
        {
        "value" : "AFNAN 4"
        },
        {
        "value" : "AFNAN 5"
        },
        {
        "value" : "Al Dar Tower"
        },
        {
        "value" : "VIRIDIS A"
        },
        {
        "value" : "VIRIDIS B"
        },
        {
        "value" : "VIRIDIS C"
        },
        {
        "value" : "VIRIDIS D"
        },
        {
        "value" : "THE ONE JBR"
        },
        {
        "value" : "MERANO"
        },
        {
        "value" : "PULSE SMART RESIDENCE"
        },
        {
        "value" : "CITY APARTMENTS"
        },
        {
        "value" : "TOWN SQUARE ZAHRA BREEZE 3A"
        },
        {
        "value" : "TOWN SQUARE ZAHRA BREEZE 3B"
        },
        {
        "value" : "TOWN SQUARE ZAHRA BREEZE 4A"
        },
        {
        "value" : "TOWN SQUARE ZAHRA BREEZE 4B"
        },
        {
        "value" : "MADA Residences Tower"
        },
        {
        "value" : "TFG ONE HOTEL"
        },
        {
        "value" : "Town Square Warda 1"
        },
        {
        "value" : "Town Square Warda 2"
        },
        {
        "value" : "Town Square Jenna 1"
        },
        {
        "value" : "Town Square Jenna 2"
        },
        {
        "value" : "Hyati Residences Apartment Building"
        },
        {
        "value" : "Al Andalus Building A"
        },
        {
        "value" : "Al Andalus Building B"
        },
        {
        "value" : "BINGHATTI  VIEWS"
        },
        {
        "value" : "PARK ONE"
        },
        {
        "value" : "ALTIA RESIDENCE"
        },
        {
        "value" : "Starz Tower 1"
        },
        {
        "value" : "Starz Tower 2"
        },
        {
        "value" : "MAG 535"
        },
        {
        "value" : "MAG 540"
        },
        {
        "value" : "MAG 545"
        },
        {
        "value" : "MAG 550"
        },
        {
        "value" : "Forte T2"
        },
        {
        "value" : "NAVITAS TOWER B"
        },
        {
        "value" : "NAVITAS ( C )@AKOYA OXYGEN"
        },
        {
        "value" : "NAVITAS ( D )@AKOYA OXYGEN"
        },
        {
        "value" : "NAVITAS ( E )@AKOYA OXYGEN"
        },
        {
        "value" : "AL MANARA TOWER"
        },
        {
        "value" : "May Residence Tower 2"
        },
        {
        "value" : "May Residence Tower 3"
        },
        {
        "value" : "May Residence Tower 4"
        },
        {
        "value" : "May Residence Tower 5"
        },
        {
        "value" : "NAVITAS TOWER A"
        },
        {
        "value" : "ORION BUILDING"
        },
        {
        "value" : "Harbour Views T1"
        },
        {
        "value" : "Harbour Views T2"
        },
        {
        "value" : "ARABIAN GATE"
        },
        {
        "value" : "Creekside 18 A"
        },
        {
        "value" : "Creekside 18 B"
        },
        {
        "value" : "MURANO RESIDENCE 1"
        },
        {
        "value" : "ROYAL BAY"
        },
        {
        "value" : "TOPAZ RESIDENCES 2"
        },
        {
        "value" : "AYKON CITY-TOWER A"
        },
        {
        "value" : "AYKON CITY-TOWER B"
        },
        {
        "value" : "Belgravia"
        },
        {
        "value" : "MODELUX TOWER 1"
        },
        {
        "value" : "TERHAB HOTEL & TOWERS - TOWER 2"
        },
        {
        "value" : "TERHAB HOTEL & TOWERS - TOWER 3"
        },
        {
        "value" : "Mazaya 16"
        },
        {
        "value" : "NB Residences 2"
        },
        {
        "value" : "NB Residences 1"
        },
        {
        "value" : "Mazaya 14"
        },
        {
        "value" : "VINCITORE PALACIO"
        },
        {
        "value" : "DANIA 1"
        },
        {
        "value" : "DANIA 2"
        },
        {
        "value" : "DANIA 3"
        },
        {
        "value" : "DANIA 4"
        },
        {
        "value" : "The Alef Residences"
        },
        {
        "value" : "ALCOVE"
        },
        {
        "value" : "CANDACE ASTER HOTEL APARTMENTS"
        },
        {
        "value" : "CANDACE ACACIA HOTEL APARTMENTS"
        },
        {
        "value" : "J8"
        },
        {
        "value" : "Citywalk Residential Building 7"
        },
        {
        "value" : "AYKON CITY (2) -TOWER C"
        },
        {
        "value" : "DEZIRE RESIDENCES"
        },
        {
        "value" : "DHCC-IBN SINNA BLDG.#27"
        },
        {
        "value" : "Citywalk Residential Building 9"
        },
        {
        "value" : "Citywalk Residential Building 10"
        },
        {
        "value" : "52|42 Tower 1"
        },
        {
        "value" : "52|42 Tower 2"
        },
        {
        "value" : "CRYSTAL RESIDENCE"
        },
        {
        "value" : "Citywalk Residential Building 14"
        },
        {
        "value" : "Citywalk Residential Building 13B"
        },
        {
        "value" : "Citywalk Residential Building 13A"
        },
        {
        "value" : "Citywalk Residential Building 12"
        },
        {
        "value" : "NOURA TOWER"
        },
        {
        "value" : "BAHWAN TOWER"
        },
        {
        "value" : "GLAMZ RESIDENCE TOWER 1"
        },
        {
        "value" : "GLAMZ RESIDENCE TOWER 2"
        },
        {
        "value" : "Citywalk Residential Building 20"
        },
        {
        "value" : "Citywalk Residential Building 21A"
        },
        {
        "value" : "Citywalk Residential Building 21B"
        },
        {
        "value" : "Citywalk Residential Building 22"
        },
        {
        "value" : "Hayat Boulevard-2B"
        },
        {
        "value" : "Hayat Boulevard-2A"
        },
        {
        "value" : "Citywalk Residential Building 4A"
        },
        {
        "value" : "Citywalk Residential Building 4B"
        },
        {
        "value" : "Citywalk Residential Building 5"
        },
        {
        "value" : "The Address Residences Dubai Opera T2"
        },
        {
        "value" : "The Address Residences Dubai Opera T1"
        },
        {
        "value" : "Citywalk Residential Building 6A"
        },
        {
        "value" : "Citywalk Residential Building 6B"
        },
        {
        "value" : "IL Primo"
        },
        {
        "value" : "Citywalk Residential Building 11A"
        },
        {
        "value" : "Citywalk Residential Building 11B"
        },
        {
        "value" : "AL HELAL AL ZAHABY"
        },
        {
        "value" : "Volante"
        },
        {
        "value" : "Citywalk Residential Building 1"
        },
        {
        "value" : "Citywalk Residential Building 2A"
        },
        {
        "value" : "Citywalk Residential Building 2B"
        },
        {
        "value" : "Citywalk Residential Building 3B"
        },
        {
        "value" : "Blvd Heights Podium"
        },
        {
        "value" : "BLVD CRESCENT Podium"
        },
        {
        "value" : "AZIZI MONTRELL"
        },
        {
        "value" : "The Galleries"
        },
        {
        "value" : "ROY MEDITERRANEAN"
        },
        {
        "value" : "Marquise Square Tower"
        },
        {
        "value" : "Sobha Hartland Greens ? Phase 1-1"
        },
        {
        "value" : "Langham Place Downtown Dubai By Omniyat"
        },
        {
        "value" : "CREEK HORIZON TOWER 1"
        },
        {
        "value" : "CREEK HORIZON TOWER 2"
        },
        {
        "value" : "CREEK HORIZON PODIUM"
        },
        {
        "value" : "GEMINI SPLENDOR"
        },
        {
        "value" : "AG TOWER"
        },
        {
        "value" : "Act One Act Two Tower 1"
        },
        {
        "value" : "Act One Act Two Tower 2"
        },
        {
        "value" : "AZIZI MINA"
        },
        {
        "value" : "AL BARSHA SOUTH BUILDING"
        },
        {
        "value" : "Citywalk Residential Building 16"
        },
        {
        "value" : "Citywalk Residential Building 17"
        },
        {
        "value" : "Citywalk Residential Building 18A"
        },
        {
        "value" : "Citywalk Residential Building 18B"
        },
        {
        "value" : "Citywalk Residential Building 19"
        },
        {
        "value" : "KEMPINSKI RESIDENCES BUSINESS BAY"
        },
        {
        "value" : "RUKAN RESIDENCE - BUILDING 2"
        },
        {
        "value" : "RUKAN RESIDENCE - BUILDING 1"
        },
        {
        "value" : "LAYA RESIDENCES"
        },
        {
        "value" : "Azizi Shaista Residence"
        },
        {
        "value" : "VERA TOWER"
        },
        {
        "value" : "AL JAWHARA TOWER"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-01"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-02"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-03"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-04"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-05"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-07"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-08"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-09"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-10"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-11"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-12"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-13"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-14"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-15"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-16"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-17"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-18"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-19"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-20"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-21"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-22"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-23"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-24"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-25"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-26"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-27"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-28"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-29"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-30"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-31"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-32"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-33"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-34"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-35"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-36"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-37"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-38"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-39"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-40"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-41"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-42"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-43"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-44"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-45"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-46"
        },
        {
        "value" : "URBANA STACKED HOUSE BLOCK-06"
        },
        {
        "value" : "SUNBEAM HOMES A"
        },
        {
        "value" : "SUNBEAM HOMES B"
        },
        {
        "value" : "Jumeirah Gate Tower 1"
        },
        {
        "value" : "Jumeirah Gate Tower 2"
        },
        {
        "value" : "Studio One"
        },
        {
        "value" : "Oia Residence"
        },
        {
        "value" : "Park Point Building A"
        },
        {
        "value" : "Park Point Building B"
        },
        {
        "value" : "Park Point Building C"
        },
        {
        "value" : "Park Point Building D"
        },
        {
        "value" : "The Pulse Residence (A1)"
        },
        {
        "value" : "The Pulse Residence (B1)"
        },
        {
        "value" : "The Pulse Residence (B2)"
        },
        {
        "value" : "AZIZI PLAZA"
        },
        {
        "value" : "Hayat Boulevard-1B"
        },
        {
        "value" : "Hayat Boulevard-1A"
        },
        {
        "value" : "WEST BAY TOWER"
        },
        {
        "value" : "The Pulse Boulevard Apartments (C2)"
        },
        {
        "value" : "DAMAC TOWERS BY PARAMOUNT (PODIUM)"
        },
        {
        "value" : "Creek Gate Tower 1"
        },
        {
        "value" : "Creek Gate Tower 2"
        },
        {
        "value" : "Sobha Hartland Greens-Phase II"
        },
        {
        "value" : "Vida Residences Dubai Opera Tower 1"
        },
        {
        "value" : "The One at Jumeirah Village Triangle"
        },
        {
        "value" : "MIRACLZ TOWER"
        },
        {
        "value" : "Azizi Aliyah Residences"
        },
        {
        "value" : "AZIZI SAMIA"
        },
        {
        "value" : "MAG 530"
        },
        {
        "value" : "Harbour Gate Tower 1"
        },
        {
        "value" : "Harbour Gate Tower 2"
        },
        {
        "value" : "Imperial Avenue"
        },
        {
        "value" : "The Pulse Townhouses Cluster 1"
        },
        {
        "value" : "The Pulse Townhouses Cluster 2"
        },
        {
        "value" : "The Pulse Townhouses Cluster 3"
        },
        {
        "value" : "The Pulse Townhouses Cluster 4"
        },
        {
        "value" : "The Pulse Townhouses Cluster 5"
        },
        {
        "value" : "The Pulse Townhouses Cluster 6"
        },
        {
        "value" : "The Pulse Townhouses Cluster 7"
        },
        {
        "value" : "The Pulse Townhouses Cluster 8"
        },
        {
        "value" : "The Pulse Townhouses Cluster 9"
        },
        {
        "value" : "The Pulse Townhouses Cluster 10"
        },
        {
        "value" : "The Pulse Townhouses Cluster 11"
        },
        {
        "value" : "The Pulse Townhouses Cluster 12"
        },
        {
        "value" : "The Pulse Townhouses Cluster 13"
        },
        {
        "value" : "The Pulse Townhouses Cluster 14"
        },
        {
        "value" : "The Pulse Townhouses Cluster 15"
        },
        {
        "value" : "The Pulse Townhouses Cluster 16"
        },
        {
        "value" : "The Pulse Townhouses Cluster 17"
        },
        {
        "value" : "The Pulse Townhouses Cluster 18"
        },
        {
        "value" : "The Pulse Townhouses Cluster 19"
        },
        {
        "value" : "The Pulse Townhouses Cluster 20"
        },
        {
        "value" : "The Pulse Townhouses Cluster 21"
        },
        {
        "value" : "The Pulse Townhouses Cluster 22"
        },
        {
        "value" : "The Pulse Townhouses Cluster 23"
        },
        {
        "value" : "The Pulse Townhouses Cluster 24"
        },
        {
        "value" : "The Pulse Townhouses Cluster 25"
        },
        {
        "value" : "The Pulse Townhouses Cluster 26"
        },
        {
        "value" : "The Pulse Townhouses Cluster 27"
        },
        {
        "value" : "The Pulse Townhouses Cluster 28"
        },
        {
        "value" : "The Pulse Townhouses Cluster 29"
        },
        {
        "value" : "The Pulse Townhouses Cluster 30"
        },
        {
        "value" : "The Pulse Townhouses Cluster 31"
        },
        {
        "value" : "The Pulse Townhouses Cluster 32"
        },
        {
        "value" : "The Pulse Townhouses Cluster 33"
        },
        {
        "value" : "The Pulse Townhouses Cluster 34"
        },
        {
        "value" : "The Pulse Townhouses Cluster 35"
        },
        {
        "value" : "The Pulse Townhouses Cluster 36"
        },
        {
        "value" : "The Pulse Townhouses Cluster 37"
        },
        {
        "value" : "The Pulse Townhouses Cluster 38"
        },
        {
        "value" : "The Pulse Townhouses Cluster 39"
        },
        {
        "value" : "The Pulse Townhouses Cluster 40"
        },
        {
        "value" : "AZIZI FARISHTA"
        },
        {
        "value" : "THE COVE Building 1"
        },
        {
        "value" : "THE COVE Building 2"
        },
        {
        "value" : "THE COVE Building 3"
        },
        {
        "value" : "Al Waleed Residence"
        },
        {
        "value" : "PRIVE BY DAMAC (PODIUM)"
        },
        {
        "value" : "CELESTIA Podium"
        },
        {
        "value" : "AZIZI STAR"
        },
        {
        "value" : "The Pulse Residence Icon"
        },
        {
        "value" : "VIDA Residences Dubai Marina"
        },
        {
        "value" : "The Pulse Boulevard Apartments - C1"
        },
        {
        "value" : "La Riviera Apartments"
        },
        {
        "value" : "The Pulse Residence Park -B3"
        },
        {
        "value" : "The Pulse Residence Park-B4"
        },
        {
        "value" : "The Pulse Residence Park - Podium"
        },
        {
        "value" : "Avencia 1"
        },
        {
        "value" : "Avencia 2"
        },
        {
        "value" : "Avencia 3"
        },
        {
        "value" : "Avencia 4"
        },
        {
        "value" : "Avencia 5"
        },
        {
        "value" : "Avencia 6"
        },
        {
        "value" : "Avencia 12"
        },
        {
        "value" : "Avencia 22"
        },
        {
        "value" : "Avencia 43"
        },
        {
        "value" : "Avencia 44"
        },
        {
        "value" : "Avencia 45"
        },
        {
        "value" : "TASAHEEL"
        },
        {
        "value" : "MAG 525"
        },
        {
        "value" : "BELGRAVIA 2"
        },
        {
        "value" : "Milano Giovanni Boutique Suites"
        },
        {
        "value" : "Downtown Views II T1"
        },
        {
        "value" : "Downtown Views II T2"
        },
        {
        "value" : "Downtown Views II T3"
        },
        {
        "value" : "PARK INN"
        },
        {
        "value" : "JANAYEN AVENUE"
        },
        {
        "value" : "JANAYEN AVENUE 2"
        },
        {
        "value" : "VICTORIA RESIDENCY"
        },
        {
        "value" : "Creek Rise Tower 1"
        },
        {
        "value" : "Creek Rise Tower 2"
        },
        {
        "value" : "REGENT COURT"
        },
        {
        "value" : "ROXANA RESIDENCE - A"
        },
        {
        "value" : "ROXANA RESIDENCE - B"
        },
        {
        "value" : "ROXANA RESIDENCE - C"
        },
        {
        "value" : "ROXANA RESIDENCE - D"
        },
        {
        "value" : "PLAZZO RESIDENCE"
        },
        {
        "value" : "XXII CARAT CLUB VILLAS Palm Jumeirah"
        },
        {
        "value" : "Jumeirah Living Marina Gate"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-01"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-02"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-03"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-04"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-05"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-06"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-07"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-08"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-09"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-10"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-11"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-12"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-13"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-14"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-15"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-16"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-17"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-18"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-19"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-20"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-21"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-22"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-23"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-24"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-25"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-26"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-27"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-28"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-29"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-30"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-31"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-32"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-33"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-34"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-35"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-36"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-37"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-38"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-39"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-40"
        },
        {
        "value" : "URBANA II STACKED HOUSE BLOCK-41"
        },
        {
        "value" : "BLOOM HEIGHTS A"
        },
        {
        "value" : "BLOOM HEIGHTS B"
        },
        {
        "value" : "HAMENI TOWER"
        },
        {
        "value" : "Bluewaters Residences 1"
        },
        {
        "value" : "Bluewaters Residences 2"
        },
        {
        "value" : "Bluewaters Residences 3"
        },
        {
        "value" : "Bluewaters Residences 4"
        },
        {
        "value" : "Bluewaters Residences 5"
        },
        {
        "value" : "Bluewaters Residences 6"
        },
        {
        "value" : "Bluewaters Residences 7"
        },
        {
        "value" : "Bluewaters Residences 8"
        },
        {
        "value" : "Bluewaters Residences 9"
        },
        {
        "value" : "Bluewaters Residences 10"
        },
        {
        "value" : "The Residences"
        },
        {
        "value" : "Golf Views Block A"
        },
        {
        "value" : "Golf Views Block B"
        },
        {
        "value" : "Golf Views Podium"
        },
        {
        "value" : "AL FOUAD"
        },
        {
        "value" : "RESORTZ RESIDENCE BLOCK 1"
        },
        {
        "value" : "RESORTZ RESIDENCE BLOCK 2"
        },
        {
        "value" : "RESORTZ RESIDENCE BLOCK 3"
        },
        {
        "value" : "The One Hotel"
        },
        {
        "value" : "Elite Business Bay Residence"
        },
        {
        "value" : "Ciel"
        },
        {
        "value" : "Mudon Views 4"
        },
        {
        "value" : "ADDRESS HARBOUR POINT TOWER 1"
        },
        {
        "value" : "ADDRESS HARBOUR POINT TOWER 2"
        },
        {
        "value" : "Park Heights I"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-01"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-03"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-04"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-05"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-06"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-07"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-08"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-09"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-10"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-11"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-12"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-13"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-14"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-15"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-16"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-17"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-18"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-19"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-20"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-21"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-22"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-23"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-24"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-26"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-27"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-28"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-31"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-32"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-33"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-36"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-37"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-41"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-46"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-53"
        },
        {
        "value" : "BRIGHT CORNER"
        },
        {
        "value" : "Mudon Views Tower 5"
        },
        {
        "value" : "THE ROYAL ATLANTIS RESORT & RESIDENCES"
        },
        {
        "value" : "Vincitore Boulevard"
        },
        {
        "value" : "PARK HEIGHTS II T1"
        },
        {
        "value" : "PARK HEIGHTS II T2"
        },
        {
        "value" : "OXFORD RESIDENCE"
        },
        {
        "value" : "Miracle Residence"
        },
        {
        "value" : "CAYAN CANTARA - SA"
        },
        {
        "value" : "BAYZ TOWER"
        },
        {
        "value" : "Azizi Aura Resindences"
        },
        {
        "value" : "Green Valley Tower"
        },
        {
        "value" : "The Pulse Boulevard Apartments - C3"
        },
        {
        "value" : "Royal Manor"
        },
        {
        "value" : "AlAndalus C"
        },
        {
        "value" : "The Pulse Residence Plaza B8"
        },
        {
        "value" : "The Pulse Residence Plaza B9"
        },
        {
        "value" : "The Pulse Residence Plaza PTH"
        },
        {
        "value" : "THE DUBAI CREEK RESIDENCES - NORTH PODIUM"
        },
        {
        "value" : "THE DUBAI CREEK RESIDENCES - SOUTH PODIUM"
        },
        {
        "value" : "AVA DESIGNER RESEDENSS - H30"
        },
        {
        "value" : "AVA DESIGNER RESEDENSS - C32"
        },
        {
        "value" : "Island Park I"
        },
        {
        "value" : "Vida Dubai Mall Tower 1"
        },
        {
        "value" : "Vida Dubai Mall Tower 2"
        },
        {
        "value" : "RIMAL WALK"
        },
        {
        "value" : "TOWN SQUARE - RAWDA APARTMENTS 1"
        },
        {
        "value" : "TOWN SQUARE - RAWDA APARTMENTS 2"
        },
        {
        "value" : "Parkviews"
        },
        {
        "value" : "Parkside"
        },
        {
        "value" : "Shamal Waves"
        },
        {
        "value" : "Mazaya 26"
        },
        {
        "value" : "SOBHA HARTLAND GREENS-PHASE III"
        },
        {
        "value" : "Mazaya 5"
        },
        {
        "value" : "Farhad Azizi Residence"
        },
        {
        "value" : "LIV RESIDENCE"
        },
        {
        "value" : "EATON PLACE"
        },
        {
        "value" : "Azizi Berton"
        },
        {
        "value" : "MAG 515"
        },
        {
        "value" : "MAG 555"
        },
        {
        "value" : "MAG 560"
        },
        {
        "value" : "GREEN DIAMOND 1 A"
        },
        {
        "value" : "GREEN DIAMOND 1 B"
        },
        {
        "value" : "Grenland"
        },
        {
        "value" : "SKY BAY HOTEL"
        },
        {
        "value" : "DT1"
        },
        {
        "value" : "BLOOM TOWERS B"
        },
        {
        "value" : "BLOOM TOWERS C"
        },
        {
        "value" : "PORTOFINO"
        },
        {
        "value" : "COTE D'AZUR"
        },
        {
        "value" : "Azizi Riviera 5"
        },
        {
        "value" : "AL HASEEN RESIDENCES"
        },
        {
        "value" : "DAMAC HILLS - GOLF VITA - A"
        },
        {
        "value" : "17 ICON BAY"
        },
        {
        "value" : "Azizi Riviera 16"
        },
        {
        "value" : "THE ONYX HOTEL"
        },
        {
        "value" : "THE ONYX RETAIL"
        },
        {
        "value" : "PANTHEON BOULEVARD"
        },
        {
        "value" : "Al Falak Residence"
        },
        {
        "value" : "DAR AL JAWHARA"
        },
        {
        "value" : "Avalon Tower"
        },
        {
        "value" : "EXECUTIVE RESIDENCES"
        },
        {
        "value" : "EXECUTIVE RESIDENCES 2"
        },
        {
        "value" : "PARK RIDGE TOWER C"
        },
        {
        "value" : "Azizi Riviera 7"
        },
        {
        "value" : "Binghatti Stars"
        },
        {
        "value" : "MAG 510"
        },
        {
        "value" : "MAG 565"
        },
        {
        "value" : "I SUITES SMART RESIDENCE (O2)"
        },
        {
        "value" : "I SUITES SMART RESIDENCE (O1)"
        },
        {
        "value" : "I SUITES SMART RESIDENCE (O6)"
        },
        {
        "value" : "I SUITES SMART RESIDENCE (O7)"
        },
        {
        "value" : "Fella"
        },
        {
        "value" : "Nisrina"
        },
        {
        "value" : "Sawsana"
        },
        {
        "value" : "Jinan"
        },
        {
        "value" : "Azizi Riviera 4"
        },
        {
        "value" : "Azizi Riviera 3"
        },
        {
        "value" : "Azizi Riviera 6"
        },
        {
        "value" : "Azizi Riviera 1"
        },
        {
        "value" : "Azizi Riviera 2"
        },
        {
        "value" : "The Wings - A"
        },
        {
        "value" : "The Wings - B"
        },
        {
        "value" : "The Wings - C"
        },
        {
        "value" : "The Wings - Podium"
        },
        {
        "value" : "EDEN APARTMENTS"
        },
        {
        "value" : "PRIME VIEWS"
        },
        {
        "value" : "Azizi Riviera 21"
        },
        {
        "value" : "Chaimaa Premiere"
        },
        {
        "value" : "Azizi Riviera 12"
        },
        {
        "value" : "Azizi Riviera 20"
        },
        {
        "value" : "Azizi Riviera 13"
        },
        {
        "value" : "Joya Verde Residence Dubai"
        },
        {
        "value" : "Al Fattan Marine Towers"
        },
        {
        "value" : "Dusit Princess Rijas"
        },
        {
        "value" : "AL HELAL AL ZAHABY BUILDING 2"
        },
        {
        "value" : "Azizi Riviera 11"
        },
        {
        "value" : "Vida Zaabeel T1"
        },
        {
        "value" : "MAG 318"
        },
        {
        "value" : "Arabian"
        },
        {
        "value" : "Spanish"
        },
        {
        "value" : "The Grand"
        },
        {
        "value" : "UNA APARTMENTS B"
        },
        {
        "value" : "Azizi Riviera 15"
        },
        {
        "value" : "K1"
        },
        {
        "value" : "PARK VILLE 07"
        },
        {
        "value" : "Azizi Riviera 10"
        },
        {
        "value" : "Azizi Riviera 19"
        },
        {
        "value" : "Azizi Riviera 8"
        },
        {
        "value" : "Azizi Riviera 18"
        },
        {
        "value" : "Azizi Riviera 14"
        },
        {
        "value" : "PARK GATE RESIDENCES 1"
        },
        {
        "value" : "PARK GATE RESIDENCES 2"
        },
        {
        "value" : "PARK GATE RESIDENCES 3"
        },
        {
        "value" : "PARK GATE RESIDENCES 4"
        },
        {
        "value" : "I LOVE FLORENCE Tower"
        },
        {
        "value" : "J ONE - 1"
        },
        {
        "value" : "Azizi Riviera 23"
        },
        {
        "value" : "Belgravia III A"
        },
        {
        "value" : "Belgravia III B"
        },
        {
        "value" : "MICASA AVENUE"
        },
        {
        "value" : "MAG 505"
        },
        {
        "value" : "Azizi Riviera 22"
        },
        {
        "value" : "MARASI RIVERSIDE"
        },
        {
        "value" : "AZIZI VICTORIA 4 - A"
        },
        {
        "value" : "AZIZI VICTORIA 4 - B"
        },
        {
        "value" : "AZIZI VICTORIA 4 - C"
        },
        {
        "value" : "AZIZI VICTORIA 4 - D"
        },
        {
        "value" : "Bellevue Towers-1"
        },
        {
        "value" : "Bellevue Towers-2"
        },
        {
        "value" : "SEVEN HOTEL & APARTMENTS THE PALM"
        },
        {
        "value" : "BEACH VISTA Tower 1"
        },
        {
        "value" : "BEACH VISTA Tower 2"
        },
        {
        "value" : "REVA RESIDENCES"
        },
        {
        "value" : "BANYAN TREE RESIDENCES HILLSIDE DUBAI"
        },
        {
        "value" : "Millennium Binghatti Residences Business Bay"
        },
        {
        "value" : "Serenity Lakes 5"
        },
        {
        "value" : "WILTON TERRACES I"
        },
        {
        "value" : "WILTON TERRACES II"
        },
        {
        "value" : "SUNRISE BAY Tower 1"
        },
        {
        "value" : "SUNRISE BAY Tower 2"
        },
        {
        "value" : "SUNRISE BAY Podium"
        },
        {
        "value" : "Easy 18"
        },
        {
        "value" : "Mohammed Bin Rashid Al Maktoum City, District One Phase III, Residences 16"
        },
        {
        "value" : "Jewelz Residence"
        },
        {
        "value" : "Mohammed Bin Rashid Al Maktoum City, District One Phase III, Residences 3"
        },
        {
        "value" : "Mohammed Bin Rashid Al Maktoum City, District One Phase III, Residences 1"
        },
        {
        "value" : "Mohammed Bin Rashid Al Maktoum City, District One Phase III, Residences 2"
        },
        {
        "value" : "Mohammed Bin Rashid Al Maktoum City, District One Phase III, Residences 15"
        },
        {
        "value" : "Mohammed Bin Rashid Al Maktoum City, District One Phase III, Residences 4"
        },
        {
        "value" : "Mohammed Bin Rashid Al Maktoum City, District One Phase III, Residences 5"
        },
        {
        "value" : "Azizi Riviera 33"
        },
        {
        "value" : "Orchidea"
        },
        {
        "value" : "Serenity Lakes 2"
        },
        {
        "value" : "Azizi Riviera 34"
        },
        {
        "value" : "Azizi Riviera 32"
        },
        {
        "value" : "Azizi Riviera 35"
        },
        {
        "value" : "Azizi Riviera 17"
        },
        {
        "value" : "The Square"
        },
        {
        "value" : "Azizi Riviera 37"
        },
        {
        "value" : "NB Hotel"
        },
        {
        "value" : "Azizi Riviera 38"
        },
        {
        "value" : "Socio Tower 1"
        },
        {
        "value" : "Socio Tower 2"
        },
        {
        "value" : "Collective Tower 1"
        },
        {
        "value" : "Collective Tower 2"
        },
        {
        "value" : "LAYA Mansion"
        },
        {
        "value" : "LA RESIDENCE"
        },
        {
        "value" : "MBL RESIDENCE"
        },
        {
        "value" : "AZIZI Victoria 5 - A"
        },
        {
        "value" : "AZIZI Victoria 5 - B"
        },
        {
        "value" : "AZIZI Victoria 5 - C"
        },
        {
        "value" : "AZIZI Victoria 5 - D"
        },
        {
        "value" : "Mohammed Bin Rashid Al Maktoum City, District One Phase III, Residences 14"
        },
        {
        "value" : "SAMAYA"
        },
        {
        "value" : "Grande"
        },
        {
        "value" : "Genesis"
        },
        {
        "value" : "Sobha Creek Vistas (A)"
        },
        {
        "value" : "Sobha Creek Vistas (B)"
        },
        {
        "value" : "Azizi Riviera 9"
        },
        {
        "value" : "S.A.S 1"
        },
        {
        "value" : "LAWNZ BLOCK 1"
        },
        {
        "value" : "LAWNZ BLOCK 2"
        },
        {
        "value" : "Belgravia Heights I"
        },
        {
        "value" : "REGINA"
        },
        {
        "value" : "Multaqa Avenue 3"
        },
        {
        "value" : "Multaqa Avenue 4"
        },
        {
        "value" : "DOLPHIN TOWER"
        },
        {
        "value" : "V2"
        },
        {
        "value" : "CREEK EDGE Tower 1"
        },
        {
        "value" : "CREEK EDGE Tower 2"
        },
        {
        "value" : "LAWNZ BLOCK 3"
        },
        {
        "value" : "LAWNZ BLOCK 4"
        },
        {
        "value" : "Signature Livings - North"
        },
        {
        "value" : "Signature Livings - South"
        },
        {
        "value" : "Rosebay Living"
        },
        {
        "value" : "Harbour Gate Podium"
        },
        {
        "value" : "AL MANZIL HOTEL"
        },
        {
        "value" : "MAG 520"
        },
        {
        "value" : "Belgravia Heights II"
        },
        {
        "value" : "Madinat Jumeirah Living Lamtara 2"
        },
        {
        "value" : "Breeze at Creek Beach Building 1"
        },
        {
        "value" : "Breeze at Creek Beach Building 2"
        },
        {
        "value" : "Breeze at Creek Beach Building 3"
        },
        {
        "value" : "Golf Suites"
        },
        {
        "value" : "Seven City JLT"
        },
        {
        "value" : "Kappa Acca 3"
        },
        {
        "value" : "Dragon Towers - Tower B"
        },
        {
        "value" : "Dragon Towers - Tower A"
        },
        {
        "value" : "MARIA TOWER"
        },
        {
        "value" : "Al Andalus Building -D"
        },
        {
        "value" : "Collective 2.0 Tower A"
        },
        {
        "value" : "Collective 2.0 Tower B"
        },
        {
        "value" : "Mohammed Bin Rashid Al Maktoum City-District One, Phase III, Residences 12"
        },
        {
        "value" : "VIDA Downtown"
        },
        {
        "value" : "PANTHEON ELYSEE"
        },
        {
        "value" : "ELZ RESIDENCE"
        },
        {
        "value" : "La Cote ? Building 1"
        },
        {
        "value" : "La Cote ? Building 2"
        },
        {
        "value" : "La Cote ? Building 3"
        },
        {
        "value" : "La Cote ? Building 4"
        },
        {
        "value" : "La Cote ? Building 5"
        },
        {
        "value" : "ROVE HOTEL"
        },
        {
        "value" : "SUNCITY HOMES"
        },
        {
        "value" : "Beverly Residence"
        },
        {
        "value" : "Burj Royale"
        },
        {
        "value" : "Binghatti Gateway"
        },
        {
        "value" : "BELLA ROSE"
        },
        {
        "value" : "MAG EYE 890"
        },
        {
        "value" : "MAG EYE 900"
        },
        {
        "value" : "MAG EYE 910"
        },
        {
        "value" : "MAG EYE 920"
        },
        {
        "value" : "Madinat Jumeirah Living Lamtara 3"
        },
        {
        "value" : "Madinat Jumeirah Living Rahaal 1"
        },
        {
        "value" : "Madinat Jumeirah Living Rahaal 2"
        },
        {
        "value" : "Azizi Riviera 24"
        },
        {
        "value" : "SAMANA GREENS"
        },
        {
        "value" : "Azizi Riviera 28"
        },
        {
        "value" : "Azizi Riviera 27"
        },
        {
        "value" : "Fawad Azizi Residence"
        },
        {
        "value" : "Azizi Riviera 29"
        },
        {
        "value" : "Azizi Riviera 30"
        },
        {
        "value" : "Azizi Riviera 39"
        },
        {
        "value" : "Azizi Riviera 48"
        },
        {
        "value" : "Sunset at Creek Beach Building 1"
        },
        {
        "value" : "Sunset at Creek Beach Building 2"
        },
        {
        "value" : "Sunset at Creek Beach Building 3"
        },
        {
        "value" : "Marina Vista Tower 1"
        },
        {
        "value" : "Marina Vista Tower 2"
        },
        {
        "value" : "Azizi Riviera 40"
        },
        {
        "value" : "Oxford Residence 2"
        },
        {
        "value" : "Azizi Riviera 26"
        },
        {
        "value" : "Belgravia Square A"
        },
        {
        "value" : "Belgravia Square B"
        },
        {
        "value" : "DUBAI MARINA TOWERS - RETAIL"
        },
        {
        "value" : "Aamna Residency"
        },
        {
        "value" : "Palace Residences"
        },
        {
        "value" : "Tabeer 1"
        },
        {
        "value" : "Hyati Avenue"
        },
        {
        "value" : "THE NOOK 2-1"
        },
        {
        "value" : "WOW Dubai"
        },
        {
        "value" : "Park Vista"
        },
        {
        "value" : "The Terraces N"
        },
        {
        "value" : "The Terraces S"
        },
        {
        "value" : "Bayshore at Creek Beach Building 1"
        },
        {
        "value" : "Bayshore at Creek Beach Building 2"
        },
        {
        "value" : "Bayshore at Creek Beach Building 3"
        },
        {
        "value" : "Bayshore at Creek Beach Building 4"
        },
        {
        "value" : "The Bay"
        },
        {
        "value" : "Summer at Creek Beach Building 1"
        },
        {
        "value" : "Summer at Creek Beach Building 2"
        },
        {
        "value" : "Summer at Creek Beach Building 3"
        },
        {
        "value" : "Summer at Creek Beach Building 4"
        },
        {
        "value" : "La Rive - Building 1"
        },
        {
        "value" : "La Rive - Building 2"
        },
        {
        "value" : "La Rive - Building 3"
        },
        {
        "value" : "La Rive - Building 4"
        },
        {
        "value" : "VINCITORE BENESSERE"
        },
        {
        "value" : "ZADA TOWER"
        },
        {
        "value" : "KOA Canvas"
        },
        {
        "value" : "Grand Bleu Tower interiors by Elie Saab Tower 1"
        },
        {
        "value" : "Golfville Block A"
        },
        {
        "value" : "Harbour Views Podium"
        },
        {
        "value" : "Q GARDENS BOUTIQUE RESIDENCES"
        },
        {
        "value" : "Central Park - Building 1"
        },
        {
        "value" : "SOUTH RESIDENCES"
        },
        {
        "value" : "Sirdhana Building 1"
        },
        {
        "value" : "Sirdhana Building 3"
        },
        {
        "value" : "Sobha Hartland One Park Avenue"
        },
        {
        "value" : "Living Garden II"
        },
        {
        "value" : "Wilton Park Residences I"
        },
        {
        "value" : "Wilton Park Residences II"
        },
        {
        "value" : "Surf at Creek Beach Building 1"
        },
        {
        "value" : "Surf at Creek Beach Building 2"
        },
        {
        "value" : "THE V"
        },
        {
        "value" : "Le Pont - Building 2"
        },
        {
        "value" : "Le Pont - Building 3"
        },
        {
        "value" : "Asayel 1"
        },
        {
        "value" : "GATE ZONE"
        },
        {
        "value" : "Blue Wave"
        },
        {
        "value" : "WAVEZ RESIDENCE"
        },
        {
        "value" : "VIDA Residences at Creek Beach"
        },
        {
        "value" : "Sobha Creek Vistas Reserve"
        },
        {
        "value" : "Mohammed Bin Rashid Al Maktoum City, District One Phase III, Residences 13"
        },
        {
        "value" : "Mohammed Bin Rashid Al Maktoum City, District One Phase III, Residences 6"
        },
        {
        "value" : "Qamar 2"
        },
        {
        "value" : "Qamar 3"
        },
        {
        "value" : "Qamar 9"
        },
        {
        "value" : "Qamar 11"
        },
        {
        "value" : "Creekside 18 Podium"
        },
        {
        "value" : "La Voile - Building 1"
        },
        {
        "value" : "La Voile - Building 2"
        },
        {
        "value" : "La Voile - Building 3"
        },
        {
        "value" : "Majestique Residence 1"
        },
        {
        "value" : "CHAIMAA AVENUE"
        },
        {
        "value" : "La Vie"
        },
        {
        "value" : "Lucky 1 Residences"
        },
        {
        "value" : "Binghatti Avenue"
        },
        {
        "value" : "Samana Hills"
        },
        {
        "value" : "ARIA"
        },
        {
        "value" : "Alexis Tower"
        },
        {
        "value" : "BNH SMART TOWER"
        },
        {
        "value" : "SAAM VEGA"
        },
        {
        "value" : "THE V TOWER"
        },
        {
        "value" : "Burj Crown"
        },
        {
        "value" : "Beach Isle Tower 1"
        },
        {
        "value" : "Al Andalus Building -G"
        },
        {
        "value" : "OLIVZ RESIDENCE BLOCK 1"
        },
        {
        "value" : "OLIVZ RESIDENCE BLOCK 2"
        },
        {
        "value" : "OLIVZ RESIDENCE BLOCK 3"
        },
        {
        "value" : "ADDRESS MONTGOMERIE"
        },
        {
        "value" : "Golden Wood Views"
        },
        {
        "value" : "TAMD ACADEMY"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-02"
        },
        {
        "value" : "URBANA III STACKED HOUSE BLOCK-38"
        },
        {
        "value" : "Marina Vista Podium"
        },
        {
        "value" : "BEACH VISTA Podium"
        }
        ];






      // setup autocomplete function pulling from currencies[] array
      $('#autocomplete').autocomplete({
        lookup: currencies,
        onSelect: function (suggestion) {
          var thehtml = '<strong>Currency Name:</strong> ' + suggestion.value + ' <br> <strong>Symbol:</strong> ' + suggestion.data;
          $('#outputcontent').html(thehtml);
        }
      });


    });


