
/**
 * Generate a row of stars
 * Version 0.1
 * Free to use and abuse
 * @author Sean Boyer
 * @param number double or string (e.g. 1.5 or "2" or "4.5")
 * @returns {jQuery}
 */
(function($) {
    $.fn.starRating = function(number) {
        var addHalf = false;
        var count = 0;
        var $starbox = $('<div class="starRatingBox"></div>');
        number = String(number);
        
        if (number.indexOf(".") === 1) {
            addHalf = true;
            count = number.split(".")[0];
        }
        else {
            count = number;
        }
        
        for (var i = 1; i <= 5; i++) {
            if (i <= count) {
                $starbox.append('<i class="fa fa-star"></i>');
            }
            
            if (i > count) {
                if (addHalf) {
                    $starbox.append('<i class="fa fa-star-half"></i>');
                    addHalf = false;
                    continue;
                }
                
                $starbox.append('<i class="fa fa-star-o"></i>');
            }
        }

        return this.append($starbox);
    }
}(jQuery));
