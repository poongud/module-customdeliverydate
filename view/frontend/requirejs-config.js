var config = {
    "map": {
        "*": {
            'Magento_Checkout/js/model/shipping-save-processor/default': 'Adobe_CustomDeliveryDate/js/model/shipping-save-processor/default'
        }
    },
    config: {
        mixins: {
            'Magento_Checkout/js/view/shipping': {
                'Adobe_CustomDeliveryDate/js/mixin/shipping-mixin': true
            }
        }
    }
};
