(function( $ ) {
$(function() {
  if($(document).width() > 960)
    zeitstrahler_orderElements();
});

$( window ).resize(function() {
  if($(document).width() > 960)
    zeitstrahler_orderElements();
});

function zeitstrahler_orderElements() {
  $('.zeitstrahler_wrapper').removeClass('zeitstrahler_nojs').addClass('zeitstrahler_js');
  var amount = $('.zeitstrahler_order').length;
  var elementLeft;
  var elementRight;
  var heightLeft = 0;
  var heightRight = 0;
  var date_before = false;
  for (var i = 0; i < amount; i++) {
    if (elementLeft != null)
    	heightLeft = elementLeft.position().top + elementLeft.outerHeight(true);
    if (elementRight != null)
    	heightRight = elementRight.position().top + elementRight.outerHeight(true);
    
    if (!($('.zeitstrahler_order:eq('+i+')').hasClass( 'zeitstrahler_date' ))) {
    	if ((heightLeft <= heightRight) || (date_before)) {
      	$('.zeitstrahler_order:eq('+i+')').addClass('zeitstrahler_left');
      	elementLeft = $('.zeitstrahler_order:eq('+i+')');
      	date_before = false;
    	}
    	else {
      	$('.zeitstrahler_order:eq('+i+')').addClass('zeitstrahler_right');
      	elementRight = $('.zeitstrahler_order:eq('+i+')');
    	}
    }
    else {
    	date_before = true;
    }

  }
}
})(jQuery);