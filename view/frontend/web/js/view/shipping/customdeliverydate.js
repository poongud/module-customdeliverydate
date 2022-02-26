define([
    'jquery',
    'ko',
    'uiComponent',
    'mage/translate',
    'mage/calendar'
], function ($, ko, Component) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Adobe_CustomDeliveryDate/shipping/deliverydate'
        },
        initialize: function () {
            this._super();

            ko.bindingHandlers.datetimepicker = {
                init: function (element, valueAccessor, allBindingsAccessor) {
                    var $el = $(element);
                    var options = {
                        minDate: 0,
                        dateFormat: 'yy-mm-dd'
                    };

                    $el.datetimepicker(options);

                    var writable = valueAccessor();
                    if (!ko.isObservable(writable)) {
                        var propWriters = allBindingsAccessor()._ko_property_writers;
                        if (propWriters && propWriters.datetimepicker) {
                            writable = propWriters.datetimepicker;
                        } else {
                            return;
                        }
                    }
                    writable($(element).datetimepicker("getDate"));
                },
                update: function (element, valueAccessor) {
                    var widget = $(element).data("DateTimePicker");
                    if (widget) {
                        var date = ko.utils.unwrapObservable(valueAccessor());
                        widget.date(date);
                    }
                }
            };
            return this;
        }
    });
});
