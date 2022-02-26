define([
        'jquery',
        'ko'
    ], function ($, ko) {
        'use strict';

        return function (target) {
            return target.extend({
                validateShippingInformation: function () {
                    this._super();
                    if ($('#shipping-datetime-form').valid()) {
                        return true;
                    }
                    return false;
                }
            });
        }
    }
);
